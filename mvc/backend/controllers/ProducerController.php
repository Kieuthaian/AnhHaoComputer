<?php
require_once 'mvc/backend/models/Producer.php';
class ProducerController extends Controller{

    public function index(){
        $producer_model=new Producer();
        $producers=$producer_model->getAll();
        $this->content=$this->render('mvc/backend/views/producers/index.php',['producers'=>$producers]);
        require_once 'mvc/backend/views/layouts/main.php';
    }

    public function create(){
        $producer_model=new Producer();
        if(isset($_POST['submit'])){
            $name = $_POST["name"];
            $status = $_POST["status"];
            $avatar_file = $_FILES["avatar"];
            $address=$_POST["address"];
            $hotproducer=isset($_POST["hotproducer"])? 1 : 0;
            $producer_title=$producer_model->getProducer($name);
            if($producer_title){
                $this->error='Tên thương hiệu đã tồn tại';
            }
            if(empty($this->error)){
                $avatar='';
                if($avatar_file['error']== 0){
                    $dir_uploads= __DIR__."/../../../assets/uploads/producers";
                    if(!file_exists($dir_uploads)){
                        mkdir($dir_uploads);
                    }
                    $avatar=time().'-'.$avatar_file["name"];
                    move_uploaded_file($avatar_file['tmp_name'],$dir_uploads.'/'.$avatar);
                }
                $producer_model->name=$name;
                $producer_model->status=$status;
                $producer_model->address=$address;
                $producer_model->avatar=$avatar;
                $producer_model->hotproducer=$hotproducer;
                $is_insert=$producer_model->insert();
                if($is_insert){
                    $_SESSION["success"] = " Thêm thương hiệu mới thành công !";
                }else{
                    $_SESSION["error"] = ' Thêm thương hiệu mới thất bại';
                }
                header("location:index.php?area=backend&controller=Producer");
                exit();
            }
        }
        $this->content=$this->render('mvc/backend/views/producers/create.php');
        require_once 'mvc/backend/views/layouts/main.php';
    }
    public function detail(){
        if(!isset($_GET['id']) || !is_numeric($_GET["id"])) {
            $_SESSION['error'] = "Id không hợp lệ";
            header('location:index.php?area=backend&controller=Producer');
            exit();
        }
        $id=$_GET["id"];
        $producer_model=new Producer();
        $producer=$producer_model->getProducerId($id);
        $this->content=$this->render('mvc/backend/views/producers/detail.php',['producer' => $producer]);
        require_once 'mvc/backend/views/layouts/main.php';
    }
    public function update(){
        if(!isset($_GET["id"]) || !is_numeric($_GET["id"])){
            $_SESSION['error'] = "Id không hợp lệ";
            header('location:index.php?area=backend&controller=Producer');
            exit();
        }
        $id=$_GET["id"];
        $producer_model=new Producer();
        $producer=$producer_model->getProducerId($id);
        if(isset($_POST['submit'])){
            $name=$_POST["name"];
            $avatar_file=$_FILES["avatar"];
            $address=$_POST['address'];
            $hotProducer=isset($_POST["hotproducer"]) ? 1: 0;
            $status=$_POST["status"];
            $avatar=$producer['avatar'];
            if(empty($this->error)){
                $avatar=$producer['avatar'];
                if($avatar_file['error'] == 0){
                    $producer_model->images($id);
                    $dir_upload=__DIR__."/../../../assets/uploads/producers";
                    if(!file_exists($dir_upload)){
                        mkdir($dir_upload);
                    }
                    $avatar=time()."-". $avatar_file["name"];
                    move_uploaded_file($avatar_file["tmp_name"],$dir_upload."/".$avatar);
                }
                $producer_model->name = $name;
                $producer_model->avatar = $avatar;
                $producer_model->address=$address;
                $producer_model->status = $status;
                $producer_model->hotproducer=$hotProducer;
                $producer_model->updated_at = date('Y-m-d H:i:s');
                $is_update = $producer_model->update($id);
                if ($is_update) {
                    $_SESSION['success'] = 'Update thương hiệu thành công';
                } else {
                    $_SESSION['error'] = 'Update thương hiệu thất bại';
                }
                header("location:index.php?area=backend&controller=Producer");
                exit();
            }
        }
        $this->content=$this->render("mvc/backend/views/producers/update.php",['producer' => $producer]);
        require_once 'mvc/backend/views/layouts/main.php';
    }
    public function delete(){
        if(!isset($_GET["id"])|| !is_numeric($_GET["id"])){
            $_SESSION["error"] =" ID không hợp lệ";
            header('location:index.php?area=backend&controller=Producer');
            exit();
        }
        $id=$_GET["id"];
        $producer_model=new Producer();
        $producer_model->images($id);
        $is_delete=$producer_model->delete($id);
        if($is_delete)
        {
            $_SESSION["success"] = "Xóa thành công thương hiệu";
        }
        else
        {
            $_SESSION["error"] = " Xóa Thất Bại ";
        }
        header("location:index.php?area=backend&controller=Producer");
        exit();

    }
}