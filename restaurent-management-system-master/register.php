<div class="popup-container modal fade" id="register" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="register popup modal-dialog modal-dialog-centered" role="document">
        <form class="modal-content" action="login_register.php" method="POST">

            <div class="modal-header">
                <h2>
                    <span>User REGISTER</span>
                </h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="text" placeholder="Full Name" name="fullname" required>
                <input type="text" placeholder="User Name" name="username" required>
                <table class="radiobtns">
                    <tr>
                        <input type="radio" name="gen" value="Male" class="txtmale" checked="checked">
                        <label>Male</label>
                        <input type="radio" name="gen" value="Female" class="txtmale"><label>Female</label>
                        <input type="radio" name="gen" value="Other" class="txtmale"> <label>Other</label>
                        </td>
                    </tr>
                </table>
                <input type="email" placeholder="E-Mail" name="email" required>
                <input type="password" placeholder="Password" name="password" required>
                <input type="text" placeholder="Address" name="addr" required>
                <input type="text" placeholder="City" name="city" required>
                <input type="text" placeholder="State" name="state" required>
                <input type="text" placeholder="Mobile No" name="mno" required>
                <input type="text" placeholder="Adhar Card No" name="adno" required>
            </div>
            <div class="modal-footer">

                <div class="btns-1">
                    <button type="button" class="btn register-btn" data-dismiss="modal">Close</button>
                    <button type="submit" class="register-btn btn" name="register">Register</button>
                </div>

            </div>

        </form>
    </div>
</div>

<!-- TODO -->