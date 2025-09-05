<?php

        class Banners{
              public function __construct($conn){
                    $this->conn=$conn;
              }

              public function addBanners($title,$urls,$banner_state,$photo){
                    try{
                          $sql="INSERT INTO banners(banner_title,urls,banner_state,photo)VALUES(:title,:urls,:banner_state,:photo)";
                          $stmt=$this->conn->prepare($sql);
                          $stmt->bindParam(':title',$title);
                          $stmt->bindParam(':urls',$urls);
                          $stmt->bindParam(':banner_state',$banner_state);
                          $stmt->bindParam(':photo',$photo);
                          $stmt->execute();
                          echo "success";
                    }catch(PDOException $e){
                         echo $e->getMessage();
                    }
              }

              public function fetchBanners(){
                    try{
                          $sql="SELECT * FROM banners";
                          $stmt=$this->conn->prepare($sql);
                          $stmt->execute();
                          $result=$stmt->fetchAll();
                          return $result;
                    }catch(PDOException $e){
                         echo $e->getMessage();
                    }
              }

              public function deleteBanners($id){
                    try{
                          $sql="DELETE FROM banners WHERE id=:id";
                          $stmt=$this->conn->prepare($sql);
                          $stmt->bindParam(':id',$id);
                          $stmt->execute();
                          echo "success";
                    }catch(PDOException $e){
                         echo $e->getMessage();
                    }
              }
                public function updateBanners($id,$title,$urls,$banner_state){
                        try{
                            $sql="UPDATE banners SET banner_title=:title,urls=:urls,banner_state=:banner_state WHERE id=:id";
                            $stmt=$this->conn->prepare($sql);
                            $stmt->bindParam(':id',$id);
                            $stmt->bindParam(':title',$title);
                            $stmt->bindParam(':urls',$urls);
                            $stmt->bindParam(':banner_state',$banner_state);
                            //$stmt->bindParam(':photo',$photo);
                            $stmt->execute();
                            echo "success";
                        }catch(PDOException $e){
                             echo $e->getMessage();
                        }
                }

                public function fetchSingleBanners($id){
                        try{
                            $sql="SELECT * FROM banners WHERE id=:id limit 1";
                            $stmt=$this->conn->prepare($sql);
                            $stmt->bindParam(':id',$id);
                            $stmt->execute();
                            $result=$stmt->fetch();
                            return $result;
                        }catch(PDOException $e){
                             echo $e->getMessage();
                        }
                }

                public function activateBanner($id){
                    try{
                        $sql="UPDATE banners SET banner_state=1 WHERE id=:id";
                        $stmt=$this->conn->prepare($sql);
                        $stmt->bindParam(':id',$id);
                        $stmt->execute();
                        echo "success";
                    }catch(PDOException $e){
                         echo $e->getMessage();
                    }
                }

                public function deactivateBanner($id){
                    try{
                        $sql="UPDATE banners SET banner_state=0 WHERE id=:id";
                        $stmt=$this->conn->prepare($sql);
                        $stmt->bindParam(':id',$id);
                        $stmt->execute();
                        echo "success";
                    }catch(PDOException $e){
                         echo $e->getMessage();
                    }
                }

                public function updatePhoto($id,$photo){
                    try{
                        $sql="UPDATE banners SET photo=:photo WHERE id=:id";
                        $stmt=$this->conn->prepare($sql);
                        $stmt->bindParam(':id',$id);
                        $stmt->bindParam(':photo',$photo);
                        $stmt->execute();
                        echo "success";
                    }catch(PDOException $e){
                         echo $e->getMessage();
                    }
                }
        }