<?php
namespace App\dao;
interface TaskDAOInterface
{
    public static function create($task);
    public static function getById($id);
    public static function getAll();
    public static function update($task);
    public static function getByOrder($data);
    public static function countRows();
    public static function getByLimit($data);
}