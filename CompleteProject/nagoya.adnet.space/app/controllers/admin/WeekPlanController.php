<?php

/**
 * Created by PhpStorm.
 * User: phongnt
 * Date: 3/13/2017
 * Time: 10:10 AM
 */
class WeekPlanController extends Controller
{
    function __construct()
    {
        parent::__construct();
        global $act;
        $act = "week-plan";
    }

    public function index(){
        global $title;
        $title = "週間工事予定";
        $obj = new WeekPlan();
        $page = 1;
        $limmit = 7;
        $data = $obj->getAll($page, $limmit);
        $days = array("月","火","水","木","金","土","日");
        $this->response('week_plan', ['data'=> $data, 'days' => $days]);
    }

    public function update(){
        $contents = $_POST['content'] ? $_POST['content'] : array();
        $days = $_POST['day'] ? $_POST['day'] : array();
        $months = $_POST['month'] ? $_POST['month'] : array();
        $ids = $_POST['id'] ? $_POST['id'] : array();
        foreach ($ids as $key => $value){
            $update = array(
                "content" => $contents[$key],
                "day" => $days[$key],
                "month" => $months[$key],
            );
            $obj = new WeekPlan();
            $obj->find($value)->update($update);
        }
        $this->redirect("/admin/week-plan");
    }
}