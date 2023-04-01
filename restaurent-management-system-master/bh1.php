<?php
if(isset($_POST['book']))
{
    session_start();
    $_SESSION['date'] = $_POST['date'];
    $_SESSION['npeople'] = $_POST['npeople'];
    var_dump($_SESSION);
    header("location:cartpayment2.php");

}
?>
