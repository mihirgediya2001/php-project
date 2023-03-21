<?php
session_start();
include('login.php');
include('register.php');
include('connection.php');

?>
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

</head>


<body>
    <header>
        <nav class="navbar navbar-expand-xl">
            <div class="left-nav">
                <a href="index.php"> <img src=" img/logo.png" alt="logo"></a>
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menu" aria-controls="menu"
                aria-expanded="false" aria-label="Toggle navigation">

                <i class="bi bi-list"></i>
            </button>
            <div class="right-nav collapse navbar-collapse" id="menu">
                <ul class=" navbar-nav mr-auto mt-2 mt-lg-0">
                    <li class="nav-item"><a href="index.php">Home</a></li>
                    <li class="nav-item"><a href="about.php">About Us</a></li>
                    <li class="nav-item"><a href="room.php">Rooms</a></li>
                    <li class="nav-item"><a href="food.php">Food</a></li>
                    <li class="nav-item"><a href="cart.php">Cart</a></li>
                    <li class="nav-item"><a href="contact.php">Contact Us</a></li>
                    <li class="nav-item"><a href="bookinghall.php">Booking</a></li>
                    <li class="nav-item"><a href="feedback.php">Feedback</a></li>

                </ul>
                <?php
                if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
                    echo "
                <div class='user'>
                    $_SESSION[username] - <a href='logout.php'>LOGOUT</a>
                </div>
                ";
                } else {
                    echo "
                <div class='login-btns'>
                <button type='button' id='buttons' class='btn btn-dark' data-dismiss=\"collapse\"  data-toggle=\"modal\" data-target=\"#login\"onclick=\"popup('login-popup')\">Login</button>
                <button type='button' id='buttons' class='user btn btn-dark'  data-toggle=\"modal\" data-target=\"#register\"  onclick=\"popup('register-popup')\">Register</button>
                </div>
                ";
                }
                ?>




            </div>
        </nav>
    </header>

    <script>
    function popup(popup_name) {
        menu = document.getElementById("buttons")

        const menuToggle = document.getElementById('menu');
        const bsCollapse = new bootstrap.Collapse(menuToggle);
        menu.forEach((l) => {
            l.addEventListener('click', () => {
                bsCollapse.toggle()
            })
        })

    }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>

</body>

</html>