<?php
  class Teams{

        public function __construct(){
            try{
              $this->conn=new PDO("mysql:host=127.0.0.1;dbname=panady;",'root','');
              $this->conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
     
             // $sql="CREATE DATABASE panady";
             // $this->conn->exec($sql);
              //echo 'succuess';
            }catch(PDOException $e){
                 echo $e->getMessage();
            }
        }
        
        public function getAllTeam(){
            
          $sql="SELECT * FROM teams";
          $stmt=$this->conn->prepare($sql);
          $stmt->execute();
          $result=$stmt->fetchAll();
          return ['data'=>$result];

        }

        public function getTeamById($id){
            $sql="SELECT * FROM teams WHERE id = :id";
            $stmt=$this->conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            $result=$stmt->fetchAll();
            return ['data' => $result];
        }

        public function createTeam($fullname,$role,$photo){
            $sql="INSERT INTO teams(`full_name`,`role`,`photo`) VALUES(:name, :role, :photo)";
            $stmt=$this->conn->prepare($sql);
            $stmt->bindParam(':name',$fullname);
            $stmt->bindParam(':role',$role);
            $stmt->bindParam(':photo',$photo);
            $stmt->execute();
            
            return True;
        }

        public function updateTeam($id,$fullname,$role){
            try{
            $sql="UPDATE teams SET full_name=:name,role=:role WHERE id=:id";
            $stmt=$this->conn->prepare($sql);
            $stmt->bindParam(':name',$fullname);
            $stmt->bindParam(':role',$role);
            $stmt->bindParam(':id',$id);
            $stmt->execute();
            return ['status' => 'success', 'message' => 'Team member updated successfully.'];
            }
            catch(PDOException $e){
                return ['status' => 'error', 'message' => $e->getMessage()];
            }
        }

        public function viewPhoto($id){
               $sql="SELECT photo FROM teams WHERE id = :id";
               $stmt=$this->conn->prepare($sql);
               $stmt->bindParam(':id',$id);
               $stmt->execute();
               $result=$stmt->fetch();

               return $result;
        
        }
   
        public function updatePhoto($id,$photo){
            try{

                     $sql="UPDATE teams SET photo = :photo WHERE id = :id";
                     $stmt=$this->conn->prepare($sql);
                     $stmt->bindParam(':photo',$photo);
                     $stmt->bindParam(':id',$id);
                     $stmt->execute();
                     return ['status' => 'success', 'message' => 'Photo updated successfully.'];


            }catch(PDOException $e){
                  return ['status' => 'error', 'message' => $e->getMessage()];
            }

        }

    }