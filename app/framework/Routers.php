<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 09.02.2018
 * Time: 11:46
 */

namespace App\Framework;


class Routers
{
    public $routers =[];
    public static function init(){
        static $instance;
        if($instance){
            return $instance;
        }
        try {
            $instance = new Routers;
        }
        catch(Exception $e) {
            echo $e->getMessage();
        }
        return $instance;
    }

    /**
     * Confic constructor.
     * @param array $routers
     */
    private function __construct()
    {   try{
            require PATHROOT."/app/confic/routers.php";
            $this->routers = $_routers;
        }catch (Exception $e){
            echo $e->getMessage();
        }
    }



    public function getHandler(){
        $uriSections = explode('?', $_SERVER['REQUEST_URI'], 2);
        $route = ( $uriSections[0] != '/' ) ? rtrim($uriSections[0],'/') : '/';
        foreach ($this->routers as $routePattern => $val) {
            if(preg_match( '/^'.addcslashes($routePattern,'/').'$/', $route)){
                return $val['handler'];
            }
        }
    }
    public static function getRouteArgs()
    {
        $uriSections = explode('?', $_SERVER['REQUEST_URI'], 2);
        return array_filter(explode( '/', $uriSections[0] ));
    }


}