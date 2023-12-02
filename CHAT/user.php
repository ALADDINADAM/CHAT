<?php 
    include_once "PHP/config.php";
    session_start();
    if(!isset($_SESSION['unique_id'] )) {
        header('location: login.php');
    }
?>
<?php include_once "header.php" ?>
<body>
    <div class="wrapper">
        <section class="users" dir="rtl">
            <header>
                <?php  
                
                include_once "PHP/config.php";
                $sql = mysqli_query($con, "SELECT * FROM chatit WHERE unique_id = '{$_SESSION['unique_id']}'");
                if(mysqli_num_rows($sql) > 0) {
                    $row = mysqli_fetch_assoc($sql);
                }
                ?>
                <div class="content">
                    <img src="PHP/images/<?php echo $row['img'];?>" alt="">
                    <div class="details">
                        <span> <?php echo $row['fname'] . " " . $row['lname'];?> </span>
                        <p> <?php echo $row['statuss']?> </p>
                    </div>
                </div>
                <a href="PHP/logout.php?logout_id=<?php echo $row['unique_id']?>" class="logout">تسجيل خروج</a>
            </header>
            <div class="search">
                <span class="text">حدد شخص للدردشه معه</span>
                <input type="text" placeholder="ادخل اسم للبحث">
                <button>Sch</button>
            </div>
            <div class="user-list">
            </div>
        </section>
    </div>
    <script src="javascript/users.js"></script>
</body>
</html>