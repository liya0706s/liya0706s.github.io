<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
    <p class="t cent botli">動畫圖片管理</p>
    <form method="post" action="./api/edit.php">
        <!-- edit編輯的欄位是否醫治 -->
        <table width="100%" style="text-align: center">
            <tbody>
                <tr class="yel">
                    <td width="70%">動畫圖片</td>
                    <td width="10%">顯示</td>
                    <td width="10%">刪除</td>
                    <td></td>
                </tr>
                <?php
                // 後台:用foreach迴圈將all()全部的資料倒出來
                // 前台:才要加條件sh=1的才要
                $rows = $Mvim->all();
                foreach ($rows as $row) {
                ?>
                    <tr>
                        <td>
                            <img src="./img/<?= $row['img']; ?>" style="width:150px;height:100px overflow:hidden">
                        </td>
                            <input type="hidden" name="id[]" value="<?=$row['id'];?>">
                        <td>
                            <input type="checkbox" name="sh[]" value="<?=$row['id'];?>"<?=($row['sh']==1)?'checked':'';?>>
                        </td>
                        <td>
                            <input type="checkbox" name="del[]" value="<?= $row['id']; ?>">
                        </td>
                        <td>
                            <input type="button" onclick="op('#cover','#cvr','./modal/upload.php?table=<?= $do; ?>&id=<?= $row['id']; ?>')" value="更換動畫">
                            <!-- id為了撈資料 -->
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
                    <!-- 傳遞table的值= $do -->
                    <td width="200px"><input type="button" onclick="op('#cover','#cvr','./modal/<?= $do; ?>.php?table=<?= $do; ?>')" value="新增動畫圖片"></td>
                    <td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置"></td>
                </tr>
            </tbody>
        </table>

    </form>
</div>