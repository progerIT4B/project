<?php
include_once("classes/fileDB.php");

class User
{
    public static function saveUserData($data)
    {
        $fileDB = new FileDB();
        $data['apiKey'] = uniqid();
        $fileDB->setNewData("clientItems", $data);
        return $data['apiKey'];
    }
}