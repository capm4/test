<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 11.02.2018
 * Time: 17:03
 */

namespace App\Framework;


class Config
{
    private $values = [];

    /**
     * Confic constructor.
     * @param array $values
     */
    public function __construct()
    {
        try{
            include PATHROOT . "/app/confic/config.php";
            $this->values = $_config;
        }catch (\Exception $e){
            $e->getMessage();
        }
    }

    public static function init()
    {
        static $instence;
        if($instence){
            return $instence;
        }
        try{
            $instence = new Config();
        }catch (Exception $e){
            $e->getMessage();
        }
        return $instence;
    }

    public function get(String $name)
    {
        $keys = array_filter(explode(".", $name));
        $res = null;
        for( $i = 0; $i < count($keys); $i++ ) {
            if( !$res ) {
                if (array_key_exists($keys[$i], $this->values)) {
                    $res = $this->values[$keys[$i]];
                }
            }
            else {
                if (array_key_exists($keys[$i], $res)) {
                    $res = $res[$keys[$i]];
                }
                else {
                    $res = null;
                    break;
                }
            }
        }
        return $res;
    }

}