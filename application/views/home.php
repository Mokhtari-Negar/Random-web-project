<!-- <?php //$this->extend('layouts/main') ?>

<?php //$this->section('content') ?>
<div class="site-index">
    <div class="jumbotron text-center bg-light p-5 rounded">
        <h1 class="display-4"><?php //esc($title) ?></h1>
        <p class="lead">Welcome to our platform!</p>
    </div>

    <div class="body-content">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <?php //if (!session()->get('isLoggedIn')): ?>
                    <div class="text-center mt-4">
                        <p class="lead">Join us to access exciting features!</p>
                        <a href="<?php //site_url('login') ?>" class="btn btn-primary btn-lg">Login</a>
                    </div>
                <?php //else: ?>
                    <div class="text-center mt-4">
                        <p class="lead">Hello, <strong><?php //esc(session()->get('username')) ?></strong>!</p>
                    </div>
                    <div class="text-center mt-4">
                        <?php //if (session()->get('role') === 'customer'): ?>
                            <a href="<?php //site_url('menu/index') ?>" class="btn btn-info btn-lg me-2">View Menu</a>
                        <?php //elseif (session()->get('role') === 'restaurant'): ?>
                            <a href="<?php //site_url('restaurant/index') ?>" class="btn btn-info btn-lg me-2">Restaurant Panel</a>
                        <?php //endif; ?>
                        <a href="<?php //site_url('logout') ?>" class="btn btn-danger btn-lg">Logout</a>
                    </div>
                <?php //endif; ?>
            </div>
        </div>
    </div>
</div>
<?php // $this->endSection() ?> -->




<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>فروشگاه اینترنتی روسری</title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/style.css"> <!-- لینک به فایل CSS -->
</head>
<body>
    <header>
        <h1>فروشگاه اینترنتی روسری</h1>
        <nav>
            <ul>
                <li><a href="<?php echo site_url('home'); ?>">خانه</a></li>
                <li><a href="<?php echo site_url('products'); ?>">محصولات</a></li>
                <li><a href="<?php echo site_url('about'); ?>">درباره ما</a></li>
                <li><a href="<?php echo site_url('contact'); ?>">تماس با ما</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <section class="hero">
            <h2>به فروشگاه ما خوش آمدید!</h2>
            <p>ما بهترین روسریها را برای شما فراهم کردهایم.</p>
        </section>

        <section class="products">
            <h2>محصولات ما</h2>
            <div class="product-list">
                <!-- اینجا میتوانید محصولات را با حلقه foreach نمایش دهید -->
                <?php foreach ($products as $product): ?>
                    <div class="product-item">
                        <img src="<?php echo base_url('uploads/products/' . $product->image); ?>" alt="<?php echo $product->name; ?>">
                        <h3><?php echo $product->name; ?></h3>
                        <p><?php echo $product->price; ?> تومان</p>
                        <a href="<?php echo site_url('products/view/' . $product->id); ?>" class="btn">مشاهده جزئیات</a>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>
    </main>

    <footer>
        <p>&copy; 2023 فروشگاه اینترنتی روسری. تمام حقوق محفوظ است.</p>
    </footer>
</body>
</html>