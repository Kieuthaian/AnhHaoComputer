<?php
require_once 'mvc/frontend/models/News.php';
class NewsController extends Controller{
    public function hotNews(){
        $news_model=new News();
        $news=$news_model->hotNews();
        $countnews=$news_model->countHotNews();
        $this->content=$this->render('mvc/frontend/views/news/hotnews.php',['news' => $news,
            'countnews' => $countnews]);
        echo $this->content;
    }
    public function detail(){
        $id=$_GET['id'];
        $news_model=new News();
        $news=$news_model->detailNews($id);
        $output=[
            "news" => $news,
        ];
        $this->content=$this->render('mvc/frontend/views/news/detailNews.php',$output);
        require_once 'mvc/frontend/views/layouts/main.php';
    }
}