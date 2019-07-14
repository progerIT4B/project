<?php
include_once("classes/fileDB.php");

class Product
{
    public static function getProductsList()
    {
        $fileDB = new FileDB();
        $products = $fileDB->getDataByFilter("productItems", array());
        return $products;
    }

    public static function getProductById($id)
    {
        $fileDB = new FileDB();
        $product = $fileDB->getDataByFilter("productItems", array('id' => $id))[0];
        return $product;
    }

    
    
}