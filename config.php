<?php
    define('HOST', 'localhost');
    define('USERNAME', 'root');
    define('PASS', '');
    define('DBNAME', 'shop_phone');

    $conn = mysqli_connect(HOST, USERNAME, PASS, DBNAME);

    if(!$conn){
        die('Connect Database Fail');
    }else{
        echo "";
    }
?>