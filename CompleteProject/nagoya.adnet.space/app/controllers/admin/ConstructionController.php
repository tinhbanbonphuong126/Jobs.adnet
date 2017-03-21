<?php

/**
 * Created by PhpStorm.
 * User: phongnt
 * Date: 3/10/2017
 * Time: 9:07 AM
 */
class ConstructionController extends Controller
{
    public function __construct(){
        parent::__construct();
        global $act;
        $act = "construction";
    }

    public function index(){
        global $title;
        $title = "工事たより";
        $str = file_get_contents("../app/youtube.json");
        $str = json_decode($str, true);
        $this->response('construction',["link" => $str["link"]]);
    }

    public function update(){
        $link = $_POST['link'] ? $_POST['link'] : null;
        if($link){
            $str = file_get_contents("../app/youtube.json");
            $str = json_decode($str, true);
            $str['link'] = $link;
            file_put_contents("../app/youtube.json", json_encode($str));
            $this->redirect("./construction");
        }
        $this->redirect("./construction");
    }

}