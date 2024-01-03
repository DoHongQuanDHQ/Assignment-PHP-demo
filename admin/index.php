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
    <script src="../assets/app.js" defer></script>
</head>

<body>
    <!-- <?php
   // session_start();
    //include_once('../config/connectDB.php');
    //include_once('../account/checkLogin.php');
    ?> -->
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
                        <a class="hover:text-[#33A4DB] font-medium" href="./manage-product">Sản phẩm</a>
                        <a class="hover:text-[#33A4DB] font-medium" href="./manage-blog/">Bài viết</a>
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
            <div class="m-auto max-w-[1440px]">
                <div class="grid grid-cols-4 py-4 gap-4">
                    <div class="border-[#ccc] border border-solid rounded-md h-[150px]">
                        <button type="submit" class="btn-create-banner w-full h-full flex justify-center items-center text-[50px] transition-all hover:text-[60px] hover:text-[#33A4DB] hover:bg-[#33A4DB]/5 relative">
                            <span class="iconify" data-icon="bi:upload"></span>
                            <p class="name-file absolute text-sm bottom-1"></p>
                        </button>
                    </div>
                    <?php
                    $selectBanners = "SELECT * FROM BANNERS";
                    $banners = $dataBase->query($selectBanners);
                    foreach ($banners as $values) {
                    ?>
                        <div class="border-[#ccc] border border-solid rounded-md h-[150px] relative">
                            <img src="/learn_PHP/<?php echo $values['banner_url'] ?>" alt="" class="w-full h-full rounded-md object-cover">
                            <form action="" method="POST">
                                <button type="submit" name="btn_delete_<?php echo $values['banner_id'] ?>" class="absolute top-1 right-1 bg-red-500 px-2 rounded-md">Xóa</button>
                            </form>
                        </div>
                    <?php
                    }
                    ?>
                </div>
                <form action="" method="post" enctype="multipart/form-data">
                    <input type="file" name="banner" id="" value="" hidden>
                    <input type="submit" value="Upload" name="submit_banner" class="bg-primary px-6 py-2 font-semibold rounded-md cursor-pointer">
                </form>
                <div class="mt-10">
                    <h3 class="text-xl font-medium pb-2">Category</h3>
                    <div class="grid grid-cols-6 gap-5">
                        <form action="" method="POST">
                            <input type="text" name="category" class="rounded-md">
                            <input type="submit" value="Thêm" name="add-cate" class="bg-primary px-4 mt-1 rounded-md">
                        </form>
                        <select class="bg-[#0E1628]">
                            <?php
                            $selectCategory = "SELECT * FROM CATEGORYS";
                            $categorys = $dataBase->query($selectCategory);
                            foreach ($categorys as $key => $value) {
                            ?>
                                <option value="<?php echo $value['cate_id'] ?>"><?php echo $value['cate_name'] ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>
            </div>
            <?php
            $selectBanners = "SELECT * FROM BANNERS";
            $banners = $dataBase->query($selectBanners);
            foreach ($banners as $values) {
                $id = $values['banner_id'];
                if (isset($_POST['btn_delete_' . $id])) {
                    $deleteBanner = "DELETE FROM BANNERS WHERE BANNER_ID = $id";
                    $dataBase->prepare($deleteBanner)->execute();
                    header('refresh:0');
                };
            }
            if (isset($_POST['submit_banner'])) {
                $nameImage = $_FILES['banner']['name'];
                $tmpImage = $_FILES['banner']['tmp_name'];
                move_uploaded_file($tmpImage, "../../images/" . $nameImage);
                $dataBase->prepare("INSERT INTO BANNERS VALUE(NULL, 'images/$nameImage')")->execute();
                header('refresh:0');
            }
            if (isset($_POST['add-cate'])) {
                $cate_name = $_POST['category'];
                $insertCate = "INSERT INTO CATEGORYS VALUE(NULL, '$cate_name')";
                $result = $dataBase->prepare($insertCate)->execute();
                if ($result) {
                    echo "Thêm Thành công";
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