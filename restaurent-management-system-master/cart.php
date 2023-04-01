<html>

<head lang="en">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
include 'dbcon.php';
include 'header.php';
include 'connect.php';
// include_once "bootstrap.php";
// session_start();
$_SESSION['redirected_page'] = 'cartpayment2.php';
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}
$_SESSION['bill'] = 'print_bill.php';


function find_qty($id)
{
    if (isset($_SESSION['qty_array'])) {

        $qs = count($_SESSION['qty_array']);

        for ($x = 0; $x < $qs; $x++) {
            if ($_SESSION['qty_array'][$x][0] == $id) {
                return $_SESSION['qty_array'][$x][1];
            }
        }
    }
}
?>

<body>

    <div class="container speciality-class box-shadow-all">

        <div class="row">
            <div class="col-lg-12">
                <h1 class="h-primary center">My Cart</h1>
            </div>

            <div class="col-sm-8 col-sm-offset-2">
                <?php

                if (isset($_SESSION['message'])) {
                    ?>
                    <div class="alert alert-info text-center">
                        <?php echo $_SESSION['message']; ?>
                    </div>
                    <?php
                    unset($_SESSION['message']);
                }

                ?>
                <form method="POST" action="cart/save_cart.php">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <th></th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Subtotal</th>
                            </thead>
                            <tbody>
                                <?php
                                //initialize total
                                $total = 0;
                                if (!empty($_SESSION['cart'])) {
                                    //connection
                                    $conn = connection();
                                    //create array of initail qty which is 1
                                    $index = 0;
                                    if (!isset($_SESSION['qty_array'])) {
                                        $_SESSION['qty_array'] = array_fill(0, count($_SESSION['cart']), array(1, 1));
                                        $cs = count($_SESSION['cart']);
                                        for ($x = 0; $x < $cs; $x++) {
                                            $_SESSION['qty_array'][$x][0] = $_SESSION['cart'][$x];
                                            $_SESSION['qty_array'][$x][1] = 1;
                                        }
                                    } else {
                                        $cs = count($_SESSION['cart']);
                                        $qs = count($_SESSION['qty_array']);

                                        for ($x = 0; $x < $cs - $qs; $x++) {

                                            array_push($_SESSION['qty_array'], array(1, 1));
                                        }

                                        for ($x = $qs; $x < $cs; $x++) {

                                            $_SESSION['qty_array'][$x][0] = $_SESSION['cart'][$x];
                                            $_SESSION['qty_array'][$x][1] = 1;

                                        }
                                    }
                                    $sql = "SELECT * FROM addfood WHERE id IN (" . implode(',', $_SESSION['cart']) . ")";
                                    $query = $conn->query($sql);
                                    while ($row = $query->fetch_assoc()) {
                                        ?>
                                        <tr>
                                            <td>
                                                <div class="delete-btn">
                                                    <a href=" cart/delete_item.php?id=<?php echo $row['id'] ?>"
                                                        class=" btn box-shadow-all btn-outline-danger btn-sm">
                                                        <i class="fa fa-trash-o"></i></a>
                                                </div>
                                            </td>
                                            <td>
                                                <?php echo $row['name']; ?>
                                            </td>
                                            <td>
                                                <?php echo number_format($row['price'], 2); ?>
                                            </td>
                                            <input type="hidden" name="indexes[]" value="<?php echo $row['id']; ?>">
                                            <td><input type="text" class="form-control"
                                                    value="<?php echo find_qty($row['id']); ?>"
                                                    name="qty_<?php echo $row['id']; ?>">
                                            </td>
                                            <td>
                                                <?php echo number_format(find_qty($row['id']) * $row['price'], 2); ?>
                                            </td>
                                            <?php $total += find_qty($row['id']) * $row['price']; ?>
                                        </tr>
                                        <?php
                                        $index++;
                                    }
                                } else {
                                    ?>
                                    <tr>
                                        <td colspan="5" class="text-center">No Item in Cart</td>
                                    </tr>
                                    <?php
                                }

                                ?>
                                <tr>
                                    <td colspan="4" align="right"><b>Total</b></td>
                                    <td><b>
                                            <?php echo number_format($total, 2); ?>
                                        </b></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="cart-btns">
                        <a href="food.php" class="one btn btn-outline-primary box-shadow-all">
                            <i class='fa fa-arrow-left'></i>
                            Back
                        </a>
                        <button type="submit" class="two btn btn-outline-success box-shadow-all" name="save">
                            <i class="fa fa-save"></i> Save Changes</button>
                        <button type="button" data-toggle="modal" data-target="#clearcartmodal" name="reset"
                            class=" three btn btn-outline-danger box-shadow-all">
                            <i class="fa fa-trash-o"></i>
                            Clear Cart
                        </button>
                        <?php
                        if (count($_SESSION['cart']) != 0) {
                            ?>
                            <div class="four">
                                <form action="checklogin.php" method="POST">
                                    <a href="checklogin.php" class="btn btn-outline-success box-shadow-all">
                                        <i class="fa fa-check"></i>
                                        Checkout
                                    </a>
                                </form>
                            </div>
                        <?php
                        } else {
                            ?>
                            <div class="four">
                                <form action="checklogin.php" method="POST">
                                    <a href="" data-toggle="modal" data-target="#noitem"
                                        class="btn btn-outline-success box-shadow-all">
                                        <i class="fa fa-check"></i>
                                        Checkout
                                    </a>
                                </form>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <div class="modal fade" id="clearcartmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Are you sure?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Do you want to clear the cart?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-danger"><a href="cart/clear_cart.php">Yes</a></button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="noitem" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Place your Order</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Cart cannot be empty.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger"><a href="food.php">OK</a></button>
                </div>
            </div>
        </div>
    </div>

</body>

</html>



<?php include 'footer.php';
?>