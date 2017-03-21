<?php

Class Administrator extends Model{

	protected $db;
    public $table = "adminstrators";

	public function __construct(){
		parent::__construct();	
	}
}
