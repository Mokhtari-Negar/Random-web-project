<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link rel="stylesheet" href="<?php echo base_url('css/style2.css'); ?>"> <!-- Link to your CSS file -->
</head>
<body>
    <div class="edit-profile-container">
        

        <!-- Flash Messages -->
        <?php if ($this->session->flashdata('message')): ?>
            <p class="success"><?php echo $this->session->flashdata('message'); ?></p>
        <?php endif; ?>

        <?php if ($this->session->flashdata('error')): ?>
            <p class="error"><?php echo $this->session->flashdata('error'); ?></p>
        <?php endif; ?>

        <!-- Edit Profile Form -->
        <form action="<?php echo base_url('AuthController/update_profile'); ?>" method="POST">
        <h1>Edit Profile</h1>
            <input type="hidden" name="user_id" value="<?php echo $user['id']; ?>">

            <label for="full_name">Full Name:</label>
            <input type="text" name="full_name" value="<?php echo $user['full_name']; ?>" required>

            <label for="email">Email:</label>
            <input type="email" name="email" value="<?php echo $user['email']; ?>" required>

            <button type="submit">Save Changes</button>
        </form>

        <!-- Link back to Dashboard or Home -->
        <p><a href="<?php echo base_url('dashboard'); ?>">Back to Dashboard</a></p>
    </div>
</body>
</html>
