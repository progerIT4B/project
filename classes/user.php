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

    public static function checkLogin($data)
    {
        $fileDB = new FileDB();
        $filter = array(
            "email" => $data['email'],
            "pass" => $data['pass']
        );
        $users = $fileDB->getDataByFilter("clientItems", $filter);
        if (!empty($users)) {
            // send Login page
            setcookie("apiKey", $users[0]['apiKey'], time() + 3600);
            PageGenerator::generateLogined($users[0]);
        } else {
            // send error to ajax
            PageGenerator::generateBase();
        }
    }
}