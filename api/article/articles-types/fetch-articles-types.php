<?php 
  // Prevent direct access to this file
  /*if(!defined('APP_STARTED')){
    die("Can't be accessed directly!");
  }*/
  header('Content-Type: application/json; charset=UTF-8');
  header('Access-Control-Allow-Origin: *');
  //http://'.$_SERVER['HTTP_HOST'] 
  header('Access-Control-Allow-Methods: POST, GET, OPTIONS');
  header('Access-Control-Allow-Headers: Content-Type, Authorization');
  
     require __DIR__.'../../../../configs/articleType.php';

   $article_types=new ArticleTypes();
    echo json_encode($article_types->fetchArticleTypes());
  