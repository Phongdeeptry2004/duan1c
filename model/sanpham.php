<?php 
function showallsp(){
    $sql="SELECT * FROM `product` WHERE 1";
    return pdo_query($sql);
}
function showspbypage($page,$kyw,$range,$sx) {
    $sql="SELECT * FROM `product` WHERE 1";
    if($kyw!=""){   
        $sql.=" AND `name` LIKE '%".$kyw."%'";
        return pdo_query($sql); 
    }
    if($range!=""){  
            $sql.=" AND price BETWEEN $range AND ".$range+100;
            return pdo_query($sql); 
    }
    if($sx!=""){
        if($sx=="moinhat"){
            $sql.=" ORDER BY ngaytao ASC";
            return pdo_query($sql); 
        }elseif($sx=="giathap"){
            $sql.=" ORDER BY price ASC";
            return pdo_query($sql); 
        }else {
            $sql.=" ORDER BY price DESC";
            return pdo_query($sql); 
        }
    }
    $limit = 12;
    $offset = ($page - 1) * $limit;
    $sql.= " LIMIT $offset, $limit";
    return pdo_query($sql); 

}
function  filtersp($range){
    $sql= "SELECT *
    FROM products
    WHERE price BETWEEN $range AND ".$range+100;
    return pdo_query($sql);
}
function pagenumbers(){
    $sql= "SELECT COUNT(id) as slsp FROM `product` WHERE 1;";
    return pdo_query($sql);
}

function show8sp(){
    $sql="SELECT * FROM `product` ORDER BY `product`.`luotxem` DESC LIMIT 8 ";
    return pdo_query($sql);
}
function showspbydate(){
    $sql="SELECT * FROM `product` ORDER BY `product`.`ngaytao` DESC LIMIT 8";
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
  function countsp1($key){
    $sql= "SELECT COUNT(quantity) as sl FROM `product` ";
    if($key!= ""){
        $sql.= "WHERE  $key < price AND price < ".$key+100;
    }
    return pdo_query($sql);
  }

function searchsp($q){
    $sql = "SELECT * FROM product WHERE name LIKE '%$q%'";
    return pdo_query($sql);
}
function truslsp($id,$quantity){
    $sql="UPDATE `product` SET `quantity`=quantity-$quantity WHERE id=$id";
    pdo_execute($sql);
}
  function imageuploadsp(){
    //sử lý file ảnh
    $target_dir = "view/image/";
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
function update_luotxem($id) {
    pdo_execute("UPDATE `product`SET `luotxem`= `luotxem`+ 1 WHERE `id`=".$id);
}
function load_ten_dm($iddm) {
    if($iddm>0){
    $dm=pdo_query("SELECT * FROM `danhmuc` WHERE `id`=".$iddm);
    return $dm;
    }else{
    return "";
}
}
function showslsp($id_product){
    $sql= "SELECT `quantity` FROM `product` WHERE id=$id_product";
    return pdo_query($sql);
}