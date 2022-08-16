<?php
namespace Futurelink\Main\models;

use Futurelink\Main\models\abstractModel;

class ordersModel extends abstractModel
{
    public function getStatus($data){
        return $this->select("order_details", "status")->where("orderId", "=", $data)->getRow();
    }
    public function getAllOrders(){
        return $this->select("order_details", "*")->getAll();
    }
    public function getAllOrdersStatus($status, $order){
        return $this->select("order_details", "*")->where("status", "=", $status)->orderBy($order, 'DESC')->getAllWe();
    }
    public function getAllTable($table){
        return $this->select("$table", "*")->getAll();
    }
    public function getProblems($id){
        return $this->select("problems", "*")->where("deviceType", "=", $id)->getAllWe();
    }
    public function getOrdersCount($data){
        return $this->select("activeorders", "*")->where("orderId", "=", $data)->getRowCount();
    }
    public function getOrder($data){
        return $this->select("order_details", "*")->where("orderId", "=", $data)->getRow();
    }
    public function getEmps(){
        return $this->select("employees", "empId, name")->whereFilter("job", "=", 2)->getAll();
    }
    public function getActiveOrder($data){
        return $this->select("active_orders", "*")->where("orderId", "=", $data)->getRow();
    }
    public function getActiveOrderData($data, $id){
        return $this->select("active_orders", "$data")->where("orderId", "=", $id)->getRow();
    }
    public function getActiveOrderD($data){
        return $this->select("order_details", "*")->where("orderId", "=", $data)->getRow();
    }
    public function checkClientExist($data){
        return $this->select("clients", "*")->where("id", "=", $data)->getRowCount();
    }
    public function getClientsOrders($data){
        return $this->select("order_details", "*")->where("clientId", "=", $data)->getAllWe();
    }
    public function getClient($data){
        return $this->select("clients", "*")->where("id", "=", $data)->orWhere("phone", "=", $data)->getRow();
    }
    public function addOrder($data){
        return $this->insert("orders", $data)->setData($data)->executeQuery();
    }
    public function addOrderParts($data){
        return $this->insert("order_spare_parts", $data)->setData($data)->executeQuery();
    }
    public function getOrderParts($data){
        return $this->select("order_spare_parts", "partId")->where("orderId", "=", $data)->getAllWe();
    }
    public function checkOrderParts($data){
        return $this->select("order_spare_parts", "partId")->where("orderId", "=", $data)->andWhere("partId", "=", $data)->getRowCount();
    }
    public function addActiveOrder($data){
        return $this->insert("activeorders", $data)->setData($data)->executeQuery();
    }
    public function updateActiveOrder($data, $id){
        return $this->update("activeorders", $data)->where("orderId", "=", $id)->executeQuery();
    }
    public function updateOrder($data, $id){
        return $this->update("orders", $data)->where("orderId", "=", $id)->executeQuery();
    }
    public function updateOrderState($data, $id){
        return $this->updateN("orders", $data)->whereFilter("orderId", "=", $id)->query()->executeQuery();
    }
    public function delOrderParts($id)
    {
        return $this->delete("order_spare_parts")->where("orderId", "=", $id)->executeQuery();
    }
    public function delActiveOrder($id)
    {
        return $this->delete("activeorders")->where("orderId", "=", $id)->executeQuery();
    }
    public function delOrder($id)
    {
        return $this->delete("orders")->where("orderId", "=", $id)->executeQuery();
    }






    public function getOrdersByDate($date)
    {
        return $this->select("orders", "count(orderId) as ordersNum")->whereFilter("openDate", "=", $date)->getAll();
        # code...
    }
    public function getOrdersByDateClosed($date)
    {
        return $this->select("orders", "count(orderId) as ordersNum")->whereFilter("closeDate", "=", $date)->getAll();
        # code...
    }



    public function getOrdersSearchName($data, $status){
        return $this->select("order_details", "*")->whereLike("name", $data)->andWhereFilter("status", "=", $status)->getAll();
    }
    public function getOrdersearchPhone($data){
        return $this->select("order_details", "*")->where("phone", "=", $data)->andWhere("status", "=", $data)->getAllWe();
    }
    public function getOrdersFilter($date, $dateType, $status, $service, $type){
        return $this->select("order_details", "*")
        ->whereFilter($dateType, "=", $date)
        ->andWhereFilter("serviceType", "=", $service)
        ->andWhereFilter("deviceType", "=", $type)
        ->andWhereFilter("status", "=", $status)->getAll();
    }

}