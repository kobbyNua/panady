<?php
     class Users{
          

            public function __construct(){
            try{
               $this->conn=new PDO("mysql:host=127.0.0.1;dbname=panady;",'root','');
               $this->conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
             }
             catch(PDOException $e){
                  echo $e->getMessage();
             }
            }

            public function viewUsers(){
               try{
                  $sql="SELECT id,full_name,username FROM users";
                  $stmt=$this->conn->prepare($sql);
                  $stmt->execute();
                  return $stmt->fetchAll(PDO::FETCH_ASSOC);
               }
               catch(PDOException $e){
                  echo $e->getMessage();
               }
            }


            public function addUser($fullName,$username,$password){
               try{

                      $sql="INSERT INTO users(full_name, username, password) VALUES (:fullName, :username, :password)";
                      $stmt=$this->conn->prepare($sql);
                      $stmt->execute(['fullName' => $fullName,'username' => $username,'password' =>password_hash($password,PASSWORD_BCRYPT)]);
                      $last_id=$this->conn->lastInsertId();
                      $get_token=$this->generateToken($last_id);
                      if($get_token){
                           return ['status'=>'success','message'=>'User added successfully'];
                      }
                      return ['status'=>'error','message'=>'Error adding user'];
               }
               catch(PDOException $e){
                  return ['status'=>'error','message'=> $e->getMessage()];
               }
            }
            
            public function generateToken($id){
                try{
                    // Generate a secure, random token
                    $token = bin2hex(random_bytes(32)); // 64 characters
                    $sql = "UPDATE users SET token = :token WHERE id = :id";
                    $stmt = $this->conn->prepare($sql);
                    $stmt->execute(['token' => $token, 'id' => $id]);
                    // Check if the update was successful
                    if($stmt->rowCount() > 0){
                        //return $token;
                        return true;
                    }
                    return false;
                }
                catch(PDOException $e){
                   echo $e->getMessage();
                }
            }
            public function updateUser($id, $fullName, $username){
               try{
                   $sql="UPDATE users SET full_name=:fullName, username=:username WHERE id=:id";
                   $stmt=$this->conn->prepare($sql);
                   $stmt->execute(['id' => $id, 'fullName' => $fullName, 'username' => $username]);

                   if ($stmt->rowCount() > 0) {
                       return ['success' => true, 'message' => 'User updated successfully.'];
                   }
                   return ['success' => false, 'message' => 'User data was not changed or user not found.'];
               }
               catch(PDOException $e){
                  return ['success' => false, 'message' => $e->getMessage()];
               }
            }


            
            public function getUser($id){
                  try{
                       $sql="SELECT * FROM users WHERE id=:id";
                       $stmt=$this->conn->prepare($sql);
                       $stmt->execute(['id' => $id]);
                       $reults=$stmt->fetchAll();
                       //echo $reults;
                       return $reults;

                  }
                  catch(PDOException $e){
                     echo $e->getMessage();
                  }
            }
     }