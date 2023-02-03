

<!-- App Capsule -->
    <div id="appCapsule">



        <div class="section mt-2">
            <div class="card">
                <div class="card-body">
                    <div class="p-1">
                        <div class="text-center">
                            <h2 class="text-primary">Order Details</h2>
                            <p>Fill the form</p>
                        </div>
                        <form name="frm_customer_detail" action="home.php?view=PROCESSORDER" method="POST">
                            <div class="frm-customer-detail">
                            <div class="form-group basic animated">
                                <div class="input-wrapper">
                                    <label class="label" for="name2">Your name</label>
                                    <input type="text" name="name" class="form-control" id="name2" placeholder="Your name" value="<?php echo $row['fullname']; ?>" readonly="">
                                     <input type="hidden" name="email" class="form-control" id="name2" placeholder="Your name" value="<?php echo $row['email']; ?>" readonly="">
                                    <i class="clear-input">
                                        <ion-icon name="close-circle"></ion-icon>
                                    </i>
                                </div>
                            </div>

                            <div class="form-group basic animated">
                                <div class="input-wrapper">
                                    <label class="label" for="email2">Street Address, Barangay</label>
                                    <input type="text" class="form-control" name="address" id="email2" placeholder="Street Address, Barangay">
                                    <i class="clear-input">
                                        <ion-icon name="close-circle"></ion-icon>
                                    </i>
                                </div>
                            </div>

                            <div class="form-group basic animated">
                                <div class="input-wrapper">
                                    <label class="label" for="email2">Province</label>
                                    <select id="province" name="state" class="form-control"></select>
                                        <ion-icon name="close-circle"></ion-icon>
                                    </i>
                                </div>
                            </div>

                            <div class="form-group basic animated">
                                <div class="input-wrapper">
                                    <label class="label" for="email2">Municipality</label>
                                    <select id="city" name="city" class="form-control"></select> 
                                    <i class="clear-input">
                                        <ion-icon name="close-circle"></ion-icon>
                                    </i>
                                </div>
                            </div>

                             <div class="form-group basic animated">
                                <div class="input-wrapper">
                                    <label class="label" for="email2">Zip Code</label>
                                    <input type="text" class="form-control" name="zip" id="email2" placeholder="Zip Code">
                                     <input type="hidden" class="form-control" name="country" id="email2" value="<?php echo 'PHILIPPINES'; ?>">
                                     <input type="hidden" name="tracking_number" value="JUAN2DELIVER-<?php echo rand(666666,999999); ?>">
                                    <i class="clear-input">
                                        <ion-icon name="close-circle"></ion-icon>
                                    </i>
                                </div>
                            </div>


<!-- 
                            <div class="form-group basic animated">
                                <div class="input-wrapper">
                                    <label class="label" for="textarea2">Remarks</label>
                                    <textarea id="textarea2" rows="4" name="remarks" class="form-control"
                                        placeholder="Remarks"></textarea>
                                    <i class="clear-input">
                                        <ion-icon name="close-circle"></ion-icon>
                                    </i>
                                </div>
                            </div>
 -->
                            <div class="mt-2">
                                <button type="submit" name="proceed_payment" class="btn btn-primary btn-lg btn-block">CHECK OUT</button>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

     




    </div>
    <!-- * App Capsule -->