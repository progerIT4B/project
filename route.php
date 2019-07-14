<?php
include_once("classes/user.php");
include_once("classes/fileDB.php");
include_once("classes/point.php");
include_once("classes/order.php");
include_once("classes/product.php");
include_once("classes/pageGenerator.php");

if (array_key_exists('data', $_REQUEST)) { // api
    $data = $_REQUEST['data'];

    $fileDB = new FileDB();

    switch ($data['method']) {
        case "register":
            $apiKey = User::saveUserData($data);
            $user = $fileDB->getDataByFilter("clientItems", array("apiKey" => $apiKey))[0];
            PageGenerator::generateLogined($user);
            break;
        case "login":
                User::checkLogin($data);
            break;
        case "edit":
            if (!array_key_exists('apiKey', $_COOKIE)) {
                //error edit user data without apiKey
            }
            $apiKey = $_COOKIE['apiKey'];
            $fileDB->editDataByFilter("clientItems", array("apiKey" => $apiKey), $data);
            $user = $fileDB->getDataByFilter("clientItems", array("apiKey" => $apiKey))[0];
            PageGenerator::generateLogined($user);
            break;
        case "addClientPoint":
            $data['apiKey'] = $_COOKIE['apiKey'];
            Point::addPoint($data);
            break;
        case "addOrder":
            $data['apiKey'] = $_COOKIE['apiKey'];
            Order::addOrder($data);
            break;
        case "getProductList":
            $data['apiKey'] = $_COOKIE['apiKey'];
            Order::addOrder($data);
            break;
        default:
            PageGenerator::generateBase();
    }
} else {
    // check user logined
    if (array_key_exists('apiKey', $_COOKIE)) {
        $apiKey = $_COOKIE['apiKey'];
        $user = $fileDB->getDataByFilter("clientItems", array("apiKey" => $apiKey))[0];
        PageGenerator::generateLogined($user);
    }
}


