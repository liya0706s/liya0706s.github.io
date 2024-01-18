<?php 
include_once "db.php";

// 判斷有無資料要修改
if(isset($_POST['id'])){
    foreach($_POST['id'] as $idx => $id){

        if(isset($_POST['del']) && in_array($id,$_POST['del'])){
            $Menu->del($id);
        }else{
            // 資料撈出來，處理，再儲存回去
            $row=$Menu->find($id);
            $row['text']=$_POST['text'][$idx];
            $row['href']=$_POST['href'][$idx];
            $Menu->save($row);
        }
    }
}

// 判斷有無新增，是兩個陣列add_text[]和add_href[]
if(isset($_POST['add_text'])){
    foreach($_POST['add_text'] as $idx =>$text){
        
        // 如果編輯次選單>新增的內容不是空的，才新增
        if ($text!='') {
            // 有兩個陣列，新增獨立陣列
            $data=[];
            $data['text']=$text;
            $data['href']=$_POST['add_href'][$idx];
            // sh預設是1
            $data['sh']=1;
            $data['menu_id']=$_POST['menu_id'];
            // menu_id怎麼來的???
            // modal/submenu來的 $_GET['id']
            $Menu->save($data);
        }
    }
}

to("../back.php?do=menu");
// 這邊menu可以用$_POST['table'] 嗎????
