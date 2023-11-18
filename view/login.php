<?php 
session_start();
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
    <?php
    if (!isset($_SESSION["user"])) :
    ?>
      <div class="title">
        Đăng Nhập
      </div>
      <form action="login.php" method="post">
        <div class="field">
          <input type="text" name='username' required>
          <label>User Name</label>
        </div>
        <div class="field">
          <input type="password" name='pass' required>
          <label>Password</label>
        </div>
        <div class="content">
          <div class="pass-link">
            <a href="../index.php">Home</a>
          </div>
          <div class="pass-link">
            <a href="#">Quên Mật Khẩu</a>
          </div>

        </div>
        <div class="field">
          <input type="submit" name='submit' value="Đăng Nhập">
        </div>
        <div class="signup-link">
          Chưa Đăng Ký? <a href="signup.php">Đăng Ký Ngay</a>
        </div>
      </form>
    <?php endif;
    if (isset($_SESSION["user"])) :
    ?>
      <div class="title">
        Bạn đã đăng nhập ! Có muốn đăng xuất?
      </div>
      <form action="login.php" method='POST'>
      <div class="field">
          <input type="submit" name='dangxuat' value="Đăng Xuất">
        </div>
      </form>
    <?php endif ?>
  </div>
  <?php
  if (isset($_POST['submit'])) {
    if (isset($_POST['submit'])) {
      $user = $_POST['username'];
      $pass = $_POST['pass'];
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
      // Nếu không có lỗi
      if (empty($error)) {
        foreach (showalltk() as $key) {
          if ($key['user'] == $user && $key['pass'] == $pass) {    
            $user = [
              'username' => $user,
              'password' => $pass,
              'id' => $key['id'],
            ];
            // Thiết lập giá trị cho biến cookie
            $_SESSION['user']=$user;            
            echo 'Đăng nhập thành công';
            header("Location: ../index.php");
            }
            else{
              $error['password'] ='sai mật khẩu hoặc tài khoản'; 
            }
          }
      } else {
        // Hiển thị lỗi
        foreach ($error as $key => $value) {
          echo "<span style='color:red;'> " . $value . "</span>";
        }
      }
    }
  }
  if(isset($_POST["dangxuat"])) {
    unset($_SESSION['user']);
  }

  ?>
</div>