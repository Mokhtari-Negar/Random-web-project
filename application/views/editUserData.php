<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="<?php echo base_url(); ?>pic/favicon.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'BNazanin', Arial, sans-serif;
            background: #e8f8fc;
            color: #333;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 50px auto;
            background: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #173452;
            margin-bottom: 20px;
        }
        label {
            font-weight: bold;
            margin-bottom: 5px;
            display: block;
        }
        input[type="text"], input[type="password"], input[type="tel"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 1rem;
        }
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 1rem;
        }
        button {
            width: 48%;
            padding: 10px;
            background-color: #4f899c;
            color: #ffffff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1rem;
            transition: background-color 0.3s ease;
        }
        button:hover {
            background-color: #2f6077;
        }
        .btn-group {
            display: flex;
            justify-content: space-between;
        }
    </style>

<?php
    if (isset($info)) {
    foreach ($info as $key => $row) {   
?>

<title>Scarf Gallery » Edit Information</title>
</head>

<body>
    <div class="container">
        <h1>ویرایش اطلاعات کاربر</h1>
        <form action="<?php echo base_url() ?>index.php/AuthController/updateData" method="POST">
            <div class="mb-3">
                <label for="fullName">نام کامل</label>
                <input type="text" id="fullName" name="fullName" value="<?php echo $row['FullName'];?>" placeholder="نام کامل را وارد کنید">
            </div>
            <div class="mb-3">
                <label for="password">رمز عبور</label>
                <input type="password" id="password" name="password" value="<?php echo $row['Password'];?>" placeholder="رمز عبور را وارد کنید">
            </div>
            <div class="mb-3">
                <label for="phoneNumber">شماره تلفن</label>
                <input type="tel" id="phoneNumber" name="phoneNumber" value="<?php echo $row['PhoneNumber'];?>" placeholder="شماره تلفن را وارد کنید">
            </div>
            <div class="mb-3">
                <label for="address">آدرس</label>
                <textarea id="address" name="address" rows="3" placeholder="آدرس را وارد کنید"><?php echo $row['Address']; ?></textarea>
            </div>
            <?php } }?>
            <div class="btn-group">
                <button type="submit">ثبت</button>
                <button type="button" onclick="history.back();">انصراف</button>
            </div>
        </form>
    </div>
</body>
</html>
