<?php
/*
	This controller for notification page.
*/

class ScheduleController extends Controller{

    public function __construct(){
        parent::__construct();
    }
    /*
        This function for get all data
    */
    public function index(){
        $ScheduleModel = new ScheduleModel();
        $ScheduleModelResult = $ScheduleModel->getAllRecord('ASC');

        $this->response('schedule', ["ScheduleModelResult" => $ScheduleModelResult]);
    }
}