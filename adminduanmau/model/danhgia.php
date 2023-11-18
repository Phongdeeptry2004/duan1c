<?php 
function showalldg(){
    $sql="SELECT `danhgia`.*, `taikhoan`.`hoten` AS `tennguoidanhgia`, `product`.`name` AS `tensanpham`
    FROM `danhgia`
    INNER JOIN `taikhoan`
    ON `danhgia`.`id_user` = `taikhoan`.`id`
    INNER JOIN `product`
    ON `danhgia`.`id_product` = `product`.`id`;";
    return pdo_query($sql);
}
function showonedg($id){
    $sql="SELECT * FROM danhgia WHERE id=".$id;
    return pdo_query($sql);
}
function   xoadg($id){
    $sql = "DELETE FROM `danhgia` WHERE id=".$id;
    pdo_execute($sql);
}
function adddg($id_user,$id_product,$star,$noidung,$ngaydang){
    $sql="INSERT INTO `danhgia`(`id_user`, `id_product`,`star`, `noidung`, `ngaydang`) 
    VALUES ('$id_user','$id_product','$star','$noidung','$ngaydang')";
    pdo_execute($sql);
}
function suadg($id,$id_user,$id_product,$star,$noidung,$ngaysua){
        $sql= "UPDATE `danhgia` SET `id_user`='$id_user',`id_product`='$id_product',`star`='$star',`noidung`='$noidung',`ngaysua`='$ngaysua' WHERE id=$id";
    pdo_execute($sql);
    }
