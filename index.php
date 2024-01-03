<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Shop....</title>
    <link rel="stylesheet" href="/learn_php/assignment/assets/style.css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="/learn_php/assignment/assets/config.js" defer></script>
    <script src="https://code.iconify.design/3/3.1.0/iconify.min.js"></script>

</head>

<body>
    <?php
    // Connect DB
    include_once('./config/connectDB.php');
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
                        $selectCategory = "SELECT * FROM sanpham";
                        $category = $dataBase->query($selectCategory);
                        foreach ($category as $key => $value) {
                        ?>
                            <a class="hover:text-[#33A4DB] font-medium" href="/learn_php/assignment?category=<?php echo $value['cate_id'] ?>"><?php echo $value['cate_name'] ?></a>
                        <?php
                        } ?>
                        <a class="hover:text-[#33A4DB] font-medium" href="./blog/index.php">Tin tức</a>
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
            <div class="max-w-[1440px] mx-auto mt-5">
                <swiper-container class="mySwiper" pagination="true" pagination-dynamic-bullets="true" autoplay delay='5000'>
                    <?php
                    $selectBanners = "SELECT * FROM BANNERS";
                    $banners = $dataBase->query($selectBanners);
                    foreach ($banners as $values) {

                    ?>
                        <swiper-slide>
                            <div class="bg-[url(/learn_php/<?php echo $values['banner_url'] ?>)] w-fill bg-cover h-[450px] rounded-md">
                            </div>
                        </swiper-slide>
                    <?php
                    }
                    ?>
                </swiper-container>
            </div>
        </div>
        <div>
            <div class="max-w-[1440px] mx-auto mt-8 bg-gradient-to-t from-[#37045d] to-[#89085b] px-5 py-8 rounded-lg">
                <div class="mb-3">
                    <img class="m-auto" src="https://cdn2.cellphones.com.vn/x/media/catalog/product/h/o/hot-sale-use-for-home-page.png" alt="">
                </div>
                <div class="grid grid-cols-6 gap-3">
                    <?php
                    $selectProducts = "SELECT * FROM PRODUCTS WHERE FLASH_SALE=1";
                    $products = $dataBase->query($selectProducts);
                    foreach ($products as $value) {
                    ?>
                        <a href="./product/?id=<?php echo $value['id'] ?>">
                            <div class="bg-white text-black rounded-md">
                                <img class="w-full h-[270px] object-contain rounded-t-md" src="/learn_php/<?php echo $value['thumbnail'] ?>" alt="">
                                <div class="p-2">
                                    <h4 class="text-lg"><?php echo $value['title'] ?></h4>
                                    <p class="text-red-500"><?php echo number_format($value['price']) ?>đ<span class="text-[#ccc] line-through text-base"><?php echo number_format($value['price_sale']) ?>đ</span>
                                    </p>
                                </div>
                            </div>
                        </a>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
        <div class="max-w-[1440px] mx-auto px-4">
            <div class="grid grid-cols-4 gap-14 mt-5">
                <div class="py-4">
                    <div class="p-3 bg-[#ccc]/10 inline-block rounded-md">
                        <span class="iconify text-3xl" data-icon="mdi:face-outline"></span>
                    </div>
                    <h3 class="py-2 text-xl font-semibold">Dịch vụ tốt</h3>
                    <p class="text-sm">
                        Khách hàng đăng ký thông tin để được hỗ trợ tư vấn và thanh toán tại cửa hàng nhanh nhất, số
                        tiền phải thanh toán chưa bao gồm giá trị của gói bảo hành mở rộng
                    </p>
                </div>
                <div class="py-4">
                    <div class="p-3 bg-[#ccc]/10 inline-block rounded-md text-3xl">
                        <span class="iconify" data-icon="uil:shield"></span>
                    </div>
                    <h3 class="py-2 text-xl font-semibold">Bảo mật</h3>
                    <p class="text-sm">
                        Khách hàng đăng ký thông tin để được hỗ trợ tư vấn và thanh toán tại cửa hàng nhanh nhất, số
                        tiền phải thanh toán chưa bao gồm giá trị của gói bảo hành mở rộng
                    </p>
                </div>
                <div class="py-4">
                    <div class="p-3 bg-[#ccc]/10 inline-block rounded-md text-3xl">
                        <span class="iconify" data-icon="icon-park-outline:transporter"></span>
                    </div>
                    <h3 class="py-2 text-xl font-semibold">Vận chuyển</h3>
                    <p class="text-sm">
                        Khách hàng đăng ký thông tin để được hỗ trợ tư vấn và thanh toán tại cửa hàng nhanh nhất, số
                        tiền phải thanh toán chưa bao gồm giá trị của gói bảo hành mở rộn
                    </p>
                </div>
                <div class="py-4">
                    <div class="p-3 bg-[#ccc]/10 inline-block rounded-md text-3xl">
                        <span class="iconify" data-icon="iconamoon:discount"></span>
                    </div>
                    <h3 class="py-2 text-xl font-semibold">Giảm giá</h3>
                    <p class="text-sm">
                        Khách hàng đăng ký thông tin để được hỗ trợ tư vấn và thanh toán tại cửa hàng nhanh nhất, số
                        tiền phải thanh toán chưa bao gồm giá trị của gói bảo hành mở rộng
                    </p>
                </div>
            </div>
        </div>
        <div class="max-w-[1440px] mx-auto px-4 mt-8">
            <h2 class="text-3xl font-bold py-3">Sản phẩm nổi bật</h2>
            <div class="grid grid-cols-5 gap-5">
                <?php
                $selectProducts;
                if (isset($_GET['category'])) {
                    $cate_id = $_GET['category'];
                    $selectProducts = "SELECT * FROM PRODUCTS WHERE CATE_ID=$cate_id";
                } else {
                    $selectProducts = "SELECT * FROM PRODUCTS";
                }
                $products = $dataBase->query($selectProducts);
                foreach ($products as $value) {
                ?>
                    <div>
                        <a href="./product/?id=<?php echo $value['id'] ?>">
                            <div class="bg-white rounded-md">
                                <img class="h-[350px] w-full rounded-sm object-contain" src="/learn_php/<?php echo $value['thumbnail'] ?>" alt="" />
                            </div>
                            <div class="flex items-center px-2 mt-3">
                                <div class="flex-1">
                                    <h2 class="text-xl"><?php echo $value['title'] ?></h2>
                                    <p class="text-xl font-semibold text-[#33A4DB]">
                                        <?php echo number_format($value['price'], 0) ?>đ</p>
                                </div>
                                <div class="text-3xl hover:bg-[#ccc]/50 p-2 rounded-md">
                                    <span class="iconify" data-icon="ion:cart-outline"></span>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php
                }
                ?>
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
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-element-bundle.min.js"></script>
</body>

</html>