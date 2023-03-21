<?php
include('dbcon.php');
include('header.php');
?>

<html>
<body>
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
    <div class="contact-container">

        <div class="contact1">
            <div class="contact-symbol">
                <i class="fas fa-hamburger">Hotel VENICE</i>
            </div>
            <div class="book-h1">
                <h1>BOOK YOUR <br> HOTEL TODAY</h1>
            </div>
            <div class="book-p">
                <p>Hotels.com Customer Care Number, Contact Address, Email Id. Hotels.com is an <br> Indian Most Popular
                    Online Hotel Booking Platforms. Many Indian’s looking for the contact.</p>
            </div>

            <div class="location">
                <i class="fas fa-map-marker-alt"></i> <br>
                21 JACKSON BLVD 120 <br> LOS ANGELES
            </div>
            <div class="facebook">
                <i class="fab fa-facebook"></i>
                <i class="fab fa-instagram"></i>
                <i class="fab fa-twitter-square"></i>
                <i class="fab fa-youtube"></i>
            </div>
            <div class="website">
                <p>www.restaurentms.com</p>
            </div>
        </div>
        <div class="contact2">
            <div class="contact2-h1">
                <h1 align="center">Don't Hesitate <br> To Contact Us</h1>
            </div>

            <div class="contact-box">
                <form action="contact.php" method="post">
                    <div class="form-group-con">
                        <label for="name">Name:</label>
                        <input type="text" name="name" id="name" placeholder="Enyer Your name">
                    </div>
                    <div class="form-group-con">
                        <label for="name">Email:</label>
                        <input type="email" name="email" id="email" placeholder="Enyer Your Email">
                    </div>
                    <div class="form-group-con">
                        <label for="name">Mobile:</label>
                        <input type="phone" name="phone" id="phone" placeholder="Enyer Your phone">
                    </div>
                    <div class="form-group-con">
                        <label for="name">Address:</label>
                        <input type="phone" name="address" id="phone" placeholder="Enyer Your Address">
                    </div>
                    <div class="form-group-con">
                        <label for="name">Message:</label>
                        <textarea name="message" id="message" cols="20" rows="4"></textarea>
                    </div>
                    <div class="form-group-con">
                        <button class="con-btn" name="con-btn">Submit</button>
                    </div>
                </form>
                <?php
               if(isset($_POST['con-btn']))
               {
                   $con_name=$_POST['name'];
                   $con_email=$_POST['email'];
                   $con_mobile=$_POST['phone'];
                   $con_address=$_POST['address'];
                   $con_message=$_POST['message'];

                   $qry="INSERT INTO contact(name,email,mobile,address,message) VALUES ('$con_name','$con_email','$con_mobile','$con_address','$con_message')";

                   $run=mysqli_query($sql,$qry);
                   if($run)
                   {
                       ?>
                <script>
                alert("Thanks For Contacting Us");
                </script>
                <?php
                   }
                   else{

                   }
                  
               }
            ?>
            </div>
        </div>

    </div>
</body>
               

</html>