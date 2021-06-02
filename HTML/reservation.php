<?php
session_start();
if (!($_SESSION['logged_in'] == 1))
{
 header("location:login.html");
}
?>

<html>
<head>
<meta charset="utf-8">
<title>RESERVATION</title>
<link rel="stylesheet" href="..\css\reservation.css">
<link rel="stylesheet"  href="https://unpkg.com/simplebar@latest/dist/simplebar.css"/>
<script src="https://unpkg.com/simplebar@latest/dist/simplebar.min.js"></script>
</head>


<body data-simplebar onload="slott()">
<div class="navbar">
    <a href="#index" class="state">index</a>
    <a href="#news">Features</a>
    <a href="#contact">About us</a>
    <a href="pricing.html">Parking Options</a>
    <a href="#Payment">Locations</a>
  </div>

  <div class="classa">
    <div class="dark"><pre>

    RESERVATION
  </pre>
</div>
  </div>

  <div class ="b">
    <div class="b1">
    <div class="b1sub"><img src="..\images\ic2.png" width="100px" height="100px"></div>
    <div class="b1sub2"><h2 class="l1 ">Save Money</h2>
Save up to 70% on our site compared to the cost of on-airport parking. </div>
   </div>

   <div class="b2">

    <div class="b2sub"><img src="..\images\ic1.png" width="100px" height="100px"float="center"> </div>
    <div class="b2sub2"><h2 class="l1 ">Save Stress</h2>Guarantee your parking spot by booking in advance. Can’t make it? Cancellations are free. </div>
  </div>

  <div  class="b3">
    <div class="b3sub"><img src="..\images\ic3.png" width="100px" height="100px" float="center"> </div>
      <div class="b3sub2"><h2 class="l1 ">Save Time</h2>It’s easy to compare parking at all major airports. Booking a reservation is quick & simple! </div>
    </div><center>
    <hr style="width:90%"></center>
  </div>
<br><br>
<div class="d">
  <div class="ddark">
  <div class='signup-container'>
    <div class='left-container'>

      <h1 style="text-align: center; color:#61862F">Booking Details</h1>

      <form method="post" name="myform" action="..\php\reservation.php">
      <br><br><label for='SlotNo'>Slot No</label><br>
      <input readonly id='slotno' name='slotno' type='text' value="">
      <br>
      <label for='Vechile Name'>Vechile Name</label><br>
      <input required id='VechileName' name='VechileName' type='text'>
      <br>
      <label for='Model-Name'>Vehicle No</label><br>
      <input required id='vehicleno' name='vehicleno' placeholder="KA05HY7071" type='text'>
      <br>
      <label for='Checkin'>Estimated Check-IN</label><br>
      <input required id="checkin" name="checkin"type="datetime-local" />
      <br>
      <label for='Checkout'>Estimated Check-OUT</label><br>
      <input required id="checkout" name="checkout" type="datetime-local" onchange="pricc()"/>
      <br>
      <label for='2-wheeler'>Type</label><br>
      <div class='radio-container'>
        <input required id='2-wheeler' name='pet-gender' type='radio' value='2' onchange="p2()">
        <label for='2-wheeler'>2-wheeler</label>
        <input required  checked='' id='4-wheeler' name='pet-gender' type='radio' value='4' onchange="p4()">
        <label for='4-wheeler'>4-wheeler</label>
      </div>
      <br>
      <label for='Payment-Card'>Payment Card</label><br>
      <div class='radio-container'>
        <input required checked='' id='Card' name='card' type='radio' value='card'>
        <label for='Payment-Card'>Card</label>
        <!input required id='UPI' name='UPI' type='radio' value='UPI'>
        <label for='pet-debit'>UPI</label>
      </div>
      <br>
      <label for='plan'>Plan</label><br>
      <div class='radio-container' >
        <input required checked='' id='plan' name='plan-type' type='radio' value='premium' onchange="pricep()">
        <label for='plan'>Premium</label>
        <input required id='plan-type-standard' name='plan-type' type='radio' value='standard' onchange="pricess()">
        <label for='plan-type-standard'>Standard</label>
        <input required id='plan-type-basic' name='plan-type' type='radio' value='basic' onchange="priceb()">
        <label for='plan-type-basic'>Basic</label>
        <input required id='plan-type-100-plus' name='plan-type' type='radio' value='economy' onchange="pricee()">
        <label for='plan-type-100-plus'>Economy</label>
      </div><br>
      <label for='price'>Estimated Fare (In $)</label><br>
      <input readonly id="price" name="price" type="text" value=""/>
      <center><br><br>
        <input type="submit" class ="pbuttons"style=" width:200px";></center>
      </form>
    </div>
    <div class="right">
      <h1 class="h1r"> Car Parking Options </h1><br>
      <h2> Our Car Parking Calculator is available to help you select the best parking option. We recommend to book parking online in advance and save up to 30%!
            Select the dates as well as your preferred parking option and get the total cost for the entire period. Booking a parking spot has never been easier.
      </h2><br><br>
      <a href ="pricing.html" ><input type="button" class="pbutton" ref=" pricing.html"value="Parking Options"></a>
    </div>
    <div>
    </div>

  </div>
</div>
</div><br><br><br><br>
<iframe src="footer.html" style=" top:0; left:0; bottom:0; right:0; width:100%; height:280px; border:none; margin:0; padding:0; overflow:hidden; z-index:999999;">
    Your browser doesn't support iframes
</iframe>
    <script type="text/javascript" src="../js/reservation.js"> </script>
</body>
</html>
