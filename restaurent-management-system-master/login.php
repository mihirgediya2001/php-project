<!-- <div class="popup-container" id="login-popup">
    <div class=" popup">
        <form action="login_register.php" method="POST">
            <h2>
                <span>User Login</span>
                <button type="reset" onclick="popup('login-popup')">X</button>
            </h2>
            <input type="text" placeholder="E-mail or Username" name="email_username" required>
            <input type="password" placeholder="Password" name="password" required>
            <button type="submit" class="login-btn" name="login">Login</button>
        </form>
        <div class="forgot-btn">
            <button type="button" onclick="forgotPopup()">Forgot Password</button>
        </div>
    </div>
</div> -->

<!-- Modal -->
<div class="popup-container  modal fade" id="login" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="popup modal-dialog modal-dialog-centered" role="document">

        <form class="modal-content" action="login_register.php" method="POST">
            <div class="modal-header">
                <h2>
                    <span>User Login</span>
                </h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="text" placeholder="E-mail or Username" name="email_username" required>
                <input type="password" placeholder="Password" name="password" required>
            </div>
            <div class="modal-footer">
                <div class="forgot-btn">
                    <button type="button" data-dismiss="modal" data-toggle="modal" data-target="#forgot">Forgot
                        Password</button>
                </div>
                <!-- TODO style buttons -->

                <div class="btns-1">
                    <button type="button" class="btn login-btn" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn login-btn" name="login">Login</button>
                </div>

            </div>

        </form>

    </div>
</div>

<div class="popup-container modal fade" id="forgot" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="popup  modal-dialog modal-dialog-centered">
        <form class="modal-content" action="forgotpassword.php" method="POST">
            <div class="modal-header">
                <h2>
                    <span>Reset Password</span>
                </h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="email" placeholder="E-mail" name="email" required>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn login-btn" name="send-reset-link">Send Link</button>
            </div>
        </form>

    </div>
</div>

<!-- TODO -->