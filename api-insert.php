<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Origin,Access-Control-Allow-Methods, Authorization, X-Requested-With');

$data = json_decode(file_get_contents("php://input"), true);

$st_name = $data['sname'];
$st_email = $data['semail'];
$conn = mysqli_connect("localhost","root","","ajax");
$sql = "INSERT INTO users(name , email) VALUES ('{$st_name}','{$st_email}')";

if(mysqli_query($conn, $sql)){
    echo json_encode(array('message' => ' Student Data Insert!', 'status'=> 'true'));
}else{
     echo json_encode(array('message' => ' Student Data Not Insert!', 'status'=> 'false'));
}
?>