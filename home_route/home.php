    <!-- App Capsule -->
    <div id="appCapsule">

        <!-- Wallet Card -->
        <div class="section wallet-card-section pt-1">
            <div class="wallet-card">
                <!-- Balance -->
                <div class="balance">
                    <div class="left">
                        <span class="title">Total Commission</span>
                        <h1 class="total">₱ <?php echo $total_com; ?></h1>
                    </div>
                    <div class="right">
                        <a href="#" class="button" data-toggle="modal" data-target="#depositActionSheet">
                            <ion-icon name="add-outline"></ion-icon>
                        </a>
                    </div>
                </div>
                <!-- * Balance -->
           
            </div>
        </div>
        <!-- Wallet Card -->

        <!-- Deposit Action Sheet -->
        <div class="modal fade action-sheet" id="depositActionSheet" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Balance</h5>
                    </div>
                    <div class="modal-body">
                        <div class="action-sheet-content">
                            <form>
                                <div class="form-group basic">
                                    <div class="input-wrapper">
                                        <label class="label" for="account1">From</label>
                                        <select class="form-control custom-select" id="account1">
                                            <option value="0">Savings (*** 5019)</option>
                                            <option value="1">Investment (*** 6212)</option>
                                            <option value="2">Mortgage (*** 5021)</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group basic">
                                    <label class="label">Enter Amount</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="input1">$</span>
                                        </div>
                                        <input type="text" class="form-control form-control-lg" value="100">
                                    </div>
                                </div>

                                

                                <div class="form-group basic">
                                    <button type="button" class="btn btn-primary btn-block btn-lg"
                                        data-dismiss="modal">Deposit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- * Deposit Action Sheet -->

        
        <!-- Stats -->
        <div class="section">
            <div class="row mt-2">
                <div class="col-6">
                    <div class="stat-box">
                        <div class="title">Referrals</div>
                        <div class="value"><?php echo $total_r['TOTAL']; ?></div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="stat-box">
                        <div class="title">Referal Orders</div>
                        <div class="value"><?php echo $total_ord['TOTAL']; ?></div>
                    </div>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-12">
                    <div class="stat-box">
                        <div class="title">My Order</div>
                        <div class="value"><?php echo $my_total_ord['TOTAL']; ?> = POINTS (<?php echo $points; ?>)</div>
                    </div>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-12">
                    <div class="stat-box">
                        <div class="title">Total Commission</div>
                        <div class="value">₱ <?php echo $total_com; ?></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- * Stats -->



   <!-- News -->
        <div class="section full mt-4 mb-3">
            <div class="section-heading padding">
                <h2 class="title">Products</h2>
                <a href="home.php?view=<?php echo 'PRODUCTS'; ?>" class="link">View All</a>
            </div>
            <div class="shadowfix carousel-multiple owl-carousel owl-theme">
                    <?php
                            include_once('connection/connection.php');
                            $sql = "SELECT * FROM product";
 
                            //use for MySQLi-OOP
                            $query = $conn->query($sql);
                            while($row = $query->fetch_assoc()){
                    ?>          
                <!-- item -->
                <div class="item">
                    <a href="home.php?view=SPECIFIC&prod_id=<?php echo $row['prod_id']; ?>">
                        <div class="blog-card">
                            <img src="<?php echo $row['IMAGE']; ?>" alt="image" class="imaged w-100" style="width:100%;height:170px;">
                            <div class="text">
                                <h4 class="title"><?php echo $row['PRODUCT']; ?></h4>
                            </div>
                        </div>
                    </a>
                </div>
                <!-- * item -->
            <?php } ?>

               


            </div>
        </div>
        <!-- * News -->


        <!-- app footer -->
        <div class="appFooter">
            <div class="footer-title">
                Copyright © JUAN2WORLD 2022. All Rights Reserved.
            </div>
        </div>
        <!-- * app footer -->

    </div>
    <!-- * App Capsule -->