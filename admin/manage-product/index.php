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
    <?php
    session_start();
    // Connect DB
    include_once('../../config/connectDB.php');
    include_once('../../account/checkLogin.php');
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
                        <a class="hover:text-[#33A4DB] font-medium" href="/learn_php/assignment/admin/manage-product">Sản phẩm</a>
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
                <h1 class="text-2xl font-semibold">Quản lý sản phẩm</h1>
                <div class="mt-4">
                    <a href="./upload-product.php">
                        <button class="flex items-center px-4 py-1 bg-[#E849A0] gap-2 rounded-md">
                            <span class="iconify" data-icon="bi:upload"></span>
                            <p>Thêm sản phẩm</p>
                        </button>
                    </a>
                </div>
                <div class="mt-5">
                    <table class="table-auto w-full">
                        <tr class="">
                            <th class="font-semibold py-2 text-left">Tên sản phẩm</th>
                            <th class="font-semibold py-2 text-left">Ảnh sản phẩm</th>
                            <th class="font-semibold py-2 text-left">Giá</th>
                            <th class="font-semibold py-2 text-left">Sửa</th>
                            <th class="font-semibold py-2 text-left">Xóa</th>
                        </tr>
                        <tbody>
                            <?php
                            $selectProducts = "SELECT * FROM PRODUCTS";
                            $products = $dataBase->query($selectProducts);
                            foreach ($products as $value) {
                            ?>
                                <tr class="border-collapse border-t border-slate-500">
                                    <td class="py-4 max-w-[350px]">
                                        <h3 class="">
                                            <?php echo $value['title'] ?>
                                        </h3>
                                    </td>
                                    <td class="py-4">
                                        <img src="/learn_php/<?php echo $value['thumbnail'] ?>" alt="" class="w-[150px] rounded-md">
                                    </td>
                                    <td class="py-4">
                                        <p class=""><?php echo number_format($value['price'], 0) ?>đ</p>
                                    </td>
                                    <td class="py-4">
                                        <a href="./update-product.php?id=<?php echo $value['id'] ?>" class="text-center bg-[#33A4DB] py-1 px-5 rounded-md">Sửa</a>
                                    </td>
                                    <td class="py-4">
                                        <form action="" method="POST">
                                            <button name="delete-product-<?php echo $value['id'] ?>" class="text-center bg-red-500 py-1 px-5 rounded-md">Xóa</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <?php
            $selectProducts = "SELECT * FROM PRODUCTS";
            $products = $dataBase->query($selectProducts);
            foreach ($products as $value) {
                $id = $value['id'];
                if (isset($_POST['delete-product-' . $id])) {
                    $result = $dataBase->prepare("DELETE FROM PRODUCTS WHERE ID=$id")->execute();
                    if ($result) {
                        echo "<script>window.location.href='index.php'</script>";
                    } else {
                        echo "Xoá không thành công";
                    }
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