<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="datatable/dataTable.bootstrap.min.css">
		<script type="text/javascript" src="jquery.min.js"></script>
<script type="text/javascript">
function delete_confirm(){
	var result = confirm("Are you sure to update data from the selected products ?");
	if(result){
		return true;
	}else{
		return false;
	}
}

$(document).ready(function(){
    $('#select_all').on('click',function(){
        if(this.checked){
            $('.checkbox').each(function(){
                this.checked = true;
            });
        }else{
             $('.checkbox').each(function(){
                this.checked = false;
            });
        }
    });
	
	$('.checkbox').on('click',function(){
		if($('.checkbox:checked').length == $('.checkbox').length){
			$('#select_all').prop('checked',true);
		}else{
			$('#select_all').prop('checked',false);
		}
	});
});

$(document).ready(function(){
    $('#select_all_stat').on('click',function(){
        if(this.checked){
            $('.checkbox').each(function(){
                this.checked = true;
            });
        }else{
             $('.checkbox').each(function(){
                this.checked = false;
            });
        }
    });
	
	$('.checkbox').on('click',function(){
		if($('.checkbox:checked').length == $('.checkbox').length){
			$('#select_all_stat').prop('checked',true);
		}else{
			$('#select_all_stat').prop('checked',false);
		}
	});
});


$(document).ready(function(){
    $('#select_all_qty').on('click',function(){
        if(this.checked){
            $('.checkbox').each(function(){
                this.checked = true;
            });
        }else{
             $('.checkbox').each(function(){
                this.checked = false;
            });
        }
    });
	
	$('.checkbox').on('click',function(){
		if($('.checkbox:checked').length == $('.checkbox').length){
			$('#select_all_qty').prop('checked',true);
		}else{
			$('#select_all_qty').prop('checked',false);
		}
	});
});


</script>




	<style>
		.height10{
			height:10px;
		}
		.mtop10{
			margin-top:10px;
		}
		.modal-label{
			position:relative;
			top:7px
		}
	</style>
</head>
<body>
<div class="container">
	<div class="row">
		<div class="col-sm-12">
			<div class="row">
			<?php
				if(isset($_SESSION['error'])){
					echo
					"
					<div class='alert alert-danger text-center'>
						<button class='close'>&times;</button>
						".$_SESSION['error']."
					</div>
					";
					unset($_SESSION['error']);
				}
				if(isset($_SESSION['success'])){
					echo
					"
					<div class='alert alert-success text-center'>
						<button class='close'>&times;</button>
						".$_SESSION['success']."
					</div>
					";
					unset($_SESSION['success']);
				}
			?>
			</div>
			<div class="row">
				 <input type="radio" name="cars" checked="checked" value="2"  /> BULK UPDATE PRICE
				 <input type="radio" name="cars" value="3" /> BULK UPDATE STATUS
				  <input type="radio" name="cars" value="4" /> BULK UPDATE QUANTITY
			</div>
			<div class="height10">
			</div>
			<div class="row">

				
				<?php 

				include_once('../../../connection/connection.php');
			     $query = mysqli_query($conn,"SELECT * FROM tbl_product WHERE status != 'AVAILABLE'");

			     $queries = mysqli_query($conn,"SELECT * FROM tbl_product WHERE status != 'AVAILABLE'");

			     $querieta = mysqli_query($conn,"SELECT * FROM tbl_product WHERE status != 'AVAILABLE'");

				?>
				<div id="Cars2" class="desc">
				<form name="bulk_action_form" action="action2.php" method="post" onSubmit="return delete_confirm();"/>


				<input type="number" class="form-control" name="price" placeholder="Enter New Price">
				<br>
				<select class="form-control" name="reason">
					<option value="PROMO">PROMO</option>
					<option value="LAZADA CAMPAIGN">LAZADA CAMPAIGN</option>
					<option value="SHOPEE CAMPAIGN">SHOPEE CAMPAIGN</option>
				</select>
				<br>
				<input type="submit" class="btn btn-success" name="bulk_update_submit" value="UPDATE" style="width:100%; background-color:purple; border-color:purple;" />
				<br>
				<br>

					<table id="myTable" class="table table-bordered table-striped">
					<thead>
					    <th><input type="checkbox" name="select_all" id="select_all" value=""/></th> 
						<th>IMAGE</th>
						<th>NAME</th>
						<th>CATEGORY</th>
						<th>PRICE</th>
						<th>QTY</th>
						<th>STATUS</th>
						<th>ACTION</th>
					</thead>
					<tbody>
						
					<?php
			            if(mysqli_num_rows($query) > 0){
			                while($row = mysqli_fetch_assoc($query)){
			        ?>
			        <tr>
			            <td align="center"><input type="checkbox" name="checked_id[]" class="checkbox" value="<?php echo $row['id']; ?>"/></td> 
			         <?php  
			                  echo "<td><img src='".$row['image']."' style='width:100%; height:100px;'/></td>
									<td>".$row['name']."</td>
									<td>".$row['category']."</td>
									<td> ₱ ".number_format($row['price'])."</td>
									<td>".$row['quantity']."</td>
									<td>".$row['status']."</td>";
			         ?>   
			            <?php 
			            echo "<td>
										<a href='#edit_".$row['id']."' class='btn btn-success btn-sm' data-toggle='modal' style='background-color:purple; border-color:purple;'><span class='glyphicon glyphicon-edit'></span></a>
							  </td>";
			            ?>
			        </tr> 
			        <?php include('edit_delete_modal.php'); ?>
			        <?php } }else{ ?>
			            <tr><td colspan="5">No records found.</td></tr> 
			        <?php } ?>
					</tbody>
				</table>
			</form>

				</div>

				<div id="Cars3" class="desc" style="display: none;">
				<form name="bulk_action_form" action="action_status2.php" method="post" onSubmit="return delete_confirm();"/>

				<select class="form-control" name="reason">
					<option value="AVAILABLE">AVAILABLE</option>
					<option value="NOT AVAILABLE">NOT AVAILABLE</option>
				</select>
				<br>
				<input type="submit" class="btn btn-success" name="bulk_update_submit" value="UPDATE" style="width:100%; background-color:purple; border-color:purple;" />
				<br>
				<br>
					<table id="myOtherTable" class="table table-bordered table-striped">
					<thead>
					    <th><input type="checkbox" name="select_all" id="select_all_stat" value=""/></th> 
						<th>IMAGE</th>
						<th>NAME</th>
						<th>CATEGORY</th>
						<th>PRICE</th>
						<th>QTY</th>
						<th>STATUS</th>
						<th>ACTION</th>
					</thead>
					<tbody>
						
					<?php
			            if(mysqli_num_rows($queries) > 0){
			                while($row = mysqli_fetch_assoc($queries)){
			        ?>
			        <tr>
			            <td align="center"><input type="checkbox" name="checked_id[]" class="checkbox" value="<?php echo $row['id']; ?>"/></td> 
			         <?php  
			                  echo "<td><img src='".$row['image']."' style='width:100%; height:100px;'/></td>
									<td>".$row['name']."</td>
									<td>".$row['category']."</td>
									<td> ₱ ".number_format($row['price'])."</td>
									<td>".$row['quantity']."</td>
									<td>".$row['status']."</td>";

			         ?>   
			            <?php 
			            echo "<td>
										<a href='#edit_".$row['id']."' class='btn btn-success btn-sm' data-toggle='modal' style='background-color:purple; border-color:purple;'><span class='glyphicon glyphicon-edit'></span></a>
							  </td>";
			            ?>
			        </tr> 
			        <?php include('edit_delete_modal.php'); ?>
			        <?php } }else{ ?>
			            <tr><td colspan="5">No records found.</td></tr> 
			        <?php } ?>
					</tbody>
				</table>
			</form>

				</div>	


					<div id="Cars4" class="desc" style="display: none;">
				<form name="bulk_action_form" action="action_status3.php" method="post" onSubmit="return delete_confirm();"/>

					<input type="number" class="form-control" name="quantity" placeholder="Enter New Quantity">
				<br>
				<select class="form-control" name="reason">
					<option value="RESTOCK">RESTOCK</option>
				</select>
				<br>
				<input type="submit" class="btn btn-success" name="bulk_update_submit" value="UPDATE" style="width:100%; background-color:purple; border-color:purple;" />
				<br>
				<br>
					<table id="myAnotherTable" class="table table-bordered table-striped">
					<thead>
					    <th><input type="checkbox" name="select_all" id="select_all_qty" value=""/></th> 
						<th>IMAGE</th>
						<th>NAME</th>
						<th>CATEGORY</th>
						<th>PRICE</th>
						<th>QTY</th>
						<th>STATUS</th>
						<th>ACTION</th>
					</thead>
					<tbody>
						
					<?php
			            if(mysqli_num_rows($querieta) > 0){
			                while($row = mysqli_fetch_assoc($querieta)){
			        ?>
			        <tr>
			            <td align="center"><input type="checkbox" name="checked_id[]" class="checkbox" value="<?php echo $row['id']; ?>"/></td> 
			         <?php  
			                  echo "<td><img src='".$row['image']."' style='width:100%; height:100px;'/></td>
									<td>".$row['name']."</td>
									<td>".$row['category']."</td>
									<td> ₱ ".number_format($row['price'])."</td>
									<td>".$row['quantity']."</td>
									<td>".$row['status']."</td>";

			         ?>   
			            <?php 
			            echo "<td>
										<a href='#edit_".$row['id']."' class='btn btn-success btn-sm' data-toggle='modal' style='background-color:purple; border-color:purple;'><span class='glyphicon glyphicon-edit'></span></a>
							  </td>";
			            ?>
			        </tr> 
			        <?php include('edit_delete_modal.php'); ?>
			        <?php } }else{ ?>
			            <tr><td colspan="5">No records found.</td></tr> 
			        <?php } ?>
					</tbody>
				</table>
			</form>

				</div>	


			
	
		</div>
	</div>
</div>
<?php 
// include('add_modal.php') 
?>

<script src="jquery/jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="datatable/jquery.dataTables.min.js"></script>
<script src="datatable/dataTable.bootstrap.min.js"></script>
<!-- generate datatable on our table -->
<script>
$(document).ready(function(){
	//inialize datatable
    $('#myTable').DataTable();

    //hide alert
    $(document).on('click', '.close', function(){
    	$('.alert').hide();
    })
});
</script>

<script>
$(document).ready(function(){
	//inialize datatable
    $('#myOtherTable').DataTable();

    //hide alert
    $(document).on('click', '.close', function(){
    	$('.alert').hide();
    })
});
</script>

<script>
$(document).ready(function(){
	//inialize datatable
    $('#myAnotherTable').DataTable();

    //hide alert
    $(document).on('click', '.close', function(){
    	$('.alert').hide();
    })
});
</script>


 <script>
   $(document).ready(function() {
    $("input[name$='cars']").click(function() {
        var test = $(this).val();

        $("div.desc").hide();
        $("#Cars" + test).show();
    });
});

 </script>
</body>
</html>