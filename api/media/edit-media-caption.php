<?php
  // Prevent direct access to this file
/* if(!defined('APP_STARTED')){
    die("Can't be accessed directly!");
  }*/

    header('Content-Type: application/json; charset=UTF-8');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Authorization');

// Corrected the path to be more standard.
require __DIR__.'/../../configs/media.php';
require __DIR__.'/../../configs/file.upload.php';

$media = new Media();
//print_r($_POST);
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // The HTML form sh
    if(isset($_POST['caption'])&&isset($_POST['id'])){
           $edit_info = $media->editMediaCaptionById($_POST['caption'],$_POST['id']);
            echo $edit_info;
    
    }
}