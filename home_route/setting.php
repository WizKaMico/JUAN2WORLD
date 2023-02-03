<!-- App Capsule -->
    <div id="appCapsule">
        
        <div class="section mt-3 text-center">
            <div class="avatar-section">
                <a href="#">
                    
                    <span class="button">
                        <ion-icon name="camera-outline"></ion-icon>
                    </span>
                </a>
            </div>
        </div>

        <div class="listview-title mt-1"></div>
        <ul class="listview image-listview text">
            <li>
                <a href="#" class="item">
                    <div class="in">
                        <div><?php echo $row['fullname']; ?></div>
                    </div>
                </a>
            </li>
        </ul>

        <div class="listview-title mt-1">Referral Link</div>
        <ul class="listview image-listview text">
            <li>
                <a href="JUANSTORE/login.php?view=<?php echo 'REGISTER'; ?>&ref_id=<?php echo $row['user_id']; ?>" class="item">
                    <div class="in">
                        <div>My Link</div>
                    </div>
                </a>
            </li>
        
        </ul>

        <div class="listview-title mt-1">Security</div>
        <ul class="listview image-listview text mb-2">
            
            <li>
                <a href="logout.php" class="item">
                    <div class="in">
                        <div>Log out</div>
                    </div>
                </a>
            </li>
        </ul>
        

    </div>
    <!-- * App Capsule -->