<?php
/**
 * Created by PhpStorm.
 * User: QUE
 * Date: 3/7/2017
 * Time: 11:00 PM
 */
include_once(dirname(__FILE__) . '/Model.php');

class NotificationsModel extends Model
{
    protected $db;

    public function __construct()
    {
        parent::__construct();
    }

    public static function tableName()
    {
        return 'notifications';
    }

    public function getLimitRecord($limit)
    {
        $querySelect = "SELECT * FROM " . NotificationsModel::tableName() . " ORDER BY notification_date DESC limit 0, $limit";
        $query = $this->pdo->prepare($querySelect);
        $query->execute();
        $data = $query->fetchAll(PDO::FETCH_OBJ);
        return $data;
    }

    public function getAllRecord($junban = 'DESC')
    {
        $querySelect = "SELECT * FROM " . NotificationsModel::tableName() . " ORDER BY notification_date $junban";
        $query = $this->pdo->prepare($querySelect);
        $query->execute();
        $data = $query->fetchAll(PDO::FETCH_OBJ);
        return $data;
    }
}