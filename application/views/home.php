<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>
<div class="site-index">
    <div class="jumbotron text-center bg-light p-5 rounded">
        <h1 class="display-4"><?= esc($title) ?></h1>
        <p class="lead">Welcome to our platform!</p>
    </div>

    <div class="body-content">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <?php if (!session()->get('isLoggedIn')): ?>
                    <div class="text-center mt-4">
                        <p class="lead">Join us to access exciting features!</p>
                        <a href="<?= site_url('login') ?>" class="btn btn-primary btn-lg">Login</a>
                    </div>
                <?php else: ?>
                    <div class="text-center mt-4">
                        <p class="lead">Hello, <strong><?= esc(session()->get('username')) ?></strong>!</p>
                    </div>
                    <div class="text-center mt-4">
                        <?php if (session()->get('role') === 'customer'): ?>
                            <a href="<?= site_url('menu/index') ?>" class="btn btn-info btn-lg me-2">View Menu</a>
                        <?php elseif (session()->get('role') === 'restaurant'): ?>
                            <a href="<?= site_url('restaurant/index') ?>" class="btn btn-info btn-lg me-2">Restaurant Panel</a>
                        <?php endif; ?>
                        <a href="<?= site_url('logout') ?>" class="btn btn-danger btn-lg">Logout</a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
