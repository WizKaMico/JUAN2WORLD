 <!-- App Capsule -->
    <div id="appCapsule">

        <?php 
        include('connection/connection.php');
        $email = $_GET['email']; 
        $result=mysqli_query($conn, "select * from users where email='$email'")or die('Error In Session');
        $row=mysqli_fetch_array($result);
         
         ?>



        <div class="section mt-2 text-center">
            <h2>Hi! <?php echo $row['fullname']; ?></h2>
            <h4>Enter 4 digit email verification code</h4>
        </div>
        <div class="section mt-2 mb-5 p-3">
            <form action="action/verify.php" method="POST">

                <div class="form-group">
                    <input type="text" name="icode" class="form-control verification-input" id="smscode" placeholder="••••" maxlength="4">
                    <input type="hidden" name="email" value="<?php echo $row['email']; ?>">
                </div>

                <div class="form-button-group">
                    <button type="submit" name="verify" class="btn btn-primary btn-block btn-lg">Verify</button>
                </div>

            </form>
        </div>

    </div>
    <!-- * App Capsule -->