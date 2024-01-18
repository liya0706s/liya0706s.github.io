<?php
include_once "db.php";
if(!empty($_FILES['img']['tmp_name'])){
    move_uploaded_file($_FILES['img']['tmp_name'],"./img/".$_FILES['img']['name']);
    // 上傳時會有暫時的資料夾和名稱，成功以後，重新命名到img資料夾加上原本的名字(檔名)
    $_POST['img']=$_FILES['img']['name'];
    // 上傳成功才有檔名
}

$_POST['sh']=0;
// 多個圖片，單選的意思，布林值預設是0，只有一筆被選的是1
$Title->save($_POST);
// Title物件執行save函數，將POST的資料存入資料庫

header("location:index.php");
?>