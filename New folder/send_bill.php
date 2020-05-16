<?php
session_start();
$response = array();
$conn=mysqli_connect('localhost','plustwoconnect','qwerty26','sonaplaystore');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$bill=$_POST['bill'];

$rid=$_SESSION['rid'];
$request=$_SESSION['request'];
$date=$_SESSION['date'];
$uname=$_SESSION['uname'];
$tname=$_SESSION['tname'];

$sql="INSERT INTO `urban_bill`(`rid`, `request`, `date`, `uname`, `tname`, `bill`) VALUES ('".$rid."','".$request."','".$date."','".$uname."','".$tname."','".$bill."')";
$result=$conn->query($sql);


echo "Bill Sent To User ".$uname;
header("refresh:3; url=create_bill.php");



?>