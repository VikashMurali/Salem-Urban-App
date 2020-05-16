<?php
 

$response = array();
 

$con=mysqli_connect('localhost','plustwoconnect','qwerty26','sonaplaystore');

 


//$bookdate = $_GET['bookdate'];
$rid=$_GET['rid'];
// check for post data
if (isset($_GET["rid"])) {
    $result = mysqli_query($con, "SELECT request,date,uname,tname,bill FROM urban_bill WHERE rid='$rid'");
 
    while(($row = mysqli_fetch_assoc($result)) == true){
 
     $data[]=$row;
     
    }

echo json_encode($data);

    
} 
else {
    // required field is missing
    $response["success"] = 0;
    $response["message"] = "Required field(s) is missing";
 
    // echoing JSON response
    echo json_encode($data);
}
?>