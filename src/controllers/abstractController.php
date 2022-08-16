<?php
namespace Futurelink\Main\controllers;


class abstractController
{
    protected $controller;
    protected $method;
    protected $params;
    protected $data = [];


    public function notFoundMethod(){
        $this->controller="notound";
        $this->method="notFound";
        $this->view();
    }

    public function setController($controllerName)
    {
        $this->controller = $controllerName;
    }
    public function setMethod($methodName)
    {
        $this->method = $methodName;
    }
    public function setParams($paramsName)
    {
        $this->params = $paramsName;
    }
    protected function view()
    {
        $file = dirname(__DIR__)."\\views\\{$this->controller}\\{$this->method}.view.php";
        // echo $this->controller;
        // echo $this->method;
        // print_r($this->params);
        if(file_exists($file)){
            if($this->method == 'login'){
                extract($this->data);
                include($file);
            }else{

                $header = dirname(__DIR__)."\\setting\\header.php";
                $footer = dirname(__DIR__)."\\setting\\footer.php";
                extract($this->data);
                include($header);
                include($file);
                include($footer);
            }
        }else{
            include dirname(__DIR__)."\\views\\notFound\\noView.view.php";
        }
        // extract($data);// بتاخد الاراي كي و فاليو بتحول الكي لمتغير واخد القيمة الفاليو
    }
    // protected function view()
    // {
    //     // echo $this->controller;
    //     // echo $this->method;
    //     // print_r($this->params);
    //     echo 0000;
    // }

    
}