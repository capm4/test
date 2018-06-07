<?php
namespace App\controller;

use App\dao\TaskDAO;
use App\Framework\Routers;
use App\Framework\View;

class AdminController
{

    public function index(){
        $limit= 0;
        $tasks = TaskDAO::getByLimit($limit);;
        $count = TaskDAO::countRows();
        $data = [
            'tasks' => $tasks,
            'count'=>$count
        ];
        View::show("adminMain",$data);
    }

    public function indexArgs(){
        var_dump($this->tasks);
        $limit = Routers::getRouteArgs();
        $tasks = TaskDAO::getByLimit($limit[2]);;
        $count = TaskDAO::countRows();
        $data = [
            'tasks' => $tasks,
            'count'=>$count
        ];
        View::show("adminMain",$data);
    }

    public function edit(){
        $id = Routers::getRouteArgs();
        $task = TaskDAO::getById($id[4]);
        $data = [
            'task'=>$task
        ];
        View::show('admin_edit_task',$data);
    }

    public function updateTask(){
        if($_POST['task'] or $_POST['progress'])
        {
            if($_POST['progress'] == 0){
                $progress = 1;
            }else{
                $progress = 0;
            }
            $id = $_POST['id'];
            $task = TaskDAO::getById($id);
            $task->setTask($_POST['task']);
            $task->setProgress($progress);
            TaskDAO::update($task);
            $this->index();
        }
    }

    public function indexArgsSort(){
        $sort = Routers::getRouteArgs();
        $arrs= [$sort[3],$sort[4]];
        $tasks = TaskDAO::getByOrder($arrs);
        $count = TaskDAO::countRows();
        $data = [
            'tasks' =>$tasks,
            'count'=>$count,
            'sort'=>$sort[2]
        ];
        View::show("mainSort",$data);
    }
    public function indexSort(){
        $sort = Routers::getRouteArgs();
        $limit= 0;
        $arrs= [$sort[3],$limit];
        $tasks = TaskDAO::getByOrder($arrs);
        $count = TaskDAO::countRows();
        $data = [
            'tasks' =>$tasks,
            'count'=>$count,
            'sort'=>$sort[2]
        ];
        View::show("mainSort",$data);
    }
}