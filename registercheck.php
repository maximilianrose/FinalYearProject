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


if ($_POST['passwordregister']!= $_POST['passwordconfirm'])
 {
     echo("Error! Passwords did not match! Try again. ");

     die();
 }

if ($_POST['passwordregister']=== $_POST['passwordconfirm'])
 {
     

     $hashed_password = password_hash($_POST['passwordconfirm'], PASSWORD_DEFAULT);
 }

     
 
 
$sql = "INSERT INTO customer (customerID, USERNAME, FIRSTNAME, SURNAME, DATEOFBIRTH, EMAIL, PASSWORD )
VALUES ('[DEFAULT]', '$_POST[username]', '$_POST[firstname]', '$_POST[surname]','$_POST[dob]', '$_POST[email]', '$hashed_password')";
 

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>