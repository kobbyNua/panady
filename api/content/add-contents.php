<?php
  // Prevent direct access to this file
  /*if(!defined('APP_STARTED')){
    die("Can't be accessed directly!");
  } */
  header('Content-Type: application/json; charset=UTF-8');
  header('Access-Control-Allow-Origin: *');
  //http://'.$_SERVER['HTTP_HOST'] 
  header('Access-Control-Allow-Methods: POST, GET, OPTIONS');
  header('Access-Control-Allow-Headers: Content-Type, Authorization');
  
   require __DIR__.'../../../configs/contents.php';
   require __DIR__.'../../../configs/file.upload.php';
    $content=new Contents();
    
    //echo $_SERVER['REQUEST_METHOD'];
     if($_SERVER['REQUEST_METHOD']==='POST'){ 
         if(isset($_FILES['photo'])){
              $upload=new Uploads($_FILES['photo']);
              $uploads=$upload->fileUpload();
              $banner_status='';
              $articles_status='';
              if($uploads==true){
                  if(isset($_POST['title'])&&isset($_POST['category'])&&isset($_POST['content'])){
               
                     

                       if((!isset($_POST['banner']))&&(!isset($_POST['aticlesele']))){
                             $banner_status='0';
                             $articles_status='';
                       }
                       elseif((isset($_POST['banner']))&&(!isset($_POST['aticlesele']))){
                             $banner_status='1';
                             $articles_status='';
                       }
                       elseif((!isset($_POST['banner']))&&(isset($_POST['aticlesele']))){
                             $banner_status='0';
                             $articles_status=$_POST['aticlesele'];
                       }
                       else{
                             $banner_status='1';
                             $articles_status=$_POST['aticlesele'];
                       }
                     $url_slug=trim(str_replace(' ','-',$_POST['title']));
                     //$articles_status;
                     $create_content=$content->createContent($_POST['title'],$_POST['category'],$url_slug,$_FILES['photo']['name'],$banner_status,$articles_status,$_POST['content']);
                     echo $create_content;
                  }
              }else{

              }

             // echo (int)$banner_status;
              //echo $articles_status;
             // $create_content=$content->createContent($_POST['title'],$categories_id,$urls,$photo,$banner,$aticles_status,$content);

         }
          
          //echo json_encode(['status'=>$upload->fileUpload()]);

     }