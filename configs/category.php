<?php 
require_once __DIR__.'/db-configs.php';
class Categories{
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
    
        public function addCategory($category_name){
                try{
                    $sql="INSERT INTO categories(category_name)VALUES(:category_name)";
                    $stmt=$this->conn->prepare($sql);
                    $stmt->bindParam(':category_name',$category_name);
                    $stmt->execute();
                    return json_encode(["status"=>"success","message"=>"Category added successfully"]);
                }catch(PDOException $e){
                     return json_encode(['status'=>'error','message'=>$e->getMessage()]);
                }
        }
    
        public function fetchCategories(){
                try{
                    $sql="SELECT * FROM categories";
                    $stmt=$this->conn->prepare($sql);
                    $stmt->execute();
                    $result=$stmt->fetchAll();
                    return $result;
                }catch(PDOException $e){
                      return json_encode(['status'=>'error','error'=>$e->getMessage()]);
                }
        }
     public function fetchCategory($id){
                try{
                    $sql="SELECT * FROM categories WHERE id=:id";
                    $stmt=$this->conn->prepare($sql);
                    $stmt->bindParam(':id',$id);
                    $stmt->execute();
                    $result=$stmt->fetch(PDO::FETCH_ASSOC);
                    return $result;
                }catch(PDOException $e){
                      return json_encode(['status'=>'error','error'=>$e->getMessage()]);
                }
        }
        public function deleteCategory($id){
                try{
                    $sql="DELETE FROM categories WHERE id=:id";
                    $stmt=$this->conn->prepare($sql);
                    $stmt->bindParam(':id',$id);
                    $stmt->execute();
                    echo "success";
                }catch(PDOException $e){
                      return json_encode(['status'=>'error','error'=>$e->getMessage()]);
                }
        }

        public function editCategory($id,$category_name){
                try{
                    $sql="UPDATE categories SET category_name=:category_name WHERE id=:id";
                    $stmt=$this->conn->prepare($sql);
                    $stmt->bindParam(':category_name',$category_name);
                    $stmt->bindParam(':id',$id);
                    $stmt->execute();
                    return json_encode(['status'=>'success','message'=>'Category updated successfully']);
                }catch(PDOException $e){
                      return json_encode(['status'=>'error','error'=>$e->getMessage()]);
                }
        }

        public function checkCategory($category_name){
                try{
                    $sql="SELECT * FROM categories WHERE category_name=:category_name";
                    $stmt=$this->conn->prepare($sql);
                    $stmt->bindParam(':category_name',$category_name);
                    $stmt->execute();
                    $result=$stmt->fetchAll();
                    return $result;
                }catch(PDOException $e){
                      return json_encode(['status'=>'error','error'=>$e->getMessage()]);
                }
        }


}