<?php 

if(!empty($_GET['view'])){
  


}else{

  $_GET['view'] = 'LOGIN';

}



?>    


<!doctype html>
<html lang="en">


<!-- Mirrored from egemem.com/theme/finapp/view/app-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 12 Feb 2020 06:38:13 GMT -->
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>JUAN2WORD | HOME</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Finapp HTML Mobile Template">
    <meta name="keywords" content="bootstrap, mobile template, cordova, phonegap, mobile, html, responsive" />
    <link rel="apple-touch-icon" sizes="180x180" href="assets/img/apple-touch-icon.png">
    <link rel="icon" type="image/png" href="assets/img/favicon.png" sizes="32x32">
    <link rel="shortcut icon" href="assets/img/favicon.png">
</head>

<body class="bg-light">



    <!-- loader -->
    <div id="loader">
        <img src="assets/img/logo-icon.png" alt="icon" class="loading-icon">
    </div>
    <!-- * loader -->

    <!-- App Header -->
    <div class="appHeader no-border">
        <div class="left">
            <a href="javascript:;" class="headerButton goBack">
                <ion-icon name="chevron-back-outline"></ion-icon>
            </a>
        </div>
        <?php if($_GET['view'] == 'VERIFIED' || $_GET['view'] == 'VERIFY' || $_GET['view'] == 'SECURITY'){ ?>
        <div class="pageTitle"><center><img src="logo/logo.png" style="width:50%;"></center></div>
        <?php } else { ?>
        <div class="pageTitle"></div>
        <?php } ?>
        <div class="right">
        <?php if($_GET['view'] == 'REGISTER'){ ?>    
            <a href="index.php?view=<?php echo 'LOGIN'; ?>" class="headerButton">
                Login
            </a>
        <?php }else{ ?>
        

        <?php } ?>    
        </div>
    </div>
    <!-- * App Header -->

    <?php if($_GET['view'] == 'LOGIN'){ ?>
    <?php session_start(); ?>
    <?php include('route/login.php'); ?>

    <?php } else if($_GET['view'] == 'VERIFY') { ?>
    <?php session_start(); ?>
    <?php include('route/verify.php'); ?>  

    <?php } else if($_GET['view'] == 'FORGOT') { ?>
    <?php session_start(); ?>
    <?php include('route/forgot.php'); ?>  

    <?php } else if($_GET['view'] == 'SECURITY') { ?>
    <?php include('route/security.php'); ?> 
  
    <?php } else if($_GET['view'] == 'CHANGEPASSWORD') { ?>
    <?php include('route/changepass.php'); ?> 
 
    <?php } else if($_GET['view'] == 'VERIFIED') { ?>

    <?php include('route/verified.php'); ?>    

    <?php } else { ?>
    <?php session_start(); ?>
    <?php include('route/register.php'); ?>    
   
    <?php } ?>


    <!-- ///////////// Js Files ////////////////////  -->
    <!-- Jquery -->
    <script src="assets/js/lib/jquery-3.4.1.min.js"></script>
    <!-- Bootstrap-->
    <script src="assets/js/lib/popper.min.js"></script>
    <script src="assets/js/lib/bootstrap.min.js"></script>
    <!-- Ionicons -->
    <script src="../../../../unpkg.com/ionicons%405.0.0/dist/ionicons.js"></script>
    <!-- Owl Carousel -->
    <script src="assets/js/plugins/owl-carousel/owl.carousel.min.js"></script>
    <!-- Base Js File -->
    <script src="assets/js/base.js"></script>


</body>


<!-- Mirrored from egemem.com/theme/finapp/view/app-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 12 Feb 2020 06:38:13 GMT -->
</html>