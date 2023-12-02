<?php
session_start();
if(isset($_SESSION['unique_id'])) {
    include_once "config.php";
    $outgoing = mysqli_real_escape_string($con, $_POST['outgoing_id']);
    $incoming = mysqli_real_escape_string($con, $_POST['incoming_id']);
    $output = "";
    $sql = "SELECT * FROM message
    LEFT JOIN chatit ON chatit.unique_id = message.outgoing_msg_id	
    WHERE (outgoing_msg_id = '{$outgoing}' AND incoming_msg_id = '{$incoming}') 
    OR (outgoing_msg_id = '{$incoming} 'AND incoming_msg_id = '{$outgoing}') ORDER BY message_id";
    $qury = mysqli_query($con, $sql);
    if(mysqli_num_rows($qury) > 0) {
        while($row = mysqli_fetch_assoc($qury)) {
            if($row['outgoing_msg_id'] === $outgoing ) {
                $output .= '
                <div class="chat outgoing">
                    <div class="details">
                        <p>'.$row['msg'].'</p>
                    </div>
                </div>
                
                ';
            } else {
                $output .= '
                <div class="chat incoming">
                    <img src="PHP/images/'.$row['img'].'" alt="">
                    <div class="details">
                        <p>'.$row['msg'].'</p>
                    </div>
                </div>
                
                ';
            }
        }
        echo $output;
    }
} else {
    header('location: ./index.php');
}



?>