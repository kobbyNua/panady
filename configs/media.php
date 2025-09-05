<?php 

class Media{
     
      public function __construct(){
            try{
               $this->conn=new PDO("mysql:host=127.0.0.1;dbname=panady;",'root','');
               $this->conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            }
             catch(PDOException $e){
                  echo $e->getMessage();
             }
      }
      public function viewMedia(){
        try{
            $stmt=$this->conn->prepare("SELECT * FROM media");
            $stmt->execute();
            $result=$stmt->fetchAll();
            return $result;
        }catch(PDOException $e){
            echo $e->getMessage();
        }
      }

      public function addMedia($capton,$photo,$type){
           try{
               $stmt=$this->conn->prepare("INSERT INTO media(caption, file_name, file_type) VALUES (:caption, :photo, :type)");
               $stmt->execute([
                   "caption" => $capton, // Corrected typo from "capton"
                   "photo"   => $photo,
                   "type"    => $type
               ]);
               return json_encode(['message'=>'success']);
           }catch(PDOException $e){
               echo $e->getMessage();
           }

      }
      public function getMediaById($id){
        try{
            $stmt=$this->conn->prepare("SELECT * FROM media WHERE id=:id");
            $stmt->execute(["id"=>$id]);
            $result=$stmt->fetchAll();
            return $result;
        }catch(PDOException $e){
            echo $e->getMessage();
        }

      }

      public function editMediaCaptionById($capton,$id){
        try{
            $stmt=$this->conn->prepare("UPDATE media SET caption=:caption WHERE id=:id");
            $stmt->execute([
                "caption" => $_POST['caption'],
                //"file_name" => $file_name,
                //"file_type" => $file_type,
                "id" => $id
            ]);
            return json_encode(['message'=>'success']);
        }catch(PDOException $e){
            echo $e->getMessage();
        }



      }


      public function editMediaPhotoById($photo,$type,$id){
           try{
               $stmt=$this->conn->prepare("UPDATE media SET file_name=:photo,file_type=:type WHERE id=:id");
               $stmt->execute([
                   "photo" => $photo,
                   "type" => $type,
                   "id" => $id
               ]);
               return ['status'=>'success','message'=>'success'];
           }
           catch(PDOException $exception){
               echo $exception->getMessage();
           }
      }


}