<?php

interface AbstractDB
{
    public function getDataByFilter($entity, $filter);

    public function editDataByFilter($entity, $filter, $data);

    public function deleteDataByFilter($filter, $data);

    public function setNewData($entity, $data);

    public function echoData();
}