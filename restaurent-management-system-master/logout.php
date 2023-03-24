<?php

//TODO changed file
session_start();
session_unset();
session_destroy();
$lastPageName = substr($_SERVER["HTTP_REFERER"], strrpos($_SERVER["HTTP_REFERER"], "/") + 1);

// echo "The current page name is: " . $curPageName;
// echo "</br>";

header("location:index.php");


?>