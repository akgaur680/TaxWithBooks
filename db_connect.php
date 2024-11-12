<?php
    $username = 'root';
    $servername = 'localhost';
    $password = '';
    $dbname = 'taxwithbooks';
    $conn = mysqli_connect($servername,$username,$password,$dbname);
    if(mysqli_connect_errno())
    {
        echo mysqli_connect_error();
        die("Could Not Connect With Server");
    }
?>