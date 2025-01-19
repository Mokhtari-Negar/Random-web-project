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
                 url('fonts/BNazanin.ttf') format('ttf');
        }
        .form-container {
            max-width: 600px;
            margin: 30px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .form-container h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #4f899c;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .form-group select,
        .form-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 1rem;
        }

        .form-group button {
            display: block;
            width: 100%;
            background-color: #4f899c;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 5px;
            font-size: 1.1rem;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .form-group button:hover {
            background-color: #2f6077;
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
                <a href="<?php echo base_url(); ?>index.php/AuthController/productList">لیست محصولات</a>
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
    <header class="header">
        <div class="snow"></div>
        <div class="container">
            <a style="color: rgb(255, 255, 255);" href="<?php echo base_url(); ?>"> 
                <h1 class="logo">Scarf Gallery</h1>
            </a>
            <h3><?php echo $row['FullName']." عزیز خوش آمدید!";?></h3>
            <nav class="nav">
                <a href="<?php echo base_url(); ?>index.php/AuthController/showUserData">ویرایش اطلاعات</a>
                <a href="<?php echo base_url(); ?>index.php/AuthController/showUserComments">نظرات ثبت شده</a>
                <a href="<?php echo base_url(); ?>index.php/AuthController/productList">لیست محصولات</a>
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
                <a href="<?php echo base_url(); ?>index.php/AuthController/productList">لیست محصولات</a>
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
                    
                <div class="form-container">
                <h1>خودت طراحی کن! </h1>
                <form action="<?php echo base_url() ?>index.php/AuthController/designOrder" method="post">
                    <div class="form-group">
                        <label for="itemType">نوع سفارش:</label>
                        <select id="itemType" name="itemType">
                            <option value="2">روسری</option>
                            <option value="1">شال</option>
                            <option value="3">مینی اسکارف</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="fabricType">جنس پارچه:</label>
                        <select id="fabricType" name="fabricType">
                            <option value="wool">پشمی</option>
                            <option value="cotton">نخی</option>
                            <option value="silk">حریر</option>
                            <option value="satin">ساتن</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="pattern">طرح:</label>
                        <select id="pattern" name="pattern">
                            <option value="floral">گل‌دار</option>
                            <option value="dotted">خال‌خال</option>
                            <option value="plain">ساده</option>
                            <option value="fansy">فانتزی</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <button type="submit">ثبت سفارش</button>
                    </div>
                </form>
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
