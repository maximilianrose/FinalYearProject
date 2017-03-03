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

$vehicleID = $_POST['vehicleID'];
$totalcost = $_POST['totalcost'];


$sql = "UPDATE vehicle SET CURRENTLYBOOKED = '1' WHERE vehicleID = $vehicleID";

if ($conn->query($sql) === TRUE) {
    



} else {
    echo "Error: " . $sql . "<br>" . $conn->error;

   

}






$sql = "INSERT INTO bookings (bookingID, customerID, vehicleID, STARTDATE, ENDDATE, TOTALDUE )
VALUES ('[DEFAULT]', '$_SESSION[storedID]', '$vehicleID', '$_SESSION[start]','$_SESSION[end]', '$totalcost')";
 

if ($conn->query($sql) === TRUE) {
    
echo "Thanks for booking with Max's Vehicle Hire <br />\n";
     echo "<a href = index.php> Home </a> <br />\n" ;



} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>

</html>