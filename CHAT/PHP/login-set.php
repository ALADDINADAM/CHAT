<?php
    session_start();
    include_once "config.php";
// if(isset($_POST['email']) && isset($_POST['password'])) {
    $email =  mysqli_real_escape_string($con,$_POST['email']);
    $password = mysqli_real_escape_string($con,$_POST['password']);
    if(!empty($email) && !empty($password) ) {
            $sql = mysqli_query($con,"SELECT * FROM chatit WHERE email='{$email}' AND password = '{$password}'");
            if(mysqli_num_rows($sql) > 0) {
                $row = mysqli_fetch_assoc($sql);
                $status = "Active Now";
                $sql2 = mysqli_query($con, "UPDATE chatit SET statuss = '{$status}' WHERE unique_id = '{$row['unique_id']}'");
                if($sql2) {
                    $_SESSION['unique_id'] = $row['unique_id'];
                    echo "success";
                }
            } else {
                echo "email or password as incereated";
            }
    }else {
        echo "All input Filed Are Requred";
    }
    // }

?>