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



 $username=$_POST['username'];
 $password=$_POST['password'];



 

 $sql = "SELECT PASSWORD, customerID FROM customer WHERE USERNAME = '$username'";
$result = $conn->query($sql);

while ($row = $result->fetch_assoc()) {

  if  (password_verify ($password, $row["PASSWORD"]))

  {
     echo "login successful <br />\n"; 

     $_SESSION['storedusername'] = $_POST['username'];
     $_SESSION['storedID'] = $row['customerID'];

     echo "<a href = index.php> Home</a> <br />\n" ;
  }

  else {

  
    echo "login failed <br/>\n";
    echo "<a href = loginscreen.php> Try Again</a> <br />\n" ;
    exit();


    }




    


 
}




 


