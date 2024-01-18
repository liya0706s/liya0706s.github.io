<?php
include_once "db.php";

// 檢查是否有從 "upload_title.php" 來的 POST 資料中包含了 'id' 欄位
if(isset($_POST['id'])){
// 根據 POST 來的 'id' 查詢相應的資料
$row=$Title->find($_POST['id']);

    // 檢查是否有上傳檔案，即檢查是否有 'img' 欄位且 'tmp_name' 不為空
    if(!empty($_FILES['img']['tmp_name'])){
    move_uploaded_file($_FILES['img']['tmp_name'],'./img/'.$_FILES['img']['name']);
    // 更新資料庫中的 'img' 欄位為新上傳檔案的檔案名稱
    $row['img']=$_FILES['img']['name'];
     // 呼叫 Title 物件的 save 方法，保存更新後的資料
    $Title->save($row);
    }
}

header("location:index.php");

?>