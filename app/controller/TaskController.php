<?php
namespace App\controller;

use App\dao\TaskDAO;
use App\Framework\Routers;
use App\Framework\View;
use App\model\Task;
use finfo;
use Imagick;
use SplFileInfo;

class TaskController
{

    public function addTask(){
        if( isset($_POST["name"]) and isset($_POST["email"]) and isset($_POST['task']))
        {
            $task = new Task();
            $task->setUserName($_POST["name"]);
            $task->setUserEmail($_POST["email"]);
            $task->setTask($_POST['task']);
            $task->setProgress(0);
            if(isset($_FILES['img']))
            {
                $errors = [];
                $name = md5($_POST['name']);
                $pathName = $n_str = str_replace(" ","",$_POST['name']);
                $file_tmp = $_FILES['img']['tmp_name'];
                $file_ext = strtolower(end(explode('.',$_FILES['img']['name'])));
                $expension = array('gif','jpg','png');
                if(!in_array ($file_ext, $expension)){
                    $errors = "Файл повинен буди формату JPG/GIF/PNG";
                }
                if(empty($errors) == true)
                {
                    $path = PATHROOT .'/resources/img/'.$pathName;
                    if(!file_exists($path)){
                        mkdir($path );
                    }
                    move_uploaded_file($file_tmp,$path .'/'.$name.'.'.$file_ext);
                    $size = GetImageSize($path.'/'.$name.'.'.$file_ext);
                    if($size[0] > 320 or $size[1]>320){
                        $imageController = new ImageController();
                        $imageController->imageresize($path.'/'.$name.'.'.$file_ext, $path, $name,$file_ext);
                    }
                    $task->setStoreImg('/resources/img/'.$pathName.'/'.$name.'.'.$file_ext);
                }else{
                    $_SESSION['img_error'] = $errors;
                    View::show("task_create");
                }
            }
            if(TaskDAO::create($task)) {
                $main = new MainController();
                $main->index();
            }else{
                View::show("task_create");
            }
        }else{
            View::show("task_create");
        }
    }

    public function showTask(){
        $id = Routers::getRouteArgs();
        $task = TaskDAO::getById($id[2]);
        $data = [
          'task'=>$task
        ];
        View::show('task',$data);
    }




//    public function taskPreview(){
//            $task = new Task();
//            $task->setUserName($_POST["name"]);
//            $task->setUserEmail($_POST["email"]);
//            $task->setTask($_POST['task']);
//            $task->setStoreImg('resources/img/'.$_POST["name"]);
//            $task->setProgress(0);
//            $view  = View::preview('task_preview');
//            var_dump($view);
//    }
}