<?php
namespace Futurelink\Main\models;

use Futurelink\Main\models\abstractModel;

class problemsModel extends abstractModel
{
    public function getAllProblems($id){
        return $this->select("problems", "*")->where("deviceType", "=", $id)->getAllWe();
    }
    public function getProblemById($id){
        return $this->select("problems", "*")->where("problemId", "=", $id)->getAll();
    }
    public function getProblemsCount($problem){
        return $this->select("problems", "*")->where("content", "=", $problem)->andWhere("deviceType", "=", $problem )->getRowCount();
    }
    public function getProblem($problem){
        return $this->select("problems", "*")->where("problemId", "=", $problem)->getRow();
    }
    public function addProblem($data){
        return $this->insert("problems", $data)->setData($data)->executeQuery();
    }
    public function updateProblem($data, $id){
        return $this->update("problems", $data)->where("problemId", "=", $id)->executeQuery();
    }
}