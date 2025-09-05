<?php



     class Uploads{

        public function __construct($file){
               $this->files=$file;


        }
        public function fileType(){
                 $extensions=strtolower(pathinfo(__DIR__.'../../uploads/'.basename($this->files['name']),PATHINFO_EXTENSION));
                 return $extensions;
        }
        function upload(){
            if(!file_exists($this->files['name'])){
                move_uploaded_file($this->files['tmp_name'],__DIR__.'../../uploads/'.basename($this->files['name']));
                return true;
            }
        }

        function checkFiletpes(){
              $get_type=$this->fileType();
              if($get_type=='jpg'||$get_type=='jpeg'||$get_type=="png"||$get_type=="mpeg"||$get_type=="mp4"||$get_type=="mp3"){
                 return true;
              }else{
                  return true;
              }
        }
        public function fileUpload(){
            if($this->checkFiletpes()==true){
                 if($this->upload()==true){
                      //echo json_encode(['status'=>"success"]);
                      return true;
                 }
            }
            else{
                return false;
                // echo json_encode(['status'=>'error']);
            }
        }
     }

