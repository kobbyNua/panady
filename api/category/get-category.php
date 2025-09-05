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
  
   require __DIR__.'../../../configs/category.php';
    $categories=new Categories();
    if($_SERVER['REQUEST_METHOD']==='GET' && isset($_GET['id']) && !empty($_GET['id'])){
         $id=htmlspecialchars(strip_tags($_GET['id']));
         $results=$categories->fetchCategory($id);
         echo json_encode(['data'=>$results['category_name']]);
    }