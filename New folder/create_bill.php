<?php
 

$response = array();
 
session_start();
$conn=mysqli_connect('localhost','plustwoconnect','qwerty26','sonaplaystore');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$rid=$_SESSION['rid'];

//echo $rid;
$sql="SELECT urban_request.rid,urban_request.request,urban_request.date,urban_user_details.uname,urban_technician_details.tname FROM urban_request,urban_technician_details,urban_user_details WHERE urban_request.tphone=urban_technician_details.tphone and urban_request.umail=urban_user_details.umail and urban_request.rid='$rid'";
$result=$conn->query($sql);
echo"<table border='1' id='customers'>
<tr>

<th>Requests</th>
<th>Date</th>
<th>Customer Name</th>
<th>Electrician Name</th>
</tr>";

if($result->num_rows>0){
	

	while($row=$result->fetch_assoc()){
echo"<tr>";
    $rid=$row["rid"];
	$_SESSION['request']=$row["request"];
	$_SESSION['date']=$row["date"];
	$_SESSION['uname']=$row["uname"];
	$_SESSION['tname']=$row["tname"];
	echo "<td>".$row["request"]."</td>";
	echo "<td>".$row["date"]."</td>";
	echo "<td>".$row["uname"]."</td>";
	echo "<td>".$row["tname"]."</td>";
echo "</tr>";
}
}
?>
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
<body>
    <center>
    <h2>Generate Bill</h2>
    <fieldset>
        <h3>Enter Bill Amount:</h3>
        <form align="center" action="send_bill.php" method="POST">
            
                   
                       <input type="text" name="bill" min="1" step="any" maxlength="6" required></input>
                       <br><br>
                      <input style="width:200px;height:25px;background-color:fff000" name="submit" type="submit" value="Generate Bill">
                   
        </form>           
                   <br>
                   <form align="center" action="display_requests.php" method="POST">
                   <label>
                      <input style="width:200px;height:25px;background-color:fff000" name="bill paid" type="submit" value="Bill Paid!">
                   </label>
        </form>
    </fieldset>
    </center>
</body>
</html>