<?php
  // Prevent direct access to this file
  /*if(!defined('APP_STARTED')){
    die("Can't be accessed directly!");
  }*/
    header('Content-Type: application/json; charset=UTF-8');
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Methods: POST, GET, OPTIONS');
    header('Access-Control-Allow-Headers: Content-Type, Authorization');

    // Corrected the path to be more standard.
    require __DIR__.'/../../configs/users.php';
    require __DIR__.'/../../configs/file.upload.php';

    $users = new Users();
    //print_r($_POST);
    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
          //print_r($_GET);
          if(isset($_GET['id'])){
              $getuser=$users->getUser($_GET['id']);
              echo json_encode($getuser);

          }
    }