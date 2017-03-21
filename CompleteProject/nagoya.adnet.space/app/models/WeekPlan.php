<?php

/**
 * Created by PhpStorm.
 * User: phongnt
 * Date: 3/13/2017
 * Time: 10:18 AM
 */
class WeekPlan extends Model
{
    public $table = "week_plans";
    public function __construct(){
        parent::__construct();
    }

    public function getAll($page = 1, $limit = 10){
        $data = $this->select($this->table)->order("id", "ASC")->page($page, $limit)->get();
        return $data;
    }


}