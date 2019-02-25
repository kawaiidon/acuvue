<?php


$servername = "localhost";
$username = "root";
$password = "a14778a5942b116b63aa5cb1b53f22b5419c4be2e550c058";
$dbname = "esforce";
header('Content-type: application/json');
if(empty($_POST['email'])){
    print_r( ['status' => false, 'error' => 'bad request']);
}

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
$conn->set_charset("utf8");
// Check connection
if ($conn->connect_error) {
    echo json_encode( ['status' => false, 'error' => "Connection failed: " . $conn->connect_error]);
    exit;
}
$sql_check = "SELECT * FROM users WHERE email = ".$_POST['email'];
$res = $conn->query($sql_check);
if($res and $res->num_rows !== 0){
    echo json_encode( ['status' => false, 'error' => 'Email уже зарегистрирован']);
    exit;
}
$values = "'".$_POST['email']."'";
//$values = mb_convert_encoding($values, 'utf8');
$sql = "INSERT INTO users (email) VALUES ($values)";
$sql = mb_convert_encoding($sql, 'utf8');
if ($conn->query($sql) === TRUE) {
    $conn->close();
    echo json_encode( ['status' => true]);
} else {
    $error = "Error: " . $sql . "<br>" . $conn->error;
    $conn->close();
    echo json_encode( ['status' => false, 'error' => $error]);
}
exit;
