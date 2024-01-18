<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
    <p class="t cent botli">最新消息資料管理</p>
    <form method="post" action="./api/edit.php">
        <table width="100%" style="text-align: center">
            <tbody>
                <tr class="yel">
                    <td width="80%">最新消息資料內容</td>
                    <td width="10%">顯示</td>
                    <td width="10%">刪除</td>
                </tr>
                <?php
                // 後台:用foreach迴圈將all()全部的資料倒出來
                // 前台:才要加條件sh=1的才要

                // 2023-12-15
                // 做分頁:只撈出當前頁需要的那幾筆 
                // limit=3只要三筆， limit 3,3(第四筆索引三 後的三筆)
                $total=$DB->count();
                $div=5;
                // 5筆 一頁
                $pages=ceil($total/$div);
                // 總共的頁數
                $now=$_GET['p']??1;
                $start=($now-1)*$div;
                $rows=$DB->all(" limit $start,$div");
                // $rows=$Ad->all();
                foreach($rows as $row){
                ?>
                    <tr>
                        <td>
                            <textarea type="text" name="text[]" style="width:90%;height:60px"><?=$row['text'];?></textarea>
                        <input type="hidden" name="id[]" value="<?=$row['id'];?>">
                        </td>
                        <td>
                            <input type="checkbox" name="sh[]" value="<?=$row['id'];?>" <?=($row['sh']==1)?'checked':'';?>>
                        </td>
                        <td>
                            <input type="checkbox" name="del[]" value="<?=$row['id'];?>">
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>

        <div class="cent">
            <?php
            if($now>1){
                $prev=$now-1;
                echo "<a href='?do=$do&p=$prev'> < </a>";
                // <= &lt = and less than
                // 在這頁 news = $do 
            }

            for($i=1;$i<=$pages;$i++){
                $fontsize=($now==$i)?'24px':'16px';
                echo "<a href='?do=$do&p=$i' style='font-size:$fontsize'> $i </a>";
            }
            // 定義一個$fontsiaze變數 $now==$i代表在當前頁可以改變style

            if($now<$pages){
                // 當前頁小於總頁數
                $next=$now+1;
                echo "<a href='?do=$do&p=$next'> > </a>";
                // <= &gt = and greater than
            }
            ?>
        </div>

        <table style="margin-top:40px; width:70%;">
            <tbody>
                <tr>
                    <input type="hidden" name="table" value="<?=$do;?>">
                    <td width="200px"><input type="button" onclick="op('#cover','#cvr','./modal/<?=$do;?>.php?table=<?=$do;?>')" value="新增最新消息資料"></td>
                    <td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置"></td>
                </tr>
            </tbody>
        </table>

    </form>
</div>