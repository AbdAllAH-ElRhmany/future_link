<?php
namespace Futurelink\Main\models;

use Futurelink\Main\models\abstractModel;

class clientsModel extends abstractModel
{
    public function getAllClients(){
        return $this->select("clients", "*")->getAll();
    }
    public function getAllTable($table){
        return $this->select("$table", "*")->getAll();
    }
    public function getClientsCount($data){
        return $this->select("clients", "*")->where("email", "=", $data)->orWhere("phone", "=", $data)->getRowCount();
    }
    public function getClientSearchPhone($data){
        return $this->select("clients", "*")->where("phone", "=", $data)->getAllWe();
    }
    public function getClientSearchName($data){
        return $this->select("clients", "*")->whereLike("name", $data)->getAll();
    }
    public function getClient($data){
        return $this->select("clients", "*")->where("id", "=", $data)->getRow();
    }
    public function addClient($data){
        return $this->insert("clients", $data)->setData($data)->executeQuery();
    }
    public function updateClient($data, $id){
        return $this->update("clients", $data)->where("id", "=", $id)->executeQuery();
    }
}