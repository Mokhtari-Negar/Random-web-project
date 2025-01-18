<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/style_main.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/style_showproduct.css">
    <link rel="shortcut icon" href="<?php echo base_url(); ?>pic/favicon.png" type="image/x-icon">
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

<title>Scarf Gallery » Product </title>
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
    
<title>Scarf Gallery » Product</title>
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

   <main>
    <section>
        <?php if (isset($products)){
            foreach($products as $pKey => $pRow) { 
                $productID = $pRow['ProductID'];?>
                <div class="product-page">
                    <div class="product-container">
                        <!-- Left Side: Product Info -->
                        <div class="product-info">
                            <h1 class="product-name"><?php echo $pRow['Name']; ?><h1>
                            <p class="product-price">قیمت: <?php echo $pRow['Price']; ?>000 T</p>
                            <p class="product-description"><?php echo $pRow['Description']; ?></p>

                            <?php if ($userID == -1) { ?>
                                <div class="product-options">
                                <div class="quantity">
                                    <label for="quantity">تعداد: <?php echo $pRow['Stock']; ?></label>
                                        <input type="number" id="quantity" name="stock" value="1" min="1">
                                        <a href = "<?php echo base_url(); ?>index.php/AuthController/viewRouteControll/login"><button class="add-to-cart">اضافه کردن به سبد خرید</button></a>
                                </div>
                            </div> 
                            <?php  } else { ?>
                            <div class="product-options">
                                <div class="quantity">
                                    <label for="quantity">تعداد: <?php echo $pRow['Stock']; ?></label>
                                    <form action="<?php  echo base_url(); ?>index.php/AuthController/addToCart" method="post">
                                        <input type="number" id="quantity" name="stock" value="1" min="1">
                                        <button class="add-to-cart">اضافه کردن به سبد خرید</button>
                                    </form>
                                </div>
                            </div> 
                            <?php }?>               
                        </div>

                        <!-- Right Side: Product Image -->
                        <div class="product-image">
                            <img src="<?php echo $pRow['ImageURL']; ?>" alt="<?php echo $pRow['Name']; ?>">
                        </div>
                    </div>
                </div>
            <?php }} ?>
                <!-- Add Opinion Section -->
                <?php if ($userID == -1) { ?>
                    <div class="add-opinion">
                        <h5>ارسال نظر</h5>
                        <input type="text" name="userName" placeholder="نام خود را وارد کنید">
                        <textarea name="comment" rows="2" placeholder="نظر خود را وارد کنید"></textarea>
                        <a href = "<?php echo base_url(); ?>index.php/AuthController/viewRouteControll/login"><button type="submit">ارسال</button></a>
                    </div>
                <?php  } else { ?>
                    <div class="add-opinion">
                        <h5>ارسال نظر</h5>
                        <form action="<?php  echo base_url(); ?>index.php/AuthController/insertComment/<?php echo $productID;?>" method="post">
                            <input type="text" name="userName" placeholder="نام خود را وارد کنید">
                            <textarea name="comment" rows="2" placeholder="نظر خود را وارد کنید"></textarea>
                            <button type="submit">ارسال</button>
                        </form>
                    </div>
                <?php } ?>

                <!-- Opinion Section -->
                <div class="opinion-section">
                    <h5>نظرات کاربران</h5>
                        <?php if (isset($comments)){
                            foreach($comments as $cKey => $cRow) { ?>
                        <div class="opinion">
                            <p class="user-name"><?php echo $cRow['UserName']; ?></p> 
                            <p class="user-comment"><?php echo $cRow['Comment']; ?></p>
                        </div>
                    <?php } }?>
                </div>
    </section>
</main>

    <!-- Footer -->
<footer class="footer">
    <div class="container border">
        <p>ارتباط با ما</p>
        <p>آدرس: تهران، خیابان 15 خرداد</p>
        <p>تلفن: 09101234567</p>

        <!-- Social Media Links -->
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
