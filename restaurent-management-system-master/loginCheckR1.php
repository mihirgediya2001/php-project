<?php

include('connection.php');
if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
    $lastPageName = substr($_SERVER["HTTP_REFERER"], strrpos($_SERVER["HTTP_REFERER"], "/") + 1);

    header("location:" . $lastPageName);
} else {
    echo "<script>
    alert('please register');
    window.location.href='index.php';
    </script>";
}

?>

