<?php
include('dbcon.php');
include('connect.php');
// $ci=$_GET['ci'];
//  $co=$_GET['co'];
//  $rt=$_GET['rt'];
//  $nr=$_GET['nr'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ac room form</title>
</head>
<style>
    body{
        background-image: url('./img/ac3.jpg'); 
        background-repeat:no-repeat;
        background-size: 100%;
    }
   #r1-container{
     
   }
   #r1-container h1{
       text-align:center;
       margin-top: 30px;
   }
   form{
       display: flex;
       justify-content:center;
       align-items: center;
       
       flex-direction:column;
       

   }
   table{
      width: 200px;
      height:150px;
      border:1px solid black;
    background-color: rgba(255,255,255,0.5);
      padding: 40px;
      border-radius:20px;
   }
   table tr td{
       padding: 8px;
   }
   table tr td input{
       font-size:17px;
   }
</style>
<body>
    <div id="r1-container">

         <?php
    $conn = connection();
    session_start();
    $loginUsername = $_SESSION['username'];
    $sql = "SELECT * FROM `registered_users` WHERE username = '$loginUsername'";
    $loginUser = $conn->query($sql);

    if ($loginUser->num_rows > 0) {
        // output data of each row
        while ($row = $loginUser->fetch_assoc()) {
            ?>
            <h1>Please Fill Up The Form Given Below</h1>
            <form action="r1.php" method="post">
                <h1>BOOK NOW</h1>
                <table>
                    <tr>
                        <td>Status</td>
                        <td><input type="text" name="Status" value="Available" class="g" disabled="disabled" title="Status"></td>
                    </tr>

                    <tr>
                        <td>name</td>
                        <td><input type="text" name="name" title="name" readonly
                                   value=<?php echo (isset($row['username']) && $row['username'] != null) ? $row['username'] : "" ?>>
                        </td>

                    </tr>
                    <tr>
                        <td>Address</td>
                        <td><input type="text" name="address" title="address" readonly
                                   value=<?php echo (isset($row['address']) && $row['address'] != null) ? $row['address'] : "" ?>>
                        </td>
                    </tr>
                    <tr>
                        <td>State</td>
                        <td><input type="text" name="state" title="state" readonly
                                   value=<?php echo (isset($row['state']) && $row['state'] != null) ? $row['state'] : "" ?>>
                        </td>
                    </tr>
                    <tr>
                        <td>City</td>
                        <td>
                            <input type="text" name="city" title="city" readonly
                                   value=<?php echo (isset($row['city']) && $row['city'] != null) ? $row['city'] : "" ?>>
                        </td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>
                            <input type="email" name="email" title="email" readonly
                                   value=<?php echo (isset($row['email']) && $row['email'] != null) ? $row['email'] : "" ?>>
                        </td>
                    </tr>
                    <tr>
                        <td>Check in Date</td>
                        <td><input type="date" name="cin" title="cindate" required></td>
                        <td>Check out Date</td>
                        <td><input type="date" name="cout" title="coutdate" required></td>
                    </tr>
                    <tr>
                        <td>Members</td>
                        <td><input type="text" name="members" title="members"  required></td>
                    </tr>
                    <tr>
                        <td>Room Type</td>
                        <td>
                            <select name="roomtype">
                                <option value="Ac rooms">Dulex AC room</option>
                                <option value="Ac rooms">AC room</option>
                                <option value="Ac rooms">NON AC room</option>
                            </select>
                        </td>

                    </tr>
                    <tr>
                        <td>No of Rooms</td>
                        <td><input type="text" name="noofroom" title="No of Room" required ></td>
                    </tr>
                    <tr>

                        <td><input type="submit" name="submit" value="submit"></td>
                    </tr>
                </table>
                <?php
                
                       function book_room($rid)
                       {
                           $conn = connection();
                           $str = "select * from registered_users ";
                           $result1 = $conn->query($str);
                           return $result1;
                       }
                
                       $username = "";
                       if (isset($_GET['rid1']))//code for order
                       {
                           $result1 = book_room($_GET['rid1']);
                           $row = $result1->fetch_assoc();
                           // $id=$row["id"];
                           $username = $row["username"];
                           // $pri=$row["med_price"];
                       }
                
                       if (isset($_POST['submit'])) {
                           $name = $_POST['name'];
                           $address = $_POST['address'];
                           $state = $_POST['state'];
                           $city = $_POST['city'];
                           $email = $_POST['email'];
                           $cin = $_POST['cin'];
                           $cout = $_POST['cout'];
                           $members = $_POST['members'];
                           $roomtype = $_POST['roomtype'];
                           $noofroom = $_POST['noofroom'];
                
                           $qry = "SELECT * FROM acroom WHERE status='un book'";
                           $run = mysqli_query($conn,$qry);
                           // $rno=$ow['roomno'];
                           $row = mysqli_fetch_assoc($run);
                           $rno = $row['roomno'];
                
                
                           $qry="INSERT INTO `room booking` (`id`, `name`, `address`, `state`, `city`, `email`, `cin`, `cout`, `members`, `roomtype`, `no of rooms`) VALUES (NULL, '$name', '$address', '$state', '$city', '$email', '$cin', '$cout', '$members', '$roomtype', '$noofroom');";
                
                           $run = mysqli_query($conn, $qry);
                
                
                           if ($run == true) {
                               mysqli_query($conn,"UPDATE `acroom` SET `status`='book' WHERE `roomno`='$rno' ");
                               echo "<script>
                                    window.location.href='cartpayment2.php';
                                    </script>";
                                ?>
                               <!-- <script>
                                    alert("room book Successfully");
                               </script> -->
                        <?php
                           } else {
                
                           }
                       }
                        ?>
            </form>
            <?php
          }
    } else {
        echo "0 results";
    }
    ?>

</div>
</body>
</html>


    

