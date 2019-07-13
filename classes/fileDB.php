<?php

include_once("abstract/abstractDB.php");
include_once("abstract/abstractScheme.php");

class FileDB extends AbstractScheme/* implements AbstractDB*/
{
    private $fileName = "data.json";
    private $fileData = array();


    public function __construct()
    {
        $this->createDB();
    }

    public static function dataFileCheck($fileName)
    {
        if (file_exists(__DIR__ . "/" . $fileName)) {
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
            $this->fileData = json_decode($fileDataJson, true);
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

    public function getDataByFilter($entity, $filter)
    {
        $result = array();

        foreach($this->fileData[$entity] as $item) {
            $issetCount = 0;
            foreach($filter as $filterKey => $filterValue) {
                if (array_key_exists($filterKey, $item) &&
                    $item[$filterKey] == $filterValue) {
                        $issetCount++;
                    }
            }

            if (count($filter) == $issetCount) {
                $result[] = $item;
            }
        }
        
        return $result;
    }

    public function setNewData($entity, $data)
    {
        // TODO отсечка служебных полей
        
        if (array_key_exists($entity, $this->fileData)) {
            $template = call_user_func("static::return_" . $entity);
            $newData = $this->fullData($template[$entity][0], $data);
            $count = count($this->fileData[$entity]);
            $newData['id'] = $count;
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

    public function replaceData($oldData, $newData) 
    {
        foreach($oldData as $key => $item) {
            if (array_key_exists($key, $newData)) {
                $oldData[$key] = $newData[$key];
            }
        }
        return $oldData;
    }

    public function editDataByFilter($entity, $filter, $data)
    {
        $oldData = $this->getDataByFilter($entity, $filter);
        foreach($oldData as $oldDataItem) {
            $newData = $this->replaceData($oldDataItem, $data);
            $this->fileData[$entity][$oldDataItem['id']] = $newData;
        }
    }

    public function deleteDataByFilter($filter, $data)
    {
        //
    }
}