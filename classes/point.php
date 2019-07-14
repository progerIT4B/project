<?php
include_once("classes/fileDB.php");

class Point
{
    public static function addPoint($data)
    {
        $fileDB = new FileDB();
        $userId = $fileDB->getDataByFilter("clientItems", array("apiKey" => $data['apiKey']))[0]['id'];
        $data['id_client'] = $userId;
        $fileDB->setNewData("clientPoints", $data);
    }

    public static function getClientPoint($id)
    {
        $fileDB = new FileDB();
        $point = $fileDB->getDataByFilter("clientPoints", array("id" => $id))[0];
        return $point;
    }

    public static function getClientPoints($user_id)
    {
        $fileDB = new FileDB();
        $points = $fileDB->getDataByFilter("clientPoints", array("id_client" => $user_id));
        return $points;
    }

}