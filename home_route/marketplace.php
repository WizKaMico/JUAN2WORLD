    <!-- Extra Header -->
    <div class="extraHeader pr-0 pl-0">
        <ul class="nav nav-tabs lined" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#waiting" role="tab">
                    MARKET
                </a>
            </li>
            <?php if (! empty($cartItem)) { ?>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#paid" role="tab">
                    CART
                 <span class="badge badge-danger" style="margin-left:5px;"><?php echo $item_quantity; ?></span>
                </a>
            </li>
        <?php } ?>
        </ul>
    </div>
    <!-- * Extra Header -->


    <!-- App Capsule -->
    <div id="appCapsule" class="extra-header-active">

        <div class="section tab-content mt-2 mb-1">

            <!-- waiting tab -->
            <div class="tab-pane fade show active" id="waiting" role="tabpanel">
                <div class="row">

          

                
                      <?php
                        $query = "SELECT * FROM tbl_product";
                        $product_array = $shoppingCart->getAllProduct($query);
                        if (! empty($product_array)) {
                            foreach ($product_array as $key => $value) {
                                ?>


             
                    <div class="col-6 mb-2 ">
                        <form method="post" action="home.php?view=MARKETPLACE&action=add&code=<?php echo $product_array[$key]["code"]; ?>"> 
                        <div class="bill-box">
                            <div class="img-wrapper">
                                <a data-toggle="modal" data-target="#product<?php echo $product_array[$key]["id"] ?>">
                                <img src="<?php echo $product_array[$key]["image"]; ?>" alt="img" class="imaged w-100" style="width:100%;height:170px;">
                                </a>
                            </div>
                            <input type="hidden" name="quantity" value="1" size="2" class="input-cart-quantity" />
                            <div class="price">₱ <?php echo $product_array[$key]["price"]; ?></div>
                           <div class="text">
                                <h4 class="title"><?php echo $product_array[$key]['name']; ?></h4>
                            </div>
                            <a data-toggle="modal" class="btn btn-primary btn-block btn-sm" data-target="#product<?php echo $product_array[$key]["id"] ?>">ADD</a>
                        </div>
                        </form> 
                    </div>
                  
                   


                       <!-- Modal Basic -->
                        <div class="modal fade modalbox" id="product<?php echo $product_array[$key]["id"] ?>" tabindex="-1" role="dialog">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title"><?php echo $product_array[$key]["code"]; ?></h5>
                                        <a href="javascript:;" data-dismiss="modal">Close</a>
                                    </div>
                                    <div class="modal-body">
                                        <p>
                                          <img src="<?php echo $product_array[$key]["image"]; ?>" alt="img"  style="width:100%; height:350px;">
                                        </p>
                                        <p>
                                           PRICE : ₱ <?php echo $product_array[$key]["price"]; ?> 
                                           <BR> 
                                           <?php echo $product_array[$key]["name"]; ?>
                                        </p>
                                        <form method="post" action="home.php?view=MARKETPLACE&action=add&code=<?php echo $product_array[$key]["code"]; ?>"> 
                                        <div class="form-group basic">
                                            <label class="label">Enter Quantity</label>
                                            <div class="input-group mb-3">
                                                <input type="number" class="form-control form-control-lg" name="quantity" value="1" min="1">
                                            </div>
                                        </div>

                                        

                                        <div class="form-group basic">
                                            <button class="btn btn-primary btn-block btn-lg">ADD TO CART</button>
                                        </div>
                                        </form>
                                     
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- * Modal Basic -->

                  <?php } } ?>
               
                   
                </div>
            </div>
            <!-- * waiting tab -->



            <!-- paid tab -->
            <div class="tab-pane fade" id="paid" role="tabpanel">
                <div class="row">
                     <div class="col-12 mb-2">
                    
                         <!-- Transactions -->
                        <div class="section mt-2">
                            <div class="section-title"></div>
                            <div class="transactions">
                                  <?php foreach ($cartItem as $item) { ?>  
                                <!-- item -->
                               
                                    <a data-toggle="modal" class="item" data-target="#product<?php echo $item["code"] ?>">
                                    <div class="detail">

                                        <img src="<?php echo $item["image"]; ?>" alt="img" class="image-block imaged w48">
                                        <div>
                                            <strong style="font-size:9px;"><?php echo $item["name"]; ?></strong>
                                            <p style="font-size:7px;">SKU: <?php echo $item["code"]; ?></p>
                                            <?php $total = $item["price"] * $item["quantity"]; ?>
                                            <p style="font-size:7px;">₱<?php echo $item["price"]; ?>  x  <?php echo $item["quantity"]; ?> = ₱<?php echo $total; ?></p>
                                        </div>
                                    </div>
                                    <div class="right">
                                        <div class="price text-danger"  style="font-size:10px;">₱<?php echo $total; ?></div>
                                    </div>
                                </a>
                             
                                <!-- * item -->
                       
                           <!-- Modal Basic -->
                            <div class="modal fade modalbox" id="product<?php echo $item["code"]; ?>" tabindex="-1" role="dialog">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title"><?php echo $item["name"]; ?></h5>
                                            <a href="javascript:;" data-dismiss="modal">Close</a>
                                        </div>
                                        <div class="modal-body">
                                            <p>
                                              <img src="<?php echo $item["image"]; ?>" alt="img"  style="width:100%; height:350px;">
                                            </p>
                                            <p>
                                               PRICE : ₱ <?php echo $item["price"]; ?> 
                                            </p>
                                            <form method="post" action="home.php?view=MARKETPLACE&action=add&code=<?php echo $item["code"]; ?>"> 
                                            <div class="form-group basic">
                                                <label class="label">Enter Quantity</label>
                                                <div class="input-group mb-3">
                                                    <input type="number" class="form-control form-control-lg" name="quantity" value="<?php echo $item["quantity"]; ?>" min="1">
                                                </div>
                                            </div>

                                            

                                            <div class="form-group basic">
                                                <button class="btn btn-primary btn-block btn-lg">ADD TO CART</button>
                                                 <a class="btn btn-primary btn-block btn-lg" href="home.php?view=MARKETPLACE&action=remove&id=<?php echo $item["cart_id"]; ?>">REMOVE</a>
                                            </div>

                                            </form>
                                         
                                        </div>
                                    </div>
                                </div>
                            </div>
                           <!-- * Modal Basic -->
                                 <?php } ?>

                                  <!-- item -->
                               
                                <a data-toggle="modal" class="item" data-target="#product<?php echo $item["code"] ?>">
                                    <div class="detail">

                                        
                                        <div>
                                            <strong style="font-size:9px;">TOTAL AMOUNT TO PAY</strong>
                                        </div>
                                    </div>
                                    <div class="right">
                                        <div class="price text-danger"  style="font-size:10px;">₱ <?php echo $item_price; ?></div>
                                    </div>
                                </a>

                                  <a href="home.php?view=<?php echo 'PROCESS'; ?>" class="btn btn-primary btn-block btn-lg">Go To Checkout</a>
                                <!-- * item -->
                            </div>
                        </div>
                        <!-- * Transactions -->

                     </div>   
                </div>
            </div>
            <!-- * paid tab -->

        </div>

    </div>
    <!-- * App Capsule -->