<?php
/*
	This controller for notification page.
*/

class SearchController extends Controller{

    public function __construct(){
        parent::__construct();
    }
    /*
        This function for get all data
    */
    public function index(){
        $this->response('search');
    }
}