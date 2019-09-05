<?php
    $server = "localhost";
    $user = "root";
    $pass = "";
    $db = "registrationhandler";

    $conn = mysqli_connect($server, $user, $pass, $db);

    if(!$conn){
        die("Cannost connect to server".mysqli_connect_error());
    }else{
        echo "Connected successfully";
        mysqli_set_charset($conn,"utf8");
    }
?>