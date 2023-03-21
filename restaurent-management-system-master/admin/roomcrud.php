<?php
// include_once ('../dbcon.php');
include_once 'connect.php';

function insert($rno,$rtype,$price,$detail,$img_des)
{
            $cnt=0;
            $conn=connection();
            $sql_select="select * from acroom where roomno='$rno'";
            $data=mysqli_query($conn,$sql_select);
            $cnt=mysqli_num_rows($data);
           

            if($cnt != 0)
            {
                 ?>
<script>
alert("alredy exists...");
</script>

<?php  
            }
            else
            {    
                // $str="insert into acroom(roomno,roomtype,price,detail,img) values('$rno','$rtype','$price','$detail','$img_des') ";
                // $conn->query($str);
                // $conn->close(); 
                // window.location.href='food.php';

                
            }
           
            
}

function display()
{
    $conn=connection();
        $str="select * from acroom";
        $result=$conn->query($str);
        $conn->close();
        return $result;
}

function delete($id)
{
    $conn=connection();
        $str="delete from acroom where id=$id";
        $conn->query($str);
        $conn->close();
        
}


?>