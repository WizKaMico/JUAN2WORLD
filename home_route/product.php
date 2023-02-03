    <!-- App Capsule -->
    <div id="appCapsule">

        <div class="section tab-content mt-2 mb-2">

            <div class="row">
            	<?php
							include_once('connection/connection.php');
							$sql = "SELECT * FROM product";
 
							//use for MySQLi-OOP
							$query = $conn->query($sql);
							while($row = $query->fetch_assoc()){
					?>	
                <div class="col-6 mb-2">
                    <a href="home.php?view=SPECIFIC&prod_id=<?php echo $row['prod_id']; ?>">
                        <div class="blog-card">
                            <img src="<?php echo $row['IMAGE']; ?>" alt="image" class="imaged w-100" style="width:100%;height:170px;">
                            <div class="text">
                                <h4 class="title"><?php echo $row['PRODUCT']; ?></h4>
                            </div>
                        </div>
                    </a>
                </div>
                 <?php } ?>
                
            </div>

            <div>
                
            </div>

        </div>

    </div>
    <!-- * App Capsule -->