<?php

class PageGenerator
{
    public static function generateLogined($data)
    {
        require(realpath("templates/logined.php"));
    }

    public static function generateBase($data)
    {
        require("templates/base.php");
    }

    public static function generateRegister($data)
    {
        require(realpath("templates/register.php"));
    } 
}