	<!-- Shoping Cart -->
 <form name="frm_customer_detail" action="index.php?view=PROCESSORDER" method="POST">	
	<div class="bg0 p-t-75 p-b-85" style="margin-top:50px;">
		<div class="container">
			<div class="row">
				<div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
					<div class="m-l-25 m-r--38 m-lr-0-xl">
						<div class="wrap-table-shopping-cart">
							<table class="table-shopping-cart">
								<tr class="table_head">
									<th class="column-1">Product</th>
									<th class="column-2"></th>
									<th class="column-3">Price</th>
									<th class="column-4">Quantity</th>
									<th class="column-5">Total</th>
								</tr>

								 <?php foreach ($cartItem as $item) { ?>  
								<tr class="table_row">
									<td class="column-1">
										<div class="how-itemcart1">
											<img src="<?php echo $item["image"]; ?>" alt="IMG">
										</div>
									</td>
									<td class="column-2"><?php echo $item["name"]; ?></td>
									<td class="column-3">₱ <?php echo $item["price"]; ?></td>
									<td class="column-4"><?php echo $item["quantity"]; ?></td>
									<?php $total = $item["price"] * $item["quantity"]; ?>
									<td class="column-5">₱ <?php echo $total; ?></td>
								</tr>
							    <?php } ?>

								
							</table>
						</div>

						
					</div>
				</div>

				<div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
					<div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
						<h4 class="mtext-109 cl2 p-b-30">
							Cart Totals
						</h4>

						<div class="flex-w flex-t bor12 p-b-13">
							<div class="size-208">
								<span class="stext-110 cl2">
									Subtotal:
								</span>
							</div>

							<div class="size-209">
								<span class="mtext-110 cl2">
							  
									<?php echo '₱ ';  echo $item_price; ?>
                              
								</span>
							</div>
						</div>

						<div class="flex-w flex-t bor12 p-t-15 p-b-30">
							<div class="size-208 w-full-ssm">
								<span class="stext-110 cl2">
									Shipping:
								</span>
							</div>

							<div class="size-209 p-r-18 p-r-0-sm w-full-ssm">
								<p class="stext-111 cl6 p-t-2">
									We will be texting you separetly for the shipping fee. 
								</p>
								
								<div class="p-t-15">
									<span class="stext-112 cl8">
										Calculate Shipping
									</span>
									<div class="bor8 bg0 m-b-12">
										<input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="name" value="<?php echo $row['name']; ?>" placeholder="Fullname" required="" readonly="">
									</div>

									<div class="bor8 bg0 m-b-22">
										<input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="address" value="<?php echo $row['address']; ?>" required="" readonly="">
									</div>

									<div class="bor8 bg0 m-b-22">
										<input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="state" value="<?php echo $row['state']; ?>" required="" readonly="">
									</div>

									<div class="bor8 bg0 m-b-22">
										<input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="city" value="<?php echo $row['city']; ?>" required="" readonly="">
									</div>


									<div class="bor8 bg0 m-b-22">
									 <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="zip" value="<?php echo $row['zip']; ?>" required="" readonly="">
									 <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="hidden" name="email" value="<?php echo $row['email']; ?>" required="" readonly="">
									 <input type="hidden" class="form-control" name="country" id="email2" value="<?php echo 'PHILIPPINES'; ?>">
                                     <input type="hidden" name="tracking_number" value="JUAN2DELIVER-<?php echo rand(666666,999999); ?>">
                                     <input type="hidden" name="referral" value="<?php echo $row['referral']; ?>">
									</div>


									
									
									<div class="flex-w">
										
										<button name="proceed_payment" class="flex-c-m stext-101 cl2 size-115 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer" style="width:100%;">CHECK OUT</button>
										
									</div>
									
								</div>
							</div>
						</div>

					
					</div>
				</div>
			</div>
		</div>
	</div>
	</form>	