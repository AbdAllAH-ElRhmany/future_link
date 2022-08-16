<?php
namespace Futurelink\Main\models;

use Futurelink\Main\models\abstractModel;

class paymentsModel extends abstractModel
{
    public function getAllPayments($status){
        return $this->select("payments", "*")->where("is_mainly", "=", $status)->getAllwe();
    }

    public function getAllTable($table){
        return $this->select("$table", "*")->getAll();
    }
    public function getPaymentCount($data){
        return $this->select("payments", "*")->where("id", "=", $data)->getRowCount();
    }
    public function getPayment($data){
        return $this->select("payments", "*")->where("id", "=", $data)->getRow();
    }
    public function addPayment($data){
        return $this->insert("payments", $data)->setData($data)->executeQuery();
    }
    public function updatePayment($data, $id){
        return $this->update("payments", $data)->where("id", "=", $id)->executeQuery();
    }
    public function delPayment($id){
        return $this->delete("payments")->where("id", "=", $id)->executeQuery();
    }
    public function getAllOrdersPayments($status){
        return $this->select("active_orders", "*")->where("status", "=", $status)->getAllWe();
    }



    public function getOrdersPayByMon($date)
    {
        return $this->select("active_orders", "SUM(cost) as ordersCost")->whereFilter("MONTH(closeDate)", "=", $date)->getAll();
        # code...
    }
    public function getPaymentsByMonth($date)
    {
        return $this->select("payments", "SUM(cost) as paymentsCost")->whereFilter("MONTH(createdAt)", "=", $date)->getAll();
        # code...
    }
    public function getPaymentsByDate($data ,$date, $status)
    {
        return $this->select("payments", $data)->between("createdAt", $date)
        ->andWhereFilter("is_mainly", "=", $status)->getAll();
        # code...
    }
    public function getOrdersPaymentsByDate($data ,$date ,$status, $type)
    {
        return $this->select("active_orders", $data)
        ->between("closeDate", $date)
        ->andWhereFilter("status", "=", $status)
        ->andWhereFilter("clientType", "=", $type)
        ->getAll();
        # code...
    }
}