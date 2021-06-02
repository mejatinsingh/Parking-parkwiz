 <?php
session_start();
if (!($_SESSION['logged_in'] == 1))
{
  header("location:login.html");
}

include '../php/map.php';
$php_variable = $slots;
?>

<html>
<head>
<title>PARKWHIZ</title>
<link rel="stylesheet" href="../css/map.css">

<link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css"/>
<script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"></script>
<script  src=" ../js/maps.js"></script>
<script type="text/javascript" src="../js/cord.geojson"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="//geodata.solutions/includes/countrystatecity.js"></script>
</head>

<body >
  <div class="navbar">
      <a href="#index" class="state">index</a>
      <a href="#b">Features</a>
      <a href="#contact">About us</a>
      <a href="pricing.html">Parking Options</a>
      <a href="#Payment">Locations</a>
      <a href="../php/logout.php" target="_blank" style="float:right;">Logout</a>
    </div>
<div style="position: relative; padding-top:10%">
  <select name="country" class="countries order-alpha" id="countryId">
      <option value="">Select Country</option>
  </select>
  <select name="state" class="states order-alpha" id="stateId">
      <option value="">Select State</option>
  </select>
  <select name="city" class="cities order-alpha" id="cityId" onchange="addarea()">
      <option value="">Select City</option>
  </select>
  <select name="area" class="areas order-alpha" id="areaId" onchange="navigate()">
    <option value="">Select Area</option>
  </select><right>

</div><br>

<div id='mapid' style='width: 100%; height: 93%; position:fixed;'></div>
<script>
    slotsstatus = <?php echo json_encode($php_variable); ?>;
    var mymap = L.map('mapid',{
      minZoom:0,
      maxZoom:20
    }).setView( [21.945095443371134,78.71294323252256], 5);
  L.tileLayer('https://api.mapbox.com/styles/v1/dipak1/ckg5ndg8219sz19nrt0bmityf/tiles/256/{z}/{x}/{y}@2x?access_token=pk.eyJ1IjoiZGlwYWsxIiwiYSI6ImNrZzVuOXpxNzB3N3AycHFudGI4aWpoZ2IifQ.-1SLpWox8kZryxZW5ol9cA', {
    maxNativeZoom: 20, maxZoom: 20, minNativeZoom: 0, minZoom: 0
  }).addTo(mymap);
    mymap.attributionControl.addAttribution("<a href=\"https://www.jawg.io\" target=\"_blank\">&copy; Jawg</a> - <a href=\"https://www.openstreetmap.org\" target=\"_blank\">&copy; OpenStreetMap</a>&nbsp;contributors")
    mymap.locate({setView: true, maxZoom: 16});
    function onLocationFound(e)
    {
      var radius = e.accuracy;
      L.marker(e.latlng).addTo(mymap)
          .bindPopup("You are within " + radius + " meters from this point").openPopup();
      L.circle(e.latlng, radius).addTo(mymap);
  }
  mymap.on('locationfound', onLocationFound);
  function navigate()
  {
    var datalayer;
    myStyle = { "color": "white"};
    var a =document.getElementById("areaId").value;
    var i=0;
    if(a.localeCompare("Lalbagh")==0)
    {
      $.getJSON("../js/cord.geojson",function(data)
      {
        datalayer = L.geoJson(data ,{
        style:function(feature){

          console.log(slotsstatus);
          console.log(slotsstatus[feature.properties.No-1]);
          console.log(feature.properties.No);

          switch(feature.properties.No)
          {
            default:
            if(typeof slotsstatus[feature.properties.No-1]!== "undefined"){
            if(slotsstatus[feature.properties.No-1].localeCompare("0")==0)
            {
               console.log(slotsstatus[feature.properties.No-1]);
               return{color:"white"};
            }
            else
            {
                console.log(slotsstatus[feature.properties.No-1]);
                console.log("else ");
                return{color:"red"};
            }}
          }
        },
        onEachFeature: function(feature, featureLayer) {

          switch(feature.properties.No)
          {
            default:
            if(typeof slotsstatus[feature.properties.No-1]!== "undefined"){
            if(slotsstatus[feature.properties.No-1].localeCompare("1")==0)
            {
               featureLayer.bindPopup('This Slot is already taken!! Please choose another one.');
            }
            else
            {
                window.s = feature.properties.No;
                featureLayer.bindPopup('<a href=""; target="_blank">Confirm Slot No </a>'+feature.properties.No).on('click', function() {
                window.location.href="reservation.php?slot="+feature.properties.No;
                });
            }}
          }
      }
      }).addTo(mymap);
      mymap.fitBounds(datalayer.getBounds());
      });

    }
    else {
          //mymap.removeLayer(datalayer);
          alert("No Slots Empty in this Area. Sorry for Inconvience!!");
        }
  }
</script>

</body>
</html>
