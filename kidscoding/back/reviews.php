<style>
    body {
        height: 100% !important;
    }
</style>
<link rel="stylesheet" href="../css/back_style.css">
<div class="container-fluid">
    <h1 class="text-center mt-3 mb-3">課程評論管理</h1>
    <hr>
    <form action="./api/edit.php" method="post" enctype="multipart/form-data">
        <table class="table table-striped ">
            <tbody class="text-center">
                <tr class="fs-5">
                    <th>標題</th>
                    <th>次標題</th>
                    <th>敘述</th>
                    <th>圖片</th>
                    <th>顯示</th>
                    <th>刪除</th>
                </tr>
                <?php
                $rows = $DB->all();
                foreach ($rows as $row) {
                ?>
                    <tr>
                        <td>
                            <textarea class="form-control" name="title[]" style="height:70px;"><?= $row['title']; ?></textarea>
                            <input type="hidden" name="id[]" value="<?= $row['id']; ?>">
                            <!-- 隱藏的id才知道是哪一筆對應的title, subtitle可以修改 -->
                        </td>
                        <td><textarea class="form-control" name="subti[]" style="height:100px;"><?= $row['subti']; ?></textarea></td>
                        <td><textarea class="form-control" name="review[]" style="height:165px;"><?= $row['review']; ?></textarea></td>
                        <td>
                            <img src="./img/<?= $row['img']; ?>" style="width:180px;height:120px">
                        </td>
                        <td>
                            <input class="form-check-input" type="checkbox" name="sh[]" value="<?= $row['id']; ?>" <?= ($row['sh'] == 1) ? 'checked' : ''; ?>>
                        </td>
                        <td>
                            <input class="form-check-input" type="checkbox" name="del[]" value="<?= $row['id']; ?>">
                        </td>
                        <td>
                            <input class="btn btn-warning" type="button" onclick="op('#cover','#cvr','./modal/upload.php?table=<?= $do; ?>&id=<?= $row['id']; ?>')" value="更換圖片">
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
                    <td>
                        <input type="hidden" name="table" value="<?= $do; ?>">
                        <input class="btn btn-secondary me-2" type="submit" value="修改確定">
                        <input class="btn btn-light" type="reset" value="重置">
                    </td>
                </tr>
            </tbody>
        </table>

    </form>


    <!-- 新增評論內容 -->
    <h2 class="mt-3">新增</h2>
    <hr>
    <form id="myForm" style="display:block" action="./api/add.php" method="post" enctype="multipart/form-data">
        <table class="table table-striped">
            <tr>
                <th><label class="form-label">標題</label></th>
                <th><label class="form-label">次標題</label></th>
                <th><label class="form-label">敘述</label></th>
                <th><label class="form-label">圖片</label></th>
            <tr>
                <td><textarea class="form-control" type="text" name="title"></textarea></td>
                <td><textarea class="form-control" type="text" name="subti"></textarea></td>
                <td><textarea class="form-control" type="text" name="review"></textarea></td>
                <td><input class="form-control" type="file" name="img"></td>
            </tr>
        </table>
        <table class="mx-auto">
            <tr>
                <input type="hidden" name="table" value="<?= $_GET['do']; ?>">
                <td><input class="form-control btn btn-warning me-2" type="submit" value="新增"></td>
                <td><input class="form-control btn btn-light" type="reset" value="重置"></td>
            </tr>
        </table>
    </form>

</div>