<?php
include('dbcon.php');
include('header.php');
?>

<html>

<head lang="en">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
</head>

<body>
    <div class=" box-shadow-all" id="booking-hall">
        <img class="img-fluid hall-img" src="img/dinning1.jpg" alt="dinning">
        <div class="top-content hall-div">
            <!-- <div class="h1">
                    <h1 class="about-h1">Welcome To Our Website</h1>
                </div> -->

            <p class="about-p">Room service or in-room dining is a hotel service enabling guests to choose items of
                food
                and drink for delivery to their hotel room for consumption. Room service is organised as a
                subdivision
                within the food and beverage department of high-end hotel and resort properties. It is uncommon for
                room
                service to be offered in hotels that are not high-end, or in motels. Room service may also be
                provided
                for guests on cruise ships. Room service may be provided on a 24-hour basis or limited to late night
                hours only. Due to the cost of customized orders and delivery of room service, prices charged to the
                patron are typically much higher than in the hotel's restaurant or tuck shop, and a gratuity is
                expected.</p>
            <br />
            <p class="about-p">Room service or in-room dining is a hotel service enabling guests to choose items of
                food
                and drink for delivery to their hotel room for consumption. Room service is organised as a
                subdivision
                within the food and beverage department of high-end hotel and resort properties. It is uncommon for
                room
                service to be offered in hotels.</p>
        </div>
    </div>

    <section class="container speciality-class box-shadow-all">
        <h1 class="h-primary center">Our Services</h1>
        <div class="row" id="services">
            <div class=" box box-shadow-all">
                <img class="card-img box-shadow-all" src="img/deluxroom.jpg" alt="manchurion">
                <h2 class="h-secondary center"><a href="room.php">Rooms</a></h2>
                <div class="box1-text">
                    <ul>
                        <li class="box1-li">Delux AC Room</li>
                        <li class="box1-li"> AC Room</li>
                        <li class="box1-li">Non AC Room</li>
                    </ul>

                    <p style="color:black; font-weight:600; margin-top:6px;">
                        South-Kondwa, Pune, <br>Maharashtra, Pin-414001 <br>+91 7821893289
                        <br><a style="color:black; font-weight:600; margin-top:6px;"
                            href="index.php">www.restaurentms.com</a>
                    </p>
                </div>
            </div>
            <div class=" box box-shadow-all">
                <img class="card-img box-shadow-all" src="img/dinning4.jpg" alt="food">

                <h2 class="h-secondary center">
                    <a href="food.php">Food</a>
                </h2>

                <div class=" box1-text">


                    <ul>
                        <li class="box1-li">South-Indian</li>
                        <li class="box1-li"> Chinese</li>
                        <li class="box1-li">Deserts</li>
                    </ul>

                    <p style="color:black; font-weight:600; margin-top:6px;">
                        South-Kondwa, Pune, <br>Maharashtra, Pin-414001 <br>+91 7821893289
                        <br><a style="color:black; font-weight:600; margin-top:6px;"
                            href="index.php">www.restaurentms.com</a>
                    </p>

                </div>
            </div>
            <div class=" box box-shadow-all">
                <img class="card-img box-shadow-all" src="img/partyhall2.jpg" alt="hall">
                <h2 class="h-secondary center"><a href="food.php">Halls</a></h2>
                <div class="box1-text">

                    <ul>
                        <li class="box1-li">Party Halls</li>
                        <li class="box1-li"> Marriage Halls </li>
                        <li class="box1-li">Pools</li>
                    </ul>

                    <p style="color:black; font-weight:600; margin-top:6px;">
                        South-Kondwa, Pune, <br>Maharashtra, Pin-414001 <br>+91 7821893289
                        <br><a style="color:black; font-weight:600; margin-top:6px;"
                            href="index.php">www.restaurentms.com</a>
                    </p>

                </div>
            </div>
        </div>
    </section>
</body>

</html>

<?php
include('footer.php'); ?>

<!-- TODO -->