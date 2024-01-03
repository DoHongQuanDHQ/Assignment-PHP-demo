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
                <h1 class="text-3xl font-semibold">Thêm sản phẩm</h1>
                <div class="py-2 grid grid-cols-3 flex-1">
                    <div class="col-span-2">
                        <form class="mt-2" method="POST" enctype="multipart/form-data">
                            <div class="flex flex-col">
                                <label class="py-2">Tên sản phẩm</label>
                                <input class="bg-gray-100 text-black h-10 rounded-md outline-0 pl-4 name-product" type="text" name="title" placeholder="VD: Quần jean" />
                            </div>
                            <div class="flex flex-col">
                                <label class="py-2">Giá sản phẩm</label>
                                <input class="bg-gray-100 text-black h-10 rounded-md outline-0 pl-4 price-product" type="text" name='price' placeholder="VD: 10000000" />
                            </div>
                            <div class="flex flex-col">
                                <label class="py-2">Giảm giá sản phẩm</label>
                                <input class="bg-gray-100 text-black h-10 rounded-md outline-0 pl-4 code-product" type="text" name='price-sale' placeholder="VD: AT12345" />
                            </div>
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
                                    <option selected value="0">false</option>
                                    <option value="1">true</option>
                                </select>
                            </div>
                            <div class="flex flex-col">
                                <label class="py-2">Category</label>
                                <select class="h-10 bg-gray-100 text-black rounded-md outline-0 px-3 status" name="cate-id">
                                    <option selected value="1">Laptop</option>
                                    <option value="2">Điện thoại</option>
                                </select>
                            </div>
                            <div class="flex flex-col">
                                <label class="py-2">Thông tin sản phẩm</label>
                                <textarea class="bg-gray-100 text-black rounded-md outline-0 pl-4 pt-2 resize-none" cols="30" rows="10" placeholder="Thông tin" name='technique'></textarea>
                            </div>
                            <div class="flex flex-col">
                                <label class="py-2">Thông tin sản phẩm</label>
                                <textarea class="bg-gray-100 text-black rounded-md outline-0 pl-4 pt-2 resize-none" cols="30" rows="10" placeholder="Thông tin" name="description"></textarea>
                            </div>
                            <div class="flex flex-col mt-4">
                                <button class="bg-blue-500 rounded-md py-3 text-white font-semibold btn-create" name="btn_create">
                                    Tạo sản phẩm
                                </button>
                            </div>
                        </form>
                    </div>
                    <div class="validate-create fixed top-3 right-3">
                    </div>
                </div>
            </div>
            <script>
                CKEDITOR.replace('technique');
                CKEDITOR.replace('description');
            </script>
            <?php
            if (isset($_POST['btn_create'])) {
                $title = $_POST['title'];
                $price = $_POST['price'];
                $price_sale = $_POST['price-sale'];
                $flash_sale = $_POST['flash-sale'];
                $cate_id = $_POST['cate-id'];
                $technique = $_POST['technique'];
                $description = $_POST['description'];
                $nameImage = $_FILES['thumbnail']['name'];
                $tmpImage = $_FILES['thumbnail']['tmp_name'];
                move_uploaded_file($tmpImage, "../../../images/" . $nameImage);
                $insetProduct = "INSERT INTO PRODUCTS VALUE(NULL, '$title', $price, 'images/$nameImage', $price_sale, '$technique', '$description', $flash_sale, $cate_id)";
                $result = $dataBase->prepare($insetProduct)->execute();
                if ($result) {
                    echo "<script>window.location.href='index.php'</script>";
                } else {
                    echo "Upload không thành công";
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