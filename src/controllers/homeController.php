<?php
namespace Futurelink\Main\controllers;

use Futurelink\Main\controllers\abstractController;
use Futurelink\Main\models\ordersModel;
use Futurelink\Main\models\paymentsModel;

class homeController extends abstractController
{
    public function defaultMethod(){
        $today =  date('Y-m-d');
        $month =  date('m');
        // $today =  '2022-08-07';
        $orders = new ordersModel;
        $payment = new paymentsModel;
        $this->data['todayOrders'] = $orders->getOrdersByDate("'$today'");
        $this->data['todayClosedOrders'] = $orders->getOrdersByDateClosed("'$today'");
        $this->data['monthPaymentOrders'] = $payment->getOrdersPayByMon("'$month'");
        $this->data['monthPaymentCost'] = $payment->getPaymentsByMonth("'$month'");
        $this->view();
    }
}