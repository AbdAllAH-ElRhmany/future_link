<?php
namespace Futurelink\Main\controllers;

use Futurelink\Main\lib\helper;
use Futurelink\Main\lib\validation;
use Futurelink\Main\models\partsModel;
use Futurelink\Main\models\ordersModel;
use Futurelink\Main\controllers\abstractController;

class ordersController extends abstractController
{
    public function defaultMethod($params=[]){
        $status = ['status'=>0];
        $orders = new ordersModel;
        if(isset($this->params[4])){
            // var_dump($this->params);
            $status = 0;
            $dateTemp =  $this->params[2];
            $date =  $dateTemp == 'off' ? 'off': "'$dateTemp'";
            $type = $this->params[3];
            $service = $this->params[4];
            $this->data['orders'] = $orders->getOrdersFilter($date, 'openDate', $status, $service, $type);
        
            
        }else if(isset($this->params[1])){
            $this->params[1]= urldecode($this->params[1]);
            if(is_numeric($this->params[1])){
                $phone = ['phone'=>$this->params[1], 'status'=>0];
                $this->data['orders'] = $orders->getOrdersearchPhone($phone);
            }else{
                $name = $this->params[1];
                $this->data['orders'] = $orders->getOrdersSearchName($name, 0);
            }
        }else if(isset($this->params[0])){
            $data = [
                "id" =>$this->params[0]
            ];
            $c = $orders->checkClientExist($data);
            $data = [
                "clientId" =>$this->params[0]
            ];
            if($c > 0){
                $this->data['orders'] = $orders->getClientsOrders($data);
                $this->data['clientId'] = $this->params[0];
            }else{
                $this->data['orders'] = $orders->getAllOrdersStatus($status, 'openDate');
            }
        }else{
            $this->data['orders'] = $orders->getAllOrdersStatus($status, 'openDate');
        }
        $this->data['services'] = $orders->getAllTable("service_type");
        $this->data['types'] = $orders->getAllTable("device_type");
        $this->data['search'] = isset($this->params[1]) ? $this->params[1] : 0 ;
        $this->data['openDate'] = isset($this->params[2]) ? $this->params[2] : '' ;
        $this->data['devType'] = isset($this->params[3]) ? $this->params[3] : '' ;
        $this->data['serviceType'] = isset($this->params[4]) ? $this->params[4] : 'off' ;
        $this->view();
    }
    public function closedMethod($params=[]){
        $status = ['status'=>1];
        $orders = new ordersModel;
        if(isset($this->params[3])){
            // var_dump($this->params);
            $status = 1;
            $dateTemp =  $this->params[1];
            $date =  $dateTemp == 'off' ? 'off': "'$dateTemp'";
            $type = $this->params[2];
            $service = $this->params[3];
            $this->data['orders'] = $orders->getOrdersFilter($date, 'closeDate', $status, $service, $type);
        
            
        }else if(isset($this->params[0])){
            $data = [
                "id" =>$this->params[0]
            ];
            $c = $orders->checkClientExist($data);
            $data = [
                "clientId" =>$this->params[0]
            ];
            if($c > 0){
                $this->data['orders'] = $orders->getClientsOrders($data);
                $this->data['clientId'] = $this->params[0];
            }else{
                $this->data['orders'] = $orders->getAllOrdersStatus($status, 'closeDate');
            }
        }else{
            $this->data['orders'] = $orders->getAllOrdersStatus($status, 'closeDate');
        }
        $this->data['services'] = $orders->getAllTable("service_type");
        $this->data['types'] = $orders->getAllTable("device_type");
        $this->data['search'] = isset($this->params[0]) ? $this->params[0] : 0 ;
        $this->data['closeDate'] = isset($this->params[1]) ? $this->params[1] : '' ;
        $this->data['devType'] = isset($this->params[2]) ? $this->params[2] : '' ;
        $this->data['serviceType'] = isset($this->params[3]) ? $this->params[3] : 'off' ;
        $this->view();
    }
    public function displayMethod(){
        $orders = new ordersModel;
        $orderId = ['orderId' => $this->params[0]];
        $order = $orders->getOrder($orderId); 
        $this->data['order'] = $order; 
        $c = $orders->getOrdersCount($orderId);
        $parts = new partsModel;
        $this->data['parts'] = $parts->getPartByOrder($this->params[0]);
        $data = "cost, costComment, empId";
        $this->data['cost'] = $orders->getActiveOrderData($data, $orderId);
        
        if($c > 0){
            $this->data['active'] = $orders->getActiveOrder($orderId);
        }
        $this->view();
    }
    public function addMethod($params=[]){
        $orders = new ordersModel;
        if(isset($this->params[0])){
            $clientId = ['id'=>$this->params[0], 'phone'=>$this->params[0]];
            $c = $orders->getClient($clientId);
            if($c){
                $this->data['client'] = $c;
            }else{
                $this->data['error'] = "لا يوجد عميل بهذا الرقم";
            }
            if(isset($_POST['type'])){
                $validate = new validation;
                $validate->input('type')->required()->inteager();
                $validate->input('address')->required();
                $validate->input('phone')->required();
                $validate->input('service')->required()->inteager();
                $validate->input('brand')->required()->inteager();
                $validate->input('problems')->required()->inteager();
                $errors = $validate->showErorr();
                if($errors){
                    $this->data['error'] = "برجاء التأكد من صلاحية البيانات المدخلة";
                }else{
                    
                    $data = [
                        "clientId" =>$c['id'],
                        "orderAddress" =>$_POST['address'],
                        "orderPhone" =>$_POST['phone'],
                        "deviceBrand" =>$_POST['brand'],
                        "serviceType" =>$_POST['service'],
                        "deviceProblem" =>$_POST['problems'],
                        "deviceType" =>$_POST['type'],
                    ];
                    if($orders->addOrder($data)){
                        $this->data['success']= "تم إضافة الطلب بنجاح";
                        // (new helper())->redirect("/orders/add", 2);
                    }else{
                        $this->data['error']= "مشكلة";
                    }
                
                }
            }
        }
        // var_dump($types);
        $this->view();
    }
    public function selectServiceListMethod(){
        $orders = new ordersModel;
        $list = $orders->getAllTable("service_type");
        foreach($list as $item):
            ?>
                <option value="<?= $item['serviceId']?>"><?= $item['title']?></option>
    
        <?php
        endforeach;
    }
        
    public function selectBrandListMethod(){
        $orders = new ordersModel;
        $list = $orders->getAllTable("device_brand");
        foreach($list as $item):
            ?>
                <option value="<?= $item['brandId']?>"><?= $item['brand']?></option>
    
        <?php
        endforeach;
        
    }
    public function editMethod($params=[])
    {   
        $orders = new ordersModel;
        $orderId = ['orderId' => $this->params[0]];
            if(isset($_POST['phone'])){
                $validate = new validation;
                $validate->input('type')->required()->inteager();
                $validate->input('address')->required();
                $validate->input('phone')->required();
                $validate->input('service')->required()->inteager();
                $validate->input('brand')->required()->inteager();
                $validate->input('status')->required()->inteager();
                $validate->input('problems')->required()->inteager();
                $errors = $validate->showErorr();
                if($errors){
                    $this->data['error'] = "برجاء التأكد من صلاحية البيانات المدخلة";
                }else{
                    $oldStatus = $orders->getStatus($orderId);
                    $status = $_POST['status'];
                    if($status != $oldStatus['status']){
                        if($oldStatus['status'] == 0){
                            $data = "closeDate=NOW(), status=1";
                            $orders->updateOrderState($data, $this->params[0]);
                            
                        }else{
                            $data = "openDate=NOW(), closeDate=NULL, status=0";
                            $activeData = [
                                'empId'=>null,
                                'comment'=>'',
                                'deviceSerial'=>'',
                                'cost'=>0,
                                'deviceModel'=>'',
                                'costComment'=>''
                            ];
                            $activeDataId = [
                                "orderId" =>$this->params[0],
                                'empId'=>null,
                                'comment'=>'',
                                'cost'=>0,
                                'deviceSerial'=>'',
                                'costComment'=>'',
                                'deviceModel'=>''
                            ];
                            $orders->updateActiveOrder($activeData, $activeDataId);
                            $orders->updateOrderState($data, $this->params[0]);
                            $orders->delOrderParts($orderId);
                        }
                    }
                    $data = [
                        "orderAddress" =>$_POST['address'],
                        "orderPhone" =>$_POST['phone'],
                        "deviceBrand" =>$_POST['brand'],
                        "serviceType" =>$_POST['service'],
                        "deviceProblem" =>$_POST['problems'],
                        "deviceType" =>$_POST['type'],
                    ];
                    $dataId = [
                        "orderId" =>$this->params[0],
                        "orderAddress" =>$_POST['address'],
                        "orderPhone" =>$_POST['phone'],
                        "deviceBrand" =>$_POST['brand'],
                        "serviceType" =>$_POST['service'],
                        "deviceProblem" =>$_POST['problems'],
                        "deviceType" =>$_POST['type'],
                    ];
                        if($orders->updateOrder($data, $dataId)){

                            $this->data['success']= "تم تعديل البيانات بنجاح";
                            // header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");

                            $id = $this->params[0];
                            // (new helper())->redirect("/orders/", 3);
                        // (new helper())->redirect("/orders/edit/$id");
                        }else{
                            $this->data['error']= "مشكلة";
                        } 
                }
            }
        
        if($orders->getOrder($orderId)){
            $this->data['order'] = $orders->getOrder($orderId); 
            $type = ['deviceType'=>$this->data['order']['deviceType']];
            $this->data['brands'] = $orders->getAllTable("device_brand");
            $this->data['types'] = $orders->getAllTable("device_type");
            $this->data['problems'] = $orders->getProblems($type);
            $this->data['services'] = $orders->getAllTable("service_type");
        }

        // var_dump( $orders->getEmp($empId));
        $this->view();
    }
    public function giveMethod($params){
        $orders = new ordersModel;
        if(isset($this->params[0])){
            $orderId = ['orderId'=>$this->params[0]];
            $c = $orders->getOrdersCount($orderId);
            
            $validate = new validation;
            if($c == 0){
                if(isset($_POST['emps'])){
                    $validate->input('emps')->required();
                    $errors = $validate->showErorr();
                    if($errors){
                        $this->data['error'] = "برجاء اختيار فني اولا";
                    }else{
                        $data = [
                            'orderId'=>$this->params[0],
                            'empId' =>$_POST['emps']
                        ];
                        if($orders->addActiveOrder($data)){
                            $this->data['success'] = "تم إسناد الطلب للفني";
                        }
                    }
                }
            }elseif($c == 1){
                if(isset($_POST['emps'])){
                    $validate->input('emps')->required();
                    $errors = $validate->showErorr();
                    if($errors){
                        $this->data['error'] = "برجاء التأكد من صلاحية البيانات المدخلة";
                    }else{
                        $activeData = [
                            'empId' =>$_POST['emps']
                        ];
                        $activeDataId = [
                            'orderId'=>$this->params[0],
                            'empId' =>$_POST['emps']
                        ];
                        if($orders->updateActiveOrder($activeData, $activeDataId)){
                            $this->data['success'] = "تم إسناد الطلب للفني";
                        }
                    }
                }
            }
            if($orders->getActiveOrder($orderId)){
                $this->data['order'] = $orders->getActiveOrder($orderId);
            }else{
                $order = $orders->getOrder($orderId);
                $this->data['order'] = $order;
            }
            $this->data['emps']= $orders->getEmps();
        }
        $this->view();
    }
    public function closeviewMethod(){
        $this->defaultMethod();
    }
    public function closeOrderMethod(){
        $orders = new ordersModel;
        $orderId = ['orderId' => $this->params[0]];
        if(isset($_POST['model'])){
            $validate = new validation;
            $validate->input('cost')->float();
            $validate->input('comment')->required();
            $validate->input('serial')->required();
            $validate->input('model')->required();
            $validate->input('costComment')->required();
            $errors = $validate->showErorr();
            if($errors){
                $this->data['error'] = "برجاء التأكد من صلاحية البيانات المدخلة";
            }else{
                if(isset($_POST['parts'])){
                    $parts = $_POST['parts'];
                    foreach($parts as $part){
                        $data = ["orderId"=> $this->params[0], "partId"=>$part];
                        $t =$orders->checkOrderParts($data);
                        if(!$orders->checkOrderParts($data)){
                            $data = ['partId'=>$part, 'orderId'=>$this->params[0]];
                            $orders->addOrderParts($data);
                        }
                    }
                }
                $data = [
                    'comment'=>$_POST['comment'],
                    'deviceSerial'=>$_POST['serial'],
                    'cost'=>$_POST['cost'],
                    'deviceModel'=>$_POST['model'],
                    'costComment'=>$_POST['costComment'],
                ];
                $dataId = [
                    'comment'=>$_POST['comment'],
                    'deviceSerial'=>$_POST['serial'],
                    'cost'=>$_POST['cost'],
                    'deviceModel'=>$_POST['model'],
                    'costComment'=>$_POST['costComment'],
                    'orderId' => $this->params[0]
                ];
                $dataState = "closeDate=NOW(), status=1";
                if($orders->updateActiveOrder($data, $dataId)){
                    $orders->updateOrderState($dataState, $this->params[0]);
                    $this->data['success']= "تم تعديل البيانات بنجاح";
                    $id = $this->params[0];
                    // (new helper())->redirect("/orders/closeOrder/$id");
                }else{
                    $this->data['error']= "مشكلة";
                }
            }
        }
        
        if($orders->getActiveOrder($orderId)){
            $this->data['order'] = $orders->getActiveOrder($orderId); 
            $type = ['deviceType'=>$this->data['order']['deviceType']];
            $this->data['brands'] = $orders->getAllTable("device_brand");
            $this->data['types'] = $orders->getAllTable("device_type");
            $this->data['problems'] = $orders->getProblems($type);
            $this->data['services'] = $orders->getAllTable("service_type");
        }elseif($orders->getActiveOrderD($orderId)){
            $this->data['noEmp'] = 1;
        }

        // var_dump( $orders->getEmp($empId));
        $this->view();
    }

    public function getpartsMethod($typeId){
        $orders = new ordersModel;
        $orderId = ['orderId' => $this->params[1]];
        $orderParts = $orders->getOrderParts($orderId);
        $orderPart = [];
        foreach($orderParts as $part){
            $orderPart[]= $part['partId'];
        }
        $typeId = ['deviceType'=>$typeId[0]];
        $parts = new partsModel;
        $list = $parts->getAllParts($typeId);
        // print_r($orderParts);
        foreach($list as $item):
            ?>
                <option value="<?= $item['spareId']?>" <?= in_array($item['spareId'], $orderPart) ? 'Selected':'' ?>  data-serial="<?= $item['serial']?>"><?= $item['name']?></option>
    
                <?php
        endforeach;
        
    }
    public function deleteMethod($Id)
    {
        $orders = new ordersModel;
        $orderId = ['orderId' => $Id];
        $orders->delOrderParts($orderId);
        $orders->delActiveOrder($orderId);
        if($orders->delOrder($orderId)){
            (new helper())->redirect("/orders");
        }
        # code...
    }
}

