<?php

    header('Content-Type: application/json; charset=UTF-8');
  header('Access-Control-Allow-Origin: *');
  //http://'.$_SERVER['HTTP_HOST'] 
  header('Access-Control-Allow-Methods: POST, GET, OPTIONS');
  header('Access-Control-Allow-Headers: Content-Type, Authorization');
  
   require __DIR__.'../../../configs/login.php';
   $login =new Login();
   if($_SERVER['REQUEST_METHOD']==='POST'){
      if(isset($_POST['username']) && isset($_POST['password'])){
                 
                  $username=htmlspecialchars(strip_tags(trim($_POST['username'])));
                  $password=htmlspecialchars(strip_tags(trim($_POST['password'])));
                  $auth=$login->login($username,$password);
                  if($auth){
                      echo json_encode(['status'=>'success']);
                  }else{
                      echo json_encode(['status'=>'failed']);
                  }

                
      }

      $res=$categories->editCategory($id,$category_name);
      echo $res;
   }
      ?>