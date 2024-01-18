<?php include_once "db.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>問卷管理後台</title>
    <link rel="stylesheet" href="../css/bootstrap.css">

</head>

<body>
    <header class="container">
        <h1 class="text-center">問卷管理後台</h1>
    </header>
    <main class="container p-3">
        <fieldset>
            <legend>新增問卷</legend>

            <form action="./api/add_que.php" method="post">
                <!-- 名稱 -->
                <div class="d-flex">
                    <div class="col-3 bg-light p-2">問卷名稱</div>
                    <div class="col-6 p-2">
                        <input type="text" name="subject" id="">
                    </div>
                </div>
                <!-- 選項 -->
                <div class="bg-light">
                    <div class="p-2" id="option">
                        <label for="">選項</label>
                        <input type="text" name="opt[]">
                        <input type="button" value="更多" onclick="more()">
                        <!-- "更多"按鈕 onclick時執行more()這個函數程式 -->
                    </div>
                </div>
                <div class="mt-3">
                    <input type="submit" value="新增">
                    <input type="reset" value="清空">
                </div>
            </form>
        </fieldset>

        <fieldset class="mt-3">
            <legend>問卷列表</legend>
            <div class="col-9">
                <table class="container">
                    <tr>
                        <th>編號</th>
                        <th>主題內容</th>
                        <th>操作</th>
                    </tr>
                    <?php
                    // 列出題目
                    $ques=$Que->all(['subject_id'=>0]);
                    foreach($ques as $idx => $que){
                    ?>
                        <tr>
                            <!-- 讓編號從1開始,而非0 -->
                            <td><?=$idx+1;?></td>
                            <td><?=$que['text'];?></td>
                            <td>
                                <a href="./api/show.php?id=<?=$que['id'];?>" 
                                class="btn <?=($que['sh']==1)?'btn-info':'btn-secondary';?>">
                                <!-- 顯示/隱藏按鈕不同顏色 -->
                                <?=($que['sh']==1)?'顯示':'隱藏';?>
                                <!-- 檢查 $que 陣列中的 'sh' 元素是否等於 1。 -->
                                <!-- 如果這個條件成立，就會返回 '顯示'，否則返回 '隱藏' -->
                                </a>
                                <button class="btn btn-success">編輯</button>
                                <a href="./api/del.php?id=<?=$que['id'];?>">
                                    <button class="btn btn-danger">刪除</button>
                                </a>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </table>
            </div>
        </fieldset>


    </main>

    <script src="../js/jquery-3.4.1.min.js"></script>
    <script src="../js/bootstrap.js"></script>
</body>

</html>
<!-- 用js做增加更多選項 -->
<script>
    function more() {
        // 用上引號，新增的一塊還是字串
        let opt = `<div class="p-2">
                        <label for="">選項</label>
                        <input type="text" name="opt[]">
                    </div>`
        // 在option這個id前面放一個opt
        $("#option").before(opt);
    }
</script>