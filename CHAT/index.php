<?php 
    session_start();
    if(isset($_SESSION['unique_id'])) {
        header('location: user.php');
    }

?>
<?php include_once "header.php"; ?>
<body>
    <div class="wrapper">
        <section class="singup form" dir="rtl">
            <header>Real Time Chat App</header>
            <form action="#"   enctype="multipart/form-data">
                <div class="error-txt"></div>
                <div class="name-details">
                    <div class="field input">
                        <label >الاسم  الأول</label>
                        <input type="text" placeholder="الاسم الأول" name="fname"  required>
                    </div>
                    <div class="field input">
                        <label >الاسم الأخير</label>
                        <input type="text" placeholder="الاسم الأخير" name="lname"  required>
                    </div>
                </div>
                <div class="field input">
                    <label > الأيميل</label>
                    <input type="text" placeholder=" أدخل إيميلك" name="email" required>
                </div>
                <div class="field input">
                    <label > رمز الدخول</label>
                    <input type="password" placeholder="رمز الدخول" name="password" required>
                    <i class="fas fa-eye"></i>
                </div>
                <div class="field image">
                    <label > إختر صورة</label>
                    <input type="file" name="image" required>
                </div>
                <div class="field button">
                    <input type="submit" placeholder="إستمر إلي الشات" name="submit">
                </div>
            </form>
            <div class="link">لديك حساب؟ <a href="login.php">تسجيل دخول</a></div>
        </section>
    </div>
    <script src="javascript/pass-show-hide.js"></script>
    <script src="javascript/singup.js"></script>
</body>
</html>