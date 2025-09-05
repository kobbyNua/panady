<?php require 'file.upload.php'?>

<form method="post" action="<?php echo $_SERVER['PHP_SELF']?>" enctype="multipart/form-data">
      <input type="file" name="photo">
      <button type="submit" name="">submit</button>
</form>

<?php

      if(isset($_FILES['photo'])){
           $files=new Uploads($_FILES['photo']);
            $files->fileUpload();
      }else{
        echo "error".$_FILES['photo'];
      }
?>