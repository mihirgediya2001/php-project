<?php

include('connection.php');
session_start();
if( isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true)
{
    header("location:r2.php");
}
 else{
    echo "<script>
    alert('please register');
    window.location.href='index.php';
    </script>";
}

?>


    


