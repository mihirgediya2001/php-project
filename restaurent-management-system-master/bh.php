 <?php
   error_reporting(0);
   include('connection.php');
   session_start();

   $date = date_create_from_format("d/m/Y",$_SESSION['date']);
   // $newDate = date("Y-m-d", strtotime($_SESSION['date']));  
   $newDate = date_format($date, "Y-m-d");

   var_dump($newDate);
   var_dump($_SESSION['hallid']);
   var_dump($_SESSION);
   

   $qry = "INSERT INTO `hall-bookings` (`h_id`, `date`) VALUES ('$_SESSION[hallid]','$newDate')";
   if (mysqli_query($con, $qry)) {
      $one = true;
   }
   else {
      $one = false;
   }

   $user = "SELECT * FROM `registered_users` where `username` = '$_SESSION[username]'";
   $users = mysqli_query($con, $user);
   $u = mysqli_fetch_assoc($users);

   $hall = "SELECT * FROM `hall-bookings` where `h_id` = '$_SESSION[hallid]' and `date` = '$newDate'";
   $halls = mysqli_query($con, $hall);
   $h = mysqli_fetch_assoc($halls);
   var_dump($h);


   $qry1 = "INSERT INTO `hall_details` (`userid`, `hallbookingid`,`members`) VALUES ('$u[id]','$h[id]','$_SESSION[npeople]')";
   if (mysqli_query($con, $qry1)) {
      $two = true;
   }
   else {
      $two = false;
   }

   if($one==true && $two==true)
   {
      header("location:printhallbill.php");
   }





?> 
