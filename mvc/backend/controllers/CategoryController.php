<?php
require_once 'mvc/backend/models/Category.php';
class CategoryController extends Controller{
//    lấy ra tất cả danh mục
    public function index(){
        $category_model=new Category();
        $categories=$category_model->getAll();

        $this->content=$this->render('mvc/backend/views/categories/index.php',['categories'=>$categories]);
        require_once 'mvc/backend/views/layouts/main.php';
    }
//    thêm danh mục
    public function create(){
        $category_model=new Category();
        $categories=$category_model->getAll();
        if(isset($_POST['submit'])){
            $name = $_POST["name"];
            $content = $_POST['content'];
            $status = $_POST["status"];
            $avatar_file = $_FILES["avatar"];
            $hotcategory=isset($_POST["hotcategory"])? 1 : 0;
            $category_status=$_POST['category_status'];

            $category_title=$category_model->getCategory($name);
            if($category_title){
                $this->error='Tên danh mục đã tồn tại';
            }
            if(empty($this->error)){
                $avatar='';
                if($avatar_file['error']== 0){
                    $dir_uploads= __DIR__."/../../../assets/uploads/categories";
                    if(!file_exists($dir_uploads)){
                        mkdir($dir_uploads);
                    }
                    $avatar=time().'-'.$avatar_file["name"];
                    move_uploaded_file($avatar_file['tmp_name'],$dir_uploads.'/'.$avatar);
                }
                $category_model->name=$name;
                $category_model->category_status=$category_status;
                $category_model->content=$content;
                $category_model->status=$status;
                $category_model->avatar=$avatar;
                $category_model->hotcategory=$hotcategory;
                $is_insert=$category_model->insert();
                if($is_insert){
                    $_SESSION["success"] = " Thêm danh mục mới thành công !";
                }else{
                    $_SESSION["error"] = ' Thêm danh mục mới thất bại';
                }
                header("location:index.php?area=backend&controller=category");
                exit();
            }
        }
        $this->content=$this->render('mvc/backend/views/categories/create.php');
        require_once 'mvc/backend/views/layouts/main.php';
    }
    public function detail(){
        if(!isset($_GET['id']) || !is_numeric($_GET["id"])) {
            $_SESSION['error'] = "Id không hợp lệ";
            header('location:index.php?area=backend&controller=category');
            exit();
        }
            $id=$_GET["id"];
            $category_model=new Category();
            $categories=$category_model->getAll();
            $category=$category_model->getCategoryById($id);
            $this->content=$this->render('mvc/backend/views/categories/detail.php',['category' => $category]);
            require_once 'mvc/backend/views/layouts/main.php';
    }
    public function update(){
        if(!isset($_GET["id"]) || !is_numeric($_GET["id"])){
            $_SESSION['error'] = "Id không hợp lệ";
            header('location:index.php?area=backend&controller=category');
            exit();
        }
        $id=$_GET["id"];
        $category_model=new Category();
        $category=$category_model->getCategoryById($id);
        if(isset($_POST['submit'])){
            $name=$_POST["name"];
            $avatar_file=$_FILES["avatar"];
            $content=$_POST["content"];
            $hotcategory=isset($_POST["hotcategory"]) ? 1: 0;
            $status=$_POST["status"];
            $category_status=$_POST["category_status"];
            $category_title=$category_model->getCategory($name);
            $avatar=$category['avatar'];

            if(empty($this->error)){
                $avatar=$category['avatar'];
                if($avatar_file['error'] == 0){
                    $category_model->images($id);
                    $dir_upload=__DIR__."/../../../assets/uploads/categories";
                    if(!file_exists($dir_upload)){
                        mkdir($dir_upload);
                    }
                    $avatar=time()."-". $avatar_file["name"];
                    move_uploaded_file($avatar_file["tmp_name"],$dir_upload."/".$avatar);
                }
                $category_model->name = $name;
                $category_model->avatar = $avatar;
                $category_model->content = $content;
                $category_model->category_status=$category_status;
                $category_model->status = $status;
                $category_model->hotcategory=$hotcategory;
                $category_model->updated_at = date('Y-m-d H:i:s');
                $is_update = $category_model->update($id);
                if ($is_update) {
                    $_SESSION['success'] = 'Update danh mục thành công';
                } else {
                    $_SESSION['error'] = 'Update danh mục thất bại';
                }
                header("location:index.php?area=backend&controller=category");
                exit();
            }
        }
        $this->content=$this->render("mvc/backend/views/categories/update.php",['category' => $category]);
        require_once 'mvc/backend/views/layouts/main.php';
    }
//    xóa danh mục
    public function delete(){
        if(!isset($_GET["id"])|| !is_numeric($_GET["id"])){
            $_SESSION["error"] =" ID không hợp lệ";
            header('location:index.php?area=backend&controller=category');
            exit();
        }
        $id=$_GET["id"];
        $category_model=new Category();
        $category_model->images($id);
        $is_delete=$category_model->delete($id);
        if($is_delete)
        {
            $_SESSION["success"] = "Xóa thành công danh mục";
        }
        else
        {
            $_SESSION["error"] = " Xóa Thất Bại ";
        }
        header("location:index.php?area=backend&controller=category");
        exit();

    }
}