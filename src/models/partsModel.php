<?php
namespace Futurelink\Main\models;

use Futurelink\Main\models\abstractModel;

class partsModel extends abstractModel
{
    public function getAllParts($id){
        return $this->select("spare_parts", "*")->where("deviceType", "=", $id)->getAllWe();
    }
    public function getPartsById($id){
        return $this->select("spare_parts", "*")->where("spareId", "=", $id)->getAll();
    }
    public function getPartsCount($part){
        return $this->select("spare_parts", "*")->where("name", "=", $part)->andWhere("deviceType", "=", $part )->getRowCount();
    }
    public function getParts($part){
        return $this->select("spare_parts", "*")->where("spareId", "=", $part)->getRow();
    }
    public function getPartByOrder($id){
        return $this->select("order_spare_parts", "spare_parts.name")->join("spare_parts", "spare_parts.spareId", "order_spare_parts.partId")->whereFilter("order_spare_parts.orderId", "=", $id)->getAll();
    }
    public function addPart($data){
        return $this->insert("spare_parts", $data)->setData($data)->executeQuery();
    }
    public function updatePart($data, $id){
        return $this->update("spare_parts", $data)->where("spareId", "=", $id)->executeQuery();
    }
}