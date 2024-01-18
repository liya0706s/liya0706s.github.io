<?php include_once "../api/db.php"; ?>
<h3 class="cent">編輯次選單</h3>
<hr>
<form action="./api/submenu.php" method="post" enctype="multipart/form-data">
    <table class="cent" style="margin:auto" id="sub">
        <!-- 新增id #sub js需要用到 -->
        <tr>
            <td>次選單名稱</td>
            <td>次選單連結網址</td>
            <td>刪除</td>
        </tr>
        <?php
        // 次選單的menu_id==他主選單的id
        // menu_id 等於從 GET 請求中獲取的 id 參數的值
        $subs = $Menu->all(['menu_id' => $_GET['id']]);
        // back/menu有送 $_GET['id'] 和$table
        foreach ($subs as $sub) {
        ?>
            <tr>
                <td><input type="text" name="text[]" value="<?= $sub['text'] ?>"></td>
                <td><input type="text" name="href[]" value="<?= $sub['href'] ?>"></td>
                <td><input type="checkbox" name="del[]" value="<?= $sub['id'] ?>"></td>
                <input type="hidden" name="id[]" value="<?= $sub['id'] ?>">
                <!-- 做編輯，認id -->
            </tr>
        <?php
        }
        ?>
    </table>

    <div class="cent" style="margin:auto;margin-top:10px">
        <input type="hidden" name="table" value="<?= $_GET['table']; ?>">
        <input type="hidden" name="menu_id" value="<?= $_GET['id']; ?>">
        <!-- 從back/menu送來的GET['id'] -->
        <input type="submit" value="修改確定">
        <input type="reset" value="重置">
        <input type="button" value="更多次選單" onclick="more()">
    </div>
</form>
<script>
    function more() {
        let item = 
        `<tr>
            <td><input type="text" name="add_text[]" id=""></td>
            <td><input type="text" name="add_href[]" id=""></td>
        </tr>`

        $("#sub").append(item);
    }
</script>