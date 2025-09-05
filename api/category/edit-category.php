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
   if($_SERVER['REQUEST_METHOD']==='POST'){
      print_r($_POST);
      $id=htmlspecialchars(strip_tags($_POST['id']));
      $category_name=htmlspecialchars(strip_tags($_POST['category_name']));
      $res=$categories->editCategory($id,$category_name);
      echo $res;
       //$category_name=htmlspecialchars(strip_tags($_POST['category_name']));
      // echo $category_name;
      //$res=$categories->addCategory($category_name);
       //echo $res;

      
      
   }