<?php 
session_start();
    include_once "config.php";
    if(isset($_POST['fname'] ) && isset($_POST['lname'])) {
        $fname =  $_POST['fname'];
        $lname =  $_POST['lname'];
        $email =  $_POST['email'];
        $password = $_POST['password'];
    if(!empty($fname) && !empty($lname) && !empty($email) && !empty($password) ) {
        if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $sql = mysqli_query($con,"SELECT email FROM chatit WHERE email='{$email}'");
            if(mysqli_num_rows($sql) > 0) {
                echo "$email . Allready exist ";
            } else {
                if(isset($_FILES['image'])) {
                    $img_name = $_FILES['image']['name'];
                    $tmp_name = $_FILES['image']['tmp_name'];
                    //
                    $img_explode = explode('.',$img_name);
                    $img_ext = end($img_explode);
                    //
                    $extention = ['png','jpeg','jpg'];
                    if(in_array($img_ext, $extention) === true) {
                        $time = time();
                        $new_img_name = $time.$img_name;
                        if(move_uploaded_file($tmp_name, "images/".$new_img_name )) {
                            $status = "Active Now";
                            $random_id = rand(time(), 10000000);
                            //\
                            $sql2 = mysqli_query($con , "INSERT INTO chatit (unique_id, fname, lname, email, password, img, statuss)  
                                                                VALUES ({$random_id}, '{$fname} ', '{$lname}','{$email}', '{$password}', '{$new_img_name}', '{$status}')");
                            if($sql2) {
                                $sql3 = mysqli_query($con, "SELECT * FROM chatit WHERE email = '{$email}'");
                                if(mysqli_num_rows($sql3) > 0) {
                                    $row = mysqli_fetch_assoc($sql3);
                                    $_SESSION['unique_id'] = $row['unique_id'];
                                    echo "success";
                                }
                            } else {
                                echo "Something Was Wrong";
                            }
                        }
                    } else {
                        echo "Please Select an image File . jpg . png . jpeg";
                    }
                } else {
                    echo "Please Select an image";
                }
            }
        } else {
            echo "$email . This not A vaild Email";
        }
    }else {
        echo "All input Filed Are Requred";
    }
}

?>