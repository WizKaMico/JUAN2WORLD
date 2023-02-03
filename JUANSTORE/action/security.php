<?php
	include('../../connection/connection.php');

	if (isset($_POST['verify']))
		{

			$icode = mysqli_real_escape_string($conn, $_POST['icode']);
			$buyer_id = mysqli_real_escape_string($conn, $_POST['buyer_id']);

			$query 		= mysqli_query($conn, "SELECT * FROM buyer_email_security WHERE code='$icode' and buyer_id='$buyer_id'");
			$row		= mysqli_fetch_array($query);
			$num_row 	= mysqli_num_rows($query);
 
			if ($num_row > 0) 
				{			
					
         
			        mysqli_query($conn, "UPDATE buyer_email_security SET status = 'USED' WHERE id = '".$row['id']."'");
        
					header('location: ../index.php?view=HOME');
 
				}
			else
				{
					header('location: ../verify.php?message=ERROR');
				}
		}
  ?>