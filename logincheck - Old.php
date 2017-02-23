<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "carhire";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$username=$_POST['username']; 
$password=$_POST['password'];



$sql = "SELECT username, password FROM customer";
$result = $conn->query($sql);

$sql="SELECT * FROM customer WHERE username='$username' and password='$password'";
$result=mysql_query($sql);




// $count=mysql_num_rows($result);
// If result matched $username and $password, table row must be 1 row
// if ($count==1) {
//    echo "Log in Successful! $count";
// } else {
  //  echo "Unsuccessful! $count";
// }

ob_end_flush();
?>