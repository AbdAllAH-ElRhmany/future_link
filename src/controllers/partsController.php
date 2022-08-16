<?php
namespace Futurelink\Main\controllers;

use Futurelink\Main\lib\validation;
use Futurelink\Main\models\partsModel;
use Futurelink\Main\controllers\abstractController;

class partsController extends abstractController
{

    public function addMethod(){
        if(isset($_POST['name'])){
            $validate = new validation;
            $validate->input('name')->required();
            $validate->input('serial')->required();
            $validate->input('type')->required()->inteager();
            $errors = $validate->showErorr();
            if($errors){
                $this->data['error'] = "برجاء التأكد من صلاحية البيانات المدخلة";
            }else{
                $part = [
                    'name'=>$_POST['name'],
                    'deviceType'=>$_POST['type'],
                ];
                $parts = new partsModel;
                $c = $parts->getPartsCount($part);
                if($c > 0){
                    $this->data['error']="هذه القطعة موجوده بالفعل";
                }else{
                    $part = [
                        'name'=>$_POST['name'],
                        'deviceType'=>$_POST['type'],
                        'serial'=>$_POST['serial'],
                    ];
                    if($parts->addPart($part)){
                        $this->data['success']="تم اضافة القطعة بنجاح";
                    }else{
                        $this->data['error']="هذه القطعة موجوده بالفعل";
                    }
                }
            }
        }
        $this->view();
    }
    public function editMethod($params=[])
    {   
        if(isset($_POST['name'])){
            $validate = new validation;
            $validate->input('name')->required();
            $validate->input('serial')->required();
            $validate->input('type')->required()->inteager();
            $errors = $validate->showErorr();
            if($errors){
                $this->data['error'] = "برجاء التأكد من صلاحية البيانات المدخلة";
            }else{
                $spareId = [
                    'deviceType'=>$_POST['type'],
                    'name'=>$_POST['name'],
                ];
                $part = [
                    'spareId'=>$_POST['parts'],
                    'serial'=>$_POST['serial'],
                    'name'=>$_POST['name'],
                ];
                $parts = new partsModel;
                $c = $parts->getPartsCount($spareId);
                if($c > 0){
                    $this->data['error']="هذه القطعة موجوده بالفعل يمكنك تغيير الاسم";
                }else if($parts->updatePart($part, $part)){
                    $this->data['success']="تم تعديل القطعة بنجاح";
                }else{
                    $this->data['error']="مشكلة";
                    
                }
            }
        }
        $this->view();
    }
    public function getpartsMethod($params){
        $typeId = ['deviceType'=>$params[0]];
        $parts = new partsModel;
        $list = $parts->getAllParts($typeId);
        foreach($list as $item):
            ?>
                <option value="<?= $item['spareId']?>" data-serial="<?= $item['serial']?>"><?= $item['name']?></option>
    
        <?php
        endforeach;
        
    }
}

