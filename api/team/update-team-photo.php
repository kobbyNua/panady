
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
  
   require __DIR__.'../../../configs/teams.php';
   require __DIR__.'../../../configs/file.upload.php';
    $team=new Teams();

    if($_SERVER['REQUEST_METHOD']==='POST'){
            //echo $_SERVER['REQUEST_METHOD'];
    
         if(isset($_FILES['photo'])&&isset($_POST['id'])){
              $upload=new Uploads($_FILES['photo']);
              $uploads=$upload->fileUpload();
            
              if($uploads==true){
                   $file=$team->updatePhoto($_POST['id'],$_FILES['photo']['name']); 
                   echo json_encode($file);
              }
            }
    }