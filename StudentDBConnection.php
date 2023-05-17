<?php
    $conn=new mysqli("localhost","root","","stdinfo");
    if($conn->connect_error){
        echo "DataBase Connection Failed, Please try again!";
    }
?>