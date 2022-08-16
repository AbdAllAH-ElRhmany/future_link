<?php
namespace Futurelink\Main\models;

use Futurelink\Main\models\abstractModel;

class devicesBrandModel extends abstractModel
{
    public function getAllBrands(){
        return $this->select("device_brand", "*")->getAll();
    }
    public function getBrandCount($brand){
        return $this->select("device_brand", "*")->where("brand", "=", $brand)->getRowCount();
    }
    public function getBrand($brand){
        return $this->select("device_brand", "*")->where("brandId", "=", $brand)->getRow();
    }
    public function addBrand($data){
        return $this->insert("device_brand", $data)->setData($data)->executeQuery();
    }
    public function updateBrand($data, $id){
        return $this->update("device_brand", $data)->where("brandId", "=", $id)->executeQuery();
    }
}