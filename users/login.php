<?php
include '../dao/pdo.php';
include '../global.php';

if (isset($_POST["btn_login"])) {

  //lấy thông tin từ các form bằng phương thức POST

  $username = $_POST["username"];
  $password = $_POST["password"];
  //Kiểm tra điều kiện bắt buộc đối với các field không được bỏ trống
  if ($username == "" || $password == "") {
    echo "bạn vui lòng nhập đầy đủ thông tin";

  } else {
    $sql = "select * from account where USERNAME = '$username' and MATKHAU ='$password'";
    $data = pdo_query_one($sql);
    // dd($data); 
    if ($data) {
      $_SESSION['data_user'] = $data;
      // $_SESSION['taikhoan'] = $data['USERNAME'];
      // $_SESSION['sdt'] = $data['PHONE'];
      // $_SESSION['email'] = $data['EMAIL'];
      // $_SESSION['id'] = $data['ID'];
      chuyenhuongtrangchu_neudadangnhap();
    } else {
      echo "Tài khoản hoặc mật khẩu không đúng!";
    }
  }

}
chuyenhuongtrangchu_neudadangnhap();

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="/public/css/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
</head>

<body style="background-image: url(../img/backround/backrough3.jpg  ); background-size: cover;">
  <div class="container">

    <form class="px-4 py-3" action="./login.php" method="post">
      <img src="../img/logo2.png" alt="">

      <div class="mb-3">
        <label for="exampleDropdownFormEmail1" class="form-label">username</label>
        <input type="text" class="form-control" id="username" required name="username" placeholder="username">
      </div>


      <div class="mb-3">
        <label for="exampleDropdownFormPassword1" class="form-label">Password</label>
        <input type="password" class="form-control" id="pass" required name="password" placeholder="Password">
      </div>

      <div class="form-control-group">
        <div class="form-control-remember">
          <input type="checkbox" name="" class="form-control-checkbox" id="form-checkbox" />
          <label for="form-checkbox" class="form-control-label">Ghi nhớ tài khoản</label>
        </div>

        <a href="./quenmk.html" class="dropdown-signup">Quên mật khẩu ?</a>
      </div>

      <button type="submit" class="btn btn-primary" name="btn_login">Đăng nhập</button>

      <br>

      <div class="form-signup">
        <span class="form-signup">Bạn chưa có tài khoản? / <a class="dropdown-signup" href="./signup.php">Đăng
            ký</a></span>
        <span> /</span>
        <a href="http://localhost/Duan1/cuahangbanh/" class="dropdown-signup">Về Trang Chủ</a>
      </div>

    </form>


  </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

</html>