<?php

session_start();
$con=mysqli_connect('localhost','plustwoconnect','qwerty26','sonaplaystore');


$response = array();

$tphone = $_GET['tphone'];
$tpassword = $_GET['tpassword'];
$_SESSION['tphone'] = $tphone;
$cookie_name="tphone";
$cookie_value=$tphone;
setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day



     $flag=false;

if (isset($_GET["tphone"])){
$tphone = $_GET['tphone'];

$result = mysqli_query($con, "SELECT tpassword FROM urban_technician_details where tphone='$tphone'");

    while(($row = mysqli_fetch_assoc($result)) == true){
            $pword1=$row[tpassword];
            
            if (strcasecmp($tpassword, $pword1) == 0)
            {
             $flag=true;
            }
    
            
      
     $data[]=$row;
     
    }



}

if($flag == true) {

    echo '{"query_result":"SUCCESS"}';
    //echo $_COOKIE["tphone"];
    header("Location:display_requests.php");
}
else{
    $errorMsg = "Invalid UserName or Password!";
    echo '<script type="text/javascript">alert("INFO:  '.$errorMsg.'");</script>';
    

}







?>		