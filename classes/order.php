<?php
include_once("classes/fileDB.php");

class Order
{
    public static function addOrder($data)
    {
        $fileDB = new FileDB();
        $fileDB->setNewData("orders", $data);
    }

    public static function addOrderItem($data)
    {
        $fileDB = new FileDB();
        $fileDB->setNewData("ordersItems", $data);
    }

    
}