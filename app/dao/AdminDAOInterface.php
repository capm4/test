<?php
namespace App\dao;

interface AdminDAOInterface
{
    public static function get($login, $password);
}