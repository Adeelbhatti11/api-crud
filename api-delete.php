<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: DELETE');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Origin,Access-Control-Allow-Methods, Authorization, X-Requested-With');

$data = json_decode(file_get_contents("php://input"), true);

$st_id = $data['sid'];
$conn = mysqli_connect("localhost","root","","ajax");
$sql = "DELETE FROM users WHERE id = '{$st_id}' ";

if(mysqli_query($conn, $sql)){
    echo json_encode(array('message' => ' Student Data Delete!', 'status'=> 'true'));
}else{
     echo json_encode(array('message' => ' Student Data Not Delete!', 'status'=> 'false'));
}
?>