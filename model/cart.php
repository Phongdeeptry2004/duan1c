<?php 
function addsptocart($id_product,$id_user){
    $sql="INSERT INTO `giohang`(`id_user`, `id_product`, `id_variants`, `quantity`) VALUES ('$id_user','$id_product',1,1)";
    pdo_execute($sql);
}
function showcart($id){
    $sql= "SELECT
    giohang.id,
    giohang.id_user,
    giohang.id_product,
    product.img,
    product.name,
    product.price,
    product.quantity as slsp,
    giohang.quantity
  FROM giohang
  INNER JOIN product ON giohang.id_product = product.id where giohang.id_user=$id"; 
  return pdo_query($sql);
}
function xoaspincart($id){
  $sql= "DELETE FROM `giohang` WHERE id=$id";
  pdo_execute($sql);
}
function add1sp($id,$id_user){
  $sql= "UPDATE `giohang` SET `quantity`='quantity'+1 WHERE id=$id AND id_user=$id_user";
  pdo_execute($sql);
}
function quantityspincart($id,$quantity){
  $sql= "UPDATE `giohang` SET `quantity`='$quantity' WHERE id=$id";
  pdo_execute($sql);
}
function updatesl($id_product,$id_user){
$sql  = "UPDATE `giohang` SET `quantity`=`quantity`+1 WHERE `id_product`=$id_product AND `id_user`=$id_user" ;
pdo_execute($sql);
}
function showidtocart($id_user){
  $sql= "SELECT id_product FROM `giohang` WHERE id_user=$id_user";
  return pdo_query($sql);
}
function showsltocart($id_user,$id_product){
  $sql= "SELECT quantity FROM `giohang` WHERE id_user=$id_user AND id_product=$id_product";
  return pdo_query($sql);
}

function countsp($id_user){
  $sql = "SELECT COUNT(id_product) as 'sl' FROM `giohang` WHERE id_user=$id_user";
  return pdo_query($sql);
}