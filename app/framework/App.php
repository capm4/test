<?php

namespace App\Framework;



use App\db\DbConnector;

class App
    {
    public function run(){
        $config = Config::init();
        $database = DbConnector::init(
            $config->get('db.host'),
            $config->get('db.user'),
            $config->get('db.password'),
            $config->get('db.database')
        );
        $router = Routers::init();
        if($handler = $router->getHandler()){
            $className = 'App\controller\\'.$handler[0];
            $method = $handler[1];
            $controller = new $className();
            $controller->$method();
        }
    }
}