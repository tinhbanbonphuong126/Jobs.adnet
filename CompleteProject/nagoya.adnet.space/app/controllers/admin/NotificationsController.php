<?php

/*
	This controller for notification page.
*/

class NotificationsController extends Controller{

	public function __construct(){
		parent::__construct();
        global $act;
        $act = "notification";
	}

	/*
		This function for get all data
	*/
	public function index(){
		$obj = new Notification();
        global $title;
        $title = "お知らせ";
		$page = 1;
		$limmit = 10;
		if(isset($_GET['page']) && intval($_GET['page']) && $_GET['page'] > 0){
			$page = $_GET['page'];
		}
		$data = $obj->getAll($page, $limmit);
		$page = $obj->pagination();
		$this->response('list_noification', ['data'=> $data, "page" => $page]);
	}


	/*
		This function for add new item
	*/
	public function adđ(){
		 $content = isset($_POST['content']) ? $_POST['content'] : null;
		 $notification_date = isset($_POST['date']) ? $_POST['date'] : null;
		 $pdf_link = isset($_POST['pdf_link']) ? $_POST['pdf_link'] : null;
		 if ($content && $notification_date){
            $obj = new Notification([
                "content"=> $content,
                'notification_date' => $notification_date,
                'pdf_link' => $pdf_link,
                "created_at"=> date("Y-m-d H:i:s")
            ]);
            $re = $obj->save();
             if(!$re){
                 return $this->json(['message' => 'Unsuccess', 'status' => false]);
             }
         }
        return $this->json(['message' => 'ok', 'status' => true]);
	}


	/*
		This function for update item
	*/
	public function update(){
        $content = isset($_POST['content']) ? $_POST['content'] : null;
        $notification_date = isset($_POST['date']) ? $_POST['date'] : null;
        $id = isset($_POST['id']) ? $_POST['id'] : null;
        $pdf_link = isset($_POST['pdf_link']) ? $_POST['pdf_link'] : null;
        if ($id){
            $obj = new Notification();
            $data = $obj->getOne($id);
            if($pdf_link != $data->pdf_link){
                if($data->pdf_link){
                    unlink(BASE_DIR.$data->pdf_link);
                }
            }

            $update = array("content" => $content, "notification_date" => $notification_date, 'pdf_link' => $pdf_link);


            $re = $obj->find($id)->update($update);
            if(!$re){
                return $this->json(['message' => 'Unsuccess', 'status' => false]);
            }
        }
        return $this->json(['message' => 'ok', 'status' => true]);
	}

	/*
		This function for delete item
	*/
	public function delele(){
        $id = isset($_POST['id']) ? $_POST['id'] : null;
        if ($id){
            $obj = new Notification();
            $data = $obj->getOne($id);
            if($data->pdf_link){
                unlink(BASE_DIR.$data->pdf_link);
            }
            $re = $obj->find($id)->delete();
            if(!$re){
                return $this->json(['message' => 'Unsuccess', 'status' => false]);
            }
        }
        return $this->json(['message' => 'ok', 'status' => true]);
	}

	/*
		This function for detail item
	*/
	public function detail(){
        $obj = new Notification();
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $data = array();
            $data['message'] = "Success!";
            $data['status'] = true;
            $data['data'] =  $obj->getOne($id);
            return $this->json($data);
        }
	}
    public function upload(){
        $file = $_FILES['file'];
        $exts = ['pdf'];
        $pathinfo = pathinfo($file["name"]);
        $ext = strtolower($pathinfo["extension"]);
        $check_ext = false;
        if(count($exts)>0){
            foreach ($exts as $key => $val ){
                if($val == $ext){
                    $check_ext = true;
                    break;
                }
            }
        }
        if($check_ext){
            $path_file = "uploads/pdf/".rand(100,999)."_".time().".".$ext;
            $target_file = BASE_DIR . $path_file;
            if(move_uploaded_file($file["tmp_name"], $target_file)){
                $this->json(['message' => 'ok', 'status' => true,'file' => $path_file]);
            }else{
                return false;
            }
        }else{
            return false;
        }
    }

}