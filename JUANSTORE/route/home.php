<!-- Product -->
	<section class="bg0 p-t-23 p-b-140" style="margin-top:50px;">
		<div class="container">
			<div class="p-b-10">
				<h3 class="ltext-103 cl5">
					Product Overview
				</h3>
			</div>

			<div class="flex-w flex-sb-m p-b-52">
				<div class="flex-w flex-l-m filter-tope-group m-tb-10">
					<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 how-active1" data-filter="*">
						ALL PRODUCTS
					</button>
				
                      <?php
                            $sql = "SELECT * FROM `tbl_product` GROUP BY category";
               
                            //use for MySQLi-OOP
                            $query = $conn->query($sql);
                            while($row = $query->fetch_assoc()){
                        ?>  
					<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".<?php echo $row['category']; ?>">
						<?php echo str_replace("_", " ", $row['category']); ?>
					</button>
				<?php } ?>
				</div>


				<div class="flex-w flex-c-m m-tb-10">
				

					<div class="flex-c-m stext-106 cl6 size-105 bor4 pointer hov-btn3 trans-04 m-tb-4 js-show-search">
						<i class="icon-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-search"></i>
						<i class="icon-close-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
						Search
					</div>
				</div>

				<div class="dis-none panel-search w-full p-t-10 p-b-15">
					<div class="bor8 dis-flex p-l-15">
						<button class="size-113 flex-c-m fs-16 cl2 hov-cl1 trans-04">
							<i class="zmdi zmdi-search"></i>
						</button>

						<input class="mtext-107 cl2 size-114 plh2 p-r-15" type="text" id="searchText" name="search-product" placeholder="Search">
					</div>	
				</div>


			</div>


		
			<div class="row isotope-grid" style="margin-top:50px;">
			
				<table id="searchTable" style="border: none;">
			  <tr class="header">
			  <th></th>
			  </tr>
				   <?php
                        $query = "SELECT * FROM tbl_product";
                        $product_array = $shoppingCart->getAllProduct($query);
                        if (! empty($product_array)) {
                            foreach ($product_array as $key => $value) {
                    ?>
        <tr>    
        <td>       
				<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item <?php echo $product_array[$key]["category"]; ?>">
					<!-- Block2 -->
					<div class="block2">
						<div class="block2-pic hov-img0">
							<img src="<?php echo $product_array[$key]["image"]; ?>" alt="IMG-PRODUCT" style="height:350px;">

							<a href="index.php?view=DETAILS&prod_id=<?php echo $product_array[$key]["id"]; ?>" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04">
								Quick View
							</a>
						</div>

						<div class="block2-txt flex-w flex-t p-t-14">
							<div class="block2-txt-child1 flex-col-l ">
								<a href="index.php?view=DETAILS&prod_id=<?php echo $product_array[$key]["id"]; ?>" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
									<?php echo $product_array[$key]["name"]; ?>
								</a>

								<span class="stext-105 cl3">
									₱ <?php echo $product_array[$key]["price"]; ?>
								</span>
							</div>

							
						</div>
					</div>
				</div>
			</td>
			</tr>
					
				  <?php } } ?>
			</table>	  
			</div>
		

			
		</div>
	</section>

	<style type="text/css">
		
#searchTable {
  border-collapse: collapse;
  width: 100%;
  border: 1px solid #ddd;
  font-size: 18px;
}

	</style>