<?php 
  // Prevent direct access to this file
  /*if(!defined('APP_STARTED')){
    die("Can't be accessed directly!");
  }*/

header('Content-Type: application/json; charset=UTF-8');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Authorization');

// Corrected the path to be more standard.
require __DIR__.'/../../configs/media.php';
require __DIR__.'/../../configs/file.upload.php';

$media = new Media();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // The HTML form should have an input with name="photo" and name="caption"
   // print($_POST);
    if (isset($_FILES['photo']) && isset($_POST['caption'])) {
        $upload = new Uploads($_FILES['photo']); 
        $uploadResult = $upload->fileUpload();

        if ($uploadResult === true) {
            // The error was calling fileType() on the boolean result of fileUpload().
            // It should be called on the $upload object itself.
            $extension = $upload->fileType();
            $types = "";

            if (in_array($extension, ['png', 'jpg', 'jpeg', 'gif'])) {
                $types = "image";
            } elseif (in_array($extension, ['mp4', 'avi', 'mov', 'wmv', 'flv', 'webm', 'mkv'])) {
                $types = "video";
            }

            // Pass the determined type to the addMedia function
            $status = $media->addMedia($_POST['caption'], $_FILES['photo']['name'], $types);
            echo $status;
        } else {
            // Provide the error message from the Uploads class if it exists
            echo json_encode(['status' => 'error', 'message' => $uploadResult]);
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Missing file or caption.']);
    }
}