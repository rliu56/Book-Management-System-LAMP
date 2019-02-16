<?php
require_once("connection.php");  //connection config
if($_SESSION["admin"]=="")
{
    echo "<script language=javascript>alert('Please log in again! ');window.location='login.php'</script>";
}
?>
