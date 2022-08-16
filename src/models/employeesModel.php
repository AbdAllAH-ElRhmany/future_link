<?php
namespace Futurelink\Main\models;

use Futurelink\Main\models\abstractModel;

class employeesModel extends abstractModel
{
    public function getAllEmps(){
        return $this->select("employees", "*")->getAll();
    }
    public function getAllTable($table){
        return $this->select("$table", "*")->getAll();
    }
    public function getEmpsCount($data){
        return $this->select("employees", "*")->where("ssn", "=", $data)->orWhere("email", "=", $data)->orWhere("phone", "=", $data)->getRowCount();
    }
    public function getEmp($data){
        return $this->select("employees", "*")->where("empId", "=", $data)->getRow();
    }
    public function addEmp($data){
        return $this->insert("employees", $data)->setData($data)->executeQuery();
    }
    public function updateEmp($data, $id){
        return $this->update("employees", $data)->where("empId", "=", $id)->executeQuery();
    }
}