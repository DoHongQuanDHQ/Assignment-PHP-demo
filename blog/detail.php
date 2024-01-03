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
        $selectDetailBlog = "SELECT * FROM BLOG WHERE ID=$id";
        $detailBlog = $dataBase->query($selectDetailBlog)->fetch();
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
                        $selectCategoryBlog = "SELECT * FROM CATE_BLOG";
                        $category = $dataBase->query($selectCategoryBlog);
                        foreach ($category as $key => $value) {
                        ?>
                            <a class="hover:text-[#33A4DB] font-medium" href="/learn_php/assignment/blog?category=<?php echo $value['cate_id'] ?>"><?php echo $value['cate_name'] ?></a>
                        <?php
                        } ?>
                        <a class="hover:text-[#33A4DB] font-semibold" href="/learn_php/assignment">Cửa hàng</a>
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
        <div class="">
            <div class="max-w-4xl mx-auto mt-5">
                <h1 class="text-3xl font-semibold py-4">
                    <?php echo $detailBlog['title'] ?>
                </h1>
                <img class="rounded-lg" src="/learn_php/<?php echo $detailBlog['thumbnail'] ?>" alt="">
                <div>
                    <div class="mt-5">
                        <?php echo $detailBlog['content'] ?>
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