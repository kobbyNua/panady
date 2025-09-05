<?php
   require __DIR__.'../articles.php';
    
    class Contents extends Articles{
          public function __construct(){
            try{
               $this->conn=new PDO("mysql:host=127.0.0.1;dbname=panady;",'root','');
               $this->conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            }
             catch(PDOException $e){
                  echo $e->getMessage();
             }
          }
   
          public function createContent($title,$categories_id,$urls,$photo,$banner,$aticles_status,$content){

                   // echo $aticles_status;
                     $get_categories=$this->getCategories($categories_id);
                     $category=$get_categories[0];

                     if(strtolower($category['category_name'])=='articles'){
                          $add_content=$this->addContents($title,$categories_id,$urls,$photo,$banner,$content);
                          $articles=$this->createArticle($add_content,$aticles_status);
                          return $articles;
                     }else{
                        //ontime
                        $add_content=$this->addContent($title,$categories_id,$urls,$photo,$banner,$content);
                        return $add_content;
                     }
          }
          public function getCategories($id){
                  try{
                     $sql="SELECT * FROM categories WHERE id=:id";
                     $stmt=$this->conn->prepare($sql);
                     $stmt->bindParam(':id',$id);
                     $stmt->execute();
                     $result=$stmt->fetchAll();
                     return $result;
                  }
                  catch(PDOException $e){
                        echo json_encode(['status'=>'error','error'=>$e]);
                  }

          }
         public function addContent($title,$categories_id,$urls,$photo,$banner,$content){
                try{
                      $sql="INSERT INTO general_content(title,categories_id,urls,photo,banner,content)VALUES(:title,:categories_id,:urls,:photo,:banner,:content)";
                      $stmt=$this->conn->prepare($sql);
                      $stmt->bindParam(':title',$title);
                      $stmt->bindParam(':categories_id',$categories_id);
                      $stmt->bindParam(':urls',$urls);
                      $stmt->bindParam(':photo',$photo);
                      $stmt->bindParam(':banner',$banner);
                      $stmt->bindParam(':content',$content);
                      $stmt->execute();
                     // $last_inserted_id=$this->conn->lastInsertedId();
                      echo json_encode(['status'=>'success','message'=>"item added succesfully"]);
                }catch(PDOException $e){
                     echo $e->getMessage();
                }
          }
          public function addContents($title,$categories_id,$urls,$photo,$banner,$content){
                try{
                      $sql="INSERT INTO general_content(title,categories_id,urls,photo,banner,content)VALUES(:title,:categories_id,:urls,:photo,:banner,:content)";
                      $stmt=$this->conn->prepare($sql);
                      $stmt->bindParam(':title',$title);
                      $stmt->bindParam(':categories_id',$categories_id);
                      $stmt->bindParam(':urls',$urls);
                      $stmt->bindParam(':photo',$photo);
                      $stmt->bindParam(':banner',$banner);
                      $stmt->bindParam(':content',$content);
                      $stmt->execute();
                      $last_inserted_id=$this->conn->lastInsertId();
                      return $last_inserted_id;
                }catch(PDOException $e){
                     echo $e->getMessage();
                }
          }

          public function fetchContents(){
                try{
                      $sql="SELECT gc.id,gc.title,c.category_name,gc.urls,gc.photo,gc.banner,gc.content FROM general_content gc JOIN categories c ON gc.categories_id=c.id";
                      $stmt=$this->conn->prepare($sql);
                      $stmt->execute();
                      $result=$stmt->fetchAll();
                      return $result;
                }catch(PDOException $e){
                     echo $e->getMessage();
                }
          }

          public function getContent($id){
                 try{
                     $sql="SELECT * FROM general_content WHERE id=:id";
                     $stmt=$this->conn->prepare($sql);
                     $stmt->bindParam(':id',$id);
                     $stmt->execute();
                     $result=$stmt->fetchAll();
                      return $result;
                 }
                catch(PDOException $e){
                       return ['error'=>$e->getMessage()];
                }
          }

          public function deleteContents($id){
                try{
                      $sql="DELETE FROM general_content WHERE id=:id";
                      $stmt=$this->conn->prepare($sql);
                      $stmt->bindParam(':id',$id);
                      $stmt->execute();
                      echo "success";
                }catch(PDOException $e){
                     echo $e->getMessage();
                }
          }
        public function editContent($title,$categories_id,$urls,$banner,$aticles_status,$content,$id){

                   // echo $aticles_status;
                     /*$get_categories=$this->getCategories($categories_id);
                     $category=$get_categories[0];

                     if(strtolower($category['category_name'])=='articles'){
                          $edit_content=$this->updateContents($id,$title,$categories_id,$urls,$banner,$content);
                          //$articles=$this->createArticle($add_content,$aticles_status);
                          return $articles;
                     }else{
                        //ontime
                        $edit_content=$this->updateContentsArticles($id,$title,$categories_id,$urls,$article_status,$banner,$content);
                        
                        return $edit_content;
                     }*/
                   
                    if($aticles_status==''){
                        //update content
                        $content = $this->updateContents($id,$title,$categories_id,$urls,$banner,$content);
                        return $content;
                    }
                    else{
                        //update content and articles
                        $update_contet_article=$this->updateContentsArticles($id,$title,$categories_id,$urls,$aticles_status,$banner,$content);
                        return $update_contet_article;
                    }
         
          }
            public function updateContents($id,$title,$categories_id,$urls,$banner,$content){
                    try{
                        $sql="UPDATE general_content SET title=:title,categories_id=:categories_id,urls=:urls,banner=:banner,content=:content WHERE id=:id";
                        $stmt=$this->conn->prepare($sql);
                        $stmt->bindParam(':id',$id);
                        $stmt->bindParam(':title',$title);
                        $stmt->bindParam(':categories_id',$categories_id);
                        $stmt->bindParam(':urls',$urls);
                        //$stmt->bindParam(':photo',$photo);
                        $stmt->bindParam(':banner',$banner);
                        $stmt->bindParam(':content',$content);

                        $stmt->execute();
                        $get_article_content=parent::getArticle($id);
                       // print_r($get_article_content);
                        if(count($get_article_content)>0){
                              //update exist article conetnt)
                              $delete_article=parent::deleteArticle($get_article_content[0]['id']);
                              echo $delete_article;
                        }else{
                              //echo json messgae 
                              echo json_encode(['status'=>'success','message'=>"content updated succesfully"]);
                        }
                    }catch(PDOException $e){
                         echo $e->getMessage();
                    }
            }

            public function updateContentsArticles($id,$title,$categories_id,$urls,$article_type_id,$banner,$content){
                  //update content and both articles table
                    try{
                        $sql="UPDATE general_content SET title=:title,categories_id=:categories_id,urls=:urls,banner=:banner,content=:content WHERE id=:id";
                        $stmt=$this->conn->prepare($sql);
                        $stmt->bindParam(':id',$id);
                        $stmt->bindParam(':title',$title);
                        $stmt->bindParam(':categories_id',$categories_id);
                        $stmt->bindParam(':urls',$urls);
                        //$stmt->bindParam(':photo',$photo);
                        $stmt->bindParam(':banner',$banner);
                        $stmt->bindParam(':content',$content);

                        $stmt->execute();
                        $get_article_content=parent::getArticle($id);
                      //  print_r($get_article_content);
                        if(count($get_article_content)>0){
                              //update exist article conetntent based on id
                              $update_article=parent::editArticle($get_article_content[0]['id'],$id,$article_type_id);
                              echo $update_article;
                        }else{
                              //create new article content
                              $add_article=parent::addArticle($id,$article_type_id);
                              echo $add_article;

                        }
                    }catch(PDOException $e){
                         echo $e->getMessage();
                    }
            }

            public function updateContentPhoto($photo,$id){
                   try{
                        $sql="UPDATE general_content SET photo=:photo WHERE id=:id";
                        $stmt=$this->conn->prepare($sql);
                        $stmt->bindParam(':id',$id);
                        $stmt->bindParam(':photo',$photo);
                        $stmt->execute();
                        return json_encode(['status'=>'success','message'=>'photo updated succesfully']);
                   }catch(PDOException $e){
                        echo $e->getMessage();
                   }


            }

            public function createArticle($content_id,$articles_id){
                  echo '$articles '.$articles_id;
                  $add_articles=parent::addArticle($content_id,$articles_id);
                  return $add_articles;
            }

    }