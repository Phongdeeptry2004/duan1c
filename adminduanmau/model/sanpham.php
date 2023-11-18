<?php 
function showallsp(){
    $sql="SELECT * FROM `product` WHERE 1";
    return pdo_query($sql);
}
function showonesp($id){
    $sql= "SELECT * FROM `product` WHERE id=".$id;
    return pdo_query($sql);
}
function showallspdm($id_dm){
    $sql= "SELECT * FROM `product` WHERE id_dm=".$id_dm;
    return pdo_query($sql);
}
function xoasp($id){
    $sql = "DELETE FROM `product` WHERE id=".$id;
     pdo_execute($sql);
  }
function searchsp($q){
    $sql = "SELECT * FROM product WHERE name LIKE '%$q%'";
    return pdo_query($sql);
}

  function imageuploadsp(){
    //sử lý file ảnh
    $target_dir = "../view/image/";
    $img = $target_dir . basename($_FILES["img"]["name"]);
    if (move_uploaded_file($_FILES["img"]["tmp_name"], $img)) {
        // echo "The file " . htmlspecialchars(basename($_FILES["img"]["name"])) . " has been uploaded.";
    } else {
        // echo "Sorry, there was an error uploading your file.";
    }
    return($img);
}
function addsp($name,$des,$price,$quantity,$img,$ngaytao,$id_dm,$id_user){
    $sql= "INSERT INTO `product`( `name`, `des`, `price`, `quantity`, `img`, `ngaytao`, `id_dm`, `id_user`)
     VALUES ('$name','$des','$price','$quantity','$img','$ngaytao','$id_dm','$id_user')";
     pdo_execute($sql);
}
function suasp($id,$name,$des,$price,$quantity,$img,$ngaycapnhat,$luotxem,$id_dm,$user){
    $sql="UPDATE `product` SET 
    `name`='$name',`des`='$des',`price`='$price',`quantity`='$quantity',`img`='$img',`ngaycapnhat`='$ngaycapnhat',`luotxem`='$luotxem',`id_dm`='$id_dm',`id_user`='$user' WHERE id=". $id;
    pdo_execute($sql);
}
