<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Tin tức....</title>
    <link rel="stylesheet" href="/learn_php/assignment/assets/style.css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="/learn_php/assignment/assets/config.js" defer></script>
    <script src="https://code.iconify.design/3/3.1.0/iconify.min.js"></script>
</head>

<body>
    <?php
    // Connect DB
    include_once('../config/connectDB.php');
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $selectProduct = "SELECT * FROM PRODUCTS WHERE ID=$id";
        $product = $dataBase->query($selectProduct)->fetch();
    }
    ?>
    <div class="container bg-[#0E1628] text-white">
        <header class="border-b border-[#ccc]/50 border-solid sticky top-0 bg-[#0E1628] z-10">
            <div class="max-w-[1440px] mx-auto flex items-center justify-between py-4 ">
                <div class="flex items-center">
                    <div>
                        <a href="/learn_php/assignment/">
                            <img class="w-12 h-12 rounded-md" src="https://anhvanhoa.com/image/favicon.ico" alt="logo_shop" />
                        </a>
                    </div>
                    <nav class="ml-10 flex gap-5">
                        <?php
                        $selectCategory = "SELECT * FROM CATEGORYS";
                        $category = $dataBase->query($selectCategory);
                        foreach ($category as $key => $value) {
                        ?>
                            <a class="hover:text-[#33A4DB] font-medium" href="/learn_php/assignment?category=<?php echo $value['cate_id'] ?>"><?php echo $value['cate_name'] ?></a>
                        <?php
                        } ?>
                        <a class="hover:text-[#33A4DB]" href="./blog/index.php">Tin tức</a>
                    </nav>
                </div>
                <div class="flex">
                    <div class="flex items-center mr-3 bg-[#ccc]/10 rounded-lg px-3">
                        <input class="bg-transparent h-full outline-0" type="text" placeholder="Search..." />
                        <span class="text-2xl text-[#ccc]/50"><span class="iconify" data-icon="clarity:search-line"></span></span>
                    </div>
                    <button class="py-[6px] px-5 rounded-lg bg-primary text-white border hover:border hover:bg-transparent border-solid border-primary">
                        Login
                    </button>
                </div>
            </div>
        </header>
        <div>
            <p class="text-center font-semibold py-2 bg-primary">🔥 Đạt điểm cao sale bao khủng - Ánh Văn Hóa Shop 🔥
            </p>
        </div>
        <div>
            <div class="max-w-[1440px] mx-auto mt-7 px-28">
                <div class="py-4 mb-4 border-b border-solid border-[#ccc]/30 hidden">
                    <h2 class="text-2xl font-semibold">iPhone 13 Pro Max 128GB | Chính hãng VN/A</h2>
                </div>
                <div class="grid grid-cols-[60%,1fr] gap-8">
                    <div>
                        <div class="bg-white rounded-md p-2">
                            <img src="/learn_php/<?php echo $product['thumbnail'] ?>" alt="" class="h-[350px] mx-auto">
                        </div>
                        <div class="grid grid-cols-5 mt-4 gap-4 hidden">
                            <div class="h-24 bg-white rounded-md">
                                <img src="https://cdn2.cellphones.com.vn/x358,webp,q100/media/catalog/product/2/_/2_61_8_2_1_12.jpg" alt="" class="w-full h-full object-contain">
                            </div>
                            <div class="h-24 bg-white rounded-md">
                                <img src="https://cdn2.cellphones.com.vn/x358,webp,q100/media/catalog/product/2/_/2_61_8_2_1_12.jpg" alt="" class="w-full h-full object-contain">
                            </div>
                            <div class="h-24 bg-white rounded-md">
                                <img src="https://cdn2.cellphones.com.vn/x358,webp,q100/media/catalog/product/2/_/2_61_8_2_1_12.jpg" alt="" class="w-full h-full object-contain">
                            </div>
                            <div class="h-24 bg-white rounded-md">
                                <img src="https://cdn2.cellphones.com.vn/x358,webp,q100/media/catalog/product/2/_/2_61_8_2_1_12.jpg" alt="" class="w-full h-full object-contain">
                            </div>
                            <div class="h-24 bg-white rounded-md">
                                <img src="https://cdn2.cellphones.com.vn/x358,webp,q100/media/catalog/product/2/_/2_61_8_2_1_12.jpg" alt="" class="w-full h-full object-contain">
                            </div>
                        </div>
                        <div class="mt-8 bg-[#1E293B] rounded-md p-5">
                            <h2 class="text-2xl text-center font-semibold p-2 text-[#33A4DB]">ĐẶC ĐIỂM NỔI BẬT</h2>
                            <div>
                                <?php echo $product['description'] ?>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="grid grid-cols-3 gap-4 hidden">
                            <div class="text-center border border-[#ccc]/30 border-solid p-2 rounded-md">
                                <p>
                                    1TB
                                </p>
                                <span>
                                    29.000.000
                                </span>
                            </div>
                            <div class="text-center border border-[#ccc]/30 border-solid p-2 rounded-md">
                                <p>
                                    512GB
                                </p>
                                <span>
                                    29.000.000
                                </span>
                            </div>
                            <div class="text-center border border-[#ccc]/30 border-solid p-2 rounded-md">
                                <p>
                                    256GB
                                </p>
                                <span>
                                    29.000.000
                                </span>
                            </div>
                        </div>
                        <div class="flex flex-wrap mt-4 gap-4 hidden">
                            <div class="border border-[#ccc]/30 border-solid py-1 px-5 rounded-md">
                                <p>Bạc</p>
                            </div>
                            <div class="border border-[#ccc]/30 border-solid py-1 px-5 rounded-md">
                                <p>Vàng</p>
                            </div>
                            <div class="border border-[#ccc]/30 border-solid py-1 px-5 rounded-md">
                                <p>Xanh Lá</p>
                            </div>
                            <div class="border border-[#ccc]/30 border-solid py-1 px-5 rounded-md">
                                <p>Xám</p>
                            </div>
                        </div>
                        <div class="pb-3 mb-4 border-b border-solid border-[#ccc]/30">
                            <h2 class="text-2xl font-semibold"><?php echo $product['title'] ?></h2>
                        </div>
                        <div class="mt-5 flex py-4 px-8 items-end bg-[#1E293B] rounded-md">
                            <p class="text-3xl font-semibold text-[#33A4DB] ">
                                <?php echo number_format($product['price'], 0) ?>đ</p>
                            <span class="pl-3 text-[#ccc]/80 line-through"><?php echo number_format($product['price_sale'], 0) ?>đ</span>
                        </div>
                        <button class="text-center text-xl p-4 w-full mt-5 bg-[#E849A0] rounded-md font-semibold">
                            Mua ngay
                        </button>
                        <div class="mt-8">
                            <p class="text-xl font-semibold">
                                Thông số kỹ thuật
                            </p>
                            <?php echo $product['technique'] ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer class="">
            <div class="max-w-[1440px] m-auto border-t border-[#ccc] border-solid mt-10 pb-10">
                <div class="grid grid-cols-4 px-5 mt-5">
                    <div>
                        <h4 class="font-semibold text-lg">Chính sách & điều khoản</h4>
                        <ul>
                            <li>Chính sách bảo mật</li>
                            <li>Điều khoản</li>
                            <li>Mua hàng và thanh toán Online</li>
                            <li>Mua hàng trả góp Online</li>
                        </ul>
                    </div>
                    <div>
                        <h4 class="font-semibold text-lg">Dịch vụ và thông tin khác</h4>
                        <ul>
                            <li>Liên hệ hợp tác kinh doanh</li>
                            <li>Ưu đãi thanh toán</li>
                            <li>Tuyển dụng</li>
                        </ul>
                    </div>
                    <div>
                        <h4 class="font-semibold text-lg">Kết nối với CellphoneS</h4>
                        <ul>
                            <li>Facebook</li>
                            <li>Twitter</li>
                        </ul>
                    </div>
                    <div>
                        <h4 class="font-semibold text-lg">Tổng đài hỗ trợ miễn phí</h4>
                        <ul>
                            <li>Gọi mua hàng 1800.2097 (7h30 - 22h00)</li>
                            <li>Gọi khiếu nại 1800.2063 (8h00 - 21h30)</li>
                            <li>Gọi bảo hành 1800.2064 (8h00 - 21h00)</li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</body>

</html>