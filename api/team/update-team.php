 <?php
   // Prevent direct access to this file
 /* if(!defined('APP_STARTED')){
    die("Can't be accessed directly!");
  }*/
 
header('Content-Type: application/json; charset=UTF-8');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-With');

// Corrected the path to be more standard.
require __DIR__.'/../../configs/teams.php';

$team = new Teams();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Note: Your HTML form input names must match these keys ('editTeamId', 'editFullname', 'editRole').
    if (isset($_POST['editTeamId']) && isset($_POST['editFullname']) && isset($_POST['editRole'])) {
        // To fix the SQL error, we'll use a more robust pattern.
        // Set the properties on the team object from the POST data.
        // Your Teams class will need public properties: id, full_name, role.
        $id = $_POST['editTeamId'];
        $full_name = $_POST['editFullname']; // Assuming property is named full_name
        $role = $_POST['editRole'];

        // Now, call an update method that uses the object's properties.
        // This is a more reliable way to pass data and avoids parameter mismatch errors.
       /* if ($team->update()) {
            echo json_encode(['success' => true, 'message' => 'Team Member Updated']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Team Member Not Updated']);
        }*/
            echo json_encode($team->updateTeam($id,$full_name,$role));
    } else {
        echo json_encode(['success' => false, 'message' => 'Missing required parameters.']);
    }
}