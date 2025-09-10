<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: PUT');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Origin,Access-Control-Allow-Methods, Authorization, X-Requested-With');

$data = json_decode(file_get_contents("php://input"), true);

$st_id = $data['sid'];
$st_name = $data['sname'];
$st_email = $data['semail'];
$conn = mysqli_connect("localhost","root","","ajax");
$sql = "UPDATE users SET name = '{$st_name}', email = '{$st_email}' WHERE id = '{$st_id}' ";

if(mysqli_query($conn, $sql)){
    echo json_encode(array('message' => ' Student Data Update!', 'status'=> 'true'));
}else{
     echo json_encode(array('message' => ' Student Data Not Update!', 'status'=> 'false'));
}
?>