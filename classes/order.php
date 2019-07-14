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

    public static function getOrdersByUserId($id)
    {
        $fileDB = new FileDB();
        $orders = $fileDB->getDataByFilter("orders", array("id_client" => $id));
        return $orders;
    }
    
}