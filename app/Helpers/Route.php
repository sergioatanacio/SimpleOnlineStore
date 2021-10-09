<?php
use App\RequestResponse\Request;

class Route
{
    private static $requestObject;
    private static $request_uri;
    private static $petition;
    private static $connect;

    private static function Connect()
    {
        try {
            $connection = new \PDO("mysql:host=".db_host."; dbname=".db_nombre, db_usuario, db_pasword);
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $connection->exec("SET CHARACTER SET utf8");

            return $connection;
        } catch (\Throwable $th) {
            die("El error de conexion es: ".$th->getMessage());
        }
    }

    public static function get($route, $controller, $requestObject = null, $request_uri = null, $petition = null, $connect = null)
    {
        self::$requestObject    = $requestObject ?? new Request();
        self::$request_uri      = $request_uri ?? $_SERVER['REQUEST_URI'];
        self::$petition         = $petition ?? $_REQUEST;
        self::$connect          = $connect ?? self::Connect();

        $controller = fn() : array => explode('@', $controller);
        $routePath = [
            "controllerRoute"   => $controller()[0],
            "methodRoute"       => $controller()[1]
        ];

        $escapingGetExplode = fn() : array => explode('?', self::$request_uri);
        $escapingGet = fn() : string => (is_array($escapingGetExplode())) ? $escapingGetExplode()[0] : self::$request_uri;

        $route = fn() : string => "/" . $route;
        $request = function() use ($route, $escapingGet, $routePath)
        {
            if ($route() == $escapingGet())
            {
                return self::$requestObject->setInstance(
                    $routePath['controllerRoute'],
                    $routePath['methodRoute'],
                    self::$petition,
                    self::$connect
                )->send();
            }
        };
        echo $request();
        return $request();
    }
}

