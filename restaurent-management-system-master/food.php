<?php
include 'header.php';
include_once 'dbcon.php';
include 'connect.php';
// include ('bootstrap.php');
// session_start();
//initialize cart if not set or is unset
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}
$_SESSION['bill'] = 'print_bill.php';

// //unset qunatity
// unset($_SESSION['qty_array']);
?>
<!DOCTYPE html>
<html>

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
include 'global.php';

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

if (isset($_POST['southindian'])) {
    $GLOBALS['filtered'] = true;
    $GLOBALS['value'] = "South Indian";
    $result = display();
    $myHeaderClass2 = "active";
    $myHeaderClass1 = "";
}

if (isset($_POST['italian'])) {
    $GLOBALS['filtered'] = true;
    $GLOBALS['value'] = "Italian";
    $result = display();
    $myHeaderClass3 = "active";
    $myHeaderClass1 = "";
}

if (isset($_POST['maharashtrian'])) {
    $GLOBALS['filtered'] = true;
    $GLOBALS['value'] = "Maharashtrian";
    $result = display();
    $myHeaderClass4 = "active";
    $myHeaderClass1 = "";
}

if (isset($_POST['punjabi'])) {
    $GLOBALS['filtered'] = true;
    $GLOBALS['value'] = "Punjabi";
    $result = display();
    $myHeaderClass5 = "active";
    $myHeaderClass1 = "";
}

if (isset($_POST['chinese'])) {
    $GLOBALS['filtered'] = true;
    $GLOBALS['value'] = "Chinese";
    $result = display();
    $myHeaderClass6 = "active";
    $myHeaderClass1 = "";
}

if (isset($_POST['deserts'])) {
    $GLOBALS['filtered'] = true;
    $GLOBALS['value'] = "Deserts";
    $result = display();
    $myHeaderClass7 = "active";
    $myHeaderClass1 = "";
}

function display()
{
    $str = "select * from addfood";

    if ($GLOBALS['filtered'] == true) {
        $str = $str . " where foodtype = '" . $GLOBALS['value'] . "';";
    }

    $conn = connection();
    $result = $conn->query($str);
    $conn->close();
    return $result;
}

$result = display();

?>

<!-- < !-- ----------------------------------- South Indian-------------------------- -->
<div class="container speciality-class box-shadow-all">
    <h1 class="h-primary center">Menu</h1>
    <form target="_self" id="foodbtns" class="food-btns" method="post">
        <input type="submit" class="<?= $myHeaderClass1 ?> b1 food-btn box-shadow-all" name="all" value="All Items" />
        <input type="submit" class="<?= $myHeaderClass2 ?> b2 food-btn box-shadow-all " name="southindian"
            value="South Indian" />
        <input type="submit" class="<?= $myHeaderClass3 ?> b3 food-btn box-shadow-all " name="italian" value="Italian" />
        <input type="submit" class="<?= $myHeaderClass4 ?> b4 food-btn box-shadow-all " name="maharashtrian"
            value="Maharashtrian" />
        <input type="submit" class="<?= $myHeaderClass5 ?> b5 food-btn box-shadow-all " name="punjabi" value="Punjabi" />
        <input type="submit" class="<?= $myHeaderClass6 ?> b6 food-btn box-shadow-all " name="chinese" value="Chinese" />
        <input type="submit" class="<?= $myHeaderClass7 ?> b7 food-btn box-shadow-all " name="deserts" value="Deserts" />
    </form>
</div>
<div class="container speciality-class box-shadow-all">
    <div class="food-header">
        <div class="food-header2">
            <h1 class="h-primary center">
                <?php echo $GLOBALS['value']; ?>
            </h1>
        </div>


    </div>
    <?php
    if (isset($_SESSION['message'])) {
        ?>
        <div class="row">
            <div class="col-sm-6 col-sm-offset-6">
                <div class="alert alert-info text-center">
                    <?php echo $_SESSION['message']; ?>
                </div>
            </div>
        </div>
        <?php
        unset($_SESSION['message']);
    }
    ?>

    <section class="row-data" id="services">

        <?php if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                ?>
                <div class="box box-shadow-all">
                    <div>
                        <img class="card-img" src="<?php echo getBaseUrl() . '../uploads/' . $row['img'] ?>"
                            alt="<?php echo $row['name'] ?>">
                        <h2 class="h-secondary center" style="color:black">
                            <?php echo ucfirst($row['name']); ?>
                        </h2>
                        <div class="card_body">
                            <div class="food-details" style="color:black">
                                <p>Category:<strong>
                                        <?php echo $row['foodtype']; ?>
                                    </strong></p>
                                <p>price:<strong>
                                        <?php echo $row['price']; ?> rs
                                    </strong></p>
                                <a href="cart/add_cart.php?id=<?php echo $row['id']; ?>" class="food-btn box-shadow-all">
                                    <i class="fa fa-plus"></i> Cart</a>
                            </div>
                        </div>
                    </div>

                </div>

                <?php
            }
        } else {
            ?>
            <div class="food-header2">
                <h1 class="h-primary">No Items Found:(</h1>
            </div>

            <?php
        }

        ?>

    </section>
    <div class="header-right">
        <button class="cart-btn box-shadow-all">
            <a href="cart.php">
                <i class="badge">
                    <?php echo count($_SESSION['cart']); ?>
                </i>
                Cart
                <i class="fa fa-shopping-cart"></i>
            </a>
        </button>
    </div>

</div>


</html>
<?php include 'footer.php';
?>