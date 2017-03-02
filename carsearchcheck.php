
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

if (isset($_SESSION['storedID']))
{
$sessionusername = $_SESSION['storedID'];


}

else
{

  echo "Please Log in to see results";

  die();
}

 $make = $_POST['make'];
 $seats =$_POST['seats'];
 $siteID =$_POST['siteID'];
 $enddate=$_POST['carend'];
 $startdate=$_POST['carstart'];
 $carend = date_create("$enddate");
 $carstart = date_create("$startdate");
$diff = date_diff($carstart, $carend);

$calculation = $diff->format("%R%a");

 echo "$calculation";

if( $calculation <= 0)
{
echo "Your end date is before or the same as your start date";
die();

}


if( $calculation > 28)
{
echo "You may not hire a vehicle for more than four weeks";
die();

}


echo $diff->format(" you are booking for %R%a days");






$sql = "SELECT MANUFACTURER,  MODEL , DAILYPRICE, vehicleID  FROM vehicle WHERE MANUFACTURER = '$make' AND SEATS = '$seats' AND siteID = '$siteID'  AND VEHICLETYPE = 'car' AND CURRENTLYBOOKED = '0'";
$result = $conn->query($sql);



if ($result->num_rows > 0) {
    echo "<table><tr> <th> start </th> <th> ID </th> <th>MANUFACTURER </th><th>MODEL </th> <th> DAILYPRICE </th>  <th> Total Cost </th> <th> Book? </th>   </tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {

$totalcost = $row["DAILYPRICE"]*$calculation;
$vehicleID = $row['vehicleID'];
$make = $row['MANUFACTURER'];
$model = $row['MODEL'];
$dailyprice =$row['DAILYPRICE'];
$carID =$row['vehicleID'];



        echo "<tr>
      <td>  <form action='booking.php'  method='POST'> </td>
       <td> <input type= 'hidden' name='vehicleID' readonly type='number' value= $carID>  </td> 
        
     <td> <input name='txtmake' readonly type='text' value= $make>  </td>
      
      
        <td> <input name='txtmodel' readonly type='text' value= $model>  </td>
        <td> <input name='dailyprice' type='number' readonly value= $dailyprice>  </td>
         <td> <input name='totalcost' type='number' readonly value= $totalcost>  </td>
         
          <td>
        
        <input type='submit' value='Book'>
        </form>
           </td>  </tr>";

/*<a href = booking.php> Book </a> */


/* these two variables need updating depending on which row's' submit button is press  

$_SESSION['storedvehicleID'] = $vehicleID;
$_SESSION['cost'] = $totalcost; 

*/


/* These Variables will stay the same, so don't change on submit */
$_SESSION['start'] = $startdate;  
$_SESSION['end'] = $enddate; 

    }
    echo "</table>";
} else {
    echo "0 results";
}








$conn->close();







 /*while ($row = $result->fetch_assoc()) {
    echo  "MAKE: " . $row["MANUFACTURER"] . " - Model: " . $row["MODEL"] . " Price - " . $row["DAILYPRICE"] . "\n"; 
    }
exit();

*/

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
?>



</html>