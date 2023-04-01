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
include 'connect.php';


$_SESSION['redirected_page'] = 'checkhall.php';
$_SESSION['hallid'] = 0;
$_SESSION['bill'] = 'bh.php';


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
                <img class="d-block carousel-image w-100" src="img/hal2.jpg" alt="First slide">
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
    $filtered = false;
    $value = "All Items";
    $myHeaderClass1 = "active";
    $myHeaderClass2 = "";
    $myHeaderClass3 = "";
    $myHeaderClass4 = "";
    $myHeaderClass5 = "";
    $myHeaderClass6 = "";
    $myHeaderClass7 = "";

    if (isset($_POST['all'])) {
        $GLOBALS['filtered'] = false;
        $result = display();
        $myHeaderClass1 = "active";
    }

    if (isset($_POST['marriage'])) {
        $GLOBALS['filtered'] = true;
        $GLOBALS['value'] = "Marriage";
        $result = display();
        $myHeaderClass2 = "active";
        $myHeaderClass1 = "";
    }

    if (isset($_POST['birthday'])) {
        $GLOBALS['filtered'] = true;
        $GLOBALS['value'] = "Birthday";
        $result = display();
        $myHeaderClass3 = "active";
        $myHeaderClass1 = "";
    }

    if (isset($_POST['anniversary'])) {
        $GLOBALS['filtered'] = true;
        $GLOBALS['value'] = "Anniversary";
        $result = display();
        $myHeaderClass4 = "active";
        $myHeaderClass1 = "";
    }

    if (isset($_POST['babyshower'])) {
        $GLOBALS['filtered'] = true;
        $GLOBALS['value'] = "Baby Shower";
        $result = display();
        $myHeaderClass5 = "active";
        $myHeaderClass1 = "";
    }

    if (isset($_POST['engagement'])) {
        $GLOBALS['filtered'] = true;
        $GLOBALS['value'] = "Engagement";
        $result = display();
        $myHeaderClass6 = "active";
        $myHeaderClass1 = "";
    }

    if (isset($_POST['annualfunction'])) {
        $GLOBALS['filtered'] = true;
        $GLOBALS['value'] = "Anual Function";
        $result = display();
        $myHeaderClass7 = "active";
        $myHeaderClass1 = "";
    }

    function display()
    {
        $str = "select * from hall";

        if ($GLOBALS['filtered'] == true) {
            $str = $str . " where hallyype = '" . $GLOBALS['value'] . "';";
        }

        $conn = connection();
        $result = $conn->query($str);
        $conn->close();
        return $result;
    }

    $result = display();
    ?>
    <!---------------------------------  delux ac--------------------- -->

    <div class="container speciality-class box-shadow-all">
        <h1 class="h-primary center">Menu</h1>
        <form target="_self" id="foodbtns" class="food-btns" method="POST">
            <input type="submit" class="<?= $myHeaderClass1 ?> b1 food-btn box-shadow-all" name="all" value="All Items" />
            <input type="submit" class="<?= $myHeaderClass2 ?> b2 food-btn box-shadow-all " name="marriage"
                value="Marriage" />
            <input type="submit" class="<?= $myHeaderClass3 ?> b3 food-btn box-shadow-all " name="birthday"
                value="Birthday" />
            <input type="submit" class="<?= $myHeaderClass4 ?> b4 food-btn box-shadow-all " name="anniversary"
                value="Anniversary" />
            <input type="submit" class="<?= $myHeaderClass5 ?> b5 food-btn box-shadow-all " name="babyshower"
                value="Baby Shower" />
            <input type="submit" class="<?= $myHeaderClass6 ?> b6 food-btn box-shadow-all " name="engagement"
                value="Engagement" />
            <input type="submit" class="<?= $myHeaderClass7 ?> b7 food-btn box-shadow-all " name="annualfunction"
                value="Annual Function" />
        </form>
    </div>

    <section class="card box-shadow-all" id="rooms">
        <?php if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                ?>
                <div class="card-body" id="rooms-content-right">
                    <div class="paras box-shadow-all">
                        <p class="card-title sectionTag">
                            <?php echo $row['hallyype'] ?>
                        </p>
                        <p class="sectionsubTag font">
                            <?php echo $row['detail'] ?>
                        </p>
                        <p class="price">Price per room:
                            <?php echo $row['price'] ?>Rs
                        </p>

                        <p class="sectionsubTag font">Hall capacity:
                            <?php echo $row['capacity'] ?> Persons
                        </p>

                        <a href="addhall.php?id=<?php echo $row['id']; ?>">
                            <input type="submit" class="price-btn" value="Book Now" />
                        </a>
                    </div>
                    <div class=" box-shadow-all">
                        <img class="rooms-img" src="<?php echo getBaseUrl() . '/uploads/' . $row['image'] ?>" alt="delux" />
                    </div>
                </div>
            <?php
            }
        } else {
            ?>
            <div class="paras">
                <p class="sectionTag">Delux Ac Room</p>
                <p class="sectionsubTag r">Status: not Available </p>
                <p class="sectionsubTag r">Sorry, Please come another day :(</p>
            </div>
            <!-- <div class="thumbnail">
                        <img src="img/deluxroom.jpg" alt="delux" class="imgFluid">
                    </div> -->
        <?php
        }
        ?>
        </section>


</body>

</html>

<?php include('footer.php');
?>