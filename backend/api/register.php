<?php
include '../db.php';

$data = json_decode(file_get_contents("php://input"), true);

$name = $data['name'];
$email = $data['email'];
$password = password_hash($data['password'], PASSWORD_DEFAULT);

$sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')";
if ($conn->query($sql) === TRUE) {
    echo json_encode(["message" => "User registered successfully"]);
} else {
    echo json_encode(["error" => "Registration failed"]);
}
?>
