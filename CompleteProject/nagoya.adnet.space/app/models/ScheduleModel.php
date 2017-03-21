<?php
/**
 * Created by PhpStorm.
 * User: QUE
 * Date: 3/7/2017
 * Time: 11:00 PM
 */
include_once(dirname(__FILE__) . '/Model.php');

class ScheduleModel extends Model
{
    protected $db;

    public function __construct()
    {
        parent::__construct();
    }

    public static function tableName()
    {
        return 'week_plans';
    }

    public function getAllRecord($junban = 'DESC')
    {
        $querySelect = "SELECT * FROM " . ScheduleModel::tableName() . " ORDER BY id $junban";
        $query = $this->pdo->prepare($querySelect);
        $query->execute();
        $data = $query->fetchAll(PDO::FETCH_OBJ);
        return $data;
    }
}