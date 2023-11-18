<?php 
function showalltk(){
    $sql='SELECT*FROM taikhoan';
    return pdo_query($sql);
}
function showallnv(){
    $sql='SELECT*FROM taikhoan WHERE vaitro= "nhanvien"';
    return pdo_query($sql);
}
function showonetk($id){
    $sql='SELECT*FROM taikhoan WHERE id='.$id;
    return pdo_query($sql);
}
function xoatk($id){
    $sql = "DELETE FROM `taikhoan` WHERE id=".$id;
     pdo_execute($sql);
  }
function addtk($user,$pass,$email,$hoten,$phone,$ngaytao,$vaitro,$avatar){
    $sql= "INSERT INTO `taikhoan`(`user`, `pass`, `email`, `hoten`, `phone`, `ngaytao`, `vaitro`, `avatar`) VALUES 
    ('$user','$pass','$email','$hoten','$phone','$ngaytao','$vaitro','$avatar')";
    pdo_execute($sql);
}
function imageuploadtk(){
    //sử lý file ảnh
    $target_dir = "view/image/avatar/";
    $img = $target_dir . basename($_FILES["img"]["name"]);
    if (move_uploaded_file($_FILES["img"]["tmp_name"], $img)) {
        // echo "The file " . htmlspecialchars(basename($_FILES["img"]["name"])) . " has been uploaded.";
    } else {
        // echo "Sorry, there was an error uploading your file.";
    }
    return($img);
}
function suatk($id,$user,$pass,$email,$hoten,$phone,$vaitro,$avatar){
    $sql="UPDATE `taikhoan` SET 
    `user`='$user',`pass`='$pass',`email`='$email',`hoten`='$hoten',`phone`='$phone',`vaitro`='$vaitro',`avatar`='$avatar' WHERE id=".$id;
    pdo_execute($sql);
}
?>