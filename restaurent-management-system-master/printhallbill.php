<?php
    include 'dbcon.php';
    include 'header.php';
    include 'connect.php';


    $qry = "SELECT * FROM `registered_users` WHERE `username`='$_SESSION[username]'";
    $result = mysqli_query($con, $qry);

    $qry1 = "SELECT * FROM `hall` WHERE `id`='$_SESSION[hallid]'";
    $result1 = mysqli_query($con, $qry1);
    $name = "";
    $mobile = "";
    $email = "";
    $type="";
    $total = 0;
    $date = date("d-m-Y");

    //TODO
    $transID = rand(100000000000000000, 999999999999999999);
    if ($result) {
        if (mysqli_num_rows($result) == 1) {
            $result_fetch = mysqli_fetch_assoc($result);
            $name = $result_fetch['name'];
            $mobile = $result_fetch['mno'];
            $email = $result_fetch['email'];
            
    
        } else {
            echo "
        <script>
          alert('Incorrect Email Or Username');
          window.location.href='index.php';
        </script>
    
        ";
        }
    } else {
        echo "
    <script>
      alert('Cannot run');
      window.location.href='index.php';
    </script>
    
    ";
    }

    if ($result1) {
        if (mysqli_num_rows($result1) == 1) {
            $result_fetch1 = mysqli_fetch_assoc($result1);
            $total = $result_fetch1['price'];
            $type = $result_fetch1['hallyype'];
        } else {
            echo "
        <script>
          alert('Incorrect Email Or Username');
          window.location.href='index.php';
        </script>
    
        ";
        }
    } else {
        echo "
    <script>
      alert('Cannot run');
      window.location.href='index.php';
    </script>
    
    ";
    }
    
    ?>
<head lang="en">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<div class="container speciality-class box-shadow-all">
    <div class="row">
        <div class="col-lg-10 bill-details box-shadow-all">
            <h1 class="h-secondary center">Your Booking</h1>
        </div>
        <div class="col-lg-10 bill-details order-details box-shadow-all">
            <div>
                <p class="key">Date:</p>
                <p class="value"><?=$date?></p>
            </div>
            <div>
                <p class="key">Name:</p>
                <p class="value"><?=$name?></p>
                <br />
                <p class="key">Mobile Number:</p>
                <p class="value"><?=$mobile?></p>
                <br />
                <p class="key">Email ID:</p>
                <p class="value"><?=$email?></p>
                <br />
            </div>
        </div>
        <div class="col-sm-10 col-sm-offset-2 " style="padding:0">
            <div class="table-responsive box-shadow-all">
                <table class="table" style="margin-bottom:0">
                    <tbody>
                        <tr width="25%">
                            <td class="text-left">
                                <div>
                                    <p class="key">Occasion:</p>
                                    <p class="value"><?=$type?></p>
                                    <br />
                                    <p class="key">Event Date:</p>
                                    <p class="value"><?=$_SESSION['date']?></p>
                                    <br />
                                    <p class="key">Total Guests:</p>
                                    <p class="value"><?=$_SESSION['npeople']?></p>
                                    <br />
                                </div>
                            </td>
                            <td></td>
                        </tr>
                        <tr>
                            <td width="75%" align="right"><b>Total</b></td>
                            <td><b>
                                <?php echo number_format($total, 2); ?>
                                </b>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-lg-10 bill-details box-shadow-all">
            <div>
                <p class="key">Card Number:</p>
                <p class="value">
                    <?= $_SESSION['ccnumber'] ?>
                </p>
                <br/>
                <p class="key">Transaction ID:</p>
                <p class="value">
                    <?=$transID?>
                </p>
            </div>
        </div>
    </div>

    <div class="modal fade" id="printingdone" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Thank you</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    invoice has been generated.
                </div>
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn btn-success">Home</button>
                </div>
            </div>
        </div>
    </div>

    <div style="display:none">
        <div class="row" id="GFG" style="display:flex">
            <div class="col-sm-14" style="border: 2px solid whitesmoke;
                border-radius: 20px;
                margin: 20px;
                padding: 20px 15px;">
                <h1 class="h-secondary center" style="font-size: 2rem;
                    font-weight: bold;
                    padding: 12px;
                    font-family: 'Crete Round', serif;
                    text-align: center;">Your Order</h1>
            </div>
            <div class="col-sm-14 bill-details order-details" style="border: 2px solid whitesmoke;
                border-radius: 20px;
                margin: 20px;
                padding: 20px 15px;">
                <div>
                    <p class="key">Date:</p>
                    <p class="value"><?=$date?></p>
                </div>
                <div>
                    <p class="key">Name:</p>
                    <p class="value"><?=$name?></p>
                    <br />
                    <p class="key">Mobile Number:</p>
                    <p class="value"><?=$mobile?></p>
                    <br />
                    <p class="key">Email ID:</p>
                    <p class="value"><?=$email?></p>
                    <br />
                </div>
            </div>
            <div class="col-sm-14"  style="border: 2px solid whitesmoke;
                border-radius: 20px;
                margin: 20px;
                padding: 20px 15px;" style="items-align:center">
                    <div class="table-responsive" style="    display: flex; justify-content: center;
                        width: 100%;
                        overflow-x: auto;">
                        <table class="table" style="    width: 100%;
                            max-width: 90%;
                            margin-bottom: 1rem;
                            background-color: transparent;
                            ">
                            <tbody>
                            <tr width="25%" style="border:none">
                            <td class="text-left" style="border:none">
                                <div>
                                    <p class="key">Occasion:</p>
                                    <p class="value"><?=$type?></p>
                                    <br />
                                    <p class="key">Event Date:</p>
                                    <p class="value"><?=$_SESSION['date']?></p>
                                    <br />
                                    <p class="key">Total Guests:</p>
                                    <p class="value"><?=$_SESSION['npeople']?></p>
                                    <br />
                                </div>
                            </td>
                        </tr>
                        <tr  style="border-top:1px solid black; border-bottom:1px solid #dee2e6">
                            <td width="75%" align="right"><b>Total</b></td>
                            <td><b>
                                <?php echo number_format($total, 2); ?>
                                </b>
                            </td>
                        </tr>
                            </tbody>
                        </table>
                    </div>
                <!-- /.row -->
            </div>
            <div class="col-sm-14" style="border: 2px solid whitesmoke;
                border-radius: 20px;
                margin: 20px;
                padding: 20px 15px;">
                <div>
                    <p class="key">Card Number:</p>
                    <p class="value">
                        <?= $_SESSION['ccnumber'] ?>
                    </p>
                    <br/>
                    <p class="key">Transaction ID:</p>
                    <p class="value">
                        <?=$transID?>
                    </p>
                </div>
            </div>
            <div class="col-sm-14" style="border: 2px solid whitesmoke;
                border-radius: 20px;
                margin: 20px;
                padding: 20px 15px;">
                <h1 class="h-secondary center" style="font-size: 1.5rem;
                    font-weight: bold;
                    padding: 12px;
                    font-family: 'Crete Round', serif;
                    text-align: center;">Thank You!<br/>Visit Again</h1>
            </div>
        </div>
    </div>
    <div class="header-right">
    <button class="check-btn" class="btn box-shadow-all" onclick="printDiv()">Print</button>
    </div>
    <div id="editor">
        
    </div>
</div>

<script>
    function printDiv() {
        var divContents = document.getElementById("GFG").innerHTML;
        var a = window.open('', '', '');
        a.document.write('<html>');
        a.document.write('<head><link rel="stylesheet" href="css/style.css"><link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">');
        a.document.write('<style>');
        a.document.write('</style>');
        
        a.document.write('</head>');
        
        a.document.write('<body>');
        a.document.write(divContents);
        a.document.write('</body></html>');
        a.document.close();
        a.print();
        $('#printingdone').modal('show');
        $('#printingdone').on('hidden.bs.modal', function (e) {
        window.location.href='index.php';
            
            
          })
        // var elementHTML = document.querySelector("#GFG");
    
        // const { jsPDF } = window.jspdf;
        // var doc = new jsPDF("p", "pt", 'a4');
    
        // // Generate PDF from HTML using right id-selector
        // doc.html(elementHTML, {
        //     callback: function (doc) {
        //         doc.save("download.pdf");
        //     },
        //     x: 10,
        //     y: 19
        // });
    } 
</script>
<?php
    include 'footer.php';
    unset($_SESSION['cart']);
    unset($_SESSION['qty_array']);
    unset($_SESSION['ccnumber']);
    ?>
