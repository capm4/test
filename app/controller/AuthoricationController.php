<?php
namespace App\controller;

use App\dao\AdminDAO;
use App\Framework\View;

class AuthoricationController
{
    public function show()
    {
        View::show('login');
    }

    public function auth()
    {
        if( isset($_POST["login"]) and isset($_POST["pass"]))
        {
            if(AdminDAO::get($_POST["login"], $_POST["pass"])){
                $_SESSION['user_id'] = 1;
                $admin = new AdminController();
                $admin ->index();
            }else{
                View::show('login');
            }
        }else{
            View::show('login');
        }
    }

    public function logout(){
        $_SESSION['user_id'] = null;
        $main = new MainController();
        $main->index();
    }
}