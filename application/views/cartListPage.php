<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/style_main.css">
    <link rel="shortcut icon" href="<?php echo base_url(); ?>pic/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/style_productlist.css">
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        @font-face {
            font-family: 'BNazanin';
            src: url('fonts/BNazanin.ttf') format('ttf'),
                 url('fonts/BNazanin.ttf') format('ttf');
        }
    </style>

<?php
    $userID = -1;
    if (isset($info)) {
    foreach ($info as $key => $row) {
        $userID = $row['UserID'];
        if ($row['UserID']==1 || $row['UserID']==2){   
?>

<title>Scarf Gallery » Cart</title>
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
    
<title>Scarf Gallery » Cart</title>
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
    }
    ?>


    <main class="main">
        <section class="winter-panel">
            <div></br></br></div>
            <div class="product-list">
                <h1 align = "center">لیست  محصولات</h1>
                <?php
                    if (isset($cartItems)) {
                        $totalPrice = 0 ;
                        foreach($cartItems as $key => $row) {
                            if ($row['Status'] == "Cart") {
                                $totalPrice += $row['TotalAmount'];
                            }
                ?>
                <div class="product-item">
                    <a href = "<?php echo base_url(); ?>index.php/AuthController/showProduct/<?php echo $row['ProductID'];?>" ><div class="product-info">
                        <p class="product-name"><?php echo $row['Name'] ; ?></p>
                        <p class="product-stock">تعداد: <?php echo $row['Quantity']; ?></p>
                        <p class="product-description">هزینه سفارش: <?php echo $row['TotalAmount']; ?></p>
                    </div></a>
                    <div class="product-actions">
                        <?php if($row['Status'] == "Cart") {?>
                        <a href = "<?php echo base_url(); ?>index.php/AuthController/deleteFromCart/<?php echo $row['OrderID']; ?>" ><button class="delete">حذف از سبد خرید</button></a>
                        <?php } else {?>
                        <p class="product-description"><?php echo $row['Status']; ?></p>
                        <?php } ?>
                    </div>
                </div>
                <?php 
                        }
                    } 
                ?>
                 <div class="product-item">
                    <div class="product-info">
                        <p class="product-name">مجموع سفارشات تایید نشده: <?php echo $totalPrice ; ?></p>
                    </div>
                    <div class="product-actions">
                        <a href = "<?php echo base_url(); ?>index.php/AuthController/purchase"><button class="add-to-cart">خرید</button></a>
                    </div>
                </div>
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
