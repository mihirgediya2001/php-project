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
    margin-top: 20px;
}
</style>

<body>
    <div class="table-responsive">
        <form method="post" action="dispfood.php">
            <table border="2" align="center" class="table">
                <tr class="bg-info">
                    <th>Hall Id</th>
                    <th>Hall No</th>
                    <th>Hall Type</th>
                    <th>Hall Description</th>
                    <th>Hall Price</th>
                    <th>image</th>
                    <th>delete operation</th>

                </tr>
                <?php
                    include_once 'connect.php';
                    include('../global.php');
                    include('../bootstrap.php');
                    include('header4.php');

                    function delete($id)
                    {
                        $conn=connection();
                            $str="delete from hall where id=$id";
                            $conn->query($str);
                            $conn->close();
                            
                    }

                    if(isset($_GET['fid']))//code for delete
                    {
                        delete($_GET['fid']);
                    }

                    function display()
                    {
                        $conn=connection();
                        $str="select * from hall";
                        $result=$conn->query($str);
                        $conn->close();
                        return $result;
                    }

                    $result=display();
                    if($result->num_rows>0)
                    {
                        while($row = $result->fetch_assoc())
                        {
                ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['hno']; ?></td>
                    <td><?php echo $row['hallyype']; ?></td>
                    <td><?php echo $row['detail']; ?></td>
                    <td><?php echo $row['price']; ?></td>
                    <!-- <td><img src=<?php echo $row['image']; ?> width='200px' height="150px"> -->
                    <td><img src="<?php echo getBaseUrl().'../uploads/'. $row['image']?>" alt="delux" style="padding-right: 10px !important;width: 300px !important;height: 170px !important";></td>
                    <td><a href="showhall.php?fid=<?php echo $row["id"];?>" ?>delete</a></td>

                </tr>

                <?php 
                    }
                        } 
                ?>

            </table>
        </form>
    </div>

</body>

</html>