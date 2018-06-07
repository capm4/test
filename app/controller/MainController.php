<?php
namespace App\controller;

use App\dao\TaskDAO;
use App\Framework\Routers;
use App\Framework\View;

class MainController
{

    public function index(){
        $limit= 0;
        $tasks = TaskDAO::getByLimit($limit);
        $count = TaskDAO::countRows();
        $data = [
          'tasks' =>  $tasks,
          'count'=>$count
        ];
        View::show("main",$data);
    }
    public function indexSort(){
        $sort = Routers::getRouteArgs();
        $limit= 0;
        $arrs= [$sort[2],$limit];
        $tasks = TaskDAO::getByOrder($arrs);
        $count = TaskDAO::countRows();
        $data = [
            'tasks' =>$tasks,
            'count'=>$count,
            'sort'=>$sort[2]
        ];
        View::show("mainSort",$data);
    }

    public function indexArgs(){
        $limit = Routers::getRouteArgs();
        $tasks = TaskDAO::getByLimit($limit[1]);
        $count = TaskDAO::countRows();
        $data = [
            'tasks' => $tasks,
            'count'=>$count
        ];
        View::show("main",$data);
    }

    public function indexArgsSort(){
        $sort = Routers::getRouteArgs();
        $arrs= [$sort[2],$sort[3]];
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