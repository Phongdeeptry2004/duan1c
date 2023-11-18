<?php
include("view/header.php");
include("model/donhang.php");
include("model/pdo.php");
include("model/sanpham.php");
include("model/binhluan.php");
include("model/danhgia.php");
include("model/taikhoan.php");
include("model/varians.php");
include("model/danhmuc.php");
include("view/menu.php");
if (isset($_GET['act']) && $_GET['act']) {
    $act = $_GET['act'];
    switch ($act) {
            //danh mục
        case 'listdm':
            include('control/danhmuc/list.php');
            break;
        case 'dmaddform':
            include('control/danhmuc/add.php');
            break;
        case 'adddm':
            if (isset($_POST['tendanhmuc'])) {
                $tendanhmuc = $_POST['tendanhmuc'];
                $mota = $_POST['mota'];
                $ngaytao = date('Y-m-d H:i:s');
                adddm($tendanhmuc, $ngaytao, $mota);
            }
            include('control/danhmuc/list.php');
            break;
        case 'suadm':
            include('control/danhmuc/fixdm.php');
            break;
        case 'updatedm':
            if (isset($_POST['id'])) {
                $id = $_POST['id'];
                $tendanhmuc = $_POST['tendanhmuc'];
                $mota = $_POST['mota'];
                $ngaytao = $_POST['ngaytao'];
                updatedm($id, $tendanhmuc, $ngaytao, $mota);
            }
            include('control/danhmuc/list.php');

            break;
        case 'xoadm':
            if (isset($_GET['id']) && $_GET['id']) {
                $id = $_GET['id'];
                xoadm($id);
            }
            include('control/danhmuc/list.php');
            break;
            //end danh mục

            //-----------------------------------------------------------------------------------------

            //Sản phẩm
        case 'listsp':
            include('control/sanpham/list.php');
            break;
        case 'xoasp':
            if ($_GET['id']) {
                $id = $_GET['id'];
                xoasp($id);
            }
            include('control/sanpham/list.php');
            break;
        case 'addsp':
            include('control/sanpham/add.php');
            break;
        case 'themsp':
            if (isset($_POST['submit'])) { {
                    $name = $_POST['name'];
                    $des = $_POST['mota'];
                    $price = $_POST['price'];
                    $quantity = $_POST['quantity'];
                    $img = imageuploadsp();
                    $ngaytao = date('Y-m-d H:i:s');
                    $id_dm = $_POST['danhmuc'];
                    $user = 1;
                    addsp($name, $des, $price, $quantity, $img, $ngaytao, $id_dm, $user);
                }
                include('control/sanpham/list.php');
            }
            break;
        case 'fixform':
            include('control/sanpham/suasp.php');
            break;
        case 'suasp':
            if (isset($_POST['submit'])) { {
                    $id = $_POST['id'];
                    $name = $_POST['name'];
                    $des = $_POST['mota'];
                    $price = $_POST['price'];
                    $quantity = $_POST['quantity'];
                    $img = imageuploadsp();
                    $ngaycapnhat = date('Y-m-d H:i:s');
                    $luotxem = $_POST['luotxem'];
                    $id_dm = $_POST['danhmuc'];
                    $user = 1;
                    suasp($id, $name, $des, $price, $quantity, $img, $ngaycapnhat, $luotxem, $id_dm, $user);
                }
                include('control/sanpham/list.php');
            }
            break;
        case 'searchsp':
            if (isset($_POST['q'])) {
                $q = $_POST['q'];
            } else $q = '';
            include('control/sanpham/search.php');
            break;
            //end sản phẩm
            //-----------------------------------------------------------------------------------------
            //Biến thể
        case 'listbt':
            include('control/varians/list.php');
            break;
        case 'xoasize':
            if (isset($_GET['id']) && $_GET['id']) {
                $id = $_GET['id'];
                xoasize($id);
            }
            include('control/varians/list.php');
            break;
        case 'xoacolor':
            if (isset($_GET['id']) && $_GET['id']) {
                $id = $_GET['id'];
                xoacolor($id);
            }
            include('control/varians/list.php');
            break;
        case 'formaddva':
            include('control/varians/add.php');
            break;
        case 'addcolor':
            if (isset($_POST['color']) && $_POST['color']) {
                $color = $_POST['color'];
                themcolor($color);
            }
            include('control/varians/list.php');
            break;
        case 'addsize':
            if (isset($_POST['size']) && $_POST['size']) {
                $size = $_POST['size'];
                themsize($size);
            }
            include('control/varians/list.php');
            break;
        case 'suacolor':
            include('control/varians/fixcolor.php');
            break;
        case 'fixcolor':
            if (isset($_POST['id']) && $_POST['id']) {
                $color = $_POST['color'];
                $id = $_POST['id'];
                updatecolor($color, $id);
            }
            include('control/varians/list.php');
            break;
        case 'suasize':
            include('control/varians/fixsize.php');
            break;
        case 'fixsize':
            if (isset($_POST['id']) && $_POST['id']) {
                $color = $_POST['size'];
                $id = $_POST['id'];
                updatesize($color, $id);
            }
            include('control/varians/list.php');
            break;
        case "formaddpv":
            include('control/varians/addpv.php');
            break;
        case 'addpv':
            if (isset($_POST['submit'])) {
                $id_product = $_POST['id_product'];
                $id_color = $_POST['id_color'];
                $id_size = $_POST['id_size'];
                $quantity = $_POST['quantity'];
                $date=date('Y-m-d H:i:s');
                $price = $_POST['price'];
                addpv($id_product,$id_size,$id_color,$quantity,$date,$price);
                include('control/varians/addpv.php');
            }
            break;
            //end biến thể   
            //-----------------------------------------------------------------------------------------
            //Tài khoản
        case 'listkh':
            include('control/taikhoan/list.php');
            break;
        case 'xoatk':
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                xoatk($id);
            }
            include('control/taikhoan/list.php');
            break;
        case 'formaddtk':
            include('control/taikhoan/add.php');
            break;
        case 'addtk':
            if (isset($_POST['submit'])) {
                $user = $_POST['user'];
                $pass = $_POST['pass'];
                $hoten = $_POST['hoten'];
                $email = $_POST['email'];
                $ngaytao = date('Y-m-d H:i:s');
                $avatar = imageuploadtk();
                $phone = $_POST['phone'];
                $vaitro = $_POST['vai-tro'];
                addtk($user, $pass, $email, $hoten, $phone, $ngaytao, $vaitro, $avatar);
            }
            include('control/taikhoan/list.php');
            break;
        case 'fixformtk':
            include('control/taikhoan/suatk.php');
            break;
        case 'suatk':
            if (isset($_POST['submit'])) {
                $id = $_POST['id'];
                $user = $_POST['user'];
                $pass = $_POST['pass'];
                $hoten = $_POST['hoten'];
                $email = $_POST['email'];
                $avatar = imageuploadtk();
                $phone = $_POST['phone'];
                $vaitro = $_POST['vai-tro'];
                suatk($id, $user, $pass, $email, $hoten, $phone, $vaitro, $avatar);
            }
            include('control/taikhoan/list.php');
            break;
        case 'listnv':
            include('control/nhanvien/list.php');
            break;
            //end tài khoản 
            //-------------------------------------------------------------------------
            //Đơn hàng
        case 'listdh':
            include('control/donhang/list.php');
            break;
        case 'formadddh':
            include('control/donhang/add.php');
            break;
        case 'adddh':
            if (isset($_POST['submit'])) {
                $id_user = $_POST['id_user'];
                $ngaydathang = $_POST['ngaydathang'];
                $ngaygiaohang = $_POST['ngaygiaohang'];
                $hoten = $_POST['name'];
                $address = $_POST['address'];
                $phone = $_POST['phone'];
                $email = $_POST['email'];
                $pay = $_POST['pay'];
                $tong = $_POST['tong'];
                adddh($id_user, $ngaydathang, $ngaygiaohang, $hoten, $address, $phone, $email, $pay, $tong);
            }
            include('control/donhang/list.php');
            break;
        case 'xoadh':
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                xoadh($id);
            }
            include('control/donhang/list.php');
            break;
        case 'formfixdh':
            include('control/donhang/suadh.php');
            break;
        case 'suadh':
            if (isset($_POST['submit'])) {
                $id = $_POST['id'];
                $hoten = $_POST['hoten'];
                $phone = $_POST['phone'];
                $address = $_POST['address'];
                $ngaydathang = $_POST['ngaydathang'];
                $ngaygiaohang = $_POST['ngaygiaohang'];
                $pay = $_POST['pay'];
                $trangthai = $_POST['trangthai'];
                suadh($hoten, $phone, $address, $ngaydathang, $ngaygiaohang, $pay, $trangthai, $id);
            }
            include('control/donhang/list.php');
            break;
        case 'trangthaidh':

            break;
            //end đơn hàng 
            //============================================================================================================================
            //Bình luận    
        case 'listbl':
            include('control/binhluan/list.php');
            break;
        case 'formaddbl':
            include('control/binhluan/add.php');
            break;
        case 'addbl':
            if (isset($_POST['submit'])) {
                $id_user = $_POST['id_user'];
                $id_product = $_POST['id_product'];
                $noidung = $_POST['noidung'];
                $ngaydang = date('Y-m-d H:i:s');
                addbl($id_user, $id_product, $noidung, $ngaydang);
            }
            include('control/binhluan/list.php');
            break;
        case 'xoabl':
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                xoabl($id);
            }
            include('control/binhluan/list.php');
            break;
        case 'fixformbl':
            include('control/binhluan/suabl.php');
            break;
        case 'suabl':
            if (isset($_POST['submit'])) {
                $id = $_POST['id'];
                $id_user = $_POST['id_user'];
                $id_product = $_POST['id_product'];
                $noidung = $_POST['noidung'];
                $ngaysua = date('Y-m-d H:i:s');
                suabl($id, $id_user, $id_product, $noidung, $ngaysua);
            }
            include('control/binhluan/list.php');
            break;
            //End Bình Luận 
            ///=================================================================================================================================
            //Đánh giá
        case 'listdg':
            include('control/danhgia/list.php');
            break;
        case 'formadddg':
            include('control/danhgia/add.php');
            break;
        case 'adddg':
            if (isset($_POST['submit'])) {
                $id_user = $_POST['id_user'];
                $id_product = $_POST['id_product'];
                $star = $_POST['star'];
                $noidung = $_POST['noidung'];
                $ngaydang = date('Y-m-d H:i:s');
                adddg($id_user, $id_product, $star, $noidung, $ngaydang);
            }
            include('control/danhgia/list.php');
            break;
        case 'xoadg':
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                xoadg($id);
            }
            include('control/danhgia/list.php');
            break;
        case 'fixformdg':
            include('control/danhgia/suabl.php');
            break;
        case 'suadg':
            if (isset($_POST['submit'])) {
                $id = $_POST['id'];
                $id_user = $_POST['id_user'];
                $id_product = $_POST['id_product'];
                $star = $_POST['star'];
                $noidung = $_POST['noidung'];
                $ngaysua = date('Y-m-d H:i:s');
                suadg($id, $id_user, $id_product, $star, $noidung, $ngaysua);
            }
            include('control/danhgia/list.php');
            break;
            //end đánh giá
            //========================================================================
        case 'listicon':
            include('view/icon.php');
            break;
        default:
            include('view/home.php');
    }
} else {
    include('view/home.php');
}

include("view/footer.php");
