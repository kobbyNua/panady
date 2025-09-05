<?php
   class Db{
       
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



       /* public function events(){
            try{

            
               $sql="CREATE TABLE events(id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,event_title VARCHAR(200) NOT NULL,urls VARCHAR(200) NOT NULL DEFAULT '',banner_state BOOLEAN NOT NULL,events_dates VARCHAR(255) NOT NULL,photo varchar(150) NOT NULL)";
               $this->conn->exec($sql);
               echo "success \n";
                
            }catch(PDOException $e){
                 echo $e->getMessage();
            }
        }


        public function upcomingEvents(){
            try{

            
               $sql="CREATE TABLE upcomingEvents(id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,activity_state BOOLEAN NOT NULL,events_id INT NOT NULL,events_info TEXT NOT NULL,FOREIGN KEY(events_id) REFERENCES events(id))";
               $this->conn->exec($sql);
               echo "success \n";
                
            }catch(PDOException $e){
                 echo $e->getMessage();
            }
        }
        public function pastEvents(){
            try{

            
               $sql="CREATE TABLE pastEvents(id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,events_id INT NOT NULL,events_info TEXT NOT NULL,record_date VARCHAR(200) NOT NULL,FOREIGN KEY(EVENTS_ID) REFERENCES events(id))";
               $this->conn->exec($sql);
               echo "success \n";
                
            }catch(PDOException $e){
                 echo $e->getMessage();
            }
        }*/

        public function media(){
            try{
               $sql="CREATE TABLE media(id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,caption VARCHAR(120) NOT NULL,file_name VARCHAR(180) NOT NULL,file_type VARCHAR(150) NOT NULL)";
               $this->conn->exec($sql);
               echo "success \n";
            }catch(PDOException $e){
                 echo $e->getMessage();
            }
        }
        public function teams(){
            try{
               $sql="CREATE TABLE teams(id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,full_name VARCHAR(18) NOT NULL,caption VARCHAR(120) NOT NULL,photo VARCHAR(150) NOT NULL)";
               $this->conn->exec($sql);
               echo "success \n";
            }catch(PDOException $e){
                 echo $e->getMessage();
            }
        }

        /*public function banners(){
            try{
               $sql="CREATE TABLE banners(id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,caption VARCHAR(120) NOT NULL,content TEXT NOT NULL,types VARCHAR(60) NOT NULL,photo VARCHAR(255) NOT NULL,date_joined VARCHAR(150) NOT NULL)";
               $this->conn->exec($sql);
               echo "success \n";
            }catch(PDOException $e){
                 echo $e->getMessage();
            }
        }

     public function CATEGORIES(){
             try{
               $sql="CREATE TABLE categories(id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,category_name VARCHAR(120) NOT NULL)";
               $this->conn->exec($sql);
               echo "success \n";
             }catch(PDOException $e){
                 echo $e->getMessage();
             }
        }*/
       public function users(){
            try{
               $sql="CREATE TABLE users(id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,full_name VARCHAR(120) NOT NULL,username VARCHAR(150) NOT NULL,password VARCHAR(255) NOT NULL,role VARCHAR(100) NOT NULL,date_joined VARCHAR(150) NOT NULL)";
               $this->conn->exec($sql);
               echo "success \n";
            }catch(PDOException $e){
                 echo $e->getMessage();
            }
        }
        public function categories(){
             try{
               $sql="CREATE TABLE categories(id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,category_name VARCHAR(120) NOT NULL)";
               $this->conn->exec($sql);
               echo "success \n";
             }catch(PDOException $e){
                 echo $e->getMessage();
             }
        }
        public function generalContent(){
             try{
               $sql="CREATE TABLE general_content(id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,title VARCHAR(120) NOT NULL,categories_id INT NOT NULL,urls VARCHAR(200) NOT NULL,photo VARCHAR(255) NOT NULL,banner BOOLEAN NOT NULL DEFAULT FALSE ,content TEXT NOT NULL,FOREIGN KEY(categories_id) REFERENCES categories(id))";
               $this->conn->exec($sql);
               echo "success \n";
             }catch(PDOException $e){
                 echo $e->getMessage();
             }
        }

        public function articlesTypes(){
        
            try{

            
               $sql="CREATE TABLE articles_types(id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,types VARCHAR(120) NOT NULL)";
               $this->conn->exec($sql);
               echo "success \n";
                
            }catch(PDOException $e){
                 echo $e->getMessage();
            }

        }
        public function articles(){

            try{
               $sql="CREATE TABLE articles(id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,general_content_id INT NOT NULL,article_types_id INT NOT NULL,FOREIGN KEY(general_content_id) REFERENCES general_content(id),FOREIGN KEY(article_types_id) REFERENCES articles_types(id))";
               $this->conn->exec($sql);
               echo "success \n";
            }catch(PDOException $e){
                 echo $e->getMessage();
            }
        }
        public function tables(){
             /*$this->events();
             $this->upcomingEvents();
             
             $this->articlesTypes();
             $this->articles();
             $this->media();
             $this->banners();
             $this->pastEvents();
             */
            $this->users();
            $this->categories();
            $this->generalContent();
            $this->articlesTypes();
            $this->articles();
        }
   }
$db=new DB();
//$db->tables();