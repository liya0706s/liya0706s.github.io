<?php

include_once "db.php";
$table=$_POST['table'];
$DB=${ucfirst($table)};
$row=$DB->find($_POST['id']);
// 拿到要更新單筆的圖片

// if(isset($_FILES['img']['tmp_name'])){
if(!empty($_FILES['img']['tmp_name'])){
    move_uploaded_file($_FILES['img']['tmp_name'], '../img/'. $_FILES['img']['name']);
    $row['img']=$_FILES['img']['name'];
}

$DB->save($row);
to("../back.php?do=$table");