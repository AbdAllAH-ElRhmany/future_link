<?php
namespace Futurelink\Main\models;

use Futurelink\Main\models\abstractModel;

class userModel extends abstractModel
{
    function checkUser($data, $ssn){
        return $this->select("employees", $data)->where("ssn", "=", $ssn)->orWhere("email", "=", $ssn)->getRowCount();
    }
    function selectUser($data, $email){
        return $this->select("employees", $data)->where("email", "=", $email)->getRow();
    }
    function selectUserId($data, $id){
        return $this->select("employees", $data)->where("empId", "=", $id)->getRow();
    }
    public function selectJobName($id)
    {
        return $this->select('jobs', 'title')->where('jobId', '=', $id)->getRow();
    }
    function selectUserReset($data, $ssn){
        return $this->select("employees", $data)->where("ssn", "=", $ssn)->orWhere("email", "=", $ssn)->getRow();
    }
    function deleteemployees($id){
        return $this->delete("employees")->where("id", "=", $id)->executeQuery();
    }
    function updateUser($colsData, $id){
        return $this->update("employees", $colsData)->setData($colsData)->where("empId", "=", $id)->executeQuery();
    }
    
}