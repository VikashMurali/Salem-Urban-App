<?php

/*
 * Following code will list all the products
 */
$con=mysqli_connect('localhost','plustwoconnect','qwerty26','sonaplaystore');
//@mysql_select_db('sonaplaystore') or die( "Unable to select database");

// array for JSON response
$response = array();

$umail = $_GET['umail'];
$upassword = $_GET['upassword'];


//$con=mysql_connect('localhost','plustwoconnect','qwerty26');
//@mysql_select_db('sonaplaystore') or die( "Unable to select database");
//$result = mysql_query($con, "SELECT * FROM hall_booking where hall_id='1'");
     $flag=false;

if (isset($_GET["umail"])){
$umail = $_GET['umail'];

$result = mysqli_query($con, "SELECT upassword FROM urban_user_details where umail='$umail'");

    while(($row = mysqli_fetch_assoc($result)) == true){
            $pword1=$row[upassword];
            
           //echo 'here time';
            if (strcasecmp($upassword, $pword1) == 0)
            {
             //echo 's: no booking';
             $flag=true;
            }
    
            
      
     $data[]=$row;
     
    }
//print_r($data);
//print $id;




}

if($flag == true) {

    echo '{"query_result":"SUCCESS"}';
//return json_encode("query_result":"SUCCESS");
}
else{
    echo '{"query_result":"FAILURE"}';
//return json_encode("query_result":"FAILURE");
}







?>		