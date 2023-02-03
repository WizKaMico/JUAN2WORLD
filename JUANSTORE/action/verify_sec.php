<?php
	include('../../connection/connection.php');

	if (isset($_POST['verify']))
		{

			$icode = mysqli_real_escape_string($conn, $_POST['icode']);
			$user_id = mysqli_real_escape_string($conn, $_POST['user_id']);

			$query 		= mysqli_query($conn, "SELECT * FROM buyer WHERE code='$icode' and buyer_id='$user_id'");
			$row		= mysqli_fetch_array($query);
			$num_row 	= mysqli_num_rows($query);
 
			if ($num_row > 0) 
				{			
					
         
			        mysqli_query($conn, "UPDATE buyer SET status = 'VALID' WHERE buyer_id = '".$row['buyer_id']."'");
        
					header('location: ../index.php?view=HOME');
 
				}
			else
				{
					header('location: ../verify.php?message=ERROR');
				}
		}
  ?>