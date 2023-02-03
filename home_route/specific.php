    <?php 

$prod_id = $_GET['prod_id'];    

include('connection/connection.php');

$date = date_default_timezone_set('Asia/Manila'); 
$result=mysqli_query($conn, "select * from users where user_id='$session_id'")or die('Error In Session');
$row=mysqli_fetch_array($result);
 

$product=mysqli_query($conn, "SELECT * FROM product where prod_id='$prod_id'")or die('Error In Session');
$prow=mysqli_fetch_array($product); 

$lazprod=mysqli_query($conn, "SELECT * FROM tbl_product where id='$prod_id'")or die('Error In Session');
$lrow=mysqli_fetch_array($lazprod); 


?>

    <!-- App Capsule -->
    <div id="appCapsule">


        <div class="section mt-2">
            <h5>
                  <?php echo strtoupper($prow['PRODUCT']); ?>
            </h5>
           
        </div>

        <div class="section mt-2">
        
            <figure>
                <img src="<?php echo $prow['IMAGE']; ?>" alt="image" class="imaged img-fluid">
            </figure>
            <h5>PRICE : <?php echo $prow['PRICE']; ?></h5>
           <?php  $name = str_replace(array(' ','/',','), "-", $lrow['name']); ?>     
            <p></p>
            
            <!-- <p style="width:50px;">
               <?PHP echo $prow['DESCRIPTION']; ?>
            </p> -->
            
        </div>

        <!-- <div class="section">
            <a href="#" class="btn btn-block btn-primary" data-toggle="modal" data-target="#actionSheetShare">
                <ion-icon name="share-outline"></ion-icon> Share This Post
            </a>
        </div>
 -->
         <div class="section">
         <div class="fb-share-button" data-href="http://localhost/DROP/LINK/?prod_id=2&email=tricore012@gmail" data-layout="button" data-size="large"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http://localhost/DROP/LINK/?prod_id=2&email=tricore012@gmail%2Fplugins%2F&amp;src=sdkpreparse" class="btn btn-block btn-primary fb-xfbml-parse-ignore">   <ion-icon name="share-outline"></ion-icon> Share store FB</a></div>
         <br>
         <div class="fb-share-button" data-href="https://www.lazada.com.ph/products/<?php echo strtolower($name); ?>-<?php echo strtolower($lrow['code']); ?>.html" data-layout="button" data-size="large"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https://www.lazada.com.ph/products/<?php echo strtolower($name); ?>-<?php echo strtolower($lrow['code']); ?>.html%2Fplugins%2F&amp;src=sdkpreparse" class="btn btn-block btn-primary fb-xfbml-parse-ignore">   <ion-icon name="share-outline"></ion-icon> Share Lazada (FB)</a></div>
        



    </div>
    <!-- * App Capsule -->