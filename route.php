<?php
include_once("classes/user.php");
include_once("classes/fileDB.php");
include_once("classes/point.php");
include_once("classes/order.php");
include_once("classes/product.php");
include_once("classes/pageGenerator.php");

$postData = file_get_contents('php://input'); 
$arData = json_decode($postData, true); 

if (array_key_exists('data', $arData)) { // api
    $data = $arData['data'];
    $fileDB = new FileDB();

    if (!array_key_exists('apiKey', $data) && 
        array_key_exists('apiKey', $_COOKIE)) {
        $data['apiKey'] = $_COOKIE['apiKey'];
    }

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
            $apiKey = $_COOKIE['apiKey'];
            $fileDB->editDataByFilter("clientItems", array("apiKey" => $apiKey), $data);
            $user = $fileDB->getDataByFilter("clientItems", array("apiKey" => $apiKey))[0];
            PageGenerator::generateLogined($user);
            break;
        case "getClientItem": //json
            $user = User::getUserData($data['id'])[0];
            echo json_encode($user);
            break;
        case "addClientPoint": 
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
            Order::addOrder($data);
            break;
        case "getOrders": // json
            $orders = Order::getOrdersByUserId($data["id"]);
            echo json_encode($orders);
            break;
        case "getProductList":
            $products = Product::getProductsList();
            PageGenerator::generateProducts($products);
            break;
        case "getProduct": //json
            $product = Product::getProductById($data['id']);
            echo json_encode($product);
            break;
        case "addProductToOrder":
            Order::addOrderItem($data);
            break;
        // 1C incoming
        case "setClientItemFrom1C":
            //
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


