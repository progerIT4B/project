<?php

include_once("abstract/abstractDB.php");
include_once("abstract/abstractScheme.php");

class FileDB extends AbstractScheme/* implements AbstractDB*/
{
    private $fileName = "data.json";
    private $fileData = array();


    public function __contruct()
    {
        $this->createDB();
    }

    public static function dataFileCheck($fileName)
    {
        if (file_exists($fileName)) {
            return true;
        }
        return false;
    }

    public function createDB() 
    {
        if (false === static::dataFileCheck($this->fileName)) {
            $this->fileData = array();
            $this->fileData = array_merge(
                $this->fileData, 
                static::return_clientItems(),
                static::return_clientPoints(),
                static::return_productItems(),
                static::return_orders(),
                static::return_productConsingments(),
                static::return_productPrices(),
                static::return_productProperties(),
                static::return_productsGroups(),
                static::return_units(),
                static::return_ordersItems()
            );
            $this->saveDataToFile();
        } else {
            $fileDataJson = file_get_contents(__DIR__ . "/" . $this->fileName);
            $this->fileData = json_decode($fileDataJson);
        }
    }

    public function saveDataToFile()
    {
        $fileDataJson = json_encode($this->fileData);
        file_put_contents(__DIR__ . "/" . $this->fileName, $fileDataJson);
    }

    public function echoData()
    {
        print_r($this->fileData);
    }

    public function getFunctionByEntity()
    {
        //
    }

    public function getDataByFilter($entity, $filter)
    {
        //
    }

    public function setData($entity, $data)
    {
        //echo "here";
        print_r($data);

        // TODO отсечка служебных полей
        if (array_key_exists($entity, $this->fileData)) {
            $template = call_user_func("static::return_" . $entity);
            $newData = $this->fullData($template, $data);
            $this->fileData[$entity][] = $newData;
            $this->saveDataToFile();
        }
    }

    public function fullData($template, $data)
    {
        $result = array();
        foreach($template as $templateKey => $templateItem) {
            if (array_key_exists($templateKey, $data)) {
                $result[$templateKey] = $data[$templateKey];
            }
        }
        return $result;
    }

    public function editDataByFilter($filter, $data)
    {
        //
    }

    public function deleteDataByFilter($filter, $data)
    {
        //
    }
}