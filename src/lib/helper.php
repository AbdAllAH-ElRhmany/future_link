<?php
namespace Futurelink\Main\lib;

class helper
{



    public static function logout()
    {
        session_start();
        
        session_destroy();
        
        helper::toLogin();
    }
    
    public static function toLogin(){
        header("location: /user/login");
        die;
    }
    public static function checkLogin()  
    {
        header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
        if(empty($_SESSION['email']) || empty($_SESSION['name'])){
            helper::toLogin();
        }
    }
    public function __call($name, $arguments)
    {
        if($name == "redirect"){
            if(count($arguments) >1){
                header("Refresh: $arguments[1]; url={$arguments[0]}");
            }else{
                header("Location: {$arguments[0]}");
            }
        }
    }
}