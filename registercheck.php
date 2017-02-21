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


$username = $_POST['username'];




    




if ($_POST['passwordregister']!= $_POST['passwordconfirm'])
 {
     echo("Error! Passwords did not match! Try again. ");

     die();
 }

if ($_POST['passwordregister']=== $_POST['passwordconfirm'])
 {
     

     $hashed_password = password_hash($_POST['passwordconfirm'], PASSWORD_DEFAULT);
 }

   
 
 
$sql = "INSERT INTO customer (customerID, USERNAME, FIRSTNAME, SURNAME, DATEOFBIRTH, EMAIL, CARLICENCE, MOTORCYCLELICENCE, PASSWORD )
VALUES ('[DEFAULT]', '$username', '$_POST[firstname]', '$_POST[surname]','$_POST[dob]', '$_POST[email]', '$_POST[carlicence]', '$_POST[bikelicence]', '$hashed_password')";
 

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>