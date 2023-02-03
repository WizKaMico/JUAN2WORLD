  
<?php

include('../connection/connection.php');
include('session.php'); 
 
$result=mysqli_query($conn, "SELECT * FROM buyer where buyer_id='$buyer_session_id'")or die('Error In Session');
$row=mysqli_fetch_array($result);

require_once "../connection/ShoppingCart.php";



$member_id = $row['buyer_id']; // you can your integerate authentication module here to get logged in member

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
            $shoppingCart->emptyCart($member_id);
            break;
    }
}



?>



<!DOCTYPE html>
<html lang="en">
<head>
	<title>JUAN2WORLD : OFFICIAL</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/linearicons-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/slick/slick.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/MagnificPopup/magnific-popup.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->


<script src="city.js"></script> 
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
<body class="animsition">


<?php


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
	
	<!-- Header -->
	<header>
		<!-- Header desktop -->
		<div class="container-menu-desktop">
			<!-- Topbar -->
			<div class="top-bar">
				<div class="content-topbar flex-sb-m h-full container">
					<div class="left-top-bar">
						Free shipping for standard order over $100
					</div>

					<div class="right-top-bar flex-w h-full">
						<a href="#" class="flex-c-m trans-04 p-lr-25">
							Help & FAQs
						</a>

						<a href="#" class="flex-c-m trans-04 p-lr-25">
							My Account
						</a>

						<a href="#" class="flex-c-m trans-04 p-lr-25">
							EN
						</a>

						<a href="#" class="flex-c-m trans-04 p-lr-25">
							USD
						</a>
					</div>
				</div>
			</div>

			<div class="wrap-menu-desktop">
				<nav class="limiter-menu-desktop container">
					
					<!-- Logo desktop -->		
					<a href="index.php?view=<?php echo 'HOME'; ?>" class="logo">
						<img src="logo/logo.png" alt="IMG-LOGO">
					</a>

					<!-- Menu desktop -->
					<div class="menu-desktop">
						<ul class="main-menu">
							<li>
								<a href="index.php?view=<?php echo 'HOME'; ?>">WELCOME! <?php echo strtoupper($row['name']); ?></a>
								<ul class="sub-menu">
									<li><a href="index.php?view=<?php ECHO 'MYORDER'; ?>">MY ORDERS</a></li>
									<li><a href="logout.php">LOGOUT</a></li>
								</ul>
							</li>

							 <li>
								<a href="index.php?view=<?php echo 'HOME'; ?>">HOME</a>
							</li>

							<li>
								<a href="index.php?view=<?php echo 'ABOUT'; ?>">ABOUT</a>
							</li>

							<li>
								<a href="index.php?view=<?php echo 'CONTACT'; ?>">CONTACT</a>
							</li>
							
						</ul>
					</div>	

					<!-- Icon header -->
					<div class="wrap-icon-header flex-w flex-r-m">
						<div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 js-show-modal-search">
							<i class="zmdi zmdi-search"></i>
						</div>
                         <?php if (! empty($cartItem)) { ?>
						<div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti js-show-cart" data-notify="<?php echo $item_quantity; ?>">
							<i class="zmdi zmdi-shopping-cart"></i>
						</div>
					    <?php } ?>

						
					</div>
				</nav>
			</div>	
		</div>

		<!-- Header Mobile -->
		<div class="wrap-header-mobile">
			<!-- Logo moblie -->		
			<div class="logo-mobile">
				<a href="index.php?view=<?php echo 'HOME'; ?>"><img src="logo/logo.png" alt="IMG-LOGO"></a>
			</div>

			<!-- Icon header -->
			<div class="wrap-icon-header flex-w flex-r-m m-r-15">
				<div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 js-show-modal-search">
					<i class="zmdi zmdi-search"></i>
				</div>
				  <?php if (! empty($cartItem)) { ?>
				<div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti js-show-cart" data-notify="<?php echo $item_quantity; ?>">
					<i class="zmdi zmdi-shopping-cart"></i>
				</div>
				<?php } ?>

				
			</div>

			<!-- Button show menu -->
			<div class="btn-show-menu-mobile hamburger hamburger--squeeze">
				<span class="hamburger-box">
					<span class="hamburger-inner"></span>
				</span>
			</div>
		</div>


		<!-- Menu Mobile -->
		<div class="menu-mobile">
			<ul class="topbar-mobile">
				<li>
					<div class="left-top-bar">
						Free shipping for standard order over $100
					</div>
				</li>

				<li>
					<div class="right-top-bar flex-w h-full">
						<a href="#" class="flex-c-m p-lr-10 trans-04">
							Help & FAQs
						</a>

						<a href="#" class="flex-c-m p-lr-10 trans-04">
							My Account
						</a>

						<a href="#" class="flex-c-m p-lr-10 trans-04">
							EN
						</a>

						<a href="#" class="flex-c-m p-lr-10 trans-04">
							USD
						</a>
					</div>
				</li>
			</ul>

			<ul class="main-menu-m">
				            
				            <li>
								<a href="#">WELCOME! <?php echo strtoupper($row['name']); ?></a>
								<ul class="sub-menu">
									<li><a href="index.php?view=<?php ECHO 'MYORDER'; ?>">MY ORDERS</a></li>
									<li><a href="logout.php">LOGOUT</a></li>
								</ul>
							</li>

				            <li>
								<a href="index.php?view=<?php echo 'HOME'; ?>">HOME</a>
							</li>

							<li>
								<a href="index.php?view=<?php echo 'ABOUT'; ?>">ABOUT</a>
							</li>

							<li>
								<a href="index.php?view=<?php echo 'CONTACT'; ?>">CONTACT</a>
							</li>


							
			</ul>
		</div>

      <iframe src="dist/" style="width:100%; height:700px;"></iframe>

		<!-- Modal Search -->
		<div class="modal-search-header flex-c-m trans-04 js-hide-modal-search">
			<div class="container-search-header">
				<button class="flex-c-m btn-hide-modal-search trans-04 js-hide-modal-search">
					<img src="images/icons/icon-close2.png" alt="CLOSE">
				</button>

				<form class="wrap-search-header flex-w p-l-15" action="index.php?view=SEARCH" method="POST">
					<button class="flex-c-m trans-04" name="search">
						<i class="zmdi zmdi-search"></i>
					</button>
					<input class="plh3" type="text" placeholder="Search..." name="product" required="">
				</form>
			</div>
		</div>
	</header>

	<!-- Cart -->
	<div class="wrap-header-cart js-panel-cart">
		<div class="s-full js-hide-cart"></div>

		<div class="header-cart flex-col-l p-l-65 p-r-25">
			<div class="header-cart-title flex-w flex-sb-m p-b-8">
				<span class="mtext-103 cl2">
					Your Cart
				</span>

				<div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-cart">
					<i class="zmdi zmdi-close"></i>
				</div>
			</div>
			
			<div class="header-cart-content flex-w js-pscroll">
				<ul class="header-cart-wrapitem w-full">

					 <?php foreach ($cartItem as $item) { ?>  
					<li class="header-cart-item flex-w flex-t m-b-12">
						<a href="index.php?view=HOME&action=remove&id=<?php echo $item["cart_id"]; ?>">
						<div class="header-cart-item-img">
							<img src="<?php echo $item["image"]; ?>" alt="IMG">
						</div>
						</a>

						<div class="header-cart-item-txt p-t-8">
							<a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
								<?php echo $item["name"]; ?>
							</a>
							<?php $total = $item["price"] * $item["quantity"]; ?>

							<span class="header-cart-item-info">
								₱ <?php echo $item["price"]; ?>  x  <?php echo $item["quantity"]; ?> = ₱<?php echo $total; ?>
							</span>
						</div>
					</li>
					<?php } ?>

				
				</ul>
				
				<div class="w-full">
					<div class="header-cart-total w-full p-tb-40">
						Total: ₱ <?php echo $item_price; ?>
					</div>

					<div class="header-cart-buttons flex-w w-full">
						

						<a href="index.php?view=<?php echo 'PROCESS'; ?>" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-b-10" style="width:100%;">
							Check Out
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>

		



	<?php if($_GET['view'] == 'HOME'){ ?>


	<?php include('route/home.php'); ?>	


    <?php }else if($_GET['view'] == 'DETAILS'){ ?>

    <?php include('route/details.php'); ?>

     <?php }else if($_GET['view'] == 'SEARCH'){ ?>

    <?php include('route/search.php'); ?>

    <?php }else if($_GET['view'] == 'PROCESS'){ ?>

    <?php include('route/process.php'); ?>

    <?php }else if($_GET['view'] == 'PROCESSORDER'){ ?>	
	
	<?php include('route/process_order.php'); ?>	

	<?php }else if($_GET['view'] == 'ABOUT'){ ?>	
	
	<?php include('route/about.php'); ?>

	<?php }else if($_GET['view'] == 'MYORDER'){ ?>	
	
	<?php include('route/myorder.php'); ?>

	<?php }else if($_GET['view'] == 'CONTACT'){ ?>	
	
	<?php include('route/contact.php'); ?>	

    <?php }else if($_GET['view'] == 'REGISTER'){ ?>	
	
	<?php include('route/register.php'); ?>

	<?php }else if($_GET['view'] == 'LOGIN'){ ?>	
	
	<?php include('route/login.php'); ?>	

    <?php }else if($_GET['view'] == 'VERIFY'){ ?>

    <?php include('route/verify.php'); ?>	

	<?php } else { ?>
	

	<?php } ?>	

	<!-- Footer -->
	<footer class="bg3 p-t-75 p-b-32">
		<div class="container">
			

			<div class="p-t-40">
				<div class="flex-c-m flex-w p-b-18">
					<a href="#" class="m-all-1">
						<img src="images/icons/icon-pay-01.png" alt="ICON-PAY">
					</a>

					<a href="#" class="m-all-1">
						<img src="images/icons/icon-pay-02.png" alt="ICON-PAY">
					</a>

					<a href="#" class="m-all-1">
						<img src="images/icons/icon-pay-03.png" alt="ICON-PAY">
					</a>

					<a href="#" class="m-all-1">
						<img src="images/icons/icon-pay-04.png" alt="ICON-PAY">
					</a>

					<a href="#" class="m-all-1">
						<img src="images/icons/icon-pay-05.png" alt="ICON-PAY">
					</a>
				</div>

				<p class="stext-107 cl6 txt-center">
					<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved |  by <a href="#" target="_blank">JUAN2WORLD OFFICIAL</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->

				</p>
			</div>
		</div>
	</footer>


	<!-- Back to top -->
	<div class="btn-back-to-top" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="zmdi zmdi-chevron-up"></i>
		</span>
	</div>



<!--===============================================================================================-->	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
	   <script src="./script.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
	<script>
		$(".js-select2").each(function(){
			$(this).select2({
				minimumResultsForSearch: 20,
				dropdownParent: $(this).next('.dropDownSelect2')
			});
		})
	</script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/slick/slick.min.js"></script>
	<script src="js/slick-custom.js"></script>
<!--===============================================================================================-->
	<script src="vendor/parallax100/parallax100.js"></script>
	<script>
        $('.parallax100').parallax100();
	</script>
<!--===============================================================================================-->
	<script src="vendor/MagnificPopup/jquery.magnific-popup.min.js"></script>
	<script>
		$('.gallery-lb').each(function() { // the containers for all your galleries
			$(this).magnificPopup({
		        delegate: 'a', // the selector for gallery item
		        type: 'image',
		        gallery: {
		        	enabled:true
		        },
		        mainClass: 'mfp-fade'
		    });
		});
	</script>
<!--===============================================================================================-->
	<script src="vendor/isotope/isotope.pkgd.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/sweetalert/sweetalert.min.js"></script>
	<script>
		$('.js-addwish-b2').on('click', function(e){
			e.preventDefault();
		});

		$('.js-addwish-b2').each(function(){
			var nameProduct = $(this).parent().parent().find('.js-name-b2').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to wishlist !", "success");

				$(this).addClass('js-addedwish-b2');
				$(this).off('click');
			});
		});

		$('.js-addwish-detail').each(function(){
			var nameProduct = $(this).parent().parent().parent().find('.js-name-detail').html();

			$(this).on('click', function(){
				swal(nameProduct, "is added to wishlist !", "success");

				$(this).addClass('js-addedwish-detail');
				$(this).off('click');
			});
		});

		/*---------------------------------------------*/

		$('.js-addcart-detail').each(function(){
			var nameProduct = $(this).parent().parent().parent().parent().find('.js-name-detail').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to cart !", "success");
			});
		});
	
	</script>
<!--===============================================================================================-->
	<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
	<script>
		$('.js-pscroll').each(function(){
			$(this).css('position','relative');
			$(this).css('overflow','hidden');
			var ps = new PerfectScrollbar(this, {
				wheelSpeed: 1,
				scrollingThreshold: 1000,
				wheelPropagation: false,
			});

			$(window).on('resize', function(){
				ps.update();
			})
		});
	</script>
<!--===============================================================================================-->
 

	<script src="js/main.js"></script>


</body>
</html>