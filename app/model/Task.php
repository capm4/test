<?php

namespace App\model;

class Task
{
    protected $table = 'task';
    private $id;
    private $name;
    private $email;
    private $task;
    private  $store_img;
    private $progress;

    /**
     * @return string
     */
    public function getTable(): string
    {
        return $this->table;
    }


    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getUserName()
    {
        return $this->name;
    }

    /**
     * @param mixed $user_name
     */
    public function setUserName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getUserEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $user_email
     */
    public function setUserEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getTask()
    {
        return $this->task;
    }

    /**
     * @param mixed $task
     */
    public function setTask($task)
    {
        $this->task = $task;
    }

    /**
     * @return mixed
     */
    public function getStoreImg()
    {
        return $this->store_img;
    }

    /**
     * @param mixed $store_img
     */
    public function setStoreImg($store_img)
    {
        $this->store_img = $store_img;
    }

    /**
     * @return mixed
     */
    public function getProgress()
    {
        return $this->progress;
    }

    /**
     * @param mixed $progress
     */
    public function setProgress($progress)
    {
        $this->progress = $progress;
    }



}