<?php   
session_start();
session_destroy(); 
header("location:technician_login.html"); 
exit();
?>