
<?php
  /*
*/
?>
<?php 
  // Prevent direct access to this file

  header('Content-Type: application/json; charset=UTF-8');
  header('Access-Control-Allow-Origin: *');
  //http://'.$_SERVER['HTTP_HOST'] 
  header('Access-Control-Allow-Methods: POST, GET, OPTIONS');
  header('Access-Control-Allow-Headers: Content-Type, Authorization');

   require __DIR__.'../../../configs/category.php';
   $categories=new Categories();

   echo json_encode($categories->fetchCategories());