<?php
include_once "db.php";
// 從 POST 請求中取得資料表名稱
$table=$_POST['table'];

// 將資料表名稱轉成手字大寫的"資料表物件變數"
// 可變變數，兩個dollar sign
$DB=${ucfirst($table)};

// 取得一筆只有id為1的資料 (資料表total和bottom) 
$data=$DB->find(1);

// 將資料中對應的欄位修改為post過來的值
$data[$table]=$_POST[$table];

// 使用save更新至資料表
$DB->save($data);
to("../back.php?do=$table");
?>