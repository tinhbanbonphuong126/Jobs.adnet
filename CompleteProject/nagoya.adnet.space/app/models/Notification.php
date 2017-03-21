<?php


class Notification extends Model{

	public $table = "notifications";

	public function __construct(array $columns = array()){
		parent::__construct($columns);
	}
	
	public function getAll($page = 1, $limit = 10){
		$data = $this->select("notifications")->order("id", "DESC")->page($page, $limit)->get();
		return $data;
	}

	public function getOne($id){
		$data = $this->select("notifications")->where("id = ".$id)->one();
		return $data;
	}

}
