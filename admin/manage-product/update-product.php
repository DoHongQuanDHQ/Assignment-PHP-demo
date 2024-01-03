<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin shop</title>
    <link rel="stylesheet" href="/learn_php/assignment/assets/style.css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="/learn_php/assignment/assets/config.js" defer></script>
    <script src="https://code.iconify.design/3/3.1.0/iconify.min.js"></script>
    <script src="../../ckeditor/ckeditor.js"></script>
</head>

<body>
    <?php
    session_start();
    // Connect DB
    include_once('../../config/connectDB.php');
    include_once('../../account/checkLogin.php');
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $selectProduct = "SELECT * FROM PRODUCTS WHERE ID=$id";
        $product = $dataBase->query($selectProduct)->fetch();
    }
    ?>
    <div class="container bg-[#0E1628] text-white min-h-screen">
        <header class="border-b border-[#ccc]/50 border-solid sticky top-0 bg-[#0E1628]">
            <div class="max-w-[1440px] mx-auto flex items-center justify-between py-4 ">
                <div class="flex items-center">
                    <div>
                        <a href="/learn_php/assignment/">
                            <img class="w-12 h-12 rounded-md" src="https://anhvanhoa.com/image/favicon.ico" alt="logo_shop" />
                        </a>
                    </div>
                    <nav class="ml-12 flex gap-5">
                        <a class="hover:text-[#33A4DB] font-medium" href="/learn_php/assignment/admin">Trang chủ</a>
                        <a class="hover:text-[#33A4DB] font-medium" href="./index.php">Sản phẩm</a>
                        <a class="hover:text-[#33A4DB] font-medium" href="/learn_php/assignment/admin/manage-blog">
                            Bài viết
                        </a>
                    </nav>
                </div>
                <div class="flex items-center gap-3">
                    <p>
                        Xin chào <?php echo $_SESSION['user'] ?>
                    </p>
                    <form action="" method="POST">
                        <button class="mt-1 text-xl" name='logout'>
                            <span class="iconify" data-icon="mdi:shutdown"></span>
                        </button>
                    </form>
                </div>
            </div>
        </header>
        <main class="">
            <div class="max-w-[1440px] mx-auto mt-5">
                <h1 class="text-3xl font-semibold">Sửa sản phẩm</h1>
                <div class="py-2 grid grid-cols-3 flex-1">
                    <div class="col-span-2">
                        <form class="mt-2" method="POST" enctype="multipart/form-data">
                            <div class="flex flex-col">
                                <label class="py-2">Tên sản phẩm</label>
                                <input class="bg-gray-100 text-black h-10 rounded-md outline-0 pl-4 name-product" type="text" name="title" placeholder="VD: Quần jean" value="<?php echo $product['title'] ?>" />
                            </div>
                            <div class="flex flex-col">
                                <label class="py-2">Giá sản phẩm</label>
                                <input class="bg-gray-100 text-black h-10 rounded-md outline-0 pl-4 price-product" type="text" name='price' placeholder="VD: 10000000" value="<?php echo $product['price'] ?>" />
                            </div>
                            <div class="flex flex-col">
                                <label class="py-2">Giảm giá sản phẩm</label>
                                <input class="bg-gray-100 text-black h-10 rounded-md outline-0 pl-4 code-product" type="text" name='price-sale' placeholder="VD: AT12345" value="<?php echo $product['price_sale'] ?>" />
                            </div>
                            <img src="/learn_php/<?php echo $product['thumbnail'] ?>" alt="" class="h-[200px] mt-5">
                            <div class="flex flex-col">
                                <label class="py-2">Ảnh sản phẩm</label>
                                <input class="bg-gray-100 text-black h-10 rounded-md outline-0 pl-4 image-product" type="file" name='thumbnail' placeholder="Link ảnh" />
                            </div>
                            <div class="flex flex-col hidden">
                                <label class="py-2">Danh sách ảnh sản phẩm</label>
                                <div class="flex gap-3">
                                    <input class="flex-1 bg-gray-100 text-black h-10 rounded-md outline-0 pl-4 list-image" type="text" placeholder="Link ảnh" />
                                    <button class="bg-blue-500 text-white rounded-md px-5 add-image">Thêm</button>
                                </div>
                            </div>
                            <div class="flex flex-col">
                                <label class="py-2">Flash sale</label>
                                <select class="h-10 bg-gray-100 text-black rounded-md outline-0 px-3 gender" name='flash-sale'>
                                    <option <?php echo $product['flash_sale'] == 0 ? "selected" : ""  ?> value="0">false
                                    </option>
                                    <option <?php echo $product['flash_sale'] == 1 ? "selected" : ""  ?> value="1">true
                                    </option>
                                </select>
                            </div>
                            <div class="flex flex-col">
                                <label class="py-2">Category</label>
                                <select class="h-10 bg-gray-100 text-black rounded-md outline-0 px-3 status" name="cate-id">
                                    <?php
                                    $selectCategory = "SELECT * FROM CATEGORYS";
                                    $category = $dataBase->query($selectCategory);
                                    foreach ($category as $key => $value) {
                                    ?>
                                        <option <?php echo $product['cate_id'] == $value['cate_id'] ? "selected" : ""  ?> value="<?php echo $value['cate_id'] ?>">
                                            <?php echo $value['cate_name'] ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="flex flex-col">
                                <label class="py-2">Mô tả ngắn sản phẩm</label>
                                <textarea class="bg-gray-100 text-black rounded-md outline-0 pl-4 pt-2 resize-none" cols="30" rows="10" placeholder="Thông tin" name='technique'><?php echo $product['technique']  ?></textarea>
                            </div>
                            <div class="flex flex-col">
                                <label class="py-2">Thông tin sản phẩm</label>
                                <textarea class="bg-gray-100 text-black rounded-md outline-0 pl-4 pt-2 resize-none" cols="30" rows="10" placeholder="Thông tin" name="description"><?php echo $product['description']  ?></textarea>
                            </div>
                            <div class="flex flex-col mt-4">
                                <button class="bg-blue-500 rounded-md py-3 text-white font-semibold btn-create" name="btn_update">
                                    Cập nhật sản phẩm
                                </button>
                            </div>
                        </form>
                    </div>
                    <div class="validate-create fixed top-3 right-3">
                    </div>
                </div>
            </div>
            <script>
                CKEDITOR.replace('description');
            </script>
            <?php
            if (isset($_POST['btn_update'])) {
                $id = $product['id'];
                $title = $_POST['title'];
                $price = $_POST['price'];
                $price_sale = $_POST['price-sale'];
                $flash_sale = $_POST['flash-sale'];
                $cate_id = $_POST['cate-id'];
                $technique = $_POST['technique'];
                $description = $_POST['description'];
                $nameImage = $_FILES['thumbnail']['name'];
                $tmpImage = $_FILES['thumbnail']['tmp_name'];
                $updateProduct;
                if ($nameImage && $tmpImage) {
                    move_uploaded_file($tmpImage, "../../../images/" . $nameImage);
                    $updateProduct = "UPDATE PRODUCTS SET TITLE='$title', PRICE=$price, THUMBNAIL='images/$nameImage', PRICE_SALE=$price_sale, TECHNIQUE='$technique', DESCRIPTION='$description', FLASH_SALE=$flash_sale, CATE_ID=$cate_id WHERE ID=$id";
                } else {
                    $updateProduct = "UPDATE PRODUCTS SET TITLE='$title', PRICE=$price, PRICE_SALE=$price_sale, TECHNIQUE='$technique', DESCRIPTION='$description', FLASH_SALE=$flash_sale, CATE_ID=$cate_id WHERE ID=$id";
                }
                $result = $dataBase->prepare($updateProduct)->execute();
                if ($result) {
                    echo "<script>window.location.href='index.php'</script>";
                } else {
                    echo "Update không thành công";
                }
            }
            if (isset($_POST['logout'])) {
                $_SESSION['user'] = null;
                echo "<script>window.location.href='http://localhost/learn_php/assignment/account/login.php'</script>";
            }
            ?>
        </main>
    </div>
</body>

</html>