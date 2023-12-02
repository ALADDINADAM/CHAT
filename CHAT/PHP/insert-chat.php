<?php 

    session_start();
    if(isset($_SESSION['unique_id']) && isset($_POST['outgoing_id'])) {
        include_once "config.php";
        $outgoing = mysqli_real_escape_string($con, $_POST['outgoing_id']);
        $incoming = mysqli_real_escape_string($con, $_POST['incoming_id']);
        $messege = mysqli_real_escape_string($con, $_POST['messege']);
        if(!empty($messege)) {
            $sql = mysqli_query($con, "INSERT INTO message ( incoming_msg_id, outgoing_msg_id, msg) VALUES ({$incoming}, {$outgoing}, '{$messege}')") or die();
        }
    } else {
        header('location: ./index.php');
    }

?>