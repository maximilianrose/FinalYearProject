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

// $username=$_POST['username']; 
// $password=$_POST['password'];


$sql = "SELECT customerID, FIRSTNAME, SURNAME FROM customer WHERE FIRSTNAME = 'max'";
$result = $conn->query($sql);



while ($row = $result->fetch_assoc()) {
    echo  "id: " . $row["customerID"] . " - Name: " . $row["FIRSTNAME"] . " " . $row["SURNAME"]; 
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
