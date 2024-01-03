<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin shop</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="/learn_php/assignment/assets/config.js" defer></script>
    <script src="https://code.iconify.design/3/3.1.0/iconify.min.js"></script>
</head>

<body>
    <?php
    session_start();
    // Connect DB
    include_once('../config/connectDB.php');
    if (isset($_SESSION['user'])) {
        echo "<script>window.location.href='http://localhost/learn_php/assignment/admin/'</script>";
    }
    ?>
    <div class="container bg-[#0E1628] text-white min-h-screen flex justify-center items-center">
        <form action="" method="POST">
            <h1 class="text-3xl font-semibold">Đăng nhập</h1>
            <div class="mt-5">
                <input class="pl-1 py-2 w-[250px] rounded-md bg-white/300 text-black" type="text" placeholder="user name" name="user">
            </div>
            <div class="mt-5">
                <input class="pl-1 py-2 w-[250px] rounded-md bg-white/300 text-black" type="password" placeholder="password" name="password">
            </div>
            <button class="bg-primary mt-6 px-4 py-2 rounded-md" name="login">Đăng nhập</button>
        </form>
    </div>
    <?php
    // echo md5('anh1234');
    if (isset($_POST['login'])) {
        $password = md5($_POST['password']);
        $user = $_POST['user'];
        $selectAccount = "SELECT * FROM ACCOUNT WHERE USER_NAME='$user'";
        $account = $dataBase->query($selectAccount)->fetch();
        if ($account) {
            if ($account['password'] !== $password) {
                echo "<div class='top-2 left-2 text-white bg-red-500 py-1 px-4 rounded-md absolute'>Password không đúng</div>";
            } else {
                $_SESSION['user'] = $user;
                echo "<script>window.location.href='http://localhost/learn_php/assignment/admin/'</script>";
            }
        } else {
            echo "<div class='top-2 left-2 text-white bg-red-500 py-1 px-4 rounded-md absolute'>User name không đúng</div>";
        }
    }
    ?>
</body>

</html>