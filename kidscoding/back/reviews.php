<link rel="stylesheet" href="../css/back_style.css">
<div class="container-fluid">
    <h1 class="text-center mt-3 mb-3">課程評論管理</h1>
    <hr>
    <form action="./api/edit.php" method="post" enctype="multipart/form-data">
        <table class="table table-striped">
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
                            <input class="form-control" type="text" name="title[]" value="<?= $row['title']; ?>">
                            <input type="text" name="id[]" value="<?= $row['id']; ?>">
                            <!-- 隱藏的id才知道是哪一筆對應的title, subtitle和圖片 -->
                        </td>
                        <td><input class="form-control" type="text" name="subti[]" value="<?= $row['subti']; ?>"></td>
                        <td><input class="form-control" type="text" name="review[]" value="<?= $row['review']; ?>"></td>
                        <td>
                            <img src="./img/<?= $row['img']; ?>" style="width:150px;height:102px">
                        </td>
                        <td>
                            <input class="form-check-input" type="checkbox" name="sh[]" value="<?= $row['id']; ?>" <?= ($row['sh'] == 1) ? 'checked' : ''; ?>>
                        </td>
                        <td>
                            <input class="form-check-input" type="checkbox" name="del[]" value="<?= $row['id']; ?>">
                        </td>
                        <td>
                            <a href="#" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#addPhotoModal">更換圖片</a>
                            <!-- 用a連結bs-toggle的方法開啟modal -->
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

    <!-- Modal -->
    <!-- 仿modal/upload.php來的 -->
    <div class="modal fade" id="addPhotoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title ms-4" id="exampleModalLabel">更新評論圖片</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container mt-3">
                        <h3></h3>
                        <form action="../api/update.php" method="post" enctype="multipart/form-data">

                            <table>
                                <tr>
                                    <td>評論圖片</td>
                                    <td><input type="file" name="img" id=""></td>
                                </tr>
                            </table>
                            <div>
                                <!-- 沒有單筆的id? -->
                                <input type="text" name="table" value="<?= $_GET['do']; ?>">
                                <input type="text" name="id[]" value="<?= $row['id']; ?>">
                            

                                <!-- 哪個資料表的圖片 -->
                                <input type="submit" value="新增">
                                <input type="reset" value="重置">
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- 新增評論內容 -->
    <h2 class="mt-3">新增</h2>
    <hr>
    <form id="myForm" style="display:block" action="./api/add.php" method="post" enctype="multipart/form-data">
        <table class="">
            <tr>
                <th><label for="adInput" class="form-label">標題</label></th>
                <th><input class="form-control ms-2" id="adInput" type="text" name="title"></th>
            </tr>
            <tr>
                <th><label for="">次標題</label></th>
                <th><input type="text" name="subti"></th>
            </tr>
            <tr>
                <th><label for="">敘述</label></th>
                <th><input type="text" name="review"></th>
            </tr>
            <tr>
                <th><label for="">圖片</label></th>
                <th><input type="file" name="img"></th>
            </tr>
        </table>
        <div class="mt-3">
            <input type="hidden" name="table" value="<?= $_GET['do']; ?>">
            <input class="btn btn-secondary me-2" type="submit" value="新增">
            <input class="btn btn-light" type="reset" value="重置">
        </div>
    </form>

</div>