<?php 
  // Prevent direct access to this file
 /* if(!defined('APP_STARTED')){
    die("Can't be accessed directly!");
  }*/
  header('Content-Type: application/json; charset=UTF-8');
  header('Access-Control-Allow-Origin: *');
  //http://'.$_SERVER['HTTP_HOST'] 
  header('Access-Control-Allow-Methods: POST, GET, OPTIONS');
  header('Access-Control-Allow-Headers: Content-Type, Authorization');
  
   require __DIR__.'../../../../configs/articleType.php';

   $article_types=new ArticleTypes();
   if($_SERVER['REQUEST_METHOD']==='POST'){
        $id=htmlspecialchars(strip_tags($_POST['id']));
        $type_name=htmlspecialchars(strip_tags($_POST['article_type_name']));
        $res=$article_types->updateArticleType($id,$type_name);
        echo $res;
        //$res=$article_types->addArticleType($type_name);
        //echo $res;
    
   }
        // $type_name=htmlspecialchars(strip_tags($data['type_name']));
        ;
     /* $data=json_decode(file_get_contents("php://input"),true);
      if(!empty($data['type_name'])){
          $type_name=htmlspecialchars(strip_tags($data['type_name']));
          echo json_encode($article_types->addArticleType($type_name));
      }else{
          echo json_encode(array('status'=>false,'message'=>'Type name is required'));
      }*/