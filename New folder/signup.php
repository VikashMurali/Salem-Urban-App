<?php

$servername = "localhost";
$username = "plustwoconnect";
$password = "qwerty26";
$dbname = "sonaplaystore";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$uname=$_GET['uname'];
$umail=$_GET['umail'];
$uphone=$_GET['uphone'];
$ustreet=$_GET['ustreet'];
$uarea=$_GET['uarea'];
$udistrict=$_GET['udistrict'];
$upincode=$_GET['upincode'];
$upassword=$_GET['upassword'];


$sql = "INSERT INTO `urban_user_details`(`uname`, `umail`, `uphone`, `ustreet`, `uarea`, `udistrict`, `upincode`, `upassword`) VALUES ('".$uname."','".$umail."','".$uphone."','".$ustreet."','".$uarea."','".$udistrict."','".$upincode."','".$upassword."')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>