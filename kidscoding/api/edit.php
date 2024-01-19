<?php
include_once "db.php";

// 取得資料表名稱
$table = $_POST['table'];
// 建立資料表物件
$DB = ${ucfirst($table)};
// 刪除不必要的 $_POST['table'] 變數
unset($_POST['table']);


// echo "<pre>";
// print_r($_POST['id']);
// echo "</pre>";
// 迴圈一個個 $_POST陣列中名為'id'的子陣列
foreach ($_POST['id'] as $key => $id) {
    // 判斷是否要刪除該筆資料
    // echo "$key : $id <br>";
    if (isset($_POST['del']) && in_array($id, $_POST['del'])) {
        // 勾選刪除的，是text被選中的id 有在迴圈陣列中，要刪除
        $DB->del($id);
    } else {
        // 否則取得資料庫中該筆資料
        $row = $DB->find($id);

        // 更新text欄位
        // 將表單提交的text值 指定給 資料庫中的text值
        if (isset($row['text'])) {
            $row['text'] = $_POST['text'][$key];
        }

        // if (isset($row['title'])) {
        //     $row['title'] = $_POST['title'][$key];
        // }

        // if (isset($row['subti'])) {
        //     $row['subti'] = $_POST['subti'][$key];
        // }

        // if (isset($row['review'])) {
        //     $row['review'] = $_POST['review'][$key];
        // }

        // 根據資料表的不同，更新相應的欄位
        switch ($table) {
            case "title":
                $row['sh'] = (isset($_POST['sh']) && $_POST['sh'] == $id) ? 1 : 0;
                // 檢查 'sh' 的值是否等於當前迭代中的 $id 變量的值
                break;
            case "admin":
                $row['acc'] = $_POST['acc'][$key];
                $row['pw'] = $_POST['pw'][$key];
                break;
            case "mem":
                $row['acc'] = $_POST['acc'][$key];
                $row['pw'] = $_POST['pw'][$key];
                break;
            case "menu":
                $row['href'] = $_POST['href'][$key];
                $row['sh'] = (isset($_POST['sh']) && in_array($id, $_POST['sh'])) ? 1 : 0;
                break;
            case "reviews":
                $row['title']=$_POST['title'][$key];
                $row['subti']=$_POST['subti'][$key];
                $row['review']=$_POST['review'][$key];
            default:
                $row['sh'] = (isset($_POST['sh']) && in_array($id, $_POST['sh'])) ? 1 : 0;
        }
        // 儲存更新後的資料

        

        $DB->save($row);
    }
}

// 跳轉回管理後台
to("../back.php?do=$table");
