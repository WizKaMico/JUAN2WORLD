

<!-- App Capsule -->


<div id="appCapsule">

     <?php 
        include('connection/connection.php');
        include('session.php'); 
         
        $result=mysqli_query($conn, "select * from users where user_id='$session_id'")or die('Error In Session');
        $row=mysqli_fetch_array($result);
         
         ?>



        <div class="carousel-slider owl-carousel owl-theme">
            <div class="item p-2">
                <img src="assets/img/sample/photo/vector1.jpg" alt="alt" class="imaged w-100 square mb-4">
                <h2>Welcome! <?php echo $row['fullname']; ?></h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
            </div>
            <div class="item p-2">
                <img src="assets/img/sample/photo/vector2.jpg" alt="alt" class="imaged w-100 square mb-4">
                <h2>Minimalist and Stylish</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
            </div>
            <div class="item p-2">
                <img src="assets/img/sample/photo/vector3.jpg" alt="alt" class="imaged w-100 square mb-4">
                <h2>Easy to Use Components</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
            </div>
        </div>

        <div class="carousel-button-footer">
            <div class="row">
                <div class="col-12">
                     <a href="home.php?view=<?php echo 'HOME'; ?>" class="btn btn-lg btn-primary btn-block">CONTINUE</a>
                </div>
              
            </div>
        </div>


    </div>

    <!-- * App Capsule -->

