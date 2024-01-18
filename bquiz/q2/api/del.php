<?php include_once "../db.php";

// 點擊刪除 get
if(isset($_GET['id'])){
    // 從 URL 的 GET 參數中獲取的 指定id資料
    $Que->del($_GET['id']);
    // 指定條件的資料 subject_id跟主題id一樣的那個編號
    // del()函數如果是陣列的話，會到a2s屬性
    $Que->del(['subject_id'=>$_GET['id']]);
}

header("location:../admin.php");

?>