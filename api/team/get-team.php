 <?php 
  // Prevent direct access to this file
 /* if(!defined('APP_STARTED')){
    die("Can't be accessed directly!");
  }*/

  header('Content-Type: application/json; charset=UTF-8');
  header('Access-Control-Allow-Origin: *');
  //http://'.$_SERVER['HTTP_HOST'] 
  header('Access-Control-Allow-Methods: POST, GET, OPTIONS');
  header('Access-Control-Allow-Headers: Content-Type, Authorization');
  
   require __DIR__.'../../../configs/teams.php';
  
   $teams=new Teams();

     
    //echo $_SERVER['REQUEST_METHOD'];
     if($_SERVER['REQUEST_METHOD']=='GET'){

        echo json_encode($teams->getTeamById($_GET['id']));
     }