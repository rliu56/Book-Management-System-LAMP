<?php
    ob_start();
    session_start(); // use buffer
    header("Content-type:text/html;charset=utf-8");
    $link = mysqli_connect('localhost','root','root','book');
    mysqli_set_charset($link, "utf8");
    if (!$link) {
        die("Failed to connect database:".mysqli_connect_error());}
?>
