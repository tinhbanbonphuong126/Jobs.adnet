<?php

include_once(dirname(__FILE__) . '/Model.php');

Class ConstructionStatus extends Model{

    public $table = "construction_status";

    public function __construct(array $columns = array()){
        parent::__construct($columns);
    }
    public static function tableName()
    {
        return 'construction_status';
    }

    public function getLimitRecord($limit)
    {
        $querySelect = "SELECT * FROM " . ConstructionStatus::tableName() . " ORDER BY notification_date DESC limit 0, $limit";
        $query = $this->pdo->prepare($querySelect);
        $query->execute();
        $data = $query->fetchAll(PDO::FETCH_OBJ);
        return $data;
    }

    public function getAllRecord($junban = 'DESC')
    {
        $querySelect = "SELECT * FROM " . ConstructionStatus::tableName() . " ORDER BY status_date $junban";
        $query = $this->pdo->prepare($querySelect);
        $query->execute();
        $data = $query->fetchAll(PDO::FETCH_OBJ);
        return $data;
    }

    /*
     * This function for admin page get all record
    */
    public function getAll($page = 1, $limit = 10){
        $data = $this->select($this->table)->order("id", "DESC")->page($page, $limit)->get();
        return $data;
    }

    public function getOne($id){
        $data = $this->select($this->table)->where("id = ".$id)->one();
        return $data;
    }
}