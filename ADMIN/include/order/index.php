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
</script>
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
			</div>
			<div class="height10">
			</div>
			<div class="row">
				<?php 

				include_once('../../../connection/connection.php');
			     $query = mysqli_query($conn,"SELECT * FROM tbl_order");

				?>

				<form name="bulk_action_form" action="action.php" method="post" onSubmit="return delete_confirm();"/>

				<br>
				<select class="form-control" name="status" onchange="showDiv(this)">
					<option value="CONFIRM">CONFIRM</option>
					<option value="PACKED">PACKED</option>
					<option value="SENT VIA LALAMOVE">SENT VIA LALAMOVE</option>
					<option value="SENT VIA LBC">SENT VIA LBC</option>
					<option value="RECIEVED">RECIEVED</option>
					<option value="CANCEL">CANCEL</option>
					<option value="RTS">RTS</option>
				</select>
                <br> 
				<div id="hidden_div" style="display:none;">
					<input type="text" name="lalamove_ref" placeholder="Enter Lalamove ref#" class="form-control">
					<br>
					<input type="text" name="shared_link" placeholder="Enter Lalamove Link" class="form-control">
					<br>
					<input type="number" name="delivery_amount" placeholder="Enter Delivery Amount" class="form-control">
				</div>

				<script type="text/javascript">
				function showDiv(select){
				   if(select.value=='SENT VIA LALAMOVE'){
				    document.getElementById('hidden_div').style.display = "block";
				   } else{
				    document.getElementById('hidden_div').style.display = "none";
				   }
				} 
				</script>
				<br>
				<input type="submit" class="btn btn-success" name="bulk_update_submit" value="UPDATE" style="width:100%; background-color:purple; border-color:purple;" />
				<br>
				<br>
				<table id="myTable" class="table table-bordered table-striped">
					<thead>
						<th><input type="checkbox" name="select_all" id="select_all" value=""/></th>
						<th>TRACK#</th>
						<th>NAME</th>
						<th>ADDRESS</th>
						<th>PAYMENT</th>
						<th>STATUS</th>
						<th>DATE</th>
						<th>AMOUNT</th>
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
							echo "
									<td>".$row['tracking_number']."</td>
									<td>".$row['name']."</td>
									<td>".$row['address'].",".$row['city'].",".$row['state']."</td>
									<td>".$row['payment_type']."</td>
									<td>".$row['order_status']."</td>
									<td>".$row['order_at']."</td>
									<td> ₱ ".number_format($row['amount'])."</td>
									<td>
									 <a href='#edit_".$row['id']."' class='btn btn-success btn-sm' data-toggle='modal' style='background-color:purple; border-color:purple;'><span class='glyphicon glyphicon-edit'></span></a>
									</td>
								</tr>";


								include('edit_delete_modal.php');
							}


							/////////////////

							//use for MySQLi Procedural
							// $query = mysqli_query($conn, $sql);
							// while($row = mysqli_fetch_assoc($query)){
							// 	echo
							// 	"<tr>
							// 		<td>".$row['id']."</td>
							// 		<td>".$row['firstname']."</td>
							// 		<td>".$row['lastname']."</td>
							// 		<td>".$row['address']."</td>
							// 		<td>
							// 			<a href='#edit_".$row['id']."' class='btn btn-success btn-sm' data-toggle='modal'><span class='glyphicon glyphicon-edit'></span> Edit</a>
							// 			<a href='#delete_".$row['id']."' class='btn btn-danger btn-sm' data-toggle='modal'><span class='glyphicon glyphicon-trash'></span> Delete</a>
							// 		</td>
							// 	</tr>";
							// 	include('edit_delete_modal.php');
							// }
							/////////////////

						?>

						  <?php }else{ ?>

						  <tr><td colspan="8">No records found.</td></tr> 
			        <?php } ?>
					</tbody>
				</table>
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
</body>
</html>