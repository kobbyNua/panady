<?php 
  // Prevent direct access to this file
  if(!defined('APP_STARTED')){
    die("Can't be accessed directly!");
  }
 
  header('Content-Type: application/json; charset=UTF-8');
  header('Access-Control-Allow-Origin: *');
  //http://'.$_SERVER['HTTP_HOST'] 
  header('Access-Control-Allow-Methods: POST, GET, OPTIONS');
  header('Access-Control-Allow-Headers: Content-Type, Authorization');
  
   require __DIR__.'../../../configs/media.php';
  // require __DIR__.'../../../configs/file.upload.php';
   $media=new Media();

     
    //echo $_SERVER['REQUEST_METHOD'];
     if($_SERVER['REQUEST_METHOD']=='GET'){
         if(isset($_GET['id'])){
              echo json_encode(['success'=>$media->getMediaById($_GET['id'])]);
         }
        
     }