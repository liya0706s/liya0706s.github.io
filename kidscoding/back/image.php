<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
    <p class="t cent botli">校園映像資料管理</p>
    <form method="post" action="./api/edit.php">
        <!-- edit編輯的欄位是否一致 -->
        <table width="100%" style="text-align: center">
            <tbody>
                <tr class="yel">
                    <td width="70%">校園映像資料圖片</td>
                    <td width="10%">顯示</td>
                    <td width="10%">刪除</td>
                    <td></td>
                </tr>
                <?php
                // 後台:用foreach迴圈將all()全部的資料倒出來
                // 前台:才要加條件sh=1的才要
                
                $total = $DB->count();
                $div = 3;
                $pages = ceil($total / $div);
                $now = $_GET['p'] ?? 1;
                $start = ($now - 1) * $div;
                $rows = $DB->all(" limit $start,$div");

                foreach ($rows as $row) {
                ?>
                    <tr>
                        <td>
                            <img src="./img/<?= $row['img']; ?>" style="width:100px;height:68px">
                        </td>
                            <input type="hidden" name="id[]" value="<?=$row['id'];?>">
                            <!-- 知道是哪一筆id才可以修改 -->
                        <td>
                            <input type="checkbox" name="sh[]" value="<?=$row['id'];?>"<?=($row['sh']==1)?'checked':'';?>>
                        </td>
                        <td>
                            <input type="checkbox" name="del[]" value="<?= $row['id']; ?>">
                        </td>
                        <td>
                            <input type="button" onclick="op('#cover','#cvr','./modal/upload.php?table=<?=$do;?>&id=<?=$row['id'];?>')" value="更換圖片">
                            <!-- id為了撈資料 -->
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>

        <div class="cent">
            <?php
            if ($now > 1) {
                $prev = $now - 1;
                echo "<a href='?do=$do&p=$prev'> < </a>";
                // <= &lt = and less than
                // 在這頁 image = $do
            }

            for ($i = 1; $i <= $pages; $i++) {
                $fontsize = ($now == $i) ? '22px' : '16px';
                echo "<a href='?do=$do&p=$i' style='font-size:$fontsize'>&nbsp;$i&nbsp;</a>";
            }
            // 定義一個$fontsiaze變數 $now==$i代表在當前頁可以改變style

            if ($now<$pages) {
                // 當前頁小於總頁數
                $next = $now + 1;
                echo "<a href='?do=$do&p=$next'> > </a>";
                // <= &gt = and greater than
            }
            ?>
        </div>

        <table style="margin-top:40px; width:70%;">
            <tbody>
                <tr>
                    <input type="hidden" name="table" value="<?= $do; ?>">
                    <!-- 把table的值傳給api/add 或是 api/edit -->
                    <td width="200px"><input type="button" onclick="op('#cover','#cvr','./modal/<?= $do; ?>.php?table=<?= $do; ?>')" value="新增校園映像圖片"></td>
                    <td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置"></td>
                </tr>
            </tbody>
        </table>

    </form>
</div>