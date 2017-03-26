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
if (isset($_SESSION['storedID']))
{
$sessionusername = $_SESSION['storedID'];
}


$sql = "SELECT bookingID, customerID, vehicleID, STARTDATE, ENDDATE, TOTALDUE FROM bookings
WHERE customerID = $sessionusername";

$result = $conn->query($sql);


if ($result->num_rows > 0) {
    echo "<table> <tr> <th> Results </th> <th> bookingID </th> <th> customerID </th> <th>vehicleID </th><th>start </th> <th> end </th> <th> Cost </th> <th> cancel? </th> </tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
$customerID = $row['customerID'];
$bookingID = $row['bookingID'];
$vehicleID = $row['vehicleID'];
$start = $row['STARTDATE'];
$end = $row['ENDDATE'];
$total =$row['TOTALDUE'];

        echo "<tr>
      <td>  <form action='cancellation.php'  method='POST'> </td>
      <td> <input name= 'bookingID' name='vehicleID' readonly type='number' value= $bookingID>  </td> 
       <td> <input name= 'customerID' name='vehicleID' readonly type='number' value= $customerID>  </td> 
        
     <td> <input name='vehicleID' readonly type='number' value= $vehicleID>  </td>
      
      
        <td> <input name='txtstart' readonly type='text' value= $start  </td>
        <td> <input name='txtend' type='text' readonly value= $end>  </td>
         <td> <input name='totalcost' type='number' readonly value= $total>  </td>
         
          <td>
        
        <input type='submit' value='Cancel'>
        </form>
           </td>  </tr>";

 }
    echo "</table>";
} else {
    echo "0 results";
}
$conn->close();




?>