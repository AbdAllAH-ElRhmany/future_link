<?php
namespace Futurelink\Main\controllers;

use Futurelink\Main\lib\helper;
use Futurelink\Main\lib\validation;
use Futurelink\Main\controllers\abstractController;
use Futurelink\Main\models\userModel;

class userController extends abstractController
{
    public function defaultMethod(){
        session_start();
        $empId = ['empId'=>$_SESSION['empId']];
        
        $user = new userModel;
        $this->data['user'] = $user->selectUserId("*", $empId);
        $this->data['job']=$user->selectJobName(['jobId'=>$this->data['user']['job']]);
        $this->view();
    }

   
    public function resetMethod()
    {   
  
            if(isset($_POST['pass'])){
                session_start();
                $validate = new validation;
                $validate->input('pass')->required();
                $validate->input('newpass')->required()->min(8);
                $validate->input('renewpass')->required()->min(8);
                $errors = $validate->showErorr();
                $user = new userModel;
                $pass = $user->selectUser("password", ['email'=>$_SESSION['email']]);
                if($errors){
                    $this->data['error'] = "برجاء التأكد من صلاحية البيانات المدخلة";
                }else if($_POST['newpass'] != $_POST['renewpass']){
                    $this->data['error'] = "كلمة السر غير متطابقة";
                }else if(!password_verify($_POST['pass'], $pass['password'])){
                    $this->data['error'] = "كلمة السر الحالية خطأ";
                }else{
                    $newpass = password_hash($_POST['newpass'], PASSWORD_DEFAULT);
                    $data = [
                        "password" =>$newpass,
                    ];
                    $dataId = [
                        "password" =>$newpass,
                        "empId" =>$_SESSION['empId'],
                    ];
                    if($user->updateUser($data, $dataId)){
                        $this->data['success'] = "تم تعديل كلمة السر بنجاح";
                        // (new helper())->redirect("/user", 3);
                    }
                
                }
            }
            // var_dump( $emps->getEmp($empId));

        $this->view();
    }

    public function loginMethod()
    {
        # code...
        if(isset($_POST['email'])){
            $validation = new validation;
            $validation->input('email')->required()->email();
            $err = $validation->showErorr();
            if($err){
                $this->data['error'] = "برجاء التأكد من صلاحية البيانات المدخلة";
            }else{
                $email = $_POST['email'];
                $password = $_POST['password'];
                $user = new userModel;
                $data = "name, email, empId, rule, job, ssn, password";
                $res =$user->selectUser($data, ["email"=>$email]);
                // var_dump($res);
                if($res){
                    if(password_verify($password, $res['password'])){
                        session_start();
                        $_SESSION['email']=$res['email'];
                        $_SESSION['name']=$res['name'];
                        $_SESSION['rule']=$res['rule'];
                        $_SESSION['job']=$res['job'];
                        $_SESSION['ssn']=$res['ssn'];
                        $_SESSION['empId']=$res['empId'];
                        (new helper())->redirect("/orders");
                    }else{
                        $this->data['error'] = "برجاء التأكد من كلمة المرور";
                    }
                    
                }else{
                    $this->data['error'] = "لا يوجد مستخدم بهذا الايميل";
                }
            }
        }
        $this->view();
    }
}

