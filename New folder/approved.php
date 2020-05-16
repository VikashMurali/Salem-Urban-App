<?php
 

$response = array();
 

$con=mysqli_connect('localhost','plustwoconnect','qwerty26','sonaplaystore');

 



//$bookdate = $_GET['bookdate'];
$rid=$_GET['rid'];
// check for post data
if (isset($_GET["rid"])) {
    $result = mysqli_query($con, "SELECT urban_request.request,urban_request.date,urban_request.starttime,urban_request.status,urban_request.otp,urban_technician_details.tname,urban_technician_details.tphone FROM urban_request JOIN urban_technician_details ON (urban_request.tphone=urban_technician_details.tphone) WHERE urban_request.rid='$rid'");
 
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
