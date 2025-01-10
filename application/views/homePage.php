<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/style_main.css">
    <link rel="shortcut icon" href="<?php echo base_url(); ?>pic/favicon.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <style>
        @font-face {
            font-family: 'BNazanin';
            src: url('fonts/BNazanin.ttf') format('ttf'),
                 url('fonts/BNazanin.woff') format('woff');
        }
    </style>

<?php
    if (isset($info)) {
    foreach ($info as $key => $row) {
        if ($row['UserID']==1 || $row['UserID']==2){
   
?>

<title>Scarf Gallery » Admin Panel</title>
</head>

<body>
    <!-- Header -->
    <header class="header">
    <div class="snow"></div>
        <div class="container">
            <a style="color: rgb(255, 255, 255);" href="<?php echo base_url(); ?>"> 
                <h1 class="logo">Scarf Gallery</h1>
            </a>
            <h3><?php echo $row['FullName']." عزیز خوش آمدید!";?></h3>
            <nav class="nav">
                <a href="<?php echo base_url(); ?>index.php/AuthController/viewRouteControll/insertProduct">درج محصول</a>
                <a href="<?php echo base_url(); ?>index.php/AuthController/productList">ویرایش محصولات</a>
                <a href="<?php echo base_url(); ?>index.php/AuthController/showUserData">ویرایش اطلاعات</a>
                <a href="<?php echo base_url(); ?>index.php/AuthController/showCartItems">سبد خرید</a>
                <a href="<?php echo base_url(); ?>index.php/AuthController/viewRouteControll/about">درباره ما</a>
                <a href="<?php echo base_url(); ?>index.php/AuthController/viewRouteControll/contact">تماس با ما</a>
                <a href="<?php echo base_url(); ?>index.php/AuthController/logOut">خروج</a>
            </nav>
        </div> 
    </header>
    <?php
        } else {
    ?>
    
<title>Scarf Gallery » User Panel</title>
</head>

<body>
    <<header class="header">
        <div class="snow"></div>
        <div class="container">
            <a style="color: rgb(255, 255, 255);" href="<?php echo base_url(); ?>"> 
                <h1 class="logo">Scarf Gallery</h1>
            </a>
            <h3><?php echo $row['FullName']." عزیز خوش آمدید!";?></h3>
            <nav class="nav">
                <a href="<?php echo base_url(); ?>index.php/AuthController/showUserData">ویرایش اطلاعات</a>
                <a href="<?php echo base_url(); ?>index.php/AuthController/showUserComments">نظرات ثبت شده</a>
                <a href="<?php echo base_url(); ?>index.php/AuthController/showCartItems">سبد خرید</a>
                <a href="<?php echo base_url(); ?>index.php/AuthController/viewRouteControll/about">درباره ما</a>
                <a href="<?php echo base_url(); ?>index.php/AuthController/viewRouteControll/contact">تماس با ما</a>
                <a href="<?php echo base_url(); ?>index.php/AuthController/logOut">خروج</a>
            </nav>
        </div>
    </header>
    <?php
        }
    }
} else {
    ?>
    
<title>Scarf Gallery</title>
</head>

<body>
    <header class="header">
        <div class="snow"></div> 
        <div class="container">
            <a style="color: rgb(255, 255, 255);" href="<?php echo base_url(); ?>"> 
                    <h1 class="logo">Scarf Gallery</h1>
            </a>
            <nav class="nav">
                <a href="<?php echo base_url(); ?>index.php/AuthController/viewRouteControll/register">عضویت</a>
                <a href="<?php echo base_url(); ?>index.php/AuthController/viewRouteControll/login">ورود</a>
                <a href="<?php echo base_url(); ?>index.php/AuthController/viewRouteControll/login">سبد خرید</a>
                <a href="<?php echo base_url(); ?>index.php/AuthController/viewRouteControll/about">درباره ما</a>
                <a href="<?php echo base_url(); ?>index.php/AuthController/viewRouteControll/contact">تماس با ما</a>
            </nav>
        </div>
    </header>

    <?php
}
    ?>
   
   <!-- end header -->

    <main class="main">
        <section class="winter-panel">
            <div class="container">
                <div class="grid-2x2">
                    <div class="grid-item">شال</div>
                    <div class="grid-item">روسری</div>
                    <div class="grid-item">مینی اسکارف</div>
                    <div class="grid-item">تخفیف شگفت‌انگیز</div>
                </div>
            </div>
        </section>

        <section class="recent-products">
            <div class="container">
                <h2>محصولات اخیر</h2>
                <div class="product-grid">
                    <a href="show item2.html"><div class="product-card">
                        <img src="pic/1.jpg" alt="محصول 1">
                        <h3>شال زیبای زمستانی</h3>
                        <p class="price">150,000 تومان</p>
                    </div></a>
                    <a href="show item3.html"><div class="product-card">
                        <img src="pic/2.jpg" alt="محصول 2">
                        <h3>روسری ابریشمی</h3>
                        <p class="price">200,000 تومان</p>
                    </div></a>
                    <a href="show item4.html"><div class="product-card">
                        <img src="pic/3.png" alt="محصول 3">
                        <h3>مینی اسکارف طرح دار</h3>
                        <p class="price">120,000 تومان</p>
                    </div>
                    <a href="show item1.html"><div class="product-card">
                        <img src="pic/shaal.jpg" alt="محصول 4">
                        <h3>شال ساده شیک</h3>
                        <p class="price">100,000 تومان</p>
                    </div></a>
                </div>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <footer class="footer">
        <div class="container border">
            <p>ارتباط با ما</p>
            <p>آدرس: تهران، خیابان 15 خرداد</p>
            <p>تلفن: 09101234567</p>
    
            <!-- Links -->
            <div class="social-links">
                <a href="https://twitter.com" target="_blank" class="social-icon twitter">
                    <i class="fab fa-twitter"></i>
                </a>
                <a href="https://instagram.com" target="_blank" class="social-icon instagram">
                    <i class="fab fa-instagram"></i>
                </a>
                <a href="https://t.me" target="_blank" class="social-icon telegram">
                    <i class="fab fa-telegram"></i>
                </a>
                <a href="tel:02112345678" class="social-icon phone">
                    <i class="fas fa-phone-alt"></i>
                </a>
            </div>
        </div>
    </footer>
    
</body>
</html>

