<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Max's Vehicle Rental</title>
  
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
  
  <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
  
  <link rel="stylesheet" href="styles/styles.css">
</head>

<body>
<?php

session_start();

if (isset($_SESSION['storedusername']))
{
$sessionusername = $_SESSION['storedusername'];

echo "Hello $sessionusername <br />\n";

echo "<a href = logout.php> Logout</a> <br />\n" ;

echo "<a href = cancel.php> Need to cancel a booking?</a> <br />\n" ;

}

else
{

  echo "Not logged in <br/>\n";

date_default_timezone_set("Europe/London");
echo "The time is " . date("h:ia");

}


 
?>



<header>
  <h2 class= "mainheader">Max's Vehicle Rental</h1>

  

  <br>



</header>

<br>
<br>
<br>


<div>
<h2 class = "loginlink"> <a href="http://localhost/loginscreen.php">Log In/Register</a></h2>

</div>

<main class="tab_container">
  
 
  <input id="tab1" type="radio" name="tabs" checked>
  <!--the *label* for the radio button forms the clickable tabs-->
  <label for="tab1"  class= "navigation"><i class="fa fa-car"></i><span>Cars </span></label>

  <input id="tab2" type="radio" name="tabs">
  <label for="tab2"   class= "navigation" ><i class="fa fa-motorcycle"></i><span>Motorcycles</span></label>

  <input id="tab3" type="radio" name="tabs">
  <label for="tab3"    class = "navigation" ><i class="fa fa-truck"></i><span>Vans</span></label>

<input id="tab4" type="radio" name="tabs">
  <label for="tab4"    class= "navigation" ><i class="fa fa-bicycle"></i><span>Bikes</span></label>


  

  <!--content for tab 1-->
  <section id="content1" class="tab-content">
    <h2 class="tabheader"> Find Cars</h2>

<div>
<form action="carsearchcheck.php" method="post">
       <label class = "selectTag"> Location </label>
  <select name="siteID">
    
    <option value= 1>Leicester</option>
    <option value= 2>Derby</option>
    <option value= 3>Nottingham</option>
    
  </select><br>


    
    
<label class = "selectTag"> Make </label>
  <select name="make" >
    
    <option value="Hyundai">Hyundai</option>
    <option value="Subaru">Subaru</option>
    <option value="Fiat">Fiat</option>
    <option value="Audi">Audi</option>
   <option value="Honda">Honda</option>
    <option value="Mercedes">Mercedes</option>
    <option value="Lexus">Lexus</option>
    <option value="KIA">KIA</option>
    <option value="Suzuki">Suzuki</option>
    <option value="Toyota">Toyota</option>
    <option value="Seat">SEAT</option>
    <option value="BMW">BMW</option>
    <option value="Smart">Smart</option>

  </select>
  <br>
  <input type="submit">

      
       



<label class = "selectTag"> Number of seats </label>
  <select name="seats">
    
    <option value= 2>2</option>
    <option value= 3 >3</option>
    <option value= 5>5</option>
    <option value= 7 >7</option>

  </select>

  <br>


  


<label><b>Start Date</b></label><br>

    <input type="date"  name="carstart" required> <br>


    <label><b>End Date</b></label><br>

    <input type="date"  name="carend" required> <br>


<button class = "search" type="submit">Search</button><br>



</form>


  </div>








  </section>

  <!--content for tab 2-->
  <section id="content2" class="tab-content">
    <h2 class="tabheaderlong"> Find Motorcycles </h2>
  
<div>

<form action="motorcyclesearchcheck.php" method="post">
       <label class = "selectTag"> Location </label>
  <select name="bikesiteID">
    
    <option value= 1 >Leicester</option>
    <option value= 2 >Derby</option>
    <option value= 3 >Nottingham</option>
    
  </select>
  <br>



       <label class = "selectTag"> Make </label>
  <select name="bikemake">
    
    <option value="Ducati">Ducati</option>
    <option value="Honda">Honda</option>
    <option value="Kawasaki">Kawasaki</option>
    <option value="Peugeot">Peugeot</option>
    <option value="Piaggio">Piaggio</option>
    <option value="Suzuki">Suzuki</option>
    <option value="Triumph">Triumph</option>
    <option value="Yamaha">Yamaha</option>
    <option value="BMW">BMW</option>

  </select>
<br>

 <label class = "selectTag"> Engine Size Min </label>
  <select name="enginemin">
    <option value= 0 >Any </option>
    <option value= 100> 100cc   </option>
    <option value= 200>200cc </option>
    <option value= 300>300cc</option>
    <option value= 400> 400cc </option>
    <option value= 500>500cc</option>
    <option value= 600>600cc</option>
    <option value= 700>700cc</option>



  </select>

<br>

<label class = "selectTag"> Engine Size Max </label>
  <select name="enginemax">
    <option value= 10000>Any</option>

    <option value= 100> &lt; 100cc   </option>
    <option value= 200> 200cc</option>
    <option value= 300>300cc</option>
    <option value= 400> 400cc </option>
    <option value= 500>500cc</option>
    <option value= 600>600cc</option>
    <option value= 700>700cc</option>
    <option value= 800> 800cc </option>
    <option value= 900>900cc</option>
    <option value= 1000>1000cc</option>
    <option value= 1500>1500cc</option>
    <option value= 2000> 2000cc </option>
    <option value= 2500>2500cc</option>
    <option value= 3000>3000cc</option>
    


  </select>






<br>
<br>






<label><b>Start Date</b></label><br>

    <input type="date"  name="mbstart" required> <br>


    <label><b>End Date</b></label><br>

    <input type="date"  name="mbend" required> <br>



<button class = "search" type="submit">Search</button><br>

</form>

  </div>



  </section>

  <!--content for tab 3-->
  <section id="content3" class="tab-content">
    <h2 class="tabheader">Find Vans</h2>

    <div>
<form action="vansearchcheck.php" method="post">
       <label class = "selectTag"> Location </label>
  <select name="vansiteID">
    
    <option value= 1>Leicester</option>
    <option value= 2>Derby</option>
    <option value= 3>Nottingham</option>
    
  </select><br>


    
     
<label class = "selectTag"> Make </label>
  <select name="vanmake">
    
    <option value="Ford">Ford</option>
    <option value="Renault">Renault</option>
    <option value="Citroen">Citroen</option>
    <option value="Peugeot">Peugeot</option>



  </select>
  <br>
  <input type="submit">

      
       <label class = "selectTag"> Storage Capacity </label>
  <select name="size">
    <option value= 10000>Any</option>
    <option value= 200 > Up to Small</option>
    <option value= 300> Up to Medium</option>
    <option value= 400> Up to Large</option>


    
    

  </select>

<br>

<label><b>Start Date</b></label><br>

    <input type="date"  name="vanstart" required> <br>


    <label><b>End Date</b></label><br>

    <input type="date"  name="vanend" required> <br>


<button class = "search" type="submit">Search</button><br>

</form>



    </div>

  
     
  </section>


  <section id="content4" class="tab-content">
    <h2 class="tabheader">Find Bikes</h2>

<div>
<form action="pedalsearchcheck.php" method="post">
       <label class = "selectTag"> Location </label>
  <select name="pedalsiteID">
    
    <option value= 1>Leicester</option>
    <option value= 2>Derby</option>
    <option value= 3>Nottingham</option>
    
  </select><br>


    
     
<label class = "selectTag"> Category </label>
  <select name="pedalcategory">
    <option value="Mountain">Mountain</option>
    <option value="Road">Road</option>
    <option value="BMX">BMX</option>
    
    



  </select>
  <br>


<label><b>Start Date</b></label><br>

    <input type="date"  name="bikestart" required> <br>


    <label><b>End Date</b></label><br>

    <input type="date"  name="bikeend" required> <br>








  <button class = "search" type="submit">Search</button><br>

      
    

</form>



    </div>








     
     
  </section>



</main>

<footer>
  
</footer>

</body>
</html>
