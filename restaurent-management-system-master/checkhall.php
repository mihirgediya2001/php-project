<?php
   error_reporting(0);
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
      integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
      integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
      integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
      <link rel="stylesheet" href="http://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

</head>
<?php 
    $acroomTbl = "SELECT * FROM `hall-bookings` where `h_id` = $_SESSION[hallid]";
            $acrooms = mysqli_query($sql, $acroomTbl);
            $row=mysqli_num_rows($acrooms);
            $datesf = array();
            if($row > 0)
            {
                while ($row = mysqli_fetch_assoc($acrooms)) {
                    $newDate = date("d/m/Y", strtotime($row['date']));  
                    
                    array_push($datesf, $newDate);
                }            
            }
            $user = "SELECT * FROM `registered_users` where `username` = '$_SESSION[username]'";
            $users = mysqli_query($sql, $user);
            $u = mysqli_fetch_assoc($users);
        
            $qry="SELECT * FROM `hall` WHERE `id`=$_SESSION[hallid]";
            $run=mysqli_query($sql,$qry);
            $rd =  mysqli_fetch_assoc($run);
            $capacity = intval($rd['capacity']);
?>

<script>
   var dates = <?php echo json_encode($datesf); ?>;
   function DisableDates(date) {
   var string = jQuery.datepicker.formatDate("dd/mm/yy", date);
   return [dates.indexOf(string) == -1];
   }
   $(function() {
   $("#date").datepicker({
    beforeShowDay: DisableDates,
    minDate: 0,
    dateFormat: "dd/mm/yy"
   });
   });
</script>
<form id="myform" action="bh1.php" method="POST" >
   <div style="margin-top:20px" class="cardc box-shadow-all">
      <a class="singup">Select Date</a>
      <div class="inputBox1">
         <input type="text" class="js--datePicker" id="date" name="date" value="" required="required" autocomplete="false">
         <span>Date</span>
      </div>
      <div class="inputBox1">
         <input type="number" class="total-persons" name="npeople" max="<?=$capacity?>" value="" required="required">
         <span>Total Persons</span>
      </div>
      <button id="submit" type="submit" name="book" class="enter">Continue</button>
   </div>
</form>
<script>
   document.querySelector('.total-persons').oninput = () => {
       var number = document.querySelector('.total-persons').value;
       var max = <?=$capacity?>
   
       if(number>max)
       {
           document.querySelector('.total-persons').value = max;
       }
       else if(number<= 0)
       {
           document.querySelector('.total-persons').value = 1;
       }
   
   }
</script>

<?php
   include('footer.php');
   ?>


