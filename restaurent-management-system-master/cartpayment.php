<?php
include 'header.php';
include 'dbcon.php';
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

    <form method="POST">
        <div style="margin-top:20px" class="cardc box-shadow-all">
            <a class="singup">Create new password</a>
            <div class="inputBox1">
                <input type="text" name="fullname" value="" required="required">
                <span>Full Name</span>
            </div>
            <div class="inputBox1">
                <input type="text" name="phone" value="" required="required">
                <span>Phone Number</span>
            </div>
            <div class="inputBox1">
                <input type="text" name="address" value="" required="required">
                <span>Address</span>
            </div>

            <button id="submit" type="submit" name="purchase" class="enter">Purchase</button>

        </div>
    </form>

    <!-- <div id='image-payment'>
        <form action='' method='POST'>
            <div class='form-input-container'>
                <div class='form-group'>
                    <label>Full Name</label>
                    <input type='text' name='fullname' class='form-control' required>
                </div>
                <div class='form-group'>
                    <label>Phone No</label>
                    <input type='number' name='phone' class='form-control' required>
                </div>
                <div class='form-group'>
                    <label>Your Address</label>
                    <input type='text' name='address' class='form-control' required>
                </div>

                <button class='cart-btn' name='purchase'>Make Purchase</button>
            </div>
        </form>
    </div> -->
</body>

</html>
<?php
if (isset($_POST['purchase'])) {
    $fullname = $_POST['fullname'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $qry = "INSERT INTO food(full_name,phone, address ) VALUES ('$fullname','$phone','$address')";
    $run = mysqli_query($sql, $qry);
    if ($run) {
        echo "
        <script>
        window.location.href = 'cartpayment2.php';
        </script>";
    } else {
        ?>
        <script>
            alert('not info');
        </script>
        <?php
    }
}

include 'footer.php';
?>