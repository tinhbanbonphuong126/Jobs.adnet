<?php
/*
	This controller for notification page.
*/

class HomeController extends Controller{

    public function __construct(){
        parent::__construct();
    }
    /*
        This function for get all data
    */
    public function index(){
        $NotificationsModel = new NotificationsModel();
        $NotificationsResult = $NotificationsModel->getLimitRecord(3);

        $YoutubeLink = new YoutubeLinkModel();
        $file = "./app/youtube.json";
        $json = json_decode(file_get_contents($file), true);
        $id = $YoutubeLink->convertYoutube($json["link"]);

        $this->response('home', ["NotificationResult" => $NotificationsResult, "id" => $id]);

    }

    public function viewmore(){
        $NotificationsModel = new NotificationsModel();
        $NotificationsResult = $NotificationsModel->getAllRecord();

        $this->response('viewmore', ["NotificationsResult" => $NotificationsResult]);
    }
}