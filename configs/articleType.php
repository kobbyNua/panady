<?php

   class ArticleTypes{
       
       public function __construct(){
           try{
               $this->conn=new PDO("mysql:host=127.0.0.1;dbname=panady;",'root','');
               $this->conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            }
             catch(PDOException $e){
                  echo $e->getMessage();
             }
         }

         public function addArticleType($type_name){
                try{
                     $sql="INSERT INTO articles_types(types)VALUES(:type_name)";
                     $stmt=$this->conn->prepare($sql);
                     $stmt->bindParam(':type_name',$type_name);
                     $stmt->execute();
                     return json_encode(["status"=>"success","message"=>"Article type added successfully"]);
                }catch(PDOException $e){
                      return json_encode(['status'=>'error','message'=>$e->getMessage()]);
                }
            }
            public function fetchArticleTypes(){
                    try{
                        $sql="SELECT * FROM articles_types";
                        $stmt=$this->conn->prepare($sql);
                        $stmt->execute();
                        $result=$stmt->fetchAll();
                        return $result;
                    }catch(PDOException $e){
                        return json_encode(['status'=>'error','error'=>$e->getMessage()]);
                    }
            }

            public function fetchArticleType($id){
                    try{
                        $sql="SELECT * FROM articles_types WHERE id=:id";
                        $stmt=$this->conn->prepare($sql);
                        $stmt->bindParam(':id',$id);
                        $stmt->execute();
                        $result=$stmt->fetch(PDO::FETCH_ASSOC);
                        return $result;
                    }catch(PDOException $e){
                        return json_encode(['status'=>'error','error'=>$e->getMessage()]);
                    }
            }

            public function deleteArticleType($id){
                    try{
                        $sql="DELETE FROM articles_types WHERE id=:id";
                        $stmt=$this->conn->prepare($sql);
                        $stmt->bindParam(':id',$id);
                        $stmt->execute();
                        echo "success";
                    }catch(PDOException $e){
                        return json_encode(['status'=>'error','error'=>$e->getMessage()]);
                    }
            }

            public function updateArticleType($id,$type_name){
                    try{
                        $sql="UPDATE articles_types SET types=:type_name WHERE id=:id";
                        $stmt=$this->conn->prepare($sql);
                        $stmt->bindParam(':id',$id);
                        $stmt->bindParam(':type_name',$type_name);
                        $stmt->execute();
                        return json_encode(['status'=>'success','message'=>'Article type updated successfully']);
                    }catch(PDOException $e){
                        return json_encode(['status'=>'error','error'=>$e->getMessage()]);
                    }
            }


        }