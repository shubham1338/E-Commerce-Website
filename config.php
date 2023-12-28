<?php
    $conn=new mysqli("localhost","root","","acmegrade");
    if($conn->connect_error)
    {
        die("Connection failed");
    }
?>