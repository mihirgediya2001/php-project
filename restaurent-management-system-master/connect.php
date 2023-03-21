<?php
function connection()
{

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "restaurentms";
    //create connection
    $conn = new mysqli($servername, $username, $password, $database);
    return $conn;

}

?>