 <?php 
  header('Content-Type: application/json; charset=UTF-8');
  header('Access-Control-Allow-Origin: *');
  //http://'.$_SERVER['HTTP_HOST'] 
  header('Access-Control-Allow-Methods: POST, GET, OPTIONS');
  header('Access-Control-Allow-Headers: Content-Type, Authorization');
  
   require __DIR__.'../../../configs/teams.php';
   require __DIR__.'../../../configs/file.upload.php';
    $team=new Teams();
    
    //echo $_SERVER['REQUEST_METHOD'];
     if($_SERVER['REQUEST_METHOD']==='POST'){ 
        if(isset($_FILES['id'])&&isset($_POST['fullname'])&&($_POST['role'])){
             echo $team->updateTeam($id,$fullname,$role);
        }

     }

    ?>