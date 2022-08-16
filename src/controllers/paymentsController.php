<?php
namespace Futurelink\Main\controllers;

use Futurelink\Main\lib\helper;
use Futurelink\Main\lib\validation;
use Futurelink\Main\models\paymentsModel;
use Futurelink\Main\controllers\abstractController;
use Futurelink\Main\models\clientsModel;

class paymentsController extends abstractController
{
    public function defaultMethod($params=[]){
        $payments = new paymentsModel;
        if(!empty($this->params[0]) && !empty($this->params[1])){
            $date1 = $this->params[0];
            $date2 = $this->params[1];
            $date = ["'$date2'", "'$date1'"];
            $this->data['payments'] = $payments->getPaymentsByDate("*", $date, 1);
            $this->data['sum'] = $payments->getPaymentsByDate("SUM(cost) as cost", $date, 1);
            $this->data['date1'] = $date1;
            $this->data['date2'] = $date2;
        }else{
            $this->data['payments'] = $payments->getAllPayments(['is_mainly'=>1]);
        }
        $this->view();
    }
    public function notmainMethod($params=[]){
        $payments = new paymentsModel;
        if(!empty($this->params[0]) && !empty($this->params[1])){
            $date1 = $this->params[0];
            $date2 = $this->params[1];
            $date = ["'$date2'", "'$date1'"];
            $this->data['payments'] = $payments->getPaymentsByDate("*", $date, 0);
            $this->data['sum'] = $payments->getPaymentsByDate("SUM(cost) as cost", $date, 0);
            $this->data['date1'] = $date1;
            $this->data['date2'] = $date2;
        }else{
            $this->data['payments'] = $payments->getAllPayments(['is_mainly'=>0]);
        }
        $this->view();
    }


    public function addMethod($params=[]){
        $payments = new paymentsModel;

        if(isset($_POST['title'])){
            $validate = new validation;
            $validate->input('title')->required();
            $validate->input('cost')->required();
            $validate->input('date')->required();
            $validate->input('status')->required();
            $errors = $validate->showErorr();
            if($errors){
                $this->data['error'] = "برجاء التأكد من صلاحية البيانات المدخلة";
            }else{
                
                $data = [
                    "title" =>$_POST['title'],
                    "cost" =>$_POST['cost'],
                    "createdAt" =>$_POST['date'],
                    "is_mainly" =>$_POST['status'],
                ];
                if($payments->addPayment($data)){
                    $this->data['success']= "تم إضافة العملية بنجاح";
                    // (new helper())->redirect("/payments/", 2);
                }else{
                    $this->data['error']= "مشكلة";
                }
                
                
            }
        }
        // var_dump($types);
        $this->view();
    }
    public function editMethod($params=[])
    {   
        $payments = new paymentsModel;
        $paymentId = ['id' => $this->params[0]];
            if(isset($_POST['title'])){
                $validate = new validation;
                $validate->input('title')->required();
                $validate->input('cost')->required();
                $validate->input('date')->required();
                $validate->input('status')->required();
                $errors = $validate->showErorr();
                if($errors){
                    $this->data['error'] = "برجاء التأكد من صلاحية البيانات المدخلة";
                }else{
                    
                    $data = [
                        "title" =>$_POST['title'],
                        "cost" =>$_POST['cost'],
                        "createdAt" =>$_POST['date'],
                        "is_mainly" =>$_POST['status'],
                    ];
                    $dataId = [
                        "id" =>$this->params[0],
                        "title" =>$_POST['title'],
                        "cost" =>$_POST['cost'],
                        "createdAt" =>$_POST['date'],
                        "is_mainly" =>$_POST['status'],
                    ];
                        if($payments->updatePayment($data, $dataId)){
                            $this->data['success']= "تم تعديل العملية بنجاح";
                            // (new helper())->redirect("/payments/", 3);
                        }else{
                            $this->data['error']= "مشكلة";
                        }


                    
                }
            }
        
        if($payments->getPayment($paymentId)){
            $this->data['payment'] = $payments->getPayment($paymentId); 
        }

        // var_dump( $orders->getEmp($empId));
        $this->view();
    }
    public function deleteMethod($params){
        $payments = new paymentsModel;
        if(isset($this->params[0])){
            $paymentId = ['id'=>$this->params[0]];
            $c = $payments->getPaymentCount($paymentId);
            if($c == 0){
                $this->data['error']="لا يوجد عملية بهذا الرقم";
            }else{
                if($payments->delPayment($paymentId)){
                    (new helper())->redirect("/payments");
                }
            }
        }    
    }
    public function ordersMethod(){
        $payments = new paymentsModel;
        $clientType = isset($this->params[2]) ? $this->params[2] : 'off';
        if(!empty($this->params[0]) && !empty($this->params[1]) && !empty($this->params[2])){
            $date1 = $this->params[0];
            $date2 = $this->params[1];
            $date = ["'$date2'", "'$date1'"];
            $this->data['orders'] = $payments->getOrdersPaymentsByDate("*", $date, 1, $clientType);
            $this->data['sum'] = $payments->getOrdersPaymentsByDate("SUM(cost) as cost", $date, 1, $clientType);
            $this->data['date1'] = $date1;
            $this->data['date2'] = $date2;
            $this->data['clientType'] = $clientType;

        }else{
            $status = ['status'=>1];
            $this->data['orders'] = $payments->getAllOrdersPayments($status);
        }
        $clients = new clientsModel;
        $this->data['clientType'] = $clientType;
        $this->data['types'] = $clients->getAllTable("client_type");
        $this->view();
    }
}

