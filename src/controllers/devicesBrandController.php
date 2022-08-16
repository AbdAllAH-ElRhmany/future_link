<?php
namespace Futurelink\Main\controllers;

use Futurelink\Main\lib\helper;
use Futurelink\Main\models\devicesBrandModel;
use Futurelink\Main\controllers\abstractController;
use Futurelink\Main\lib\validation;

class devicesBrandController extends abstractController
{
    public function defaultMethod(){
        $brands = new devicesBrandModel;
        $this->data['brands'] = $brands->getAllBrands();
        // var_dump($brands);
        $this->view();
    }
    public function addMethod(){
        if(isset($_POST['brand'])){
            $validate = new validation;
            $validate->input('brand')->required();
            $errors = $validate->showErorr();
            if($errors){
                $this->data['error'] = "برجاء التأكد من صلاحية البيانات المدخلة";
            }else{
                $brand = ['brand'=>$_POST['brand']];
                $brands = new devicesBrandModel;
                $this->data['brands'] = $brands->getBrandCount($brand);
                if($this->data['brands'] > 0){
                    $this->data['error']="هذا البراند موجود بالفعل";
                }else{
                    if($brands->addBrand($brand)){
                        $this->data['success']="تم اضافة البراند بنجاح";
                        (new helper())->redirect('/devicesBrand', 3);
                    }else{
                        $this->data['error']="هذا البراند موجود بالفعل";
                    }
                }
            }
        }
        $this->view();
    }
    public function editMethod($params=[])
    {   
        if(!empty($params)){
            $brandId =  ['brandId'=>$params[0]];
            $brands = new devicesBrandModel;
            $this->data['brandName'] = $brands->getBrand($brandId);
            if(isset($_POST['brand']) && $_POST['brand'] != $this->data['brandName']['brand']){
                if($_POST['brand'] != ''){
                    $brand = ['brand'=>$_POST['brand']];
                    $all = [
                        'brandId'=>$params[0],
                        'brand'=>$_POST['brand']
                    ];
                    if($brands->getBrandCount($brand) > 0){
                        $this->data['error']="هذا الاسم موجود بالفعل";
                    }
                    else if($brands->updateBrand($brand, $all)){
                        $this->data['brandName']=$brand;
                        $this->data['success']="تم تعديل الاسم بنجاح";
                        (new helper())->redirect("/devicesbrand", 3);
                    }else{
                       $this->data['error']="مشكلة";         
                    }
                }else{
                    $this->data['error']="برجاء ادخال اسم اولا";
                }
            }
        }
        $this->view();
    }
}

