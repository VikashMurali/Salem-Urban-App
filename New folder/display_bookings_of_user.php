<?php
 

$response = array();
 

$con=mysqli_connect('localhost','plustwoconnect','qwerty26','sonaplaystore');

 


//$bookdate = $_GET['bookdate'];
$umail=$_GET['umail'];
// check for post data
if (isset($_GET["umail"])) {
    $result = mysqli_query($con, "SELECT rid,request,date,starttime,endtime,status FROM urban_request WHERE umail='$umail' and flag=0 order by request");
 
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