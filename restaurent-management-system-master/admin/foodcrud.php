<?php
// include_once ('../dbcon.php');
include_once 'connect.php';

function insert($food_name,$food_type,$food_detail,$food_price,$target_file)
{
            $cnt=0;
            $conn=connection();
            $sql_select="select * from addfood where name='$food_name'";
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
                $qry="INSERT INTO `addfood`(name,foodtype,detail,price,image) VALUES ('$food_name','$food_type','$food_detail',$food_price,'$target_file')";
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

                // $str="insert into addfood(name,foodtype,detail,price,image) values('$food_name','$food_type','$food_detail',$food_price,'$target_file') ";
                // $conn->query($str);
                // $conn->close(); 
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