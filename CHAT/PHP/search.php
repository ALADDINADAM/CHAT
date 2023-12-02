<?php 
    session_start();
    include_once "config.php";
    $outgoing = $_SESSION['unique_id'];
    $searchTerm = mysqli_real_escape_string($con , $_POST['searchTerm']);
    $output = "";
    $sql = mysqli_query($con, "SELECT * FROM chatit WHERE NOT unique_id = {$outgoing} AND (fname LIKE '%{$searchTerm}%' OR lname LIKE '%{$searchTerm}%') ");
    if(mysqli_num_rows($sql) > 0) {
        include "data.php";
    } else {
        $output .= "Not Found Your Search Name";
    }
    echo $output;

?>