<?php 
function showallcolor(){
    $sql = "SELECT * FROM color ";
    return  pdo_query($sql);
}
function showallsize(){
  $sql = "SELECT * FROM size ";
  return  pdo_query($sql);
}
function xoacolor($id){
  $sql = "DELETE FROM `color` WHERE id=".$id;
   pdo_execute($sql);
}
function xoasize($id){
  $sql = "DELETE FROM `size` WHERE id=".$id;
   pdo_execute($sql);
}
function themcolor($color){
  $sql = "INSERT INTO `color`(`name`) VALUES ('$color')";
  pdo_execute($sql);
}
function themsize($size){
  $sql = "INSERT INTO `size`(`name`) VALUES ('$size')";
  pdo_execute($sql);
}
function showonecolor($id){
  $sql = "SELECT * FROM color WHERE id=".$id;
  return pdo_query($sql);
}
function   updatecolor($color,$id){
  $sql = "UPDATE `color` SET `name`='$color' WHERE id=".$id;
  pdo_execute($sql);
}
function showonesize($id){
  $sql = "SELECT * FROM size WHERE id=".$id;
  return pdo_query($sql);
}
function   updatesize($size,$id){
  $sql = "UPDATE `size` SET `name`='$size' WHERE id=".$id;
  pdo_execute($sql);
}