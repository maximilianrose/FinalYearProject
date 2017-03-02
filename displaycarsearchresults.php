<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Max's Vehicle Rental</title>
  
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
  <!--See the Font Awesome icon cheatsheet: http://fontawesome.io/cheatsheet/-->
  <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
  <!--See W3 Schools CSS "framework": http://www.w3schools.com/w3css/-->
  <link rel="stylesheet" href="styles/styles.css">

  
</head>

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

  echo "Not logged in";
}



?>

<body> 

<header>
  <h1> Your Search Results  </h1>

  <h2 class = "homelink"> <a href="http://localhost/index.php">Home</a> </h2>

  <br>

  


  
  


</header>

 <main class="tab_container">
  

  <input id="tab1" type="radio" name="tabs" checked>
  
  <label for="tab1"  class= "searchtab"><i class="fa fa-user "></i><span>Log In </span></label>

  





  





  <section id="content1" class="tab-content">
    <h2> Your results</h2>

<div>
<table style='width = 800px;'>
<?php 
$make = $_POST['make'];
 $enddate=$_POST['carend'];
 $startdate=$_POST['carstart'];
 $carend = date_create("$enddate");
 $carstart = date_create("$startdate");
$diff = date_diff($carstart, $carend);
echo $diff->format(" you are booking for %R%a days");

$calculation = $diff->format("%a");


$sql = "SELECT MANUFACTURER,  MODEL , DAILYPRICE, vehicleID  FROM vehicle WHERE MANUFACTURER = '$make' AND VEHICLETYPE = 'car' AND CURRENTLYBOOKED = '0'";
$result = $conn->query($sql);

?>

<form class = "loginform" action="http://localhost/booking.php" method="post">

  
    


</form>


</div>




  </section>

</main>


</body>