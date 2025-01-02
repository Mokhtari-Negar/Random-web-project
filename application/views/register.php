<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/style.css'); ?>">
</head>
<body>
    

    <!-- Display flash messages for registration success or failure -->
    <?php if ($this->session->flashdata('message')): ?>
        <p style="color: green;"><?php echo $this->session->flashdata('message'); ?></p>
    <?php endif; ?>

    <?php if ($this->session->flashdata('error')): ?>
        <p style="color: red;"><?php echo $this->session->flashdata('error'); ?></p>
    <?php endif; ?>

    <!-- Registration Form -->
    <form action="<?php echo base_url() ?>index.php/AuthController/register" method="POST">
    <h1 align="center">Register</h1>
        <label for="full_name">Full Name:</label>
        <input type="text" name="full_name" id="full_name" required><br>

        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required><br>

        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required><br>

        <label for="confirm_password">Confirm Password:</label>
        <input type="password" name="confirm_password" id="confirm_password" required><br>

        <button type="submit">Register</button><br>


         <!-- Link to login page -->
    <p style="color:#0d0e2e;">Already have an account? <a href="<?php echo base_url() ?>index.php/AuthController/login" >Login here</a></p>
    </form>

   
</body>
</html>                             