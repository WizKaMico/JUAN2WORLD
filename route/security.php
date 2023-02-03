 <!-- App Capsule -->
    <div id="appCapsule">

        <?php 
        include('connection/connection.php');
        include('session.php'); 
        $result=mysqli_query($conn, "SELECT * FROM users WHERE user_id='$session_id'")or die('Error In Session');
        $row=mysqli_fetch_array($result);


         
         ?>


         <?php if($row['status'] == 'VALID'){ ?>
        <div class="section mt-2 text-center">
            <h2>Hi! <?php echo $row['fullname']; ?></h2>
            <h4>Enter 4 digit email verification code</h4>
        </div>
        <div class="section mt-2 mb-5 p-3">
            <form action="action/security.php" method="POST">

                <div class="form-group">
                    <input type="text" name="icode" class="form-control verification-input" id="smscode" placeholder="••••" maxlength="4">
                    <input type="hidden" name="user_id" value="<?php echo $row['user_id']; ?>">
                </div>

                <div class="form-button-group">
                    <button type="submit" name="verify" class="btn btn-primary btn-block btn-lg">Verify</button>
                </div>

            </form>
        </div>
        <?php } else { ?>

        <?php  header('location: index.php?view=VERIFY&email='.$row['email']); ?>      

        <?php } ?>    

    </div>
    <!-- * App Capsule -->