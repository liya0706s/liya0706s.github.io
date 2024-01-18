<?php 
session_start();
// 登出:
unset($_SESSION['login']);

// 回首頁:
header("location:../index.php");

?>