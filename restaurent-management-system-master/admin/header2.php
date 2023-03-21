<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responcive Menu</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/all.min.css ">
    <link rel="stylesheet" href="bootstrap-4.3.1-dist\css\bootstrap.min">
</head>
<body>
    <header>
        <div class="container">
            <div class="flex">
                <div class="logo">
                <a href="#">
                    <img src="../img/logo.png" alt="">
                </a>
            </div>
                <nav>
                    <ul class="flex main_menu">
                        <li>
                        
                                <li ><a href="aac.php">Room Booking</a></li>
                                <li ><a href="booking.php">Booking</a></li>
                                <li ><a href="roomdetails.php">Room Detail</a></li>
                                <li ><a href="aroom.php">Show Room</a></li>
                           
                        </li>
                        </li>
                        <li><a href="admindash.php">Admin Dash</a></li>
                    </ul>
                    <div class="toggle">
                        <i class="fa fa-bars"></i>
                    </div>
                    <ul class="mob_main_menu">
                        <li>
                            <a href="room.php">Rooms</a>
                            <li>
                            <!-- <a href="#">Rooms</a> -->
                                <li ><a href="aac.php">Room Booking</a></li>
                                <li ><a href="booking.php">Booking</a></li>
                                <li ><a href="roomdetails.php">Room Detail</a></li>
                                <li ><a href="aroom.php">Show Room</a></li>
                            <!-- </ul> -->
                        </li>
                        </li>
                        <li><a href="admindash.php">Admin Dash</a></li>
                    </ul>
                   
                </nav>
            </div>
        </div>
    </header>
    <script src="./jquery-3.6.1.min.js"></script>
    <script>
        $(document).ready(function(){
            $('.mob_sub_menu ,.mob_main_menu').hide();

            $('.toggle').click(function()
            {
                $('.mob_main_menu').slideToggle();
                $('.toggle > i').toggleClass('fa-bars fa-xmark');
            });

            $('.mob_main_menu > li > a').click(function(){
                // $('.mob_sub_menu >li').slideToggle();
                $(this).next('.mob_sub_menu').slideToggle();
            })

        })
    </script>
</body>
</html>