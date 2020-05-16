<?php
$servername = "localhost";
$username = "plustwoconnect";
$password = "qwerty26";
$dbname = "sonaplaystore";
if(isset($_REQUEST['button'])) {
    $req_val=$_GET['button'];
    //echo $req_val;
    $_SESSION['req_val']=$req_val;

}
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$req_id=$_SESSION['req_val'];
$tphone=$_COOKIE["tphone"];
//echo $req_id;
//$change="INSERT INTO 'urban_request' ('tphone') VALUES ('".$_COOKIE["tphone"]."') WHERE urban_request.rid='$req_id'";
//$req=$con->query($change);

$sql="SELECT urban_request.request, urban_request.date, urban_request.starttime, urban_request.endtime, urban_user_details.uname, urban_user_details.ustreet, urban_user_details.uarea, urban_user_details.udistrict, urban_user_details.upincode FROM urban_request INNER JOIN urban_user_details ON urban_request.rid='$req_id' WHERE urban_user_details.umail = urban_request.umail";
$change_tphone="UPDATE urban_request SET tphone='$tphone' WHERE rid='$req_id'";
$change_status="UPDATE urban_request SET status='Approved' WHERE rid='$req_id'";
$result=$conn->query($sql);
$ch1=$conn->query($change_tphone);
$ch2=$conn->query($change_status);

//echo $result;
//echo "idhu wrk aagudhu";


echo"<table border='1' id='customers'>
<tr>

<th>Customer Name</th>
<th>Service Required</th>
<th>Date</th>
<th>Start Time</th>
<th>End Time</th>
<th>Address</th>

</tr>";
if($result->num_rows>0){
while(($row = mysqli_fetch_assoc($result)) == true){
//$req=$row["request"];
//echo "You Have Selected to provide ".$row["request"].' Service to the User '.$row["uname"]." On Date ".$row["date"]." <br>Timing From ".$row["starttime"]." TO ".$row["endtime"];
//$data[]=$row;

    echo "<tr>";
	echo "<td>".$row["uname"]."</td>";
	echo "<td>".$row["request"]."</td>";
	echo "<td>".$row["date"]."</td>";
	echo "<td>".$row["starttime"]."</td>";
	echo "<td>".$row["endtime"]."</td>";
    echo "<td>".$row["ustreet"].",<br>".$row["uarea"].",<br>".$row["udistrict"].",<br>".$row["upincode"].".</td>";
    echo "</tr>";
echo $data;






}

}
else{
    echo "No Results Found!";
}
$otp=mt_rand(0,9).mt_rand(0,9).mt_rand(0,9).mt_rand(0,9);
$updateotp="UPDATE urban_request SET otp='$otp' WHERE rid='$req_id'";
$ch3=$conn->query($updateotp);
$_SESSION['otp']=$otp;

$pageWasRefreshed = isset($_SERVER['HTTP_CACHE_CONTROL']) && $_SERVER['HTTP_CACHE_CONTROL'] === 'max-age=0';

if($pageWasRefreshed ) {
   $updateotp="UPDATE urban_request SET otp='$otp' WHERE rid='$req_id'";
   $ch3=$conn->query($updateotp);

} else {
   //do nothing;
}
echo $req_id;
session_start();
$_SESSION['rid'] = $req_id;



?>

<html>
    <style>
        #customers{font-family:Trebuchet MS", Arial, sans-serif;
border-collapse:collapse;
width:100%;
}
#customers td, #customers th{
border:1px solid #ddd;
padding:8px;
}
#customers tr:nth-child(even){background-color:#f2f2f2;}

#customers tr:hover {background-color:#ddd}

#customers th{padding-top:12px;
padding-bottom:12px;
text-align:left;
background-color:#fff000;
color:white;
    </style>
    <body>
        <div>
            <fieldset>
        <center>
        <br><h1>OTP for This Service is</h1>
        <h1><?php
        echo "<h1>$otp</h1>";
        ?></h1>
        <br><br>
            
                <form align="center" action="create_bill.php" method="POST">
                   <label>
                      <input style="width:200px;height:25px;background-color:fff000" name="Logout" type="submit" value="Generate Bill">
                   </label>
                </form>
            </fieldset>

        </center>
        </div>
    </body>
    
</html>

