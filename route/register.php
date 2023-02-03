 <!-- Register App Capsule -->
    <div id="appCapsule">

        <div class="section mt-2 text-center">
            <img src="logo/logo.png" style="width:100%;">
            <h4>Fill the form to log in</h4>
        </div>
        <div class="section mt-2 mb-5 p-3">
              <form action="action/register.php" method="POST">
                <div class="form-group basic">
                    <div class="input-wrapper">
                        <label class="label" for="email1">Fullname</label>
                        <input type="text" name="fullname" class="form-control" id="email1" placeholder="Your Fullname" required>
                        <i class="clear-input">
                            <ion-icon name="close-circle"></ion-icon>
                        </i>
                    </div>
                </div>
                 <div class="form-group basic">
                    <div class="input-wrapper">
                        <label class="label" for="email1">Phone</label>
                        <input type="number" name="phone" class="form-control" id="email1" placeholder="Your Phone Number" required>
                        <i class="clear-input">
                            <ion-icon name="close-circle"></ion-icon>
                        </i>
                    </div>
                </div>
                <div class="form-group basic">
                    <div class="input-wrapper">
                        <label class="label" for="email1">E-mail</label>
                        <input type="email" name="email" class="form-control" id="email1" placeholder="Your Email" required>
                        <i class="clear-input">
                            <ion-icon name="close-circle"></ion-icon>
                        </i>
                    </div>
                </div>

                <div class="form-group basic">
                    <div class="input-wrapper">
                        <label class="label" for="password2">Password</label>
                        <input type="password" name="password" class="form-control" id="password2" placeholder="Type Password" required>
                        <i class="clear-input">
                            <ion-icon name="close-circle"></ion-icon>
                        </i>
                    </div>
                </div>


                <div class="form-group basic">
                    <div class="input-wrapper">
                        <label class="label" for="password2">My Token</label>
                        <input type="number" name="captcha_code" class="form-control" id="password2" value="<?php echo strtoupper(rand(6666,9999)); ?>"  required="" readonly>
                        <i class="clear-input">
                            <ion-icon name="close-circle"></ion-icon>
                        </i>
                    </div>
                </div>


                <div class="form-group basic">
                    <div class="input-wrapper">
                        <label class="label" for="password2">Enter Token Above</label>
                        <input type="number" name="captcha_input" class="form-control" id="password2" placeholder="Type Token Above" required>
                        <i class="clear-input">
                            <ion-icon name="close-circle"></ion-icon>
                        </i>
                    </div>
                </div>

                <div class="custom-control custom-checkbox mt-2">
                    <input type="checkbox" class="custom-control-input" id="customChecka1" required>
                    <label class="custom-control-label" for="customChecka1">
                        I agree <a href="#" data-toggle="modal" data-target="#termsModal">terms and conditions</a>
                    </label>
                </div>

                <div class="form-button-group">
                    <button type="submit" name="register" class="btn btn-primary btn-block btn-lg">Register</button>
                </div>
            </form>
        </div>
    </div>
    <!-- * Register App Capsule -->

     <!-- Terms Modal -->
    <div class="modal fade modalbox" id="termsModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Terms and Conditions</h5>
                    <a href="javascript:;" data-dismiss="modal">Close</a>
                </div>
                <div class="modal-body">
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc fermentum, urna eget finibus
                        fermentum, velit metus maximus erat, nec sodales elit justo vitae sapien. Sed fermentum
                        varius erat, et dictum lorem. Cras pulvinar vestibulum purus sed hendrerit. Praesent et
                        auctor dolor. Ut sed ultrices justo. Fusce tortor erat, scelerisque sit amet diam rhoncus,
                        cursus dictum lorem. Ut vitae arcu egestas, congue nulla at, gravida purus.
                    </p>
                    <p>
                        Donec in justo urna. Fusce pretium quam sed viverra blandit. Vivamus a facilisis lectus.
                        Nunc non aliquet nulla. Aenean arcu metus, dictum tincidunt lacinia quis, efficitur vitae
                        dui. Integer id nisi sit amet leo rutrum placerat in ac tortor. Duis sed fermentum mi, ut
                        vulputate ligula.
                    </p>
                    <p>
                        Vivamus eget sodales elit, cursus scelerisque leo. Suspendisse lorem leo, sollicitudin
                        egestas interdum sit amet, sollicitudin tristique ex. Class aptent taciti sociosqu ad litora
                        torquent per conubia nostra, per inceptos himenaeos. Phasellus id ultricies eros. Praesent
                        vulputate interdum dapibus. Duis varius faucibus metus, eget sagittis purus consectetur in.
                        Praesent fringilla tristique sapien, et maximus tellus dapibus a. Quisque nec magna dapibus
                        sapien iaculis consectetur. Fusce in vehicula arcu. Aliquam erat volutpat. Class aptent
                        taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!-- * Terms Modal -->