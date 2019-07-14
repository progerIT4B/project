<?php

abstract class AbstractScheme
{
    public static function return_clientItems()
    {
        return array( "clientItems" => array(array(
            'id' => 0,
            'name' => "",
            'inn' => "",
            'kpp' => "",
            'address_jur' => "",
            'address_fact' => "",
            'phone' => "",
            'email' => "",
            'bik' => "",
            'bank' => "",
            'account' => "",
            'account_cor' => "",
            'type' => 0,
            "fio" => "",
            "apiKey" => "",
            "pass" => "",
        )));
    }

    public static function return_clientPoints()
    {
        return array("clientPoints" => array(array(
            'id' => 0,
            'id_client' => 0,
            'point_type' => 0,
            'address' => '',
            'format' => 0,
            'productlife' => 0,
            'name' => ""
        )));
    }

    public static function return_productItems()
    {
        return array("productItems" => array(array(
            'id' => 0,
            'id_group' => 0,
            'name' => "",
            'name_full' => ""
        )));
    }

    public static function return_productProperties()
    {
        return array("productProperties" => array(array(
            'id' => 0,
            'id_product' => 0,
            'name' => '',
            'value' => ''
        )));
    }

    public static function return_productPrices()
    {
        return array("productPrices" => array(array(
            'id' => 0,
            'id_client' => 0,
            'id_client_point' => 0,
            'id_product' => 0,
            'id_consignment' => 0,
            'quantity' => 0,
            'id_unit' => 0,
            'price' => 0,
            'vat_tax' => 0,
        )));
    }

    public static function return_orders()
    {
        return array("orders" => array(array(
            'id' => 0,
            'id_client' => 0,
            'id_provider' => 0,
            'id_point_client' => '',
            'id_point_provider' => '',
            'order_date' => '',
            'order_delivery_date' => '',
            'order_status' => 0
        )));
    }

    public static function return_ordersItems()
    {
        return array("ordersItems" => array(array(
            'id' => 0,
            'id_order' => 0,
            'id_product' => 0,
            'id_product_consignment' => 0,
            'quantity' => 0,
            'id_unit' => 0,
            'price' => 0,
            'sum' => 0,
            'vat_tax' => 0,
            'vat_sum'  => 0,
        )));
    }
    
    public static function return_units()
    {
        return array("units" => array(array(
            'id' => 0,
            'name' => '',
            'code_okei' => 0
        )));
    }

    public static function return_productConsingments()
    {
        return array("productConsingments" => array(array(
            'id' => 0,
            'code' => '',
            'date_prod' => '',
            'date_best' => '',
            'mercury_vsd' => ''
        )));
    }

    public static function return_productsGroups()
    {
        return array("productGroups" => array(array(
            'id' => 0,
            'id_parent' => 0,
            'name' => ''
        )));
    }



}