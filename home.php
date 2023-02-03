  <?php 
        include('connection/connection.php');
        include('session.php'); 
         
        $result=mysqli_query($conn, "select * from users where user_id='$session_id'")or die('Error In Session');
        $row=mysqli_fetch_array($result);

        $total_ref=mysqli_query($conn, "select COUNT(buyer_id) as TOTAL from buyer where referral='".$row['user_id']."'");
        $total_r=mysqli_fetch_array($total_ref);

        $my_order=mysqli_query($conn, "SELECT COUNT(id) as TOTAL,SUM(amount) as POINTS FROM `tbl_order` WHERE customer_id ='".$row['user_id']."'");
        $my_total_ord=mysqli_fetch_array($my_order);

         $total_order=mysqli_query($conn, "SELECT COUNT(tbl_buyer.id) as TOTAL, SUM(tbl_buyer.amount) as COMMISH FROM `tbl_buyer` LEFT JOIN buyer ON tbl_buyer.customer_id = buyer.buyer_id WHERE buyer.referral='".$row['user_id']."'");
        $total_ord=mysqli_fetch_array($total_order);
         
         
   ?>

   <?php $total_com = $total_ord['COMMISH'] * 0.01; ?>

   <?php $points = $my_total_ord['POINTS'] * 0.01; ?>

   <?php
require_once "connection/ShoppingCart.php";

$member_id = $row['user_id']; // you can your integerate authentication module here to get logged in member

$shoppingCart = new ShoppingCart();
if (! empty($_GET["action"])) {
    switch ($_GET["action"]) {
        case "add":
            if (! empty($_POST["quantity"])) {
                
                $productResult = $shoppingCart->getProductByCode($_GET["code"]);
                
                $cartResult = $shoppingCart->getCartItemByProduct($productResult[0]["id"], $member_id);
                
                if (! empty($cartResult)) {
                    // Update cart item quantity in database
                    $newQuantity = $cartResult[0]["quantity"] + $_POST["quantity"];
                    $shoppingCart->updateCartQuantity($newQuantity, $cartResult[0]["id"]);
                } else {
                    // Add to cart table
                    $shoppingCart->addToCart($productResult[0]["id"], $_POST["quantity"], $member_id);
                }
            }
            break;
        case "remove":
            // Delete single entry from the cart
            $shoppingCart->deleteCartItem($_GET["id"]);
            break;
        case "empty":
            // Empty cart
            $shoppingCart->emptyCart($_GET['member_id']);
            break;
    }
}

?>


<!doctype html>
<html lang="en">


<!-- Mirrored from egemem.com/theme/finapp/view/app-index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 12 Feb 2020 06:37:52 GMT -->
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


    <script src="city.js"></script> 
    </style>
    <script>    
    window.onload = function() {    

        // ---------------
        // basic usage
        // ---------------
        var $ = new City();
        $.showProvinces("#province");
        $.showCities("#city");

        // ------------------
        // additional methods 
        // -------------------

        // will return all provinces 
        console.log($.getProvinces());
        
        // will return all cities 
        console.log($.getAllCities());
        
        // will return all cities under specific province (e.g Batangas)
        console.log($.getCities("Batangas"));   
        
    }
    </script>
</head>

<body>

<?php
$member_id = $row['user_id']; // you can your integerate authentication module here to get logged in member

$shoppingCart = new ShoppingCart();

$cartItem = $shoppingCart->getMemberCartItem($member_id);
$item_quantity = 0;
$item_price = 0;
if (! empty($cartItem)) {
    if (! empty($cartItem)) {
        foreach ($cartItem as $item) {
            $item_quantity = $item_quantity + $item["quantity"];
            $item_price = $item_price + ($item["price"] * $item["quantity"]);
        }
    }
}
?>

    <!-- loader -->
    <div id="loader">
        <img src="assets/img/logo-icon.png" alt="icon" class="loading-icon">
    </div>
    <!-- * loader -->

    <!-- App Header -->
    <div class="appHeader bg-primary text-light">
        <div class="left">
            <a href="#" class="headerButton" data-toggle="modal" data-target="#sidebarPanel">
                <ion-icon name="menu-outline"></ion-icon>
            </a>
        </div>
        <div class="pageTitle">
            <img src="logo/white.png" alt="logo" class="logo">
        </div>
        
    </div>
    <!-- * App Header -->


    <?php if($_GET['view'] == 'HOME'){ ?>
    
    <?php include('home_route/home.php');   ?>

    <?php }else if($_GET['view'] == 'SETTING'){ ?>

    <?php include('home_route/setting.php');   ?> 

    <?php }else if($_GET['view'] == 'PRODUCTS'){ ?>

    <?php include('home_route/product.php');   ?>   

    <?php }else if($_GET['view'] == 'SPECIFIC'){ ?>
   
    <?php include('home_route/specific.php');   ?> 

    <?php }else if($_GET['view'] == 'PROCESS'){ ?>
   
    <?php include('home_route/process.php');   ?> 

    <?php }else if($_GET['view'] == 'PROCESSORDER'){ ?>
   
    <?php include('home_route/process_order.php');   ?> 

    <?php }else if($_GET['view'] == 'MYORDERS'){ ?>
   
    <?php include('home_route/myorder.php');   ?> 

    <?php }else if($_GET['view'] == 'MARKETPLACE'){ ?>  

    <?php include('home_route/marketplace.php');   ?>   
    
    <?php } else { ?>

    <?php } ?>    
    <!-- App Bottom Menu -->
    <div class="appBottomMenu">
        <a href="home.php?view=<?php echo 'HOME'; ?>" class="item active">
            <div class="col">
                <ion-icon name="pie-chart-outline"></ion-icon>
                <strong>Home</strong>
            </div>
        </a>
        <a href="home.php?view=<?php echo 'MARKETPLACE'; ?>" class="item">
            <div class="col">
                <ion-icon name="document-text-outline"></ion-icon>
                <strong>Marketplace</strong>
            </div>
        </a>
        <a href="javascript:;" class="item" data-toggle="modal" data-target="#sidebarPanel">
            <div class="col">
                <ion-icon name="menu-outline"></ion-icon>
                <strong>Menu</strong>
            </div>
        </a>
    </div>
    <!-- * App Bottom Menu -->

    <!-- App Sidebar -->
    <div class="modal fade panelbox panelbox-left" id="sidebarPanel" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <!-- profile box -->
                    <div class="profileBox pt-2 pb-2">
                        <div class="in">
                            <strong><?php echo strtoupper($row['fullname']); ?></strong>
                            <div class="text-muted"><?php echo strtoupper($row['date_created']); ?></div>
                        </div>
                        <a href="#" class="btn btn-link btn-icon sidebar-close" data-dismiss="modal">
                            <ion-icon name="close-outline"></ion-icon>
                        </a>
                    </div>
                    <!-- * profile box -->
                   

                    <!-- menu -->
                    <div class="listview-title mt-1">Menu</div>
                    <ul class="listview flush transparent no-line image-listview">
                        <li>
                            <a href="home.php?view=<?php echo 'MYORDERS'; ?>" class="item">
                                <div class="icon-box bg-primary">
                                    <ion-icon name="pie-chart-outline"></ion-icon>
                                </div>
                                <div class="in">
                                    My Orders
                                   
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="app-pages.html" class="item">
                                <div class="icon-box bg-primary">
                                    <ion-icon name="document-text-outline"></ion-icon>
                                </div>
                                <div class="in">
                                    My Withdraw
                                </div>
                            </a>
                        </li>
                    
                    </ul>
                    <!-- * menu -->

                    <!-- others -->
                    <div class="listview-title mt-1">Others</div>
                    <ul class="listview flush transparent no-line image-listview">
                        <li>
                            <a href="home.php?view=<?php echo 'SETTING'; ?>" class="item">
                                <div class="icon-box bg-primary">
                                    <ion-icon name="settings-outline"></ion-icon>
                                </div>
                                <div class="in">
                                    Settings
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="logout.php" class="item">
                                <div class="icon-box bg-primary">
                                    <ion-icon name="log-out-outline"></ion-icon>
                                </div>
                                <div class="in">
                                    Log out
                                </div>
                            </a>
                        </li>
                    </ul>
                    <!-- * others -->


                </div>
            </div>
        </div>
    </div>
    <!-- * App Sidebar -->

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


<!-- Mirrored from egemem.com/theme/finapp/view/app-index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 12 Feb 2020 06:38:01 GMT -->
</html>