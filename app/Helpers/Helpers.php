<?php

use App\RequestResponse\Response;


if(! function_exists('domain')) 
{
    function domain($route) {
        return domain . $route;
    }
}


if(! function_exists('view')) 
{
    function view($view) {
        return new Response($view);
    }
}

if(! function_exists('viewPath')) 
{
    function viewPath($view): string
    {
        return __DIR__."/../../resources/views/$view.php";
    }
}

function sessionStarted()
{
    if(!isset($_SESSION)){ session_start();}
    $_SESSION['session'] = true;
}

function activeSession()
{
    if(!isset($_SESSION)){ session_start();}
    $sessionStarted = (!isset($_SESSION['session'])) ? false : $_SESSION['session'] ;

    if ($sessionStarted == false) {
        // echo "Debes iniciar sesión.";
        header("Location:" . domain(""));
        die();
    }
}

function sessionEnded(){
    if(!isset($_SESSION)){ session_start();}
    $_SESSION['session'] = false;
}



if(! function_exists('id_user')) 
{
    function id_user()  
    {
        if(!isset($_SESSION)){ session_start();}
        return (isset($_SESSION['id_user'])) ? $_SESSION['id_user'] : false ;
    }
}

if(! function_exists('back')) 
{
    function back()  
    {
        header("Location:" . $_SERVER['HTTP_REFERER']);
    }
}

if(! function_exists('popArray')) 
{
    function popArray($popFunction)
    {
        array_pop($popFunction);
        return $popFunction;
    }
}

if(! function_exists('lastElement')) 
{
    function lastElement($lastElement)
    {
        if(!is_array($lastElement) || $lastElement == []){
            return  [];
        } else{
            return $lastElement[count($lastElement) - 1];
        }
    }
}

if(! function_exists('joinArrangement'))
{
    function joinArrangement($array, $newItem = null) : array
    {
        if (is_array($array)) {
            $fixReturned = $array;
        } elseif ($array == null || $array == '') {
            $fixReturned = [];
        } else {
            $fixReturned[] = $array;
        }
        
        if (isset($newItem) && $newItem != []) {
            $fixReturned[] = $newItem;
        }
        
        return $fixReturned;
    }
}

if(! function_exists('assocQuery'))
{
    function assocQuery($query, $index = null)
    {   
        if ($query != null) {
            $result = [];
            while ($elements = $query->fetch(\PDO::FETCH_ASSOC))
            {
                $result[] = ($index != null) ? $elements[$index] : $elements;
            }
        } else {
            $result = null;
        }
        
        return $result;
    }
}

if(! function_exists('previousDirection'))
{
    function previousDirection()
    {   
        if (isset($_SERVER["HTTP_REFERER"])) {
            return $_SERVER["HTTP_REFERER"];
        } else {
            return domain("read");
        }
    }
}

if(! function_exists('getAnItem'))
{
    function getAnItem(array $array, string $index = null, array $result = [])
    {
        if (!is_array($array) || $array == []) {
            return $result;
        } else {
            $lastElement = lastElement($array);
            $resultingElement = $lastElement[$index];
            return getAnItem(popArray($array), $index, joinArrangement($result, $resultingElement));
        }
    }
}

if(! function_exists('pre'))
{
    function pre($pre)
    {
        echo '<pre>';
        var_dump($pre);
        echo '</pre>';
    }
}
