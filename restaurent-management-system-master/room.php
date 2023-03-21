<?php
error_reporting(0);
include('header.php');
include('global.php');
include('dbcon.php');
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
    <style>
    .room-status {
        display: none;
    }
    </style>
</head>



<div id="room-home">
    <figure>
        <img src="img/b3.jpg" alt="delux">
        <img src="img/b4.jpg" alt="delux">
        <img src="img/b5.jpg" alt="delux">
        <img src="img/ad1.jpg" alt="delux">
        <img src="img/ac2.jpeg" alt="delux">
    </figure>
</div>



<?php
               $r=$_GET['room'];
               $ci=$_GET['ci'];
               $co=$_GET['co'];
         ?>
<!---------------------------------  delux ac--------------------- -->

<?php

        $acroomTbl = "SELECT * FROM `acroom` WHERE `status`='un book'";
        $acrooms = mysqli_query($sql, $acroomTbl);
        $row=mysqli_num_rows($acrooms);
        if($row > 0)
        {
            while ($row = mysqli_fetch_assoc($acrooms))
            {
                ?>
<section id="rooms-right">
    <div class="paras">
        <p class="sectionTag"><?php echo $row['roomtype']?></p>
        <p class="sectionsubTag g">Status : <?php echo $row['status']?> </p>
        <p class="sectionsubTag g">Price per room : <?php echo $row['price']?> Rs</p>
        <form action="loginCheckR1.php" method="get">

            <input type="submit" id="room-btn">
        </form>
        <br>

        <div class="thumbnail">

            <img src="<?php echo getBaseUrl().'/uploads/'. $row['img']?>" alt="delux" class="imgFluid"
                style="padding-right: 10px !important;width: 600px !important;height: 469px !important;">
        </div>
    </div>
</section>
<?php
            }
        }
        else
        {
    ?>
<section id="rooms-right">
    <div class="paras">
        <p class="sectionTag">Delux Ac Room</p>
        <p class="sectionsubTag r">Status :not Available </p>
        <p class="sectionsubTag r">Sorry :( Please come another day</p>
    </div>
    <!-- <div class="thumbnail">
                        <img src="img/deluxroom.jpg" alt="delux" class="imgFluid">
                    </div> -->
</section>
<?php
        }
        ?>

</div>

<div class="room-status">

    <section id="rooms-right">

    </section>
    <section id="rooms-right">

    </section>
    <section id="rooms-right">

    </section>
</div>


<?php
include('footer.php');
?>

</body>

</html>