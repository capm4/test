<?php
$_routers = [
    '/' =>[ "handler"=>["MainController", "index"]],
    '/([0-9]+)' =>[ "handler"=>["MainController", "indexArgs"]],
    '/sort/([a-z]*)'=>[ "handler"=>["MainController", "indexSort"]],
    '/sort/([a-z]*)/([0-9]+)'=>[ "handler"=>["MainController", "indexArgsSort"]],
    '/addTask'=>["handler"=>["TaskController","addTask"]],
    '/task/([0-9]+)'=>["handler"=>["TaskController","showTask"]],
    'task/preview'=>["handler"=>["TaskController","taskPreview"]],
    '/login'=>["handler"=>["AuthoricationController","show"]],
    '/login/auth'=>["handler"=>["AuthoricationController","auth"]],
    '/admin'=>["handler"=>["AdminController", "index"]],
    '/admin/([0-9]+)'=>["handler"=>["AdminController", "indexArgs"]],
    '/admin/sort/([a-z]*)'=>[ "handler"=>["MainController", "indexSort"]],
    '/admin/sort/([a-z]*)/([0-9]+)'=>[ "handler"=>["MainController", "indexArgsSort"]],
    '/task/admin/edit/([0-9]+)'=>["handler"=>["AdminController","edit"]],
    '/admin/updateTask/([0-9]+)'=>["handler"=>["AdminController","updateTask"]],
    '/logout'=>["handler"=>['AuthoricationController','logout']],
];