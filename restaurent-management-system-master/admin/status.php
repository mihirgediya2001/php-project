<?php
  $servername = "localhost";
  $username = "root";
  $password = "";
  $database = "restaurentms";
  //create connection
  $conn = new mysqli($servername, $username, $password, $database);

if(isset($_GET['id']))
{
    
    $id=$_GET['id'];
    $status=$_GET['status'];

    // $q="update registered_users set status=$status where id=$id";
    // mysql_select_db($conn,$q);   
    
    $updateStatus = "UPDATE registered_users SET status=$status WHERE id=$id";
    
    if (mysqli_query($conn, $updateStatus)) {
        $previous_url = $_SERVER['HTTP_REFERER'];

        // Redirect to the previous URL
        header("Location: $previous_url");
        exit;
        } else {
      echo "Error updating record: " . mysqli_error($conn);
    }

}
   


?>