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

$username = $_POST['username'];
$EMAIL= $_POST['email'];
$customerID = $_SESSION['storedID'];


$sql = "UPDATE customer SET EMAIL = 'EXAMPLE' WHERE customerID = $customerID";

if ($conn->query($sql) === TRUE) {
    



} else {
    echo "Error: " . $sql . "<br>" . $conn->error;

   

}


$sql = "SELECT USERNAME FROM customer WHERE EMAIL = '$EMAIL'";
$result = $conn->query($sql);

while ($row = $result->fetch_assoc()) {
    echo  "Your entered Email address has already taken, try again <br />\n";
    
    echo  "Your Email address has been reset, please reenter it <br />\n"; 
    
    echo "<a href = loginscreen.php> Login </a> <br />\n" ;

    




    exit();
    }



if ($_POST['passwordregister']!= $_POST['passwordconfirm'])
 {
     echo("Error! Passwords did not match! Try again. ");

     die();
 }

if ($_POST['passwordregister']=== $_POST['passwordconfirm'])
 {
     

     $hashed_password = password_hash($_POST['passwordconfirm'], PASSWORD_DEFAULT);
 }

   
 
 
$sql = "UPDATE customer SET FIRSTNAME = '$_POST[firstname]' , SURNAME='$_POST[surname]' , DATEOFBIRTH ='$_POST[dob]' ,  EMAIL ='$EMAIL',  CARLICENCE = '$_POST[carlicence]', MOTORCYCLELICENCE = '$_POST[bikelicence]', PASSWORD ='$hashed_password'  WHERE customerID =$customerID";
/* VALUES  '$username', '$_POST[firstname]', '$_POST[surname]','$_POST[dob]', '$EMAIL', '$_POST[carlicence]', '$_POST[bikelicence]', '$hashed_password')"; */
 

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully, please log in again <br />\n";
     echo "<a href = loginscreen.php> Login </a> <br />\n" ;
   session_destroy(); 


} else {
    echo "Error: " . $sql . "<br>" . $conn->error;

   

}

$conn->close();
?>