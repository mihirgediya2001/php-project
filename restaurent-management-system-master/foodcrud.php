<?php
include_once ('dbcon.php');
include_once 'connect.php';

function insert($fname,$foodtype,$detail,$price,$img_des)
{
            $cnt=0;
            $conn=connection();
            $sql_select="select * from addfood where name='$fname'";
            $data=mysqli_query($conn,$sql_select);
            $cnt=mysqli_num_rows($data);
           

            if($cnt != 0)
            {
                 ?> 
            <script>alert("alredy exists...");</script> 
            
                <?php  
            }
            else
            {    
                $str="insert into addfood(name,foodtype,detail,price,image) values('$fname','$foodtype','$detail','$price','$img_des') ";
                $conn->query($str);
                $conn->close(); 
                // window.location.href='food.php';

                
            }
           
            
}

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


?>