<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Origin,Access-Control-Allow-Methods, Authorization, X-Requested-With');

$data = json_decode(file_get_contents("php://input"), true);

$search = $data['sname'];

$conn = mysqli_connect("localhost","root","","ajax");
$sql = "SELECT * FROM users WHERE name LIKE '%{$search}%' ";

$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result) > 0){
    $output = mysqli_fetch_all($result, MYSQLI_ASSOC);
    echo json_encode($output);
}else{
     echo json_encode(array('message' => ' Student Data Not Update!', 'status'=> 'false'));
}
?>