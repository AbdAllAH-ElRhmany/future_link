<?php
namespace Futurelink\Main\models;

use Futurelink\Main\models\abstractModel;

class devicesTypeModel extends abstractModel
{
    public function getAllTypes(){
        return $this->select("device_type", "*")->getAll();
    }
    public function getTypeCount($type){
        return $this->select("device_type", "*")->where("type", "=", $type)->getRowCount();
    }
    public function getType($type){
        return $this->select("device_type", "*")->where("typeId", "=", $type)->getRow();
    }
    public function addType($data){
        return $this->insert("device_type", $data)->setData($data)->executeQuery();
    }
    public function updateType($data, $id){
        return $this->update("device_type", $data)->where("typeId", "=", $id)->executeQuery();
    }
}