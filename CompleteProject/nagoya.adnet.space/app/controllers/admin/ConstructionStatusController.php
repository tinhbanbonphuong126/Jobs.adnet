<?php

/**
 * Created by PhpStorm.
 * User: phongnt
 * Date: 3/10/2017
 * Time: 10:15 AM
 */
class ConstructionStatusController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        global $act;
        $act = "construction-status";
    }

    public function index(){
        global $title;
        $title = "工事状況";
        $obj = new ConstructionStatus();
        $page = 1;
        $limmit = 10;
        if(isset($_GET['page']) && intval($_GET['page']) && $_GET['page'] > 0){
            $page = $_GET['page'];
        }
        $data = $obj->getAll($page, $limmit);
        $page = $obj->pagination();
        $this->response('list_construction_status', ['data'=> $data, "page" => $page]);

    }

    public function add(){
        $title = isset($_POST['title']) ? $_POST['title'] : null;
        $status_date = isset($_POST['date']) ? $_POST['date'] : null;
        $image = isset($_FILES['file']) ? $_FILES['file'] : null;
        $description = isset($_POST['description']) ? $_POST['description'] : null;
        if ($status_date){
            $path_file = $this->upload($image, ["jpg",'png','jpeg','gif']);
            if($path_file){
                $obj = new ConstructionStatus([
                    "title"=> $title,
                    'status_date' => $status_date,
                    'image_url' => $path_file,
                    'description' => $description,
                    "created_at"=> date("Y-m-d H:i:s")
                ]);
                $re = $obj->save();
                if(!$re){
                    $this->redirect('/admin/add-construction-status&er=1');
                    return;
                }
            }else{
                $this->redirect('/admin/add-construction-status&er=2');
                return;
            }
        }else{
            $this->response('add_construction_status');
            return;
        }
        $this->redirect('/admin/construction-status');
        return;
    }

    public function update(){
        $title = isset($_POST['title']) ? $_POST['title'] : null;
        $status_date = isset($_POST['date']) ? $_POST['date'] : null;
        $image = isset($_FILES['file']) ? $_FILES['file'] : null;
        $old_file = isset($_POST['old_file']) ? $_POST['old_file'] : null;
        $description = isset($_POST['description']) ? $_POST['description'] : null;
        $id = isset($_POST['id']) ? $_POST['id'] : null;
        if ($id){
            $path_file  = $old_file;
            if(isset($image) && $image['name']!=""){
                $path_file = $this->upload($image, ["jpg",'png','jpeg','gif']);
                if($path_file){
                    $this->remove($old_file);
                }
            }
            $update = array("title" => $title, "status_date" => $status_date, "image_url"=> $path_file, "description" => $description);
            $obj = new ConstructionStatus();
            $re = $obj->find($id)->update($update);
            if(!$re){
                $this->redirect('/admin/update-construction-status&id='.$id);
            }else{
                $this->redirect('/admin/construction-status');
            }
        }else{
            $obj = new ConstructionStatus();
            if(isset($_GET['id'])){
                $id = $_GET['id'];
                $obj = $obj->getOne($id);
                if($obj){
                    return $this->response('edit_construction_status',["obj" => $obj]);
                }else{
                    $this->redirect('/admin/construction-status');
                }
            }else{
                $this->redirect('/admin/construction-status');
            }
        }
        return false;
    }

    public function delete(){
        $id = isset($_POST['id']) ? $_POST['id'] : null;
        if ($id){
            $obj = new ConstructionStatus();
            $data = $obj->getOne($id);
            if($data){
                $this->remove($data->image_url);
                $re = $obj->find($id)->delete();
                if(!$re){
                    return $this->json(['message' => 'Unsuccess', 'status' => false]);
                }
            }

        }
        return $this->json(['message' => 'ok', 'status' => true]);
    }

    public function detail(){

    }

    public function upload($file, $exts = array()){
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
            $path_file = "uploads/construction-status/".rand(100,999)."_".time().".".$ext;
            $target_file = BASE_DIR . $path_file;
            if(move_uploaded_file($file["tmp_name"], $target_file)){
                return $path_file;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }

    public function remove($file){
        $target_file = BASE_DIR.$file;
        if (file_exists($target_file)) return unlink($target_file);
        return false;
    }
}