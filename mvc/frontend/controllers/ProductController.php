<?php
require_once 'mvc/frontend/models/Product.php';
require_once 'mvc/frontend/models/Category.php';
require_once 'mvc/frontend/models/Producer.php';

class ProductController extends Controller
{
    public function sellingProducts()
    {
        $products_model = new Product();
        $products = $products_model->sellingProducts();
        $this->content = $this->render("mvc/frontend/views/products/sellingProduct.php", ["products" => $products]);
        echo $this->content;
    }

    public function productcategory()
    {
        $id = $_GET["id"];
        $product_model = new Product();
        $category_model = new Category();
        $category = $category_model->getCategoryById($id);
        $products = $product_model->ProductCategory($id);
        $output = ["products" => $products,
            "category" => $category
        ];
        $this->content = $this->render("mvc/frontend/views/products/productcategory.php", $output);
        require_once 'mvc/frontend/views/layouts/main.php';
    }

    public function hotProduct()
    {
        $product_model = new Product();
        $products = $product_model->hotProduct();
        $countHotProduct = $product_model->countHotProduct();
        $this->content = $this->render("mvc/frontend/views/products/hotproduct.php", ["products" => $products, 'countHotProduct' => $countHotProduct]);
        echo $this->content;
    }


    

    public function NewsProduct()
    {
        $product_model = new Product();
        $products = $product_model->newProduct();
        $this->content = $this->render("mvc/frontend/views/products/newproduct.php", ["products" => $products]);
        echo $this->content;
    }

    public function productproducer()
    {
        $id = $_GET["id"];
        $product_model = new Product();
        $producer_model = new Producer();
        $producer = $producer_model->getProducerById($id);
        $products = $product_model->ProductProducer($id);
        $output = ["products" => $products,
            "producer" => $producer
        ];
        $this->content = $this->render("mvc/frontend/views/products/productproducer.php", $output);
        require_once 'mvc/frontend/views/layouts/main.php';
    }

    public function detail()
    {
        $id = $_GET["id"];
        $product_model = new Product();
        $product = $product_model->detailProduct($id);
        $product_images = $product_model->getImages($id);
        $this->content = $this->render("mvc/frontend/views/products/detailproduct.php", ["product" => $product,
            "product_images" => $product_images]);
        require_once "mvc/frontend/views/layouts/main.php";
    }

    public function searchProduct()
    {
        $id=isset($_POST['id']) ? $_POST['id'] : "";
        $query="";
        if (isset($_POST["brand"])) {
            $brand_filter = implode("','", $_POST["brand"]);
            $query .= " AND products.producer_id IN('" . $brand_filter . "')";
        }
        $product_model = new Product();
        $products = $product_model->ProductCategory($id,$query);
        $output = ["products" => $products,];
        $this->content = $this->render("mvc/frontend/views/products/search.php", $output);
        echo $this->content;
    }
    public function searchProductName(){
        if(isset($_POST["search"])){
            $search=$_POST["search"];
            $product_model=new Product();
            $products=$product_model->search($search);
            $this->content = $this->render("mvc/frontend/views/products/searchName.php", ['products' =>$products]);
            echo $this->content;
        }
    }
}