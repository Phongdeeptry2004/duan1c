        <?php
        include("model/donhang.php");
        session_start();
        include("model/pdo.php");
        include("model/sanpham.php");
        include("model/binhluan.php");
        include("model/danhgia.php");
        include("model/taikhoan.php");
        include("model/varians.php");
        include("model/danhmuc.php");
        include("model/cart.php");
        include "view/header.php";
        if (isset($_GET['act']) && $_GET['act'] != "") {
            $act = $_GET['act'];
            switch ($act) {
                case "allsanpham":
                    include "view/menu.php";
                    if(isset($_POST['price'])){
                        $range=$_POST['price'];
                    }else{
                        $range="";
                    }
                    if(isset($_GET['sx'])){
                        $sx=$_GET['sx'];
                    }else{
                        $sx="";
                    }
                    if (isset($_POST['kyw']) && $_POST['kyw'] != "") {
                        $kyw = $_POST['kyw'];
                    } else {
                        $kyw = "";
                    }
                    include "view/allsanpham.php";
                    break;
                case "contact":
                    include "view/menu.php";
                    include "view/contact.php";
                    break;
                case "spdanhmuc":
                    if (isset($_GET["iddm"]) && $_GET['iddm'] != 0) {
                        include "view/menu.php";
                        $tendm = load_ten_dm($_GET['iddm']);
                        include "view/sanphamdm.php";
                    }
                    break;
                case "sanphamct":
                    if (isset($_GET['id']) && $_GET['id'] != 0) {
                        $id = $_GET['id'];
                        update_luotxem($id);
                        include "view/menu.php";
                        include "view/sanphamct.php";
                    }
                    break;
                case "dangxuat":
                    unset($_SESSION['user']);
                    header('Location: index.php');
                    break;
                case "infouser":
                    include("view/menu.php");
                    include "view/inforuser.php";
                    break;
                case 'updateinfor':
                    if (isset($_POST['submit'])) {
                        $id = $_SESSION['user']['id'];
                        $avatar = imageuploadtk();
                        $name = $_POST['hoten'];
                        $email = $_POST['email'];
                        $phone = $_POST['phone'];
                        suainforuser($id, $email, $name, $phone, $avatar);
                        header("Location: index.php?act=infouser");
                    }
                    break;
                case 'cart':
                    include("view/menu.php");
                    include("view/cart.php");
                    break;

                case "checksptocart":
                    $id_user = $_SESSION["user"]["id"];
                    $id_product = $_GET["id"];
                    $id_cart = showidtocart($id_user);
                    $slsp = showslsp($id_product);
                    $slspincart = showsltocart($id_user, $id_product);
                    if (array_column($slsp, 'quantity') > array_column($slspincart, 'quantity')) {
                        header('Location:index.php?act=addsptocart&id=' . $id_product);
                    } else {
                        echo '<script>
                              var error = document.createElement("div");
                               error.innerHTML = "Số lượng sản phẩm trong giỏ hàng vượt quá số lượng sản phẩm hiện có trong kho!";
                               error.className = "alert alert-danger";
                               document.body.appendChild(error);
                            </script>';
                    }
                    include "view/menu.php";
                    if (isset($_POST['kyw']) && $_POST['kyw'] != "") {
                        $kyw = $_POST['kyw'];
                    } else {
                        $kyw = "";
                    }
                    include "view/allsanpham.php";
                    break;
                case "addsptocart":
                    $id_user = $_SESSION["user"]["id"];
                    $id_product = $_GET["id"];
                    $id_cart = showidtocart($id_user);
                    $slsp = showslsp($id_product);
                    $slspincart = showsltocart($id_user, $id_product);
                    if (in_array($id_product, array_column($id_cart, 'id_product'))) {
                        updatesl($id_product, $id_user);
                    } else {
                        addsptocart($id_product, $id_user);
                    }
                    header('Location:index.php?act=cart');
                    break;
                case 'xoaspincart':
                    $id = $_GET['id'];
                    xoaspincart($id);
                    include("view/menu.php");
                    include("view/cart.php");
                    break;
                case 'quantityspincart':
                    $id = $_POST['id'];
                    $quantity = $_POST['quantity'];
                    quantityspincart($id, $quantity);
                    include("view/menu.php");
                    include("view/cart.php");
                    break;
                case 'formcheckout':
                    include("view/menu.php");
                    include("view/checkout.php");
                    break;
                case 'checkout':
                    $id_user = $_SESSION['user']['id'];
                    $hoten = $_POST['hoten'];
                    $email = $_POST['email'];
                    $phone = $_POST['phone'];
                    $diachi = $_POST['sonha'] . ' ' . $_POST['huyen'] . ' ' . $_POST['thanhpho'];
                    $pay = $_POST['payment'];
                    $ngaydathang = date('Y-m-d H:i:s');
                    $ngaygiaohang = date('Y-m-d H:i:s', strtotime($ngaydathang . ' +3 days'));
                    $total = $_POST['total'];
                    adddh($id_user, $ngaydathang, $ngaygiaohang, $hoten, $diachi, $phone, $email, $pay, $total);
                    $cart = showcart($_SESSION["user"]["id"]);
                    // print_r($cart);
                    $sp = showalldhbyid($_SESSION["user"]["id"]);
                    $last_row = end($sp);
                    $id_dh = reset($last_row);
                    foreach ($cart as $key) {
                        $id = $key["id"];
                        $id_product = $key['id_product'];
                        $soluong = $key['quantity'];
                        $total = $key['quantity'] * $key['price'];
                        addctdh($id_dh, $id_product, $soluong, $total);
                        truslsp($id_product, $soluong);
                        xoaspincart($id);
                    }
                    include("view/menu.php");
                    include('view/donhangdadat.php');
                    break;
                case 'dangdg':
                    if (isset($_POST['submit'])) {
                        if ($_SESSION['user']) {
                            $id_user = $_SESSION['user']['id'];
                            $id_product = $_POST['id_product'];
                            $showctdh = showdhctbyid($id_product);
                            echo $showctdh[0]['id'];
                            if (in_array($id_user, array_column($showctdh, 'id_user'))) {
                                if($showctdh[0]['danhgia']=='not'){
                                $noidung = $_POST['noidung'];
                                $star = $_POST['rating'];
                                $ngaydang = date('Y-m-d H:i:s');
                                adddg($id_user, $id_product, $star, $noidung, $ngaydang);
                                updatettdanhgia($showctdh[0]['id']);
                                $_SESSION['err'] = '<script>
                                document.getElementById("error").innerHTML = "Đánh giá thành công!";
                                document.getElementById("error").className = "form-group alert alert-success";
                              </script>';
                                header('Location:index.php?act=sanphamct&id=' . $id_product);
                                }
                                else{
                                    $_SESSION['err'] = '<script>
                                    document.getElementById("error").innerHTML = "Bạn đã đánh giá rồi!";
                                    document.getElementById("error").className = "form-group alert alert-danger";
                                  </script>';
                                  header('Location:index.php?act=sanphamct&id=' . $id_product);
                                }
                            } else {
                                $_SESSION['err'] = '<script>
                                document.getElementById("error").innerHTML = "Bạn chưa mua sản phẩm này nên không đánh giá được!";
                                document.getElementById("error").className = "form-group alert alert-danger";
                              </script>';
                              header('Location:index.php?act=sanphamct&id=' . $id_product);
                            }
                        } else {
                            $_SESSION['err'] = $errdg = '<script>
                            var error = document.createElement("div");
                             error.innerHTML = "Vui lòng đăng nhập để đánh giá sản phẩm!";
                             error.className = "alert alert-danger";
                             document.body.appendChild(error);
                          </script>';
                        }
                    }

                    break;
                case 'dhdadat':
                    include("view/menu.php");
                    include('view/donhangdadat.php');
                    break;
                case 'ctdonhang':
                    if(isset($_SESSION['user'])){
                        $id=$_SESSION['user']['id'];
                        include('view/menu.php');
                        include('view/ctdonhang.php');
                    }
                    break;
                case 'filtersp':
                    include "view/menu.php";
                    if (isset($_POST['kyw']) && $_POST['kyw'] != "") {
                        $kyw = $_POST['kyw'];
                    } else {
                        $kyw = "";
                    }
                    include "view/filtersp.php";
                    break;
                case 'test':
                    $id_product=$_GET['id'];
                    $showctdh = showdhctbyid($id_product);
                    echo $showctdh[0]['danhgia'] ;
                    var_dump($showctdh[0]['danhgia']=='not');
                    echo $showctdh[0]['id'];
                    include('view/menu.php');
                    include('view/test.php');
                    break;
                case 'upcomment':
                    $id_product = $_POST['id_product'];
                    if (isset($_POST['submit'])) {
                        $id_user = $_POST['id_user'];
                        $id_product = $_POST['id_product'];
                        $noidung = $_POST['noidung'];
                        $ngaydang = date('Y-m-d H:i:s');
                        addbl($id_user, $id_product, $noidung, $ngaydang);
                    }
                    header('location:index.php?act=sanphamct&id=' . $id_product);
                    break;
                case 'xoabl':
                    $id_bl = $_GET['id_bl'];
                    $id_product = $_GET['id_product'];
                    xoabl($id_bl);
                    header('Location: index.php?act=sanphamct&id=' . $id_product);
                    break;
                default:
                    include "view/menuslide.php";
                    include "view/home.php";
            }
        } else {
            include "view/menuslide.php";
            include "view/home.php";
        }
        include "view/footer.php";
        ?>
