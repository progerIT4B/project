<?php

$data = array(
    'method' => "addClientPoint", 
    'point_type' => 2,
    'address' => 'г. Москва ул. Пушкина д.1',
    'format' => 3,
    'productlife' => 10
);

$_COOKIE['apiKey'] = "5d2a1d6b1f17f";
$_REQUEST['data'] = $data; 

include_once("classes/fileDB.php");


$db = new FileDB();
//$db->editDataByFilter("clientItems", array("name" => "Иван"), array("name" => "Степан"));


$db->echoData();






include_once("route.php");















