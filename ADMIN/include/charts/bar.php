<?php
include('../../../connection/connection.php');
 
         $sql ="SELECT *, SUM(tbl_order_item.quantity) as TOTAL_ORDER, (SUM(tbl_order_item.quantity) * SUM(tbl_order_item.item_price)) as REVENUE FROM tbl_order_item LEFT JOIN tbl_product ON tbl_order_item.product_id = tbl_product.id GROUP BY tbl_product.id ORDER BY TOTAL_ORDER DESC";
         $result = mysqli_query($conn,$sql);
         $chart_data="";
         while ($row = mysqli_fetch_array($result)) { 
           $revenue = $row['price'] * $row['TOTAL_ORDER'];
            $productname[]  = $row['name']  ;
            setlocale(LC_MONETARY,"en_PH");
            $sales[] = $revenue;
        }
 
 
 
 
?>
<!DOCTYPE html>
<html lang="en"> 
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <div style="width:100%;height:auto;text-align:center">
            <canvas  id="chartjs_bar"></canvas> 
        </div>    
    </body>
  <script src="//code.jquery.com/jquery-1.9.1.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
<script type="text/javascript">
      var ctx = document.getElementById("chartjs_bar").getContext('2d');
                var myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels:<?php echo json_encode($productname); ?>,
                        datasets: [{
                            backgroundColor: [
                               "#5969ff",
                                "#ff407b",
                                "#25d5f2",
                                "#ffc750",
                                "#2ec551",
                                "#7040fa",
                                "#ff004e"
                            ],
                            data:<?php echo json_encode($sales); ?>,
                        }]
                    },
                    options: {
                           legend: {
                        display: true,
                        position: 'bottom',
 
                        labels: {
                            fontColor: '#71748d',
                            fontFamily: 'Circular Std Book',
                            fontSize: 14,
                        }
                    },
 
 
                }
                });
    </script>
</html>