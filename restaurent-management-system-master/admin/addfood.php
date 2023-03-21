<?php
include_once ('connect.php');
include('../dbcon.php');
include('../global.php');
include('../bootstrap.php');
include('header3.php');
    // $ci=$_GET['ci'];
    // $co=$_GET['co'];
    // $rt=$_GET['rt'];
    // $nr=$_GET['nr'];

   ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Room</title>
    <link rel="stylesheet" href="stylee.css">
    <link rel="stylesheet" href="bootstrap-4.3.1-dist\css\bootstrap.min">
    <link href="https://fonts.googleapis.com/css2?family=Baloo+2:wght@500&display=swap" rel="stylesheet">

</head>
<style>
.h1 {
    text-align: center;
    /* margin-top: 20px; */
}

body::before {
    position: absolute;
    content: "";
    height: 100%;
    width: 100%;
    z-index: -1;
    opacity: 0.89;
    background: url('../img/q1.webp') center center/cover no-repeat;
}

.delux-insert {
    height: 230px;
    width: 400px;
    border-radius: 10px;
    /* background-color:#a68383; */
    margin-top: 100px;
    margin-left: 38%;

}

.delux-insert form {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    padding-top: 30px;
}

.delux-insert form table tr td input {
    padding: 4px 0;
    margin-bottom: 10px;
    border-radius: 8px;
    padding-left: 10px;
}

.delux-insert form table tr td {
    font-size: 20px;
}

#delux-btn {
    width: 80%;
    background-color: #cdb1e5;
    font-size: 16px;
}

.imgg {
    display: flex;
    justify-content: space-evenly;
    /* justify-content:center; */
    margin-top: 10px;
}
</style>

<body>

    <?php  
            // include_once "./foodcrud.php";
            if(isset($_POST["submit"]))//code insert
            {   
                $food_name=$_POST['food_name'];
                $food_type=$_POST['food_type'];
                $food_detail=$_POST['food_detail'];
                $food_price=$_POST['food_price'];
                $target_file = null;
                if (isset($_FILES['image1'])) 
                {
                    $file_name = $_FILES['image1']['name'];
                    $file_tmp = $_FILES['image1']['tmp_name'];
                    $target_file = basename($file_name);
                    $target_path = '../uploads/'. $file_name;
                    $target_path_to_admin = './uploads/'.$file_name;
                    copy($file_tmp, $target_path);
                    copy($file_tmp, $target_path_to_admin);
                }


                
               
                    $qry="INSERT INTO `addfood`(name,foodtype,detail,price,img) VALUES ('$food_name','$food_type','$food_detail',$food_price,'$target_file')";
                    $run=mysqli_query($sql,$qry);
                    if($run==true) 
                    {
                    ?>
    <script>
    alert('Data Inserted Successfully');
    </script>
    <?php
                    }
                    else
                    {
                        echo "Not Inserted";
                    }
            }
    
    ?>

    <!-- <h1> Food insert Section</h1> -->
    <div class="imgg"></div>

    <div class="delux-insert">
        <form action="addfood.php" method="post" enctype="multipart/form-data">
            <table>

                <tr>
                    <td>Food Name</td>
                    <td><input type="text" name="food_name" title="fname"></td>
                </tr>
                <tr>
                    <td>Food Type</td>
                    <td>
                        <select name="food_type">
                            <option value="Chines">Chinese</option>
                            <option value="South Indain">South Indian</option>
                            <option value="Italian">Italian</option>
                            <option value="Maharashtrian">Maharashtrian</option>
                            <option value="Punjabi">Punjabi</option>
                            <option value="Deserts">Deserts</option>
                            <option value="Cold">Cold</option>
                        </select>
                    </td>

                </tr>
                <tr>
                    <td>Food Description</td>
                    <td><input type="text" name="food_detail" title="detail" required></td>
                </tr>
                <tr>
                    <td>Food Price</td>
                    <td><input type="text" name="food_price" title="price" required></td>
                </tr>
                <tr>
                    <td>Food image</td>
                    <td>
                        <center><input type="file" name="image1"></center>
                        <div class="button"></div>
                    </td>
                </tr>
                <tr>

                    <td><input type="submit" name="submit" value="submit"></td>
                </tr>
            </table>
        </form>
    </div>
</body>

</html>