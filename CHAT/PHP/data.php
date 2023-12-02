<?php   

    while($row = mysqli_fetch_assoc($sql)) {
        $sql2 = "SELECT * FROM message WHERE (outgoing_msg_id = {$row['unique_id']} OR incoming_msg_id = {$row['unique_id']}) AND 
                    (incoming_msg_id = '{$outgoing}' OR outgoing_msg_id = '{$outgoing}') ORDER BY message_id  DESC LIMIT 1";
        $query2 = mysqli_query($con,$sql2);
        $row2 = mysqli_fetch_assoc($query2);
        if(mysqli_num_rows($query2) > 0) {
            $result = $row2['msg'];
        } else {
            $result = "No Message Avalible";
        }
        
        (strlen($result) > 28) ? $messege = substr($result,0,28).'...' : $messege = $result;
        // ($outgoing == $row2['outgoing_msg_id']) ? $you = "You: " : $you = " ";
        ($row['statuss'] == "offline now") ? $offline = "offline" : $offline = "Offline";
        $output .= '
            <a href="chat.php?user_id='.$row['unique_id'].'">
                <div class="content">
                    <img src="PHP/images/'.$row["img"].'" alt="">
                    <div class="details">
                        <span> '.$row["fname"] . " " . $row["lname"].' </span>
                        <p> '. $messege .' </p>
                    </div>
                </div>
                <div class="status-dot '.$offline.' "> <i class="fas fa-circle"></i></div>
            </a>
        ';
    }



?>