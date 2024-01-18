<?php
include_once "db.php";
dd($_POST);
// 在db.php 列出所有陣列

// Array
// (
//     [text] => Array
//         (
//             [0] => 泰山校園資訊系統
//             [1] => 123
//             [2] => yellow
//             [3] => dfgdfsdfaf
//             [4] => sdafsfsafsdfasda
//             [5] => 246810
//         )

//     [id] => Array
//         (
//             [0] => 1
//             [1] => 2
//             [2] => 3
//             [3] => 4
//             [4] => 5
//             [5] => 6
//         )

//     [sh] => 2
//     [del] => Array
//         (
//             [0] => 6
//         )

// )

// 編輯文字
// foreach($_POST['id'] as $val => $id){
    // id和text對應的是索引
    // $row=$Title->find('id');
    // 把資料從db撈出來放到$row裡面
//     dd($row); 
//     echo '$_POST[\'text\'][$val]=>'. $_POST['text'][$val];
    
// }

foreach($_POST['id'] as $key => $id){
    if(isset($_POST['del']) && in_array($id, $_POST['del'])){
        $Title->del($id);
    }else{
        // 把資料撈出來
        $row= $Title->find($id);
        // 編輯文字
        $row['text']=$_POST['text'][$key];
        $row['sh']=($id==$_POST['sh'])?1:0;
        $Title->save($row);
    }
}

header("location:index.php");

// in_array()用法
// 檢查 "banana" 是否存在於 $fruits 陣列中
// if (in_array("banana", $fruits))

?>