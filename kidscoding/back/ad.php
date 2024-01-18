<link rel="stylesheet" href="../css/back_style.css">
<!-- <div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;"> -->
<!-- <p class="t cent botli">動態文字廣告管理</p> -->
<div class="container-fluid">
    <h1 class="text-center mt-3 mb-3">動態文字廣告管理</h1>
    <hr>
    <form method="post" action="./api/edit.php">
        <table class="table table-striped">
            <tbody class="text-center">
                <tr class="fs-5">
                    <th class="col-8">動態文字廣告</th>
                    <th class="col-2">顯示</th>
                    <th class="col-2">刪除</th>
                </tr>
                <?php
                // 後台:用foreach迴圈將資料庫all()全部的資料倒進去value
                // 前台:才要加條件sh=1的才要顯示

                $rows = $DB->all();
                // $rows=$Ad->all();
                foreach ($rows as $row) {
                ?>
                    <tr>
                        <td>
                            <input class="form-control" type="text" name="text[]" style="width:90%" value="<?= $row['text']; ?>">
                            <input class="form-control" type="hidden" name="id[]" value="<?= $row['id']; ?>">
                        </td>
                        <td>
                            <input class="form-check-input" type="checkbox" name="sh[]" value="<?= $row['id']; ?>" <?= ($row['sh'] == 1) ? 'checked' : ''; ?>>
                        </td>
                        <td>
                            <input class="form-check-input" type="checkbox" name="del[]" value="<?= $row['id']; ?>">
                        </td>

                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
        <table>
            <tbody class="text-center">
                <tr class="mt-3">
                    <input type="hidden" name="table" value="<?= $do; ?>">
                    <!-- 傳送table的值帶到 api/edit -->
                    <td>
                        <input class="btn btn-secondary me-2" type="submit" value="修改確定">
                        <input class="btn btn-light" type="reset" value="重置">
                    </td>
                </tr>
            </tbody>
        </table>

    </form>
    

    <!-- 新增動態文字廣告 -->
    <?php 
    
    ?>
    <h2 class="mt-3">新增</h2>
    <hr>
    <form id="myForm" style="display:block" action="./api/add.php" method="post">
        <table class="">
            <tr>
                <th><label for="adInput" class="form-label">
                    動態文字廣告</label></th>
                <th><input class="form-control ms-2" id="adInput" type="text" name="text"></th>
            </tr>
        </table>
        <div class="mt-3">
            <?php
            if (isset($_GET['do'])){
            ?>
            <input type="hidden" name="table" value="<?= $_GET['do']; ?>">
            <?php
        }
        ?>
            <input class="btn btn-secondary me-2" type="submit" value="新增">
            <input class="btn btn-light" type="reset" value="重置">
        </div>
    </form>
</div>
