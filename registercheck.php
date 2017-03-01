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
$EMAIL= $_POST['email'];




$sql = "SELECT USERNAME FROM customer WHERE USERNAME = '$username'";
$result = $conn->query($sql);

while ($row = $result->fetch_assoc()) {
    echo  "username already taken, try again"; 
    exit();
    }


    $sql = "SELECT USERNAME FROM customer WHERE EMAIL = '$EMAIL'";
$result = $conn->query($sql);

while ($row = $result->fetch_assoc()) {
    echo  "Your entered Email address has already taken, try again"; 
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

   
 
 
$sql = "INSERT INTO customer (customerID, USERNAME, FIRSTNAME, SURNAME, DATEOFBIRTH, EMAIL, CARLICENCE, MOTORCYCLELICENCE, PASSWORD )
VALUES ('[DEFAULT]', '$username', '$_POST[firstname]', '$_POST[surname]','$_POST[dob]', '$EMAIL', '$_POST[carlicence]', '$_POST[bikelicence]', '$hashed_password')";
 

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>