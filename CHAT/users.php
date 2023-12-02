<?php

    session_start();
    include_once "PHP/config.php";
    $outgoing = $_SESSION['unique_id'];
    $sql = mysqli_query($con, "SELECT * FROM chatit WHERE NOT unique_id = {$outgoing} ");
    $output = "";
    if(mysqli_num_rows($sql) == 1) {
        $output .= "NO users avalible to chat";
    } elseif(mysqli_num_rows($sql) > 0) {
        include "PHP/data.php";
    }
    echo $output;



?>