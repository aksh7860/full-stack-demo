<?php
#ini_set('display_errors', 1); 
#ini_set('display_startup_errors', 1); 
error_reporting(E_ALL);
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
  
// get database connection
include_once '../config/database.php';
  
// instantiate user object
include_once '../objects/user.php';
  
$database = new Database();
$db = $database->getConnection();
  
$user = new user($db);
  
// get posted data
$data = json_decode(file_get_contents("php://input"));
//print_r($data);die();
// make sure data is not empty
if(
    !empty($data->name) &&
    !empty($data->email) &&
    !empty($data->contact_no)
){
  
    // set user property values
    $user->name = $data->name;
    $user->email = $data->email;
    $user->contact_no = $data->contact_no;
    // create the user
    if($user->create()){
  
        // set response code - 201 created
        http_response_code(201);
  
        // tell the user
        echo json_encode(array("message" => "user was created."));
    } else {
  
        // set response code - 503 service unavailable
        http_response_code(503);
  
        // tell the user
        echo json_encode(array("message" => "Unable to create user."));
    }
} else {
  
    // set response code - 400 bad request
    http_response_code(400);
  
    // tell the user
    echo json_encode(array("message" => "Unable to create user. Data is incomplete."));
}


?>
