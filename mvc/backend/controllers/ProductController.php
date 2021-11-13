<?php
require_once 'mvc/backend/models/Category.php';
require_once 'mvc/backend/models/Product.php';
require_once 'mvc/backend/models/Producer.php';
require_once 'mvc/backend/models/product_images.php';
class ProductController extends Controller{
    public function index(){
        $pageSize=10;
        $page="";
        if(isset($_POST["page"]) && is_numeric($_POST["page"]))
        {
            $page=$_POST["page"];
        }
        else
        {
            $page=1;
        }
        $product_model=new Product();
        $countProduct=$product_model->countTotal();
        $numPage=ceil($countProduct/$pageSize);
        $product_model=new product();
        $products=$product_model->getAll($pageSize,$page);
        $output=[
            "products" => $products,
            "numPage" => $numPage,
            "page" => $page
        ];
                $this->content=$this->render('mvc/backend/views/products/index.php',$output);
        require_once "mvc/backend/views/layouts/main.php";
    }
//    search sản phẩm
    public function search()
    {
        $pageSize=10;
        $page="";

        if(isset($_POST["page"]) && is_numeric($_POST["page"]))
        {
            $page=$_POST["page"];
        }
        else
        {
            $page=1;
        }
        $product_model=new Product();
        if(isset($_POST["query"]) && $_POST["query"] != "")
        {
            $search=$_POST["query"];
            $countProductSearch=$product_model->countTotalSearch($search);
            $numPage=ceil($countProductSearch/$pageSize);
            $products=$product_model->search($search,$pageSize,$page);
            $this->content=$this->render("mvc/backend/views/products/search.php", [
                "products" => $products,
                "numPage" => $numPage,
                "page" => $page]);
            echo $this->content;
        }
        else
        {
            $countProduct=$product_model->countTotal();
            $numPage=ceil($countProduct/$pageSize);
            $products=$product_model->getAll($pageSize,$page);
            $this->content=$this->render("mvc/backend/views/products/search.php", ["products" => $products,
                "numPage" => $numPage,
                "page" => $page]);
                echo $this->content;
        }

    }
    public function detail(){
        if(!isset($_GET["id"]) || !is_numeric($_GET["id"])) {
            $_SESSION["error"] = "ID không hợp lệ";
            header("location:index.php?area=backend&controller=product");
            exit();
        }
            $id=$_GET["id"];
            $product_model=new Product();
            $product_images=new product_images();
            $product=$product_model->getById($id);
            $product_image=$product_images->get_images($id);
            $this->content=$this->render('mvc/backend/views/products/detail.php',["product" => $product,
                                                                                    "product_image" => $product_image]);
            require_once "mvc/backend/views/layouts/main.php";
    }
// thêm sản phẩm mới
    public function create(){
        $category_model=new Category();
        $categories=$category_model->getCategoryProduct();
        $producer_model=new Producer();
        $producers=$producer_model->getAll();
        if(isset($_POST['submit'])){
            $title=$_POST["title"];
            $avatar_file=$_FILES["avatar"];
            $avatars=$_FILES["avatars"];
            $summary=$_POST["summary"];
            $hard_drive=$_POST['hard_drive'];
            $ram=$_POST['ram'];
            $present=$_POST['present'];
            $content=$_POST["content"];
            $category_id=$_POST["category_id"];
            $producer_id=$_POST["producer_id"];
            $product_year=$_POST['product_year'];
            $price=$_POST["price"];
            $discount=$_POST["discount"];
            $quality=$_POST['quality'];
            $status=$_POST["status"];
            $hotproduct=isset($_POST["hotproduct"]) ? 1 : 0;
            foreach($avatars['name'] as $key=>$value){
                $avatar_name = $avatars['name'][$key];
                $tmp_name   = $avatars['tmp_name'][$key];
                $error      = $avatars['error'][$key];
                $extension_arr = ["jpg", "png", "gif", "jpeg"];
                $extension = pathinfo($avatar_name, PATHINFO_EXTENSION);
                $extension = strtolower($extension);
                if($error ==0){
                    if (!in_array($extension, $extension_arr)) {
                        $this->error = " * Đã có 1 or nhiều file không phải file ảnh.Chỉ được tải file các ảnh jpg,png,jpeg,gif";
                    }
                }
            }
            $product_model=new Product();
            $product_title=$product_model->getProduct($title);
            if($product_title){
                $this->error=" * Tên sản phẩm đã tồn tại trên hệ thống";
            }
            if(empty($this->error)){
                $avatar='';
                if($avatar_file['error']== 0){
                    $dir_uploads= __DIR__."/../../../assets/uploads/products";
                    if(!file_exists($dir_uploads)){
                        mkdir($dir_uploads);
                    }
                    $avatar=time().'-'.$avatar_file["name"];
                    move_uploaded_file($avatar_file['tmp_name'],$dir_uploads.'/'.$avatar);
                }
                $product_model->category_id = $category_id;
                $product_model->title = $title;
                $product_model->avatar = $avatar;
                $product_model->product_year=$product_year;
                $product_model->price = $price;
                $product_model->hard_drive=$hard_drive;
                $product_model->ram=$ram;
                $product_model->present=$present;
                $product_model->quality = $quality;
                $product_model->hotproduct = $hotproduct;
                $product_model->summary = $summary;
                $product_model->content = $content;
                $product_model->status = $status;
                $product_model->producer_id=$producer_id;
                $product_model->discount = $discount;
                $product_id = $product_model->insert();
                if ($product_id > 0) {
                    $product_images_model = new product_images();
                    $product_images_model->product_id = $product_id;
                    for ($i = 0; $i < count($avatars["name"]); $i++) {
                        if ($avatars["error"][$i] == 0) {
                            $avatars_insert = time() . '-' . $avatars["name"][$i];
                            $product_images_model->avatar=$avatars_insert;
                            $is_insert = $product_images_model->insert();
                            $dir_uploads = __DIR__ . '/../../../assets/uploads/product_images';
                            if (!file_exists($dir_uploads)) {
                                mkdir($dir_uploads);
                            }
                            move_uploaded_file($avatars['tmp_name'][$i], $dir_uploads . '/' . $avatars_insert);
                        }
                    }
                }
                if ($product_id) {
                    $_SESSION['success'] = 'Thêm sản phẩm thành công';
                } else {
                    $_SESSION['error'] = 'Thêm sản phẩm thất bại';
                }
                header('Location: index.php?area=backend&controller=product');
                exit();
            }
        }
        $this->content=$this->render('mvc/backend/views/products/create.php',['categories'=>$categories,
                                                                                  'producers' => $producers]);
        require_once "mvc/backend/views/layouts/main.php";
    }
//    chỉnh sửa sản phẩm
    public function update()
    {
        $id = $_GET["id"];
        if (!isset($id) || !is_numeric($id)) {
            $_SESSION["error"] = " ID không hợp lệ";
            header("location:index.php?area=backend&controller=product");
            exit();
        }
        $product_model = new Product();
        $product = $product_model->getById($id);
        $producer_model=new Producer();
        $producers=$producer_model->getAll();
        $category_model=new Category();
        $categories=$category_model->getCategoryProduct();
        $product_images_model = new product_images();
        $product_image = $product_images_model->get_images($id);
        if (isset($_POST['submit'])) {
            $title = $_POST["title"];
            $avatar_file = $_FILES["avatar"];
            $avatars = $_FILES["avatars"];
            $summary = $_POST["summary"];
            $hard_drive=$_POST['hard_drive'];
            $ram=$_POST['ram'];
            $present=$_POST['present'];
            $content = $_POST["content"];
            $product_year=$_POST["product_year"];
            $producer_id=$_POST["producer_id"];
            $category_id = $_POST["category_id"];
            $price = $_POST["price"];
            $discount = $_POST["discount"];
            $quality = $_POST['quality'];
            $status = $_POST["status"];
            $hotproduct = isset($_POST["hotproduct"]) ? 1 : 0;
            foreach ($avatars['name'] as $key => $value) {
                $avatar_name = $avatars['name'][$key];
                $tmp_name = $avatars['tmp_name'][$key];
                $error = $avatars['error'][$key];
                $extension_arr = ["jpg", "png", "gif", "jpeg"];
                $extension = pathinfo($avatar_name, PATHINFO_EXTENSION);
                $extension = strtolower($extension);
                if($error == 0){
                    if (!in_array($extension, $extension_arr)) {
                        $this->error = " * Đã có 1 or nhiều file không phải file ảnh.Chỉ được tải file các ảnh jpg,png,jpeq,gif";
                    }
                }
            }
            if (empty($this->error)) {
                $avatar = $product["avatar"];
                if ($avatar_file['error'] == 0) {
                    $product_model->images($id);
                    $dir_uploads = __DIR__ . "/../../../assets/uploads/products";
                    if (!file_exists($dir_uploads)) {
                        mkdir($dir_uploads);
                    }
                    $avatar = time() . '-' . $avatar_file["name"];
                    move_uploaded_file($avatar_file['tmp_name'], $dir_uploads . '/' . $avatar);
                }
                $product_model->category_id = $category_id;
                $product_model->producer_id=$producer_id;
                $product_model->title = $title;
                $product_model->avatar = $avatar;
                $product_model->hard_drive=$hard_drive;
                $product_model->ram=$ram;
                $product_model->present=$present;
                $product_model->product_year=$product_year;
                $product_model->price = $price;
                $product_model->quality = $quality;
                $product_model->hotproduct = $hotproduct;
                $product_model->summary = $summary;
                $product_model->content = $content;
                $product_model->status = $status;
                $product_model->discount = $discount;
                $product_model->updated_at=date('Y-m-d H:i:s');
                $is_update = $product_model->update($id);
                if(!empty($avatars["name"][0]))
                {
                   $product_images_model->detail_images($id);
                }
                for ($i = 0; $i < count($avatars["name"]); $i++) {
                    if ($avatars["error"][$i] == 0) {
                        $product_images_model->product_id = $id;
                        $avatars_insert = time() . '-' . $avatars["name"][$i];
                        $product_images_model->avatar = $avatars_insert;
                        $is_insert = $product_images_model->insert();
                        $dir_uploads = __DIR__ . '/../../../assets/uploads/product_images';
                        if (!file_exists($dir_uploads)) {
                            mkdir($dir_uploads);
                        }
                        move_uploaded_file($avatars['tmp_name'][$i], $dir_uploads . '/' . $avatars_insert);
                    }
                }
                if ($is_update) {
                    $_SESSION['success'] = 'Sửa sản phẩm thành công';
                } else {
                    $_SESSION['error'] = 'Sửa sản phẩm thất bại';
                }
                header('Location: index.php?area=backend&controller=product');
                exit();
            }
        }
        $output=[
            "product" => $product,
            "product_image" => $product_image,
            "categories" => $categories,
            'producers' => $producers
        ];
        $this->content=$this->render('mvc/backend/views/products/update.php',$output);
        require_once 'mvc/backend/views/layouts/main.php';
    }
    public function delete()
    {
        if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
            $_SESSION['error'] = 'ID không hợp lệ';
            header('location: index.php?area=backend&controller=product');
            exit();
        }
        $id = $_GET['id'];
        $product_model = new Product();
        $product_model->images($id);
        $is_delete = $product_model->delete($id);
        $product_images_model=new product_images();
        $product_images_model->detail_images($id);
        if ($is_delete) {
            $_SESSION['success'] = 'Xóa dữ liệu thành công';
        } else {
            $_SESSION['error'] = 'Xóa dữ liệu thất bại';
        }
        header('Location: index.php?area=backend&controller=product');
        exit();
    }

}
