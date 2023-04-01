<?php
  include('../dbcon.php');
  include('../global.php');
  include_once 'connect.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin ac room</title>
    <link rel="stylesheet" href="stylee.css">
    <link rel="stylesheet" href="bootstrap-4.3.1-dist\css\bootstrap.min">
    <link href="https://fonts.googleapis.com/css2?family=Baloo+2:wght@500&display=swap" rel="stylesheet">
    
</head>

<body><?php

include ('header4.php');
include ('../bootstrap.php');
if(isset($_POST['submit']))
{
    $Hall_no=$_POST['Hall_no'];
    $Hall_type=$_POST['Hall_typ'];
    $Hall_price=$_POST['Hall_price'];
    $hall_detail=$_POST['hall_detail'];
    $target_file = null;
    if (isset($_FILES['image'])) 
    {
        $file_name = $_FILES['image']['name'];
        $file_tmp = $_FILES['image']['tmp_name'];
        $target_file = basename($file_name);
        $target_path = '../uploads/'. $file_name;
        $target_path_to_admin = './uploads/'.$file_name;
        copy($file_tmp, $target_path);
        copy($file_tmp, $target_path_to_admin);
        // copy($file_tmp, $target_path);
    }


        $qry="INSERT INTO `hall`(hno,hallyype,price,detail,image) VALUES ($Hall_no,'$Hall_type',$Hall_price,'$hall_detail','$target_file')";
        $run=mysqli_query($sql,$qry);
        if($run==true) 
        {
        ?>
            <script>
            alert('Data Inserted Successfully');
            </script>
        <?php
        }
        else{
            echo "Not Inserted";
        }
    }
?>
    <h1> Hall insert Section</h1>
    <div class="imgg"></div>

    <div class="delux-insert">
        <form method="post" enctype="multipart/form-data">
            <table>
                <tr>
                    <td>Hall No</td>
                    <td><input type="text" name="Hall_no" placeholder="Enter Hall No" title="Room Price"
                            required>
                    </td>
                </tr>
                <tr>
                    <td>Event</td>
                    <td>
                        <select name="Hall_typ">
                            <option value="Marriage">Marriage</option>
                            <option value="Birthday">Birthday</option>
                            <option value="Anniversary">Anniversary</option>
                            <option value="Baby Shower">Baby Shower</option>
                            <option value="Enaganement">Engagement</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Hall Price</td>
                    <td><input type="text" name="Hall_price" placeholder="Enter Room Price " title="Room Price"
                            required>
                    </td>
                </tr>
                <tr>
                    <td>Room Description</td>
                    <td><input type="text" name="hall_detail" placeholder="Enter Room Desc " title="detail" required>
                    </td>
                </tr>

                <tr>
                    <td>Room image</td>
                    <td>
                        <center><input type="file" name="image" required></center>

                        <div class="button">

                        </div>
                    </td>
                </tr>
                <td>
                <td>
                    <input type="submit" id="delux-btn" name="submit" value=submit>
                </td>
                </td>
            </table>
        </form>
    </div>
</body>

</html