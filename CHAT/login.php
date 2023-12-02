<?php 
    session_start();
    if(isset($_SESSION['unique_id'])) {
        header('location: user.php');
    }



?>
<?php include_once "header.php"; ?>
<body>
    <div class="wrapper">
        <section class="login form" dir="rtl">
            <header>Real Time Chat App</header>
            <form  method="post">
                <div class="error-txt"></div>
                <div class="field input">
                    <label for=""> الأيميل</label>
                    <input type="text" placeholder=" أدخل إيميلك" name="email" >
                </div>
                <div class="field input">
                    <label for=""> ادخل رمز الدخول</label>
                    <input type="password" placeholder="ادخل رمز الدخول" name="password" >
                    <i class="fas fa-eye"></i>
                </div>
                <div class="field button">
                    <input type="submit" placeholder="إستمر إلي الشات" name="submit" >
                </div>
            </form>
            <div class="link">ليس لديك حساب؟ <a href="index.php">تسجيل حساب</a></div>
        </section>
    </div>
    <script src="javascript/pass-show-hide.js"></script>
    <script src="javascript/login.js"></script>
</body>
</html>