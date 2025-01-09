<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/style_main.css">
    <link rel="shortcut icon" href="<?php echo base_url(); ?>pic/favicon.png" type="image/x-icon">
    <link href="<?php echo base_url(); ?>css/fontStyle.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/fontStyle2.css">

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

</head>
<title>Scarf Gallery » Admin Panel</title>

<body>
    <!-- Header -->
    <header class="header">
        <div class="snow">
        <div class="container">
            <a style="color: rgb(255, 255, 255);" href="<?php echo base_url(); ?>"> 
                <div class="logo">
                    <h1>Scarf Gallery</h1>
                </div>
            </a>
            <nav class="nav">
                <ul>
                <li><a href="#">عضویت</a></li>
                <li><a href="#">ورود</a></li>
                <li><a href="#">سبد خرید</a></li>
                <li><a href="#">درباره ما</a></li>
                <li><a href="#">تماس با ما</a></li>
            </ul>
            </nav>
        </div>
        </div> 
    </header>
    <?php
        } else {
    ?>
    
</head>
<title>Scarf Gallery » User Panel</title>

<body>
    <!-- Header -->
    <<header class="header">
        <div class="snow">
        <div class="container">
            <a style="color: rgb(255, 255, 255);" href="<?php echo base_url(); ?>"> 
                <div class="logo">
                    <h1>Scarf Gallery</h1>
                </div>
            </a>
            <nav class="navbar">
                <ul>
                <li><a href="#">عضویت</a></li>
                <li><a href="#">ورود</a></li>
                <li><a href="#">سبد خرید</a></li>
                <li><a href="#">درباره ما</a></li>
                <li><a href="#">تماس با ما</a></li>
            </ul>
            </nav>
        </div>
        </div> 
    </header>
    <?php
        }
    }
} else {
    ?>
    
</head>
<title>Scarf Gallery</title>

<body>
    <!-- Header -->
    <header class="header">
        <div class="snow">
        <div class="container">
            <a style="color: rgb(255, 255, 255);" href="<?php echo base_url(); ?>"> 
                <div class="logo">
                    <h1>Scarf Gallery</h1>
                </div>
            </a>
            <nav class="navbar">
                <ul>
                <li><a href="#">عضویت</a></li>
                <li><a href="#">ورود</a></li>
                <li><a href="#">سبد خرید</a></li>
                <li><a href="#">درباره ما</a></li>
                <li><a href="#">تماس با ما</a></li>
            </ul>
            </nav>
        </div>
        </div> 
    </header>

    <?php
}
    ?>
    

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

