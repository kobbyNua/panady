<?php

 
            
         class Articles{
            public function __construct(){
                try{
                  $this->conn=new PDO("mysql:host=localhost;dbname=panady;",'root','');
                  $this->conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                }
                catch(PDOException $e){
                     echo $e->getMessage();
                }
            }
            public function fetchArticles(){
                try{
                   $sql="SELECT * FROM articles";
                   $stmt=$this->conn->prepare($sql);
                   $stmt->execute();
                   return $stmt->fetchAll(PDO::FETCH_ASSOC);
                }catch(PDOException $e){
                     echo $e->getMessage();
                }
            }

            public function addArticle($content_id,$article_type_id){
            
                  try{
                     $sql="INSERT INTO articles(general_content_id,article_types_id) VALUES(:content_id,:article_type_id)";
                     $stmt=$this->conn->prepare($sql);
                     $stmt->bindParam(':content_id',$content_id);
                     $stmt->bindParam(':article_type_id',$article_type_id);
                     return $stmt->execute();
                  }catch(PDOException $e){
                         echo $e->getMessage();
                  }
            }

            public function editArticle($id,$content_id,$article_type_id){
                  try{
                     $sql="UPDATE articles SET general_content_id=:content_id,article_types_id=:article_type_id WHERE id=:id";
                     $stmt=$this->conn->prepare($sql);
                     $stmt->bindParam(':id',$id);
                     $stmt->bindParam(':content_id',$content_id);
                     $stmt->bindParam(':article_type_id',$article_type_id);
                     return $stmt->execute();
                  }catch(PDOException $e){
                         echo $e->getMessage();
                  }
            }

            public function deleteArticle($id){
                  try{
                     $sql="DELETE FROM articles WHERE id=:id";
                     $stmt=$this->conn->prepare($sql);
                     $stmt->bindParam(':id',$id);
                     return $stmt->execute();
                  }catch(PDOException $e){
                         echo $e->getMessage();
                  }
            }

            public function getArticle($id){
                  try{
                     $sql="SELECT * FROM articles WHERE general_content_id=:id";
                     $stmt=$this->conn->prepare($sql);
                     $stmt->bindParam(':id',$id);
                     $stmt->execute();
                     return $stmt->fetchAll();
                     echo 'fine';
                  }catch(PDOException $e){
                        return  ['error' => $e->getMessage()];
                  }
            }

            public function getArticleContent($content_id,$article_type_id){
                  try{
                     $sql="SELECT * FROM articles WHERE general_content_id=:general_content_id AND article_types_id=:article_types_id";
                     $stmt=$this->conn->prepare($sql);
                     $stmt->bindParam(':general_content_id',$content_id);
                     $stmt->bindParam(':article_types_id',$article_type_id);
                     $stmt->execute();
                     $data=$stmt->fetchAll();
                    
                     $data=json_encode(['data'=>$data]);
                     return $data;
                  }catch(PDOException $e){
                         return  ['error' => $e->getMessage()];
                  }
            }

         }
         
         //$articles=new Articles();
         //$get=$articles->getArticle(11);
         //print_r($get);