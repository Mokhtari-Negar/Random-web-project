<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/style_main.css">
    <link rel="shortcut icon" href="<?php echo base_url(); ?>pic/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/style_commentlist.css">
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
    if (isset($info)) {
    foreach ($info as $key => $row) { 
    ?>
    
<title>Scarf Gallery » User Panel » Comments List</title>
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
 ?>

<main>
    <section>

    <div></br></br></div>
    <div class="container-comment">
        <h1>لیست نظرات</h1>
        <?php if (isset($comments)) {
            foreach($comments as $key => $row) {
        ?>
        <a href = "<?php echo base_url(); ?>index.php/AuthController/showProduct/<?php echo $row['ProductID'];?>" ><div class="product-review">
            <div class="product-info">
                <h3><?php echo $row['UserName'] ; ?></h3>
                <p><?php echo $row['Comment']; ?></p>
            </div>
            <div class="actions">
                <!-- <button onclick="location.href='product_page.html'">مشاهده محصول</button> -->
                <a href = "<?php echo base_url(); ?>index.php/AuthController/deleteComment/<?php echo $row['CommentID']; ?>" >
                    <button class="delete">حذف نظر</button>
                </a>
            </div>
        </div></a>
        <?php } } ?>
    </div>

    </section>
</main>
</body>
</html>
