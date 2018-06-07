<?php
namespace App\dao;



use App\db\DbConnector;
use App\model\Admin;

class AdminDAO implements AdminDAOInterface
{

    public static function get($login, $password)
    {
        $admin = new Admin();
        $val = [$login,$password];
        $values = DbConnector::select("select * from ".$admin->getTable().' WHERE `login` = ? and `password` = ?', $val);
        if($values){
            return true;
        }else{
            return false;
        }
    }
}