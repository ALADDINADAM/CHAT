<?php 

    $con = mysqli_connect("localhost", "root", "", "chatit");
    if(!$con) {
        echo "Dataase Connect". mysqli_connect_error();
    }
?>