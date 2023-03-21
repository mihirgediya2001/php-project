<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Room</title>
    <link rel="stylesheet" href="stylee.css">
    <link rel="stylesheet" href="bootstrap-4.3.1-dist\css\bootstrap.min">

</head>
<style>
.h1 {
    text-align: center;
    margin-top: 20px;
}

body::before {
    position: absolute;
    content: "";
    height: 100%;
    width: 100%;
    z-index: -1;
    opacity: 0.89;
    background: url('../img/f1.jpeg') center center/cover no-repeat;
    object-fit: cover;
}

.tbl_center {
    /* display:"flex";
            justify-content: center;
            align-items:center; */
    /* width:100%!important;
            height:100%;  */
    margin-top: 100px;
    width: 50px !important;
    /* padding:40px; */
}

table {
    width: 10%;
}
</style>
<?php 
    include_once "header.php";
    include('../bootstrap.php');
    ?>
<body>
    <div class="table-responsive">
        <form method="post" action="feedback.php">
            <table border="2" class="table" align="center">
                <tr class="bg-info">
                    <th>Id</th>
                    <th> Name</th>
                    <th>Feedback</th>
                    <th>delete operation</th>       

                </tr>
                <?php
                
                  include_once "connect.php";
                  

                  
                  function delete($id)
                  {
                      $conn=connection();
                          $str="delete from feedback where id=$id";
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
                      $str="select * from feedback";
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
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['feedback']; ?></td>
                    <td><a href="feedback.php?fid=<?php echo $row["id"];?>" ?>delete</a></td>
                </tr>

                <?php 
                    }
                        } 
                ?>


            </table>
        </form>

        <!-- </table> 
</form> -->

</body>

</html>