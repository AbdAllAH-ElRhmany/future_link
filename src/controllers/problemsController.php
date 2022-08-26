<?php
namespace Futurelink\Main\controllers;

use Futurelink\Main\models\problemsModel;
use Futurelink\Main\controllers\abstractController;

class problemsController extends abstractController
{
    public function addMethod(){
        if(isset($_POST['problem'])){
            if($_POST['problem'] != '' && $_POST['type'] != 0){
                $problem = [
                    'content'=>$_POST['problem'],
                    'deviceType'=>$_POST['type'],
                ];
                $problems = new problemsModel;
                $this->data['problems'] = $problems->getProblemsCount($problem);
                echo $this->data['problems'];
                if($this->data['problems'] > 0){
                    $this->data['error']="هذه المشكلة موجوده بالفعل";
                }else{
                    if($problems->addProblem($problem)){
                        $this->data['success']="تم اضافة المشكلة بنجاح";
                    }else{
                        $this->data['error']="هذه المشكلة موجوده بالفعل";
                    }
                }
            }else{
                    $this->data['error']="برجاء اختيار نوع للجهاز و كتابة المشكلة";
            }
        }
        $this->view();
    }
    public function editMethod($params=[])
    {   
        if(isset($_POST['problem'])){
            if($_POST['problem'] != '' && $_POST['type'] != 0 && $_POST['problems'] != 0){
                $problemId = [
                    // 'problemId'=>$_POST['problems'],
                    'deviceType'=>$_POST['type'],
                    'content'=>$_POST['problem'],
                ];
                $problem = [
                    'problemId'=>$_POST['problems'],
                    // 'deviceType'=>$_POST['type'],
                    'content'=>$_POST['problem'],
                ];
                $problems = new problemsModel;
                $c = $problems->getProblemsCount($problemId);
                if($c > 0){
                    $this->data['error']="هذا العطل موجود بالفعل يمكنك تغيير الاسم";
                }else if($problems->updateProblem($problem, $problem)){
                    $this->data['success']="تم تعديل العطل بنجاح";
                }else{
                    $this->data['error']="مشكلة";
                    
                }
            }else{
                    $this->data['error']="برجاء اختيار نوع للجهاز والعطل و تعديل العطل";
            }
        }
        $this->view();
    }
    public function getProblemsMethod($params=[]){
        $typeId = ['deviceType'=>$params];
        $problems = new problemsModel;
        $list = $problems->getAllProblems($typeId);
        // var_dump($params);
        foreach($list as $item):
            ?>
                <option value="<?= $item['problemId']?>"><?= $item['content']?></option>
    
        <?php
        endforeach;
        
    }
}

