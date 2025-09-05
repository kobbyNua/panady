<?php
    class EventsContent{
         public function __construct($conn){
               $this->conn=$conn;
         }
         public function addEvents($event_title,$urls,$banner_state,$events_dates,$photo){
               try{
                     $sql="INSERT INTO events(event_title,urls,banner_state,events_dates,photo)VALUES(:event_title,:urls,:banner_state,:events_dates,:photo)";
                     $stmt=$this->conn->prepare($sql);
                     $stmt->bindParam(':event_title',$event_title);
                     $stmt->bindParam(':urls',$urls);
                     $stmt->bindParam(':banner_state',$banner_state);
                     $stmt->bindParam(':events_dates',$events_dates);
                     $stmt->bindParam(':photo',$photo);
                     $stmt->execute();
                     echo "success";
               }catch(PDOException $e){
                    echo $e->getMessage();
               }
         } 
     }
?>