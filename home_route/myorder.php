    <!-- Extra Header -->
    <div class="extraHeader pr-0 pl-0">
        <ul class="nav nav-tabs lined" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#waiting" role="tab">
                    MY ORDER
                     <span class="badge badge-danger" style="margin-left:5px;"><?php echo $my_total_ord['TOTAL']; ?></span>
                </a>
            </li>
            <?php if (!empty($total_com)) { ?>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#paid" role="tab">
                    MY STORE
                 <span class="badge badge-danger" style="margin-left:5px;"><?php echo $total_ord['TOTAL']; ?></span>
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
                          
                            $sql = "SELECT * FROM `tbl_order` WHERE customer_id = '".$row['user_id']."'";
 
                            //use for MySQLi-OOP
                            $query = $conn->query($sql);
                            while($row = $query->fetch_assoc()){
                    ?>  

             
                    <div class="col-12 mb-2 ">
                        <form method="post" action="#"> 
                        <div class="bill-box">
                            <div class="img-wrapper">
                                <a data-toggle="modal" data-target="#product<?php echo $row['id']; ?>">
                                 <h5><?php echo $row['tracking_number']; ?></h5>
                                </a>
                            </div>
                            <input type="hidden" name="quantity" value="1" size="2" class="input-cart-quantity" />
                            <div class="price" style="font-size:10px;">AMOUNT ₱ <?php echo $row['amount']; ?> | STATUS : <?php echo $row['order_status']; ?></div>
                           
                        </div>
                        </form> 
                    </div>
                  
                   


                       <!-- Modal Basic -->
                        <div class="modal fade modalbox" id="product<?php echo $row["id"] ?>" tabindex="-1" role="dialog">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title"><?php echo $row["tracking_number"]; ?></h5>
                                        <a href="javascript:;" data-dismiss="modal">Close</a>
                                    </div>
                                    <div class="modal-body">
                                     <table>
                                      <tr>
                                        <th>PRODUCT</th>
                                        <th>QUANTITY</th>
                                        <th>AMOUNT</th>
                                      </tr>
                                     <?php
                                          
                                            $pproduct = "SELECT * FROM `tbl_order_item` LEFT JOIN tbl_product ON tbl_order_item.product_id = tbl_product.id WHERE tbl_order_item.order_id = '".$row['id']."'";
                 
                                            //use for MySQLi-OOP
                                            $queries = $conn->query($pproduct);
                                            while($prow = $queries->fetch_assoc()){
                                            $total = $prow['item_price'] * $prow['quantity'];    
                                    ?>  
                                      <tr>
                                        <td><img src="<?php echo $prow['image']; ?>" style='width:50%;'></td>
                                        <td><?php echo $prow['quantity']; ?></td>
                                        <td><?php echo '₱ '; echo number_format($total); ?></td>
                                      </tr>
                                    <?php } ?>
                                      <tr>
                                        <td colspan="3" style="text-align:center;"><b>AMOUNT TO PAY : <?php echo '₱ '; echo number_format($row['amount']); ?></b></td>
                                      </tr>
                                     
                                    </table>

                                    <style>
                                        table {
                                          font-family: arial, sans-serif;
                                          border-collapse: collapse;
                                          width: 100%;
                                        }

                                        td, th {
                                          border: 1px solid #dddddd;
                                          text-align: left;
                                          padding: 8px;
                                        }

                                        tr:nth-child(even) {
                                          background-color: #dddddd;
                                        }
                                        </style>
                                                                            
                                     
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- * Modal Basic -->

                  <?php }  ?>
               
                   
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