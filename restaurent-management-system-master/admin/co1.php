<?php
include('../dbcon.php');
$rno=$_GET['rno'];
if(mysqli_query($sql,"UPDATE `hall` SET `status`='un book' WHERE `hallyype`='$hallyype' "))
{
    header('location:halldetail.php');
}
?>