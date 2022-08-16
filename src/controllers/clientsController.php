<?php
namespace Futurelink\Main\controllers;

use Futurelink\Main\lib\helper;
use Futurelink\Main\lib\validation;
use Futurelink\Main\controllers\abstractController;
use Futurelink\Main\models\clientsModel;

class clientsController extends abstractController
{
    public function defaultMethod($search=0){
        $clients = new clientsModel;
        if($search != 0){
            $search= urldecode($search);
            if(is_numeric($search)){
                $phone = ['phone'=>$search];
                $this->data['clients'] = $clients->getClientSearchPhone($phone);
            }else{
                $name = $search;
                $this->data['clients'] = $clients->getClientSearchName($name);
            }
        }else{
            $this->data['clients'] = $clients->getAllclients();
        }
        $this->data['search'] = $search;
        $this->view();
    }
    public function addMethod(){
            $clients = new clientsModel;
            $this->data['types'] = $clients->getAllTable("client_type");
            if(isset($_POST['name'])){
                $validate = new validation;
                $validate->input('name')->required();
                $validate->input('email')->required()->email();
                $validate->input('address')->required();
                $validate->input('phone')->required();
                $validate->input('type')->required()->inteager();
                $errors = $validate->showErorr();
                if($errors){
                    $this->data['error'] = "برجاء التأكد من صلاحية البيانات المدخلة";
                }else{
                    $data = [
                        "email" =>$_POST['email'],
                        "phone" =>$_POST['phone'],
                    ];
                    $c = $clients->getClientsCount($data);
                    if($c > 0){
                        $this->data['error'] = "العميل موجود بالفعل براء مراجعة رقم الهاتف و الايميل";
                    }else{
                        $data = [
                            "email" =>$_POST['email'],
                            "name" =>$_POST['name'],
                            "address" =>$_POST['address'],
                            "phone" =>$_POST['phone'],
                            "clientType" =>$_POST['type'],
                        ];
                        if($clients->addClient($data)){
                            $this->data['success']= "تم إضافة العميل بنجاح";
                            // (new helper())->redirect("/clients", 3);
                        }else{
                            $this->data['error']= "مشكلة";
                        }


                    }
                }
            }
        // var_dump($types);
        $this->view();
    }
   
    public function editMethod($params=[])
    {   
        if(!empty($params)){
            $clientId =  ['id'=>$params[0]];
            $clients = new clientsModel;
            
            if(isset($_POST['name'])){
                $validate = new validation;
                $validate->input('name')->required();
                $validate->input('email')->required()->email();
                $validate->input('address')->required();
                $validate->input('phone')->required();
                $validate->input('type')->required()->inteager();
                $errors = $validate->showErorr();
                if($errors){
                    $this->data['error'] = "برجاء التأكد من صلاحية البيانات المدخلة";
                }else{
                    $data = [
                        "email" =>$_POST['email'],
                        "phone" =>$_POST['phone'],
                    ];
                    $c = $clients->getClientsCount($data);
                    if($c > 1){
                        $this->data['error'] = "العميل موجود بالفعل براء مراجعة رقم الهاتف و الايميل";
                    }else{
                        $data = [
                            "email" =>$_POST['email'],
                            "name" =>$_POST['name'],
                            "address" =>$_POST['address'],
                            "phone" =>$_POST['phone'],
                            "clientType" =>$_POST['type'],
                        ];
                        $dataId = [
                            "email" =>$_POST['email'],
                            "name" =>$_POST['name'],
                            "address" =>$_POST['address'],
                            "phone" =>$_POST['phone'],
                            "clientType" =>$_POST['type'],
                            "id" =>$params[0],
                        ];
                        if($clients->updateClient($data, $dataId)){
                            $this->data['success']= "تم تعديل البيانات بنجاح";
                        //    (new helper())->redirect("/clients", 3);
                        }else{
                            $this->data['error']= "مشكلة";
                        }


                    }
                }
            }
            $this->data['types'] = $clients->getAllTable("client_type");
            $this->data['client'] = $clients->getClient($clientId);
        }
        $this->view();
    }
}

