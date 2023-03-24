<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>

</head>
<body>
    <?php
include 'header.php';
include 'connection.php';

if (isset($_GET['email']) && isset($_GET['reset_token'])) {
    date_default_timezone_set('Asia/kolkata');
    $date = date("y-m-d");
    $emailr = $_GET['email'];
    $_SESSION['email'] = $_GET['email'];
    $qry = "SELECT * FROM `registered_users` WHERE `email`='$_GET[email]' AND `resettoken`='$_GET[reset_token]' AND `resettokenexpire`='$date'";
    $result = mysqli_query($con, $qry);
    if ($result) {
        if (mysqli_num_rows($result) == 1) {

            ?>


<form method="POST" >
    <div style="margin-top:20px" class=" cardc box-shadow-all">
        <a class="singup">Create new password</a>
        <div class="inputBox1">
            <input type="password" name="password" value="" required="required">
            <span>New Password</span>
        </div>
        <input type="hidden" name="email" value="<?php $emailr?>">

        <button id="submit" type="submit" name="updatepassword" class="enter">Update</button>

    </div>
</form>

<?php

        } else {
            echo "
                      <script>
                        alert('Invalid Or Expire ');
                        window.location.href='index.php';
                      </script>

                    ";
        }
    } else {
        echo "
                <script>
                  alert('Server Down');
                  window.location.href='index.php';
                </script>

                ";
    }
}

?>


<?php
if (isset($_POST['updatepassword'])) {

    $pass = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $update = "UPDATE `registered_users` SET `password`='$pass',`resettoken`=NULL,`resettokenexpire`=NULL WHERE `email`='$_SESSION[email]'";
    unset($_SESSION['email']);
    if (mysqli_query($con, $update)) {
        echo "
                <script>
                  alert('Password updated sucessfully');
                  window.location.href='index.php';
                </script>

                ";

    } else {
        echo "
                <script>
                  alert('Server Down');
                  window.location.href='index.php';
                </script>

                ";
    }
}
?>
</body>
</html>

<?php
include "footer.php";
?>

