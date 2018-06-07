<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 10.02.2018
 * Time: 17:58
 */

namespace App\Framework;


class View
{
    public static function show($viewName = null, $data=[])
    {
        include PATHROOT.'/app/views/header_footer/header.php';
        if(isset($viewName)){
            include PATHROOT.'/app/views/'.$viewName.'.php';
        }
        include PATHROOT.'/app/views/header_footer/footer.php';
    }
    public static function preview($viewName = null, $data=[])
    {

        if(isset($viewName)){
            return  include PATHROOT.'/app/views/'.$viewName.'.php';
        }
    }
}