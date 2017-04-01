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
session_start();


$customerID = $_SESSION['storedID'];

if (!isset($_SESSION['storedID']))
{

header('location:http://localhost/loginscreen.php');
sleep(1);

}



   
 $sql = "DELETE FROM customer WHERE customerID= $customerID";
 $sql = "DELETE FROM bookings WHERE customerID= $customerID";
/* $sql = "UPDATE customer SET FIRSTNAME = '$_POST[firstname]' , SURNAME='$_POST[surname]' , DATEOFBIRTH ='$_POST[dob]' ,  EMAIL ='$EMAIL',  CARLICENCE = '$_POST[carlicence]', MOTORCYCLELICENCE = '$_POST[bikelicence]', PASSWORD ='$hashed_password'  WHERE customerID =$customerID";
 VALUES  '$username', '$_POST[firstname]', '$_POST[surname]','$_POST[dob]', '$EMAIL', '$_POST[carlicence]', '$_POST[bikelicence]', '$hashed_password')"; */
 

if ($conn->query($sql) === TRUE) {
    echo "Account deleted, you will have to re-register if you want to use the site again <br />\n";
     echo "<a href = loginscreen.php> Login </a> <br />\n" ;
   session_destroy(); 


} else {
    echo "Error: " . $sql . "<br>" . $conn->error;

   

}

$conn->close();
?>