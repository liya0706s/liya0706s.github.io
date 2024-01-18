<?php include_once "db.php";

if($Admin->count(['acc'=> $_POST['acc'],'pw'=>$_POST['pw']])==1){
    // 資料庫來的
    // 如果用find會傳回資料，流量會增加，算數字有一筆就登入成功
    // 只是要檢查有沒有登入成功，也可避免資料外洩或被攔截
    $_SESSION['login']=$_POST['acc'];
    // 用count所以是表單來的資料，表單來的比較值觀
    to("../back.php");
}else{
// to("../index.php?do=login&error=帳號或密碼錯誤");
to("../index.php?do=login&error=帳號或密碼錯誤");
}
?>