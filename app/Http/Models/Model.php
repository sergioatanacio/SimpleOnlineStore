<?php
namespace App\Http\Models;
use App\Helpers\GlobalVariables;

trait Model
{
    public static function increaseIdValue($connectionDb, $columnToIncrease, $table, $valueToOrder, $id_user)
    {
        $increaseId = function() use ($connectionDb, $columnToIncrease, $table, $valueToOrder, $id_user)
        {
            if (isset($id_user))
            {
                $sql = "SELECT ".$columnToIncrease." FROM ".$table." WHERE id_user = ? ORDER BY ".$valueToOrder." DESC LIMIT 1";
                $arrayIncreaseId = $connectionDb->prepare($sql);
                $arrayIncreaseId->execute(array($id_user));
            } else
            {
                $sql = "SELECT ".$columnToIncrease." FROM ".$table." ORDER BY ".$valueToOrder." DESC LIMIT 1";
                $arrayIncreaseId = $connectionDb->prepare($sql);
                $arrayIncreaseId->execute();
            }
            return assocQuery($arrayIncreaseId)[0];
        };

        $idIncreased = function($increaseIdFa) use ($columnToIncrease)
        {
            if (count($increaseIdFa)>=1) {
                $increase = $increaseIdFa[$columnToIncrease];
                return $increase + 1;
            } else {
                return 1;
            }
        };
        return $idIncreased($increaseId());
    }

    public static function validateDataExistence($connectionDb, $nombreDeLaTabla, $nombreDeColumna, $valorAValidarExistencia): bool
    {
        $sql = "SELECT ".$nombreDeColumna." FROM ".$nombreDeLaTabla." WHERE ".$nombreDeColumna." = ? AND enable_disable = '1' ";
        $readDatabase = $connectionDb->prepare($sql);
        $readDatabase->execute(array($valorAValidarExistencia));
        $resultsDb = assocQuery($readDatabase);
        return count($resultsDb)>=1;
    }
}

