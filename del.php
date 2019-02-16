<?php
include("connection.php");
require_once('ly_check.php');
$sql = "DELETE FROM tb_books where id='".$_GET['id']."'";
$arry=mysqli_query($link,$sql);
if($arry){
    echo "<script> alert('Successfully removed.');location='list.php';</script>";
}
else
    echo "Falied to remove.";
?>
