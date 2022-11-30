<?php
include '../dao/pdo.php';
include '../global.php';
$message = '';
if (isset($_POST['btn_register'])) {
    if ($_POST['username'] == '' || $_POST['email'] == '' || $_POST['phone'] == '' || $_POST['password'] == '') {
        $message = 'vui long dien thong tin';
    } else {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $password = $_POST['password'];

        $query = "insert into account(USERNAME,MATKHAU,EMAIL,PHONE,ROLE) values('$username','$password','$email','$phone',1)";
        $getIdInsert = pdo_execute($query);

        // echo $getIdInsert;

        $message = 'dang ky thanh cong, vui lòng ấn vào <a href="login.php">ĐÂY</a> để về trang đăng nhập';

    }
}





?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
</head>

<body style="background-image: url(../img/backround/backrough3.jpg); background-size: cover;">
    <div class="container">

        <form class="px-4 py-3" action="signup.php" method="POST">
            <img src="../img/logo2.png" alt="">
            <div class="mb-3">
                <label for="exampleDropdownFormEmail1" class="form-label">Tài khoản</label>
                <input type="text" class="form-control" id="username" required name="username" placeholder="username">
            </div>

            <div class="mb-3">
                <label for="exampleDropdownFormPassword1" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="email@example.com">
            </div>

            <div class="mb-3">
                <label for="exampleDropdownFormPassword1" class="form-label">Điện thoại</label>
                <input type="phone" class="form-control" id="phone" name="phone" placeholder="Số phone">
            </div>

            <div class="mb-3">
                <label for="exampleDropdownFormPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" id="pass" name="password" placeholder="Password">
            </div>

            <button type="submit" name="btn_register" class="btn btn-primary dangky">Đăng ký</button>
            <br>

            <div class="form-signup">
                <span class="form-signup">Bạn đã có tài khoản? / <a class="dropdown-signup" href="./login.php">Đăng
                        nhập</a></span>
                <span> /</span>
                <a href="http://localhost/Duan1/cuahangbanh/" class="dropdown-signup">Về Trang Chủ</a>
            </div>
        </form>

        <?php echo $message ?>


    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
    crossorigin="anonymous"></script>

</html>