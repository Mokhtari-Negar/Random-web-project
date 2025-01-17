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
        input[type="text"], input[type="number"], select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 1rem;
        }
        input[type="number"]#productPrice::-webkit-inner-spin-button,
        input[type="number"]#productPrice::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
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
    // foreach ($info as $userKey => $userRow) {  
        if (isset($product)) { 
            foreach($product as $productKey => $productRow) {
?>

<title>Scarf Gallery » Insert Product</title>
</head>
<body>
    <div class="container">
        <h1>درج محصول</h1>
        <form>
            <div class="mb-3">
                <label for="productName">نام محصول</label>
                <input type="text" id="productName" name="name" placeholder="نام محصول را وارد کنید">
            </div>
            <div class="mb-3">
                <label for="productPrice">قیمت محصول (ریال)</label>
                <input type="number" id="productPrice" name="price" inputmode="numeric" placeholder="قیمت را وارد کنید">
            </div>
            <div class="mb-3">
                <label for="productStock">موجودی انبار</label>
                <input type="number" id="productStock" name="stock" min="0" step="1" placeholder="موجودی را وارد کنید">
            </div>
            <div class="mb-3">
                <label for="productCategory">دسته‌بندی محصول</label>
                <select id="productCategory" name="categoryID">
                    <option value="1">دسته‌بندی 1</option>
                    <option value="2">دسته‌بندی 2</option>
                    <option value="3">دسته‌بندی 3</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="productImage">آدرس تصویر محصول</label>
                <input type="text" id="productImage" name="imageURL" placeholder="آدرس تصویر را وارد کنید">
            </div>
            <?php } } }?>
            <div class="btn-group">
                <button type="submit">ثبت</button>
                <button type="button" onclick="history.back();">انصراف</button>
            </div>
        </form>
    </div>
</body>
</html>
