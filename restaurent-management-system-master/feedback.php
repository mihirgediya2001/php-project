<?php
include('header.php');
include('dbcon.php');
?>


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


<section id="">
    <img class="img-fluid hall-img" src="img/feedback.jpg" alt="feedback" />
</section>

<form id="myform" action="feedback.php" method="POST" >
    <div style="margin-top:20px" class=" cardc box-shadow-all">
        <a class="singup">Your Feedback</a>
        <div class="inputBox1">
            <input type="text" name="name" value="" required="required">
            <span>Name</span>
        </div>
        <div class="inputBox">
            <input type="textarea" name="feedback" value="" required="required">
            <span>Feedback</span>
        </div>

        <button id="submit" type="button" data-toggle="modal" data-target="#saved" name="x" class="enter">Submit</button>

    </div>
</form>

<?php
       if(isset($_POST['submit']))
       {
           $name = $_POST['name'];
           $feedback=$_POST['feedback'];

           $qry="INSERT INTO feedback (name,feedback) VALUES ('$name','$feedback')";
           $run=mysqli_query($sql,$qry);

           if($run==true)
           {
               ?>
               <script>
                    $('#saved').modal('show');  
               </script>
               <?php
           }
            
       }
    ?>


<div class="modal fade" id="saved" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Thank you for your feedback.
            </div>
            <div class="modal-footer">
                <button form="myform" type="submit" class="btn btn-secondary" name="submit">Close</button>
            </div>
        </div>
    </div>
</div>
</body>

</html>


<?php
include('footer.php');
?>