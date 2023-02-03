<?php 

$mylocation = 'Makati';
$houseloc = $_GET['houseloc'];

 ?> 

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.css'><link rel="stylesheet" href="./style.css">


</head>
<body>
<!-- partial:index.partial.html -->
<div style="margin:-5px;">
  <div style="margin-bottom:-20px"> <input type="hidden" id="routeFrom" name="routeFrom" value="<?php echo $mylocation; ?>" />
    </div>
   <div style="margin-bottom:12px"> <input type="hidden" id="routeTo" name="routeTo" value="<?php echo $houseloc; ?>" />
   <br />
   </div>
    <button id="routeGo" class="btn btn-primary btn-sm" style="width:100%; margin-top:-50px;">TRACK DELIVERY</button>
    <button id="waypointAdd" class="btn btn-info btn-sm" style="display:none;">Add waypoint</button>
<!--   <button id="waypointAdd" class="btn btn-danger btn-sm">Remove waypoint</button> -->
</div>


</div>
</div>

<div id="map_canvas" style="width:100%;"></div>

<!-- partial -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
<script src='https://maps.googleapis.com/maps/api/js?key=AIzaSyD61CGRsenVDXkRMrBzxQnVTtL7EZz0k_c&amp;libraries=places'></script><script  src="./script.js"></script>
<script>
  
$(document).ready(function(){
    $("#routeGo").trigger('click'); 
});


</script>
</body>
</html>
