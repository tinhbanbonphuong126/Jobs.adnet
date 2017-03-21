<?php
/*
	This controller for notification page.
*/

class LoginController extends Controller{

    public function __construct(){
        parent::__construct();
    }
    /*
        This function for get all data
    */
    public function index(){
        $this->response('login');
    }
    public function logout(){
        $this->response('logout');
    }

    public function checkAdmin(){

        $admin = new Administrator();
        if(isset($_POST['login']))
        {
            $id = $_POST['id'];
            $checkResult = $admin->select('administrators')->where("username = '" . $id . "'")->one();

            if($checkResult !=null && password_verify($_POST["pwd"], $checkResult->password))
            {
                $_SESSION["USER_INFO"] = [
                    "USER_ID" => $checkResult->username
                ];
                header('location: notification');
            } else {
                $_SESSION["LOGIN_ERROR"] = "※IDまたはPASSが間違っています";
                header('location: login');
            }
        }
    }
}