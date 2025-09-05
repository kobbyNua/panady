<?php
require 'file.upload.php';


      if(isset($_FILES['photo'])){
            echo 'fine';
      }else{
        echo "error ".$_FILES['photo'];
      }
      

//$files=new Uploads($_FILES['photo']);
            //$files->fileUpload();

?>