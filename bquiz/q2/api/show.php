<?php

include_once "../db.php";

$que=$Que->find($_GET['id']);
if($que['sh']==0){
    $que['sh']=1;
}else{
    $que['sh']=0;
}
// 儲存進資料庫
$Que->save($que);

header("location:../admin.php");