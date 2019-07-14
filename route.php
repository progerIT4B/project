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
            if (!array_key_exists('apiKey', $data)) {
                $data['apiKey'] = $_COOKIE['apiKey'];
            }
            $apiKey = $_COOKIE['apiKey'];
            $fileDB->editDataByFilter("clientItems", array("apiKey" => $apiKey), $data);
            $user = $fileDB->getDataByFilter("clientItems", array("apiKey" => $apiKey))[0];
            PageGenerator::generateLogined($user);
            break;
        case "getClientItem": //json

            if (!array_key_exists('apiKey', $data)) {
                $data['apiKey'] = $_COOKIE['apiKey'];
            }
            $user = User::getUserData($data['id'])[0];
            echo json_encode($user);
            break;
        case "addClientPoint": 
            if (!array_key_exists('apiKey', $data)) {
                $data['apiKey'] = $_COOKIE['apiKey'];
            }
            Point::addPoint($data);
            break;
        case "getClientPoint": //json
            $point = Point::getClientPoint($data['id']);
            echo json_encode($point);
            break;
        case "getClientPoints": //json
            $points = Point::getClientPoints($data['id']);
            echo json_encode($points);
            break;
        case "addOrder":
            if (!array_key_exists('apiKey', $data)) {
                $data['apiKey'] = $_COOKIE['apiKey'];
            }
            Order::addOrder($data);
            break;
        case "getOrders": // json
            $orders = Order::getOrdersByUserId($data["id"]);
            echo json_encode($orders);
            break;
        case "getProductList":
            if (!array_key_exists('apiKey', $data)) {
                $data['apiKey'] = $_COOKIE['apiKey'];
            }
            $products = Product::getProductsList();
            PageGenerator::generateProducts($products);
            break;
        case "getProduct": //json
            if (!array_key_exists('apiKey', $data)) {
                $data['apiKey'] = $_COOKIE['apiKey'];
            }
            $product = Product::getProductById($data['id']);
            echo json_encode($product);
            break;
        case "addProductToPoint":
            

            break;
        case "addProductToOrder":
            if (!array_key_exists('apiKey', $data)) {
                $data['apiKey'] = $_COOKIE['apiKey'];
            }
            Order::addOrderItem($data);
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
    } else {
        PageGenerator::generateBase();
    }
}


