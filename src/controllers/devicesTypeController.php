<?php
namespace Futurelink\Main\controllers;

use Futurelink\Main\lib\helper;
use Futurelink\Main\models\devicesTypeModel;
use Futurelink\Main\controllers\abstractController;
use Futurelink\Main\lib\validation;

class devicesTypeController extends abstractController
{
    public function defaultMethod(){
        $types = new devicesTypeModel;
        $this->data['types'] = $types->getAllTypes();
        $this->view();
    }
    public function selectListMethod(){
        $types = new devicesTypeModel;
        $list = $types->getAllTypes();
        foreach($list as $item):
        ?>
        <option value="<?= $item['typeId']?>"><?= $item['type']?></option>

        <?php
        endforeach;
    }
    public function addMethod(){
        if(isset($_POST['type'])){
            $validate = new validation;
            $validate->input('type')->required();
            $errors = $validate->showErorr();
            if($errors){
                $this->data['error'] = "برجاء التأكد من صلاحية البيانات المدخلة";
            }else{
                $type = ['type'=>$_POST['type']];
                $types = new devicesTypeModel;
                $this->data['types'] = $types->getTypeCount($type);
                if($this->data['types'] > 0){
                    $this->data['error']="هذا النوع موجود بالفعل";
                }else{
                    if($types->addType($type)){
                        $this->data['success']="تم اضافة النوع بنجاح";
                        (new helper())->redirect("/devicesType", 3);
                    }else{
                        $this->data['error']="هذا النوع موجود بالفعل";
                    }
                }
            }
        }
        $this->view();
    }
    public function editMethod($params=[])
    {   
        if(!empty($params)){
            $typeId =  ['typeId'=>$params[0]];
            $types = new devicesTypeModel;
            $this->data['typeName'] = $types->getType($typeId);
            if(isset($_POST['type']) && $_POST['type'] != $this->data['typeName']['type']){
                if($_POST['brand'] != ''){
                    $type = ['type'=>$_POST['type']];
                    $all = [
                        'typeId'=>$params[0],
                        'type'=>$_POST['type']
                    ];
                    if($types->getTypeCount($type) > 0){
                        $this->data['error']="هذا الاسم موجود بالفعل";
                    }
                    else if($types->updateType($type, $all)){
                        $this->data['typeName']=$type;
                        $this->data['success']="تم تعديل الاسم بنجاح";
                        (new helper())->redirect("/devicesType", 3);
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

