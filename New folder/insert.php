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
$umail=$_GET['umail'];
$request=$_GET['request'];
$date=$_GET['date'];
$starttime=$_GET['starttime'];
$endtime=$_GET['endtime'];
$newDate = date("d-M-Y", strtotime($date));

$sql = "INSERT INTO `urban_request`(`umail`, `request`, `date`, `starttime`, `endtime`) VALUES ('".$umail."','".$request."','".$newDate."','".$starttime."','".$endtime."')";

if ($conn->query($sql) === TRUE) {
    echo "SUCCESS";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>