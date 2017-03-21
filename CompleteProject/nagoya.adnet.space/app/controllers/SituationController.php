<?php
/*
	This controller for notification page.
*/

class SituationController extends Controller{

    public function __construct(){
        parent::__construct();
    }
    /*
        This function for get all data
    */
    public function index(){
        $ConstructionStatus = new ConstructionStatus();
        $ConstructionStatusResult = $ConstructionStatus->getAllRecord();

        $this->response('situation', ["ConstructionStatusResult" => $ConstructionStatusResult]);
    }
}