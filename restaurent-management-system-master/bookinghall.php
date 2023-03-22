<?php
  // include('dbcon.php');
  // include('header.php');

?>

<!-- <div class="hall-container">
  <div class="hall-img">
    <img src="img/hall2.jpg" alt="">
  </div>
  <div id="book-form">
    <form action="bh.php" method="post">
      <center>
        <table>
          <tr>
            <th width="20%" height="50px">Check Hall Avaibility</th>
            <td rowspan="2"><input type="submit" name="sub" value="Check" required></td>
          </tr>
          <tr>
            <td width="20%" height="50px"><center><input type="date" name="hall" required></center></td>
          </tr>
        </table>
      </center>
    </form>
  </div>
</div>

</body>
</html> -->



<head lang="en">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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

<?php
error_reporting(0);
include('header.php');
include('global.php');
include('dbcon.php');
?>
<style>
.room-status {
    display: none;
}
</style>

<body>
    <div id="carouselExampleIndicators" class="carousel slide room-home box-shadow-all" data-interval="5000"
        data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block carousel-image w-100" src="img/hal1.jpg" alt="First slide">
            </div>
            <div class="carousel-item">
                <img class="d-block carousel-image w-100" src="img/hal4.jpg" alt="Second slide">
            </div>
            <div class="carousel-item">
                <img class="d-block carousel-image w-100" src="img/hal5.avif" alt="Second slide">
            </div>
            <div class="carousel-item">
                <img class="d-block carousel-image w-100" src="img/hal6.jpg" alt="Second slide">
            </div>
            <div class="carousel-item">
                <img class="d-block carousel-image w-100" src="img/hal7.jpg" alt="Second slide">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <?php
               $r=$_GET['room'];
               $ci=$_GET['ci'];
               $co=$_GET['co'];
         ?>
    <!---------------------------------  delux ac--------------------- -->

    <?php

        $acroomTbl = "SELECT * FROM `hall` WHERE `status`='not booked'";
        $acrooms = mysqli_query($sql, $acroomTbl);
        $row=mysqli_num_rows($acrooms);
        if($row > 0)
        {
            while ($row = mysqli_fetch_assoc($acrooms))
            {
                ?>
    <section class="card box-shadow-all" id="rooms">

        <div class="card-body" id="rooms-content-right">
            <div class="paras box-shadow-all">
                <p class="card-title sectionTag"><?php echo $row['hallyype']?></p>
                <p class="sectionsubTag font">Status : <?php echo $row['status']?></p>
                <p class="price">Price per room : <?php echo $row['price']?>Rs</p>
                <form action="loginCheckR2.php" method="get">
                    <input type="submit" class="price-btn">
                </form>
            </div>
            <div class="box-shadow-all">
                <img class="rooms-img" src="<?php echo getBaseUrl().'/uploads/'. $row['image']?>" alt="delux" />
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
            <p class="sectionsubTag r">Status: not Available </p>
            <p class="sectionsubTag r">Sorry, Please come another day :(</p>
        </div>
        <!-- <div class="thumbnail">
                        <img src="img/deluxroom.jpg" alt="delux" class="imgFluid">
                    </div> -->
    </section>
    <?php
        }
        ?>

    </div>

</body>

</html>

<?php include('footer.php');
?>