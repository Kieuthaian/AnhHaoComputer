<?php
require_once 'mvc/backend/models/News.php';
class NewsController extends Controller{
    //    lấy ra tất cả danh mục
    public function index(){
        $news_model=new News();
        $news=$news_model->getAll();
        $this->content=$this->render('mvc/backend/views/news/index.php',['news'=>$news]);
        require_once 'mvc/backend/views/layouts/main.php';
    }
//    thêm danh mục
    public function create(){
        $news_model=new News();
        $categories=$news_model->getCategoryNews();
        if(isset($_POST['submit'])){
            $name = $_POST["name"];
            $summary=$_POST["summary"];
            $content = $_POST['content'];
            $status = $_POST["status"];
            $avatar_file = $_FILES["avatar"];
            $hotnews=isset($_POST["hotnews"])? 1 : 0;
            $category_id=$_POST['category_id'];
            $news_title=$news_model->getNews($name);
            if($news_title){
                $this->error='Tên tin tức này đã tồn tại';
            }
            if(empty($this->error)){
                $avatar='';
                if($avatar_file['error']== 0){
                    $dir_uploads= __DIR__."/../../../assets/uploads/news";
                    if(!file_exists($dir_uploads)){
                        mkdir($dir_uploads);
                    }
                    $avatar=time().'-'.$avatar_file["name"];
                    move_uploaded_file($avatar_file['tmp_name'],$dir_uploads.'/'.$avatar);
                }
                $news_model->name=$name;
                $news_model->category_id=$category_id;
                $news_model->summary=$summary;
                $news_model->content=$content;
                $news_model->status=$status;
                $news_model->avatar=$avatar;
                $news_model->hotnews=$hotnews;
                $is_insert=$news_model->insert();
                if($is_insert){
                    $_SESSION["success"] = " Thêm tin tức mới thành công !";
                }else{
                    $_SESSION["error"] = ' Thêm tin tức mới thất bại';
                }
                header("location:index.php?area=backend&controller=news");
                exit();
            }
        }
//        $list_tree=$this->data_tree($news);
        $this->content=$this->render('mvc/backend/views/news/create.php',["categories" => $categories]);
        require_once 'mvc/backend/views/layouts/main.php';
    }
    public function detail(){
        if(!isset($_GET['id']) || !is_numeric($_GET["id"])) {
            $_SESSION['error'] = "Id không hợp lệ";
            header('location:index.php?area=backend&controller=news');
            exit();
        }
        $id=$_GET["id"];
        $news_model=new News();
        $news=$news_model->getNewsById($id);
        $this->content=$this->render('mvc/backend/views/news/detail.php',['news' => $news]);
        require_once 'mvc/backend/views/layouts/main.php';
    }
    public function update(){
        if(!isset($_GET["id"]) || !is_numeric($_GET["id"])){
            $_SESSION['error'] = "Id không hợp lệ";
            header('location:index.php?area=backend&controller=news');
            exit();
        }
        $id=$_GET["id"];
        $news_model=new News();
        $categories=$news_model->getCategoryNews();
        $news=$news_model->getNewsById($id);
        if(isset($_POST['submit'])){
            $name=$_POST["name"];
            $avatar_file=$_FILES["avatar"];
            $summary=$_POST["summary"];
            $content=$_POST["content"];
            $hotnews=isset($_POST["hotnews"]) ? 1: 0;
            $status=$_POST["status"];
            $category_id=$_POST["category_id"];
            $avatar=$news['avatar'];
            if(empty($this->error)){
                $avatar=$news['avatar'];
                if($avatar_file['error'] == 0){
                    $news_model->images($id);
                    $dir_upload=__DIR__."/../../../assets/uploads/news";
                    if(!file_exists($dir_upload)){
                        mkdir($dir_upload);
                    }
                    $avatar=time()."-". $avatar_file["name"];
                    move_uploaded_file($avatar_file["tmp_name"],$dir_upload."/".$avatar);
                }
                $news_model->name=$name;
                $news_model->category_id=$category_id;
                $news_model->summary=$summary;
                $news_model->content=$content;
                $news_model->status=$status;
                $news_model->avatar=$avatar;
                $news_model->hotnews=$hotnews;
                $news_model->updated_at = date('Y-m-d H:i:s');
                $is_update = $news_model->update($id);
                if ($is_update) {
                    $_SESSION['success'] = 'Update tin tức thành công';
                } else {
                    $_SESSION['error'] = 'Update tin tức thất bại';
                }
                header("location:index.php?area=backend&controller=news");
                exit();
            }
        }
        $this->content=$this->render("mvc/backend/views/news/update.php",['news' => $news,
                                                                               "categories" => $categories]);
        require_once 'mvc/backend/views/layouts/main.php';
    }
//    xóa danh mục
    public function delete(){
        if(!isset($_GET["id"])|| !is_numeric($_GET["id"])){
            $_SESSION["error"] =" ID không hợp lệ";
            header('location:index.php?area=backend&controller=news');
            exit();
        }
        $id=$_GET["id"];
        $news_model=new News();
        $news_model->images($id);
        $is_delete=$news_model->delete($id);
        if($is_delete)
        {
            $_SESSION["success"] = "Xóa thành công tin tức";
        }
        else
        {
            $_SESSION["error"] = " Xóa Thất Bại ";
        }
        header("location:index.php?area=backend&controller=news");
        exit();

    }
}