<?php
$servername = "localhost";
$username = "plustwoconnect";
$password = "qwerty26";
$dbname = "sonaplaystore";
session_start();
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
    $sql="SELECT urban_request.rid,urban_user_details.uid,urban_request.request,urban_request.date,urban_request.starttime,urban_request.endtime,urban_user_details.uname,urban_user_details.ustreet,urban_user_details.uarea,urban_user_details.udistrict,urban_user_details.upincode,urban_request.status FROM urban_user_details JOIN urban_request ON urban_user_details.umail=urban_request.umail where urban_request.status='pending...' order by urban_request.date";
	
//echo $_SESSION['tphone'];	
    echo $_COOKIE["tphone"];

	$result=$conn->query($sql);

echo"<table border='1' id='customers'>
<tr>

<th>Requests</th>
<th>Date</th>
<th>Start Time</th>
<th>End Time</th>
<th>Name</th>
<th>Address</th>
<th>Status</th>
</tr>";

if($result->num_rows>0){
	

	while($row=$result->fetch_assoc()){
echo"<tr>";
    $uid=$row["uid"];
    $rid=$row["rid"];
	
	echo "<td>".$row["request"]."</td>";
	echo "<td>".$row["date"]."</td>";
	echo "<td>".$row["starttime"]."</td>";
	echo "<td>".$row["endtime"]."</td>";
	echo "<td>".$row["uname"]."</td>";
	$address= $row["ustreet"].',<br>'.$row["uarea"].',<br>'.$row["udistrict"].',<br>'.$row["upincode"].'.';
	echo "<td>".$address."</td>";

	echo '<td><form name="Patient" action="process_request.php"  method="GET">';
    echo '<input style="height:25px;width:150px;margin:auto;
  display:block;background-color:yellow" type="submit" name="button" value='.$rid.' >';
    echo '</form></td>';

	echo"</tr>";
	
	}


}

else{
	echo"No Results";
}
echo"</table>";
	
	



?>

<script type="text/javascript"> 
        window.history.forward(); 
        function noBack() { 
            window.history.forward(); 
        } 
    </script> 
<br>
<form align="center" action="destroy_session.php" method="POST">
    <label>
  <input style="width:200px;height:25px;background-color:fff000" name="Logout" type="submit" id="Logout" value="Logout!">
  </label>
</form>
<html>
<head>
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
}
</style>
</head>
</html>