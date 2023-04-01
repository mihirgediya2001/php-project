<?php
include 'header.php';
include 'dbcon.php';

$emailid = $_SESSION['email'];
?>
<!DOCTYPE html>
<html lang='en'>

<head lang='en'>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>

    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css'
        integrity='sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm' crossorigin='anonymous'>
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css'>

    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
    <script src='https://code.jquery.com/jquery-3.2.1.slim.min.js'
        integrity='sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN' crossorigin='anonymous'>
        </script>
    <script src='https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js'
        integrity='sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q' crossorigin='anonymous'>
        </script>
    <script src='https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js'
        integrity='sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl' crossorigin='anonymous'>
        </script>
</head>

<body>

    <form class="row d-flex justify-content-center otp-form" action="cartpayment.php" method="POST"
        onsubmit="return validateForm()" name="otp-form">


        <div class="col-md-4 box-shadow-all" style="padding: 20px">
            <div class="title">
                <h3>OTP VERIFICATION</h3>
                <p class="info">An OTP has been sent to
                    <?= $emailid ?>
                </p>
                <p class="info" style="color:black">Please enter OTP to verify</p>
            </div>
            <div class="otp-input-fields">
                <input type="number" class="otp__digit otp__field__1" autofocus>
                <input type="number" class="otp__digit otp__field__2">
                <input type="number" class="otp__digit otp__field__3">
                <input type="number" class="otp__digit otp__field__4">
                <input type="number" class="otp__digit otp__field__5">
                <input type="number" class="otp__digit otp__field__6">
            </div>
            <div class="header-right">
                <button class="btn check-btn" type="submit" name="otp">Check</button>
            </div>
        </div>
        <input type="hidden" class="otp-number" name="otp-number" value="" />

    </form>

    <div class="modal fade" id="otplength" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Missing data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Please enter 6 digit OTP.
                </div>
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn btn-danger">Ok</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="wrongotp" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">incorrect OTP</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Please enter correct OTP.
                </div>
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn btn-danger">Ok</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="successotp" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Order placed successfully</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Order placed successfully. View your invoice.
                </div>
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn btn-success">Invoice</button>
                </div>
            </div>
        </div>
    </div>
</body>

<script>

    var otp_inputs = document.querySelectorAll(".otp__digit")
    var mykey = "0123456789".split("")
    var valid = false;
    otp_inputs.forEach((_) => {
        _.addEventListener("keyup", handle_next_input)
    })
    function handle_next_input(event) {
        let current = event.target
        let index = parseInt(current.classList[1].split("__")[2])
        current.value = event.key

        if (event.keyCode == 8 && current.value.length == 0 && index > 1) {
            current.previousElementSibling.focus()
        }
        if (index < 6 && mykey.indexOf("" + event.key + "") != -1) {
            var next = current.nextElementSibling;
            next.focus()
        }
        var _finalKey = "";
        for (let { value } of otp_inputs) {
            _finalKey += value
        }
        if (_finalKey.length == 6) {
            valid = true;

            document.querySelector(".otp-number").value = _finalKey;

        } else {
            valid = false;
        }
    }
    function validateForm() {
        if (valid == false) {
            $('#otplength').modal('show');
        }

        return valid;
    }   
</script>

</html>
<?php

if (isset($_POST['otp'])) {

    // var_dump($_SESSION['session_otp']);
    // var_dump($_POST['otp-number']);


    if ($_SESSION['session_otp'] == $_POST['otp-number']) {
        echo "<script>
        $('#successotp').modal('show');
        $('#successotp').on('hidden.bs.modal', function (e) {
        window.location.href='$_SESSION[bill]';
            
            
          })
        </script>";
    } else {
        echo "<script>
        $('#wrongotp').modal('show');
       
        </script>";
    }

    // $userid = $_SESSION['username'];
    // $phone = $_POST['phone'];
    // $address = $_POST['address'];
    // $_SESSION['phonenumber'] = $phone;

    // $qry = "INSERT INTO food(user_id,phone, address) VALUES ('$userid','$phone','$address')";
    // $run = mysqli_query($sql, $qry);
    // if ($run) {

    //     echo "
    //     <script>
    //     window.location.href = 'cartpayment2.php';
    //     </script>";
    // } else {
    //     ? >
    //
    // <script>
            //         alert('not info');
            //     </script>
    //
    // <?php
    // }
}

include 'footer.php';
?>