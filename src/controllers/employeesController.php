<?php
namespace Futurelink\Main\controllers;

use Futurelink\Main\lib\helper;
use Futurelink\Main\lib\validation;
use Futurelink\Main\controllers\abstractController;
use Futurelink\Main\models\employeesModel;

class employeesController extends abstractController
{
    public function defaultMethod(){
        $emps = new employeesModel;
        $this->data['emps'] = $emps->getAllEmps();
        // var_dump($emps);
        $this->view();
    }
    public function addMethod(){
            $emps = new employeesModel;
            $this->data['jobs'] = $emps->getAllTable("jobs");
            $this->data['rules'] = $emps->getAllTable("emp_rule");
            if(isset($_POST['name'])){
                $validate = new validation;
                $validate->input('name')->required();
                $validate->input('email')->required()->email();
                $validate->input('address')->required();
                $validate->input('ssn')->required()->inteager();
                $validate->input('phone')->required();
                $validate->input('bdate')->required();
                $validate->input('salary')->required()->float();
                $validate->input('job')->required()->inteager();
                $validate->input('rule')->required()->inteager();
                $errors = $validate->showErorr();
                if($errors){
                    $this->data['error'] = "برجاء التأكد من صلاحية البيانات المدخلة";
                }else{
                    $data = [
                        "email" =>$_POST['email'],
                        "ssn" =>$_POST['ssn'],
                        "phone" =>$_POST['phone'],
                    ];
                    $c = $emps->getEmpsCount($data);
                    if($c > 0){
                        $this->data['error'] = "الموظف موجود بالفعل براء مراجعة الرقم القومي و الايميل";
                    }else{
                        $pass = password_hash($_POST['ssn'], PASSWORD_DEFAULT);
                        $data = [
                            "email" =>$_POST['email'],
                            "ssn" =>$_POST['ssn'],
                            "name" =>$_POST['name'],
                            "address" =>$_POST['address'],
                            "phone" =>$_POST['phone'],
                            "bdate" =>$_POST['bdate'],
                            "salary" =>$_POST['salary'],
                            "job" =>$_POST['job'],
                            "password" =>$pass,
                            "rule" =>$_POST['rule'],
                        ];
                        if($emps->addEmp($data)){
                            $this->data['success']= "تم إضافة الموظف بنجاح";
                            (new helper())->redirect("/employees/", 3);
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
            $empId =  ['empId'=>$params[0]];
            $emps = new employeesModel;
            
            if(isset($_POST['name'])){
                $validate = new validation;
                $validate->input('name')->required();
                $validate->input('email')->required()->email();
                $validate->input('address')->required();
                $validate->input('ssn')->required()->inteager();
                $validate->input('phone')->required();
                $validate->input('bdate')->required();
                $validate->input('salary')->required()->float();
                $validate->input('job')->required()->inteager();
                $validate->input('rule')->required()->inteager();
                $errors = $validate->showErorr();
                if($errors){
                    $this->data['error'] = "برجاء التأكد من صلاحية البيانات المدخلة";
                }else{
                    $data = [
                        "email" =>$_POST['email'],
                        "ssn" =>$_POST['ssn'],
                        "phone" =>$_POST['phone'],
                    ];
                    $c = $emps->getEmpsCount($data);
                    if($c > 1){
                        $this->data['error'] = "الموظف موجود بالفعل براء مراجعة الرقم القومي و الايميل";
                    }else{
                        $data = [
                            "email" =>$_POST['email'],
                            "ssn" =>$_POST['ssn'],
                            "name" =>$_POST['name'],
                            "address" =>$_POST['address'],
                            "phone" =>$_POST['phone'],
                            "bdate" =>$_POST['bdate'],
                            "salary" =>$_POST['salary'],
                            "job" =>$_POST['job'],
                            "rule" =>$_POST['rule'],
                        ];
                        $dataId = [
                            "email" =>$_POST['email'],
                            "ssn" =>$_POST['ssn'],
                            "name" =>$_POST['name'],
                            "address" =>$_POST['address'],
                            "phone" =>$_POST['phone'],
                            "bdate" =>$_POST['bdate'],
                            "salary" =>$_POST['salary'],
                            "job" =>$_POST['job'],
                            "rule" =>$_POST['rule'],
                            "empId" =>$params[0],
                        ];
                        if($emps->updateEmp($data, $dataId)){
                            $this->data['success']= "تم تعديل البيانات بنجاح";
                            // (new helper())->redirect("/employees/", 3);
                        }else{
                            $this->data['error']= "مشكلة";
                        }


                    }
                }
            }
            $this->data['jobs'] = $emps->getAllTable("jobs");
            $this->data['rules'] = $emps->getAllTable("emp_rule");
            $this->data['emp'] = $emps->getEmp($empId);
            // var_dump( $emps->getEmp($empId));
        }
        $this->view();
    }
}

