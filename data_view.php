<?php

header("Content-Type: application/json"); 

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pro";

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die(json_encode(array("error" => "Connection failed: " . $conn->connect_error)));
}

$sql = "SELECT * FROM notes";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $data = array();
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }

    
    echo json_encode($data);
} else {
    echo json_encode(array("message" => "No results found"));
}

$conn->close();
?>
