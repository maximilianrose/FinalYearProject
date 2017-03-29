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

$displaylogname = $_SESSION['storedusername'];
echo "Hello $displaylogname <br />\n";

echo "<a href = logout.php> Logout</a> <br />\n" ;

}

else
{

  echo "Not logged in";
}



?>

<body> 

<header>
  <h1> Please Log in or register your details  </h1>

  <h2 class = "homelink"> <a href="http://localhost/index.php">Home</a> </h2>

  <br>

  


  
  


</header>

 <main class="tab_container">
  

  <input id="tab1" type="radio" name="tabs" checked>
  
  <label for="tab1"  class= "loginnavigation"><i class="fa fa-user "></i><span>Log In </span></label>

  <input id="tab2" type="radio" name="tabs">
  <label for="tab2"   class= "loginnavigation" ><i class="fa fa-clipboard"></i><span>Register</span></label>

<input id="tab3" type="radio" name="tabs">
  <label for="tab3"   class= "loginnavigation" ><i class="fa fa-folder-open"></i><span>Update Details</span></label>

<input id="tab4" type="radio" name="tabs">
  <label for="tab4"   class= "loginnavigation" ><i class="fa fa-cut"></i><span> Delete account</span></label>

  <section id="content1" class="tab-content">
    <h2 class="tabheader"> Login</h2>

<form class = "loginform" action="http://localhost/loginscript.php" method="post">

  
    <label><b>Username</b></label><br>

    <input type="text" placeholder="Enter Username" name="username" required> <br>

 <label><b>Password</b></label>  <br>

 <input type="password" placeholder="Enter Password" name="password" required><br>



<button type="submit">Login</button><br>



   
   
   
    <!--<input id="checkbox1"   type="checkbox" checked="checked"> <label for="checkbox1" > Remember me </label> <br>-->
  

</form>





  </section>



  
  
  
  <section id="content2" class="tab-content">
    <h2 class="tabheader"> Register</h2>

<div>

<form class = "loginform" action="http://localhost/registercheck.php" method="post">

  
    <label><b>Username</b></label><br>

    <input type="text" placeholder="Enter Desired Username" name="username" required> <br>

 <label><b>First Name</b></label><br>

    <input type="text" placeholder="Enter First Name" name="firstname" required> <br>

    <label><b>Last Name</b></label><br>

    <input type="text" placeholder="Enter Last Name" name="surname" required> <br>


    <label><b>Date of Birth</b></label><br>

    <input type="date"  name="dob" required> <br>
 
 <label><b>Email Address</b></label>  <br>


 <input type="email" placeholder="Email Address" name="email" required><br> <br>





<input type ="hidden" name = "carlicence" value = "0">
<input type ="checkbox" name = "carlicence" value = "1"> I have a full car licence <br><br>

<input type ="hidden" name = "bikelicence" value ="0">
<input type ="checkbox" name = "bikelicence" value ="1"> I have a full bike licence <br><br>


 <label><b>Desired Password</b></label>  <br>

 <input type="password" placeholder="Enter Password" name="passwordregister" required><br>

<label><b>Confirm Password</b></label>  <br>

 <input type="password" placeholder="Enter Password" name="passwordconfirm" required><br> 

<button type="submit">Register</button> <br>


</form>


</div>




  </section>



  <section id="content3" class="tab-content">
    <h2 class="tabheaderlong"> Update Details</h2>

<div>

<?php


$sql = "SELECT USERNAME,  FIRSTNAME , SURNAME, EMAIL, DATEOFBIRTH  FROM customer WHERE customerID = '$sessionusername'";
$result = $conn->query($sql);


if ($result->num_rows > 0) {

while ($row = $result->fetch_assoc()) {

  
 
     $displayusername = $row['USERNAME'];
     $displayfirstname = $row['FIRSTNAME'];
     $displaysurname = $row['SURNAME'];
     $displaydob = $row['DATEOFBIRTH'];
     $email = $row['EMAIL'];
     $displayemail = (string)$email;
  

}

}

?>



<form class = "loginform" action="http://localhost/updateprofile.php" method="post">

  
    <label><b>Username</b></label><br>

    <input type="text"    placeholder="Please be aware you cannot change your username" value=" <?php  echo $displayusername; ?> " name="username" required> <br>

 <label><b>First Name</b></label><br>

    <input type="text" value="<?php echo$displayfirstname; ?> " name="firstname" required> <br>

    <label><b>Last Name</b></label><br>

    <input type="text" value="<?php echo$displaysurname; ?> " name="surname" required> <br>


    <label><b> Confirm Date of Birth</b></label><br>

    <input type="date"   value="<?php $displaydob; ?>"   name="dob" required> <br>
 
 <label><b>Email Address</b></label>  <br>


 <input type="email" value="<?php echo$displayemail; ?>" name="email" required><br> <br>





<input type ="hidden" name = "carlicence" value = "0">
<input type ="checkbox" name = "carlicence" value = "1"> I have a full car licence <br>

<input type ="hidden" name = "bikelicence" value ="0">
<input type ="checkbox" name = "bikelicence" value ="1"> I have a full bike licence <br><br>


 <label><b>Enter New Password</b></label>  <br>

 <input type="password" placeholder="Enter new Password" name="passwordregister" required><br>

<label><b> Confirm New Password</b></label>  <br>

 <input type="password" placeholder="confirm new Password" name="passwordconfirm" required><br> 

<button type="submit">Register</button> <br>


</form>


</div>




  </section>


<section id="content4" class="tab-content">
    <h2 class="tabheaderlong">Delete Account</h2>

<div>

<form class = "loginform" action="http://localhost/deleteaccount.php" method="post">

  
    

  

<button type="submit"> Delete Account</button> <br>


</form>


</div>




  </section>





</main>


</body>

