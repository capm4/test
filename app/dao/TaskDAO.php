<?php
namespace App\dao;

use App\db\DbConnector;
use App\model\Task;



class TaskDAO implements TaskDAOInterface
{

    public static function countRows(){
        $task = new Task();
        $count = DbConnector::select("SELECT COUNT(*) FROM ".$task->getTable());
        $count = intval($count[0]['COUNT(*)']);
        $count = ceil ($count/3);
        $count = intval($count);
        return $count;
    }

    public static function getByLimit($data)
    {
        $task = new Task();
        $values = DbConnector::select("select * from ".$task->getTable()." limit "
            .$data.' , 3');
        $tasks = [];
        foreach ($values as $key=>$val){
            $insert = new Task();
            $insert->setId($val["id"]);
            $insert->setUserName($val["name"]);
            $insert->setUserEmail($val['email']);
            $insert->setTask($val["task"]);
            $insert->setStoreImg($val["store_img"]);
            $insert->setProgress($val["progress"]);
            array_push($tasks,$insert);
        }
        return $tasks;
    }

    public static function getByOrder($data)
    {
        $task = new Task();
        $values = DbConnector::select("select * from ".$task->getTable()." order by ". $data[0]." limit "
            .$data[1].' , 3');
        $tasks = [];
        foreach ($values as $key=>$val){
            $insert = new Task();
            $insert->setId($val["id"]);
            $insert->setUserName($val["name"]);
            $insert->setUserEmail($val['email']);
            $insert->setTask($val["task"]);
            $insert->setStoreImg($val["store_img"]);
            $insert->setProgress($val["progress"]);
            array_push($tasks,$insert);
        }
        return $tasks;
    }

    public static function getAll()
    {
        $task = new Task();
        $values = DbConnector::select("select * from ".$task->getTable());
        $tasks = [];
        foreach ($values as $key=>$val){
            $insert = new Task();
            $insert->setId($val["id"]);
            $insert->setUserName($val["name"]);
            $insert->setUserEmail($val['email']);
            $insert->setTask($val["task"]);
            $insert->setStoreImg($val["store_img"]);
            $insert->setProgress($val["progress"]);
            array_push($tasks,$insert);
        }
        return $tasks;
    }

    public static function update($task)
    {
        $data = array($task->getTask(), $task->getProgress(), $task->getId());
        $val = DbConnector::update("UPDATE ".$task->getTable(). " SET `task`= ? , `progress` = ? WHERE `id` = ?", $data);
        return true;
    }

    public static function create($task)
    {
        $query = "INSERT INTO ". $task->getTable()." (name, email, task, store_img, progress)  VALUES ("."'".$task->getUserName()."'".", "
            ."'".$task->getUserEmail()."'".", "."'".$task->getTask()."'".", "."'".$task->getStoreImg()."'".", "."'".$task->getProgress()."')";
        DbConnector::insert($query);
        return true;
    }

    public static function getById($id)
    {
        $task = new Task();
        $val = DbConnector::select("SELECT * FROM ".$task->getTable()." WHERE `id`=?", [$id]);
        $res = $val[0];
        $task->setId($res ["id"]);
        $task->setUserName($res ["name"]);
        $task->setUserEmail($res ['email']);
        $task->setTask($res ["task"]);
        $task->setStoreImg($res ["store_img"]);
        $task->setProgress($res ["progress"]);
        return $task;
    }
}