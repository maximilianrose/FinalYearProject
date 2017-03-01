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


 $make = $_POST['make'];


$sql = "SELECT MANUFACTURER,  MODEL , DAILYPRICE  FROM vehicle WHERE MANUFACTURER = '$make' AND VEHICLETYPE = 'car' AND CURRENTLYBOOKED = '0'";
$result = $conn->query($sql);



while ($row = $result->fetch_assoc()) {
    echo  "MAKE: " . $row["MANUFACTURER"] . " - Model: " . $row["MODEL"] . " Price - " . $row["DAILYPRICE"] . "\n"; 
    }
exit();



/*
 if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "id: " . $row["customerID"] . " - Name: " . $row["FIRSTNAME"] . " " . $row["SURNAME"];
    } 
}

echo 'hello';

 $conn->close();
 */
