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
  
   require __DIR__.'../../../configs/contents.php';
   require __DIR__.'../../../configs/file.upload.php';
    $content=new Contents();

    if($_SERVER['REQUEST_METHOD']==='POST'){
                    if(isset($_POST['title'])&&isset($_POST['category'])&&isset($_POST['content'])&&isset($_POST['id'])){
               
                     

                       if((!isset($_POST['banner']))&&(!isset($_POST['editAticlesele']))){
                             $banner_status='0';
                             $articles_status='';
                       }
                       elseif((isset($_POST['banner']))&&(!isset($_POST['editAticlesele']))){
                             $banner_status='1';
                             $articles_status='';
                       }
                       elseif((!isset($_POST['banner']))&&(isset($_POST['editAticlesele']))){
                             $banner_status='0';
                             $articles_status=$_POST['editAticlesele'];
                       }
                       else{
                             $banner_status='1';
                             $articles_status=$_POST['editAticlesele'];
                       }
                     $url_slug=trim(str_replace(' ','-',$_POST['title']));
                     $edit_content=$content->editContent($_POST['title'],$_POST['category'],$url_slug,$banner_status,$articles_status,$_POST['content'],$_POST['id']);
                     echo $edit_content;
                    
                     //$articles_status;
                     //$create_content=$content->createContent($_POST['title'],$_POST['category'],$url_slug,$_FILES['photo']['name'],$banner_status,$articles_status,$_POST['content']);
                    // echo $create_content;
                  }
    }