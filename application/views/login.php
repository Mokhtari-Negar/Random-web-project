<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/style.css'); ?>">
</head>
<body class="winter-theme">
    
    <form  action="<?php echo base_url() ?>index.php/AuthController/login_user" method="post">
    <h1>Login</h1>
    <?php 
    if($this->session->flashdata('error')){
        echo '<font color="red">'.$this->session->flashdata('error').'</font>';
    }
    ?>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Login</button>
        <p>Don't have an account? <a href="<?php echo base_url() ?>index.php/AuthController/regi" >Register</a></p>
    </form>
</body>
</html>
