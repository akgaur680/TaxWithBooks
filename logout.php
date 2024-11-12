<?php
    session_start();
    //closing the session
    unset($_SESSION["id"]);
    session_destroy();
    echo '<div class="containder-fluid bg-dark text-white"><h1>You Have Been Logout Succesfully. You Will be Redirected to the Home Page in Few Seconds.</h1></div>';
    //moving to Index Page
    header('REFRESH:1;url=index.php');
?>