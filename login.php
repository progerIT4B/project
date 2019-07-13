<?php
include_once("classes/fileDB.php");
include_once("classes/pageGenerator.php");

class Login
{
    public static function checkLogin($data)
    {
        $fileDB = new FileDB();
        $users = $fileDB->getDataByFilter("clientItems", array("name" => "Иван"));
        if (!empty($users)) {
            // send Login page
            setcookie("apiKey", $users[0]['apiKey'], time() + 3600);
            PageGenerator::generateLogined($users[0]);
        } else {
            // send error to ajax
        }
    }
}