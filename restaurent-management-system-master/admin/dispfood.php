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
    <style>
        .tbl_center{
            /* display:"flex";
            justify-content: center;
            align-items:center; */
            width:100%;
            height:100%; 
            margin-top:100px;       
        }
    </style>
    
</head>
<style>
    .h1{
        text-align:center;
        margin-top: 20px;
    }

    body::before{
    position: absolute;
    content: "";
    height: 150%;
    width: 100%;
    z-index: -1;
    opacity: 0.89;
    /* background: url('../img/c3.jpg') center center/cover no-repeat; */
    }
</style>

<body>
<?php
                include_once "connect.php";
                include('../global.php');
                include('header3.php');
                include('../bootstrap.php');

                function display()
                {
                    $conn=connection();
                        $str="select * from addfood";
                        $result=$conn->query($str);
                        $conn->close();
                        return $result;
                }

                function delete($id)
                {
                    $conn=connection();
                        $str="delete from addfood where id=$id";
                        $conn->query($str);
                        $conn->close();
                        
                }
                if(isset($_GET['fid']))//code for delete
                {
                    delete($_GET['fid']);
                }

?>


<form method="post" action="dispfood.php" >
    <div class="table-responsive">
        <table border="2" align="center"  class="table">
                    <tr class="bg-info"> 
                        <th>Food Id</th>
                        <th>Food Name</th>
                        <th>Food Type</th>
                        <th>Food Description</th>
                        <th>Food Price</th>
                        <th>image</th> 
                        <th>delete operation</th>       

                    </tr> 
                <?php
                   
                    $result=display();
                    if($result->num_rows>0)
                    {
                        while($row = $result->fetch_assoc())
                        {
                ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['foodtype']; ?></td>
                        <td><?php echo $row['detail']; ?></td>
                        <td><?php echo $row['price']; ?></td>
                        <!-- <td><img src=<?php echo $row['img']; ?> width = '200px' height="150px"> -->
                        <td><img src="<?php echo getBaseUrl().'../uploads/'. $row['img']?>" alt="delux" style="padding-right: 10px !important;width: 250px !important;height: 170px !important";></td>
                        <td><a href="dispfood.php?fid=<?php echo $row["id"];?>"?>delete</a></td>
                       
                    </tr>

                <?php 
                    }
                        } 
                ?> 
                
                
        </table> 
    </div>
</form>

</body>
</html>