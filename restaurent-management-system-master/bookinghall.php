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

<div id="room-home">
    <figure>
        <img src="img/hal5.avif" alt="delux">
        <img src="img/hal6.jpg" alt="delux">
        <img src="img/hal7.jpg" alt="delux">
        <img src="img/hal1.jpg" alt="delux">
        <img src="img/hal4.jpg" alt="delux">
    </figure>
</div>

    <?php
               $r=$_GET['room'];
               $ci=$_GET['ci'];
               $co=$_GET['co'];
         ?>
    <!---------------------------------  delux ac--------------------- -->

    <?php

        $acroomTbl = "SELECT * FROM `hall` WHERE `status`='un book'";
        $acrooms = mysqli_query($sql, $acroomTbl);
        $row=mysqli_num_rows($acrooms);
        if($row > 0)
        {
            while ($row = mysqli_fetch_assoc($acrooms))
            {
                ?>
            <section id="rooms-right">
                <div class="paras">
                    <p class="sectionTag"><?php echo $row['hallyype']?></p>
                    <p class="sectionsubTag g">Status : <?php echo $row['status']?> </p>
                    <p class="sectionsubTag ">Price per room : <?php echo $row['price']?> Rs</p>
                    <form action="loginCheckR2.php" method="get">

                        <input type="submit" id="room-btn">
                    </form>
                    <br>
                </div>
                <div class="thumbnail">
                    
                    <img src="<?php echo getBaseUrl().'/uploads/'. $row['image']?>" alt="delux" class="imgFluid" style="padding-right: 10px !important;width: 600px !important;height: 469px !important;">
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
include('headfooter.php');
?>

</body>

</html>