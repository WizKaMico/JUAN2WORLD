	<!-- Title page -->
	<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('images/bg-01.jpg');">
		<h2 class="ltext-105 cl0 txt-center">
			REGISTER
		</h2>
	</section>	

	<!-- Shoping Cart -->
	<div class="bg0 p-t-75 p-b-85" style="margin-top:50px;">
		<div class="container">
			<div class="row">
			

				<div class="col-sm-12 col-lg-12 col-xl-12 m-lr-auto m-b-50">
					<!-- <div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
						
					

						<div class="flex-w flex-t bor12 p-t-15 p-b-30">
							

							<div class="size-209 p-r-18 p-r-0-sm w-full-ssm">
								 -->
								
								
									<span class="stext-112 cl8">
										REGISTER 
									</span>
									 <form name="frm_customer_detail" action="action/verify.php" method="POST">
									<div class="bor8 bg0 m-b-12">
										<input class="stext-111 cl12 plh3 size-111 p-lr-15" type="text" name="name" placeholder="Fullname" required>
									</div>

									<div class="bor8 bg0 m-b-12">
										<input class="stext-111 cl12 plh3 size-111 p-lr-15" type="email" name="email" placeholder="Enter Email" required>
									</div>

									<div class="bor8 bg0 m-b-12">
										<input class="stext-111 cl12 plh3 size-111 p-lr-15" type="password" name="password" placeholder="Password" required>
									</div>

									<div class="bor8 bg0 m-b-22">
										<input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="address" placeholder="Street Address, Barangay" required>
									</div>

									<div class="rs1-select2 rs2-select2 bor8 bg0 m-b-12 m-t-9">
										<select id="province" class="js-select2" name="state" required>
										</select>
										<div class="dropDownSelect2"></div>
									</div>

										<div class="rs1-select2 rs2-select2 bor8 bg0 m-b-12 m-t-9">
										<select id="city" class="js-select2" name="city" required>
										</select>
										<div class="dropDownSelect2"></div>
									</div>

									<div class="bor8 bg0 m-b-22">
										<input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="zip" placeholder="Zip Code" required>
										<input type="hidden" class="form-control" name="country" id="email2" value="<?php echo 'PHILIPPINES'; ?>">
										<?php if(!empty($_GET['ref_id'])){ ?>
										<input type="hidden" class="form-control" name="refrerral" id="email2" value="<?php echo $_GET['ref_id']; ?>">	
										<?php } else { ?>
										<input type="hidden" class="form-control" name="refrerral" id="email2" value="0">
										<?php } ?>	
                                     <input type="hidden" name="code" value="<?php echo rand(666666,999999); ?>">
									</div>


									
									
									<div class="flex-w">
										
										<button type="submit" name="register" class="flex-c-m stext-101 cl2 size-115 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer" style="width:100%;">REGISTER</button>
									</div>
									</form>	
								
					<!-- 		</div>
						</div>
					</div>
					 -->
				</div>
			</div>
		</div>
	</div>