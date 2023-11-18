<?php 
include("../model/taikhoan.php");
include("../model/pdo.php");
?>
<style>
  @import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap');

  * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
  }

  html,
  body {
    display: grid;
    height: 100%;
    width: 100%;
    place-items: center;
    /* background: #f2f2f2; */
    /* background: linear-gradient(-135deg, #c850c0, #4158d0); */
  }

  ::selection {
    background: #4158d0;
    color: #fff;
  }

  .wrapper {
    width: 380px;
    background: #fff;
    border-radius: 15px;
    box-shadow: 0px 15px 20px rgba(0, 0, 0, 0.1);
  }

  .wrapper .title {
    font-size: 35px;
    font-weight: 600;
    text-align: center;
    line-height: 100px;
    color: #fff;
    user-select: none;
    border-radius: 15px 15px 0 0;
    background: #d19c97;
    ;
  }

  .wrapper form {
    padding: 10px 30px 50px 30px;
  }

  .wrapper form .field {
    height: 50px;
    width: 100%;
    margin-top: 20px;
    position: relative;
  }

  .wrapper form .field input {
    height: 100%;
    width: 100%;
    outline: none;
    font-size: 17px;
    padding-left: 20px;
    border: 1px solid lightgrey;
    border-radius: 25px;
    transition: all 0.3s ease;
  }

  .wrapper form .field input:focus,
  form .field input:valid {
    border-color: #4158d0;
  }

  .wrapper form .field label {
    position: absolute;
    top: 50%;
    left: 20px;
    color: #999999;
    font-weight: 400;
    font-size: 17px;
    pointer-events: none;
    transform: translateY(-50%);
    transition: all 0.3s ease;
  }

  form .field input:focus~label,
  form .field input:valid~label {
    top: 0%;
    font-size: 16px;
    color: #4158d0;
    background: #fff;
    transform: translateY(-50%);
  }

  form .content {
    display: flex;
    width: 100%;
    height: 50px;
    font-size: 16px;
    align-items: center;
    justify-content: space-around;
  }

  form .content .checkbox {
    display: flex;
    align-items: center;
    justify-content: center;
  }

  form .content input {
    width: 15px;
    height: 15px;
    background: red;
  }

  form .content label {
    color: #262626;
    user-select: none;
    padding-left: 5px;
  }

  form .content .pass-link {
    color: "";
  }

  form .field input[type="submit"] {
    color: #fff;
    border: none;
    padding-left: 0;
    margin-top: -10px;
    font-size: 20px;
    font-weight: 500;
    cursor: pointer;
    background: #d19c97;
    ;
    transition: all 0.3s ease;
  }

  form .field input[type="submit"]:active {
    transform: scale(0.95);
  }

  form .signup-link {
    color: #262626;
    margin-top: 20px;
    text-align: center;
  }

  form .pass-link a,
  form .signup-link a {
    color: #4158d0;
    text-decoration: none;
  }

  form .pass-link a:hover,
  form .signup-link a:hover {
    text-decoration: underline;
  }

  .divgiua {
    margin: 50px 0 20px 0;
    place-items: center;
    background-color: #f2f2f2;
  }
</style>
<div class="divgiua">
  <div class="wrapper">
    <div class="title">
      Đăng Ký
    </div>
    <form action="signup.php" method="Post">
      <div class="field">
        <input type="text" name='username' required>
        <label>User Name</label>
      </div>
      <div class="field">
        <input type="password" name='pass' required>
        <label>Password</label>
      </div>
      <div class="field">
        <input type="text" name='name' required>
        <label>Họ Tên</label>
      </div>
      <div class="field">
        <input type="email" name='email' required>
        <label>Email</label>
      </div>
      <div class="field">
        <input type="text" name='phone' required>
        <label>Số Điện Thoại</label>
      </div>
      <div class="field">
        <input type="submit" name='submit' value="Đăng Nhập">
      </div>
      <div class="signup-link">
        Là Thành Viên Rồi ? <a href="login.php">Đăng Nhập Ngay</a>
      </div>
    </form>
  </div>
  <?php
 if (isset($_POST['submit'])) {
  // Lấy các trường trong form
  $user = $_POST['username'];
  $pass = $_POST['pass'];
  $email = $_POST['email'];
  $name = $_POST['name'];
  $phone = $_POST['phone'];
  $ngaytao = date('Y-m-d H:i:s');
  $vaitro='nguoidung';
  $avatar='';
  // Validate username
  if (empty($user)) {
    $error['username'] = 'Username không được để trống';
  } else if (!preg_match('/^[a-zA-Z0-9_-]{3,}$/', $user)) {
    $error['username'] = 'Username chỉ được chứa các ký tự chữ cái, số, dấu gạch dưới và dấu gạch ngang, từ 3 đến 20 ký tự';
  }

  // Validate password
  if (empty($pass)) {
    $error['password'] = 'Password không được để trống';
  } else if (!preg_match('/^[a-zA-Z0-9_]{6,}$/', $pass)) {
    $error['password'] = 'Password phải chứa ít nhất 6 ký tự, chỉ được chứa các ký tự chữ cái và số';
  }

  // Validate name
  if (empty($name)) {
    $error['name'] = 'Họ tên không được để trống';
  }
  // } else if (!preg_match('/^[a-zA-Z\s]+$/', $name)) {
  //   $error['name'] = 'Họ tên chỉ được chứa các ký tự chữ cái và dấu cách';
  // }
  //vadidate email
  if (empty($email)) {
    $error['email'] = 'Email không được để trống';
  } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $error['email'] = 'Email không hợp lệ';
  }
  // Validate phone
  if (empty($phone)) {
    $error['phone'] = 'Số điện thoại không được để trống';
  } else if (!preg_match('/^[0-9]{10}$/', $phone)) {
    $error['phone'] = 'Số điện thoại phải chứa 10 ký tự số';
  }

  // Nếu không có lỗi
  if (empty($error)) {
    addtk($user,$pass,$email,$name,$phone,$ngaytao,$vaitro,$avatar);
    echo "Đăng Ký Thành Công";
    
  } else {
    // Hiển thị lỗi
    foreach ($error as $key => $value) {
      echo "<span style='color:red;'>" . $key . ": " . $value . "</span>";
    }
  }
}
  ?>
</div>