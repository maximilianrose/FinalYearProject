<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Max's Vehicle Rental</title>




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




$sql = "INSERT INTO bookings (bookingID, customerID, vehicleID, STARTDATE, ENDDATE, TOTALDUE )
VALUES ('[DEFAULT]', '$_SESSION[storedID]', '$_SESSION[storedvehicleID]', '$_SESSION[start]','$_SESSION[end]', '$_SESSION[cost]')";
 

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>

</html>