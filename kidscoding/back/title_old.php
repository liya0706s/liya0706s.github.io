<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
    <p class="t cent botli">網站標題管理</p>
    <form method="post" action="./api/edit.php">
        <table width="100%" style="text-align: center">
            <tbody>
                <!-- 標題 -->
                <tr class="yel">
                    <td width="45%">網站標題</td>
                    <td width="23%">替代文字</td>
                    <td width="7%">顯示</td>
                    <td width="7%">刪除</td>
                    <td></td>
                </tr>

                <!-- 資料 -->
                <?php
                // 後臺管理，意味者管理"全部"的資料 all
                // 後台:用foreach迴圈將 all()全部的資料撈出來放在$rows陣列裡面$row是裡面的元素
                // 前台:才要加條件sh=1的才要
                // $DB=${ucfirst($do)}; 統一寫在db.php裡了

                $rows = $DB->all();
                // $rows=$Title->all();
                foreach ($rows as $row) {
                ?>
                    <tr>
                        <td width="45%">
                            <img src="./img/<?= $row['img']; ?>" style="width:300px;height:30px">
                        </td>
                        <td width="23%">
                            <input type="text" name="text[]" style="width:90%" value="<?= $row['text']; ?>">
                            <input type="hidden" name="id[]" value="<?= $row['id']; ?>">
                            <!-- 有input:hidden id是要傳遞給 api/edit  -->
                        </td>
                        <td width="7%">
                            <input type="radio" name="sh" value="<?= $row['id']; ?>" <?= ($row['sh'] == 1) ? 'checked' : ''; ?>>
                        </td>
                        <td width="7%">
                            <input type="checkbox" name="del[]" value="<?= $row['id']; ?>">
                        </td>
                        <td>
                            <input type="button" onclick="op('#cover','#cvr','./modal/upload.php?table=<?= $do; ?>&id=<?= $row['id']; ?>')" value="更新圖片">
                            <!-- 有table($do)也有id{$row['id']}，知道是要"更新"哪一筆資料 -->
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
        <table style="margin-top:40px; width:70%;">
            <tbody>
                <tr>
                    <input type="hidden" name="table" value="<?= $do; ?>">
                    <!-- 放input:hidden，來傳遞table -->
                    <td width="200px"><input type="button" onclick="op('#cover','#cvr','./modal/<?= $do; ?>.php?table=<?= $do; ?>')" value="新增網站標題圖片"></td>
                    <td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置"></td>
                </tr>
            </tbody>
        </table>

    </form>
</div>