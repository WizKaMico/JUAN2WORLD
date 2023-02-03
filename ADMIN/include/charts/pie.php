<?php
	//connection
	include('../../../connection/connection.php');
 
	$sql = "SELECT *, SUM(tbl_order_item.quantity) as TOTAL_ORDER, (SUM(tbl_order_item.quantity) * SUM(tbl_order_item.item_price)) as REVENUE FROM tbl_order_item LEFT JOIN tbl_product ON tbl_order_item.product_id = tbl_product.id GROUP BY tbl_product.id ORDER BY TOTAL_ORDER DESC";
	$query = $conn->query($sql);
 
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
</head>
<body>
<!-- this is where we show our chart -->
<div id="piechart" style="width: 100%; height: auto;"></div>
 
<!-- Load our Scripts -->
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>  
<script type="text/javascript">  
	google.charts.load('current', {'packages':['corechart']});  
	google.charts.setOnLoadCallback(drawChart);  
	function drawChart(){  
    var data = google.visualization.arrayToDataTable([  
              	['PRODUCT', 'ORDERS'],  
              	<?php  
	              	while($row = $query->fetch_assoc()){  
	               		echo "['".$row["name"]."', ".$row["TOTAL_ORDER"]."],";  
	              	}  
              	?>  
         	]);  
    var options = {  
          		title: '',  
          		//is3D:true,  
          		pieHole: 0.4  
         	};  
    var chart = new google.visualization.PieChart(document.getElementById('piechart'));  
    chart.draw(data, options);  
}  
</script>
</body>
</html>