<?php 
function showalldanhmuc(){
    $sql="SELECT * FROM danhmuc ";
    return pdo_query($sql); 
}
function xoadm($id){
    $sql = "DELETE FROM `danhmuc` WHERE id=".$id;
     pdo_execute($sql);
  }
function adddm($tendanhmuc,$ngaytao,$mota){
    $sql = "INSERT INTO `danhmuc`( `name`, `ngaytao`, `motadanhmuc`) VALUES ('$tendanhmuc','$ngaytao','$mota')";
    pdo_execute($sql);
}
function showonedm( $id ){
    $sql = "SELECT * FROM danhmuc WHERE id=".$id;
    return pdo_query($sql);
}
function updatedm($id,$tendanhmuc,$ngaytao,$mota){
    $sql = "UPDATE `danhmuc` SET `name`='$tendanhmuc',`ngaytao`='$ngaytao',`motadanhmuc`='$mota' WHERE id=$id";
    pdo_execute($sql);
}
?>