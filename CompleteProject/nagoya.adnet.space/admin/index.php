<?php
session_start();
ini_set("display_errors", 1);
define("BASE_DIR", dirname(__FILE__)."/../");
include(BASE_DIR.'app/admin.use.php');

if(!isset($_SESSION["USER_INFO"])){
    $_act = $_GET['act'];
    switch ($_act) {
        case 'login':
            $obj = new LoginController();
            $obj->index();
            break;
        case 'submit-login':
            $obj = new LoginController();
            $obj->checkAdmin();
            break;
        default:
            header("location:/admin/login");
            break;
    }
}else {
    $_act = $_GET['act'];
    switch ($_act) {
        case 'notification':
            $obj = new NotificationsController();
            $obj->index();
            break;
        case 'add-notification':
            $obj = new NotificationsController();
            $obj->adđ();
            break;
        case 'update-notification':
            $obj = new NotificationsController();
            $obj->update();
            break;
        case 'delete-notification':
            $obj = new NotificationsController();
            $obj->delele();
            break;
        case 'upload-notification':
            $obj = new NotificationsController();
            $obj->upload();
            break;
        case 'get-detail':
            $obj = new NotificationsController();
            $obj->detail();
            break;

        case 'construction':
            $obj = new ConstructionController();
            $obj->index();
            break;
        case 'edit-construction':
            $obj = new ConstructionController();
            $obj->update();
            break;

        case 'logout':
            $obj = new LoginController();
            $obj->logout();
            break;

        case 'construction-status':
            $obj = new ConstructionStatusController();
            $obj->index();
            break;
        case 'add-construction-status':
            $obj = new ConstructionStatusController();
            $obj->add();
            break;
        case 'update-construction-status':
            $obj = new ConstructionStatusController();
            $obj->update();
            break;
        case 'delete-construction-status':
            $obj = new ConstructionStatusController();
            $obj->delete();
            break;
        case 'detail-construction-status':
            $obj = new ConstructionStatusController();
            $obj->detail();
            break;

        case 'week-plan':
            $obj = new WeekPlanController();
            $obj->index();
            break;
        case 'update-week-plan':
            $obj = new WeekPlanController();
            $obj->update();
            break;
        default:
            $obj = new NotificationsController();
            $obj->index();
            break;
    }
}


