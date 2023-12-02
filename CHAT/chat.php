<?php

include_once "PHP/config.php";
    session_start();
    if(!isset($_SESSION['unique_id'])) {
        header('location: login.php');
    }
?>
<?php include_once "header.php"; ?>
<body>
    <!-- cjnwcie -->
    <div class="wrapper">
        <section class="chat-area">
            <header>
            <?php  
                
                // include_once "PHP/config.php";
                $user_id = mysqli_real_escape_string($con, $_GET['user_id']);
                $sql = mysqli_query($con, "SELECT * FROM chatit WHERE unique_id = '{$user_id}'");
                if(mysqli_num_rows($sql) > 0) {
                    $row = mysqli_fetch_assoc($sql);
                }
                ?>
                <a href="user.php" class="back-icone"><i class="fas fa-arrow-left"></i></a>
                <img src="PHP/images/<?php echo $row['img'];?>" alt="">
                <div class="details">
                    <span><?php echo $row['fname'] . " " . $row['lname'];?> </span>
                    <p><?php echo $row['statuss']?></p>
                </div>
            </header>
            <div class="chat-box"></div>
            <form action="#" class="typeing-area" >
                <input type="text" name="outgoing_id" value="<?php echo $_SESSION['unique_id']; ?>" hidden>
                <input type="text" name="incoming_id" value="<?php echo $user_id; ?>" hidden>
                <input class="input-filed" name="messege" type="text" placeholder="أرسل رساله">
                <button name="submit"><i class="fab fa-telegram-plane">S</i></button>
            </form>
        </section>
    </div>
    <script src="javascript/chat.js"></script>
</body>
</html>