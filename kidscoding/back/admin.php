<!-- <div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
    <p class="t cent botli">管理者帳號管理</p> -->
<link rel="stylesheet" href="../css/back_style.css">
<div class="container-fluid">
    <h1 class="text-center mt-3 mb-3">管理者帳號管理</h1>
    <hr>
    <form method="post" action="./api/edit.php">
        <table class="table table-striped">
            <tbody class="text-center">
                <tr class="fs-5">
                    <th width="45%">帳號</th>
                    <th width="45%">密碼</th>
                    <th width="10%">刪除</th>
                </tr>
                <?php
                // 後台:用foreach迴圈將all()全部的資料倒出來
                // 前台:才要加條件sh=1的才要

                $rows = $DB->all();
                // $rows=$Ad->all();
                foreach ($rows as $row) {
                ?>
                    <tr>
                        <td>
                            <input class="form-control" type="text" name="acc[]" style="width:90%" value="<?= $row['acc']; ?>">
                        </td>
                        <td>
                            <input class="form-control" type="password" name="pw[]" value="<?= $row['pw']; ?>">
                        </td>
                        <td>
                            <input class="form-check-input" type="checkbox" name="del[]" value="<?= $row['id']; ?>">
                        </td>
                    </tr>
                    <input type="hidden" name="id[]" value="<?= $row['id']; ?>">
                    <!-- 隱藏欄位id -->
                <?php
                }
                ?>
            </tbody>
        </table>
        <table class="m-auto">
            <tbody>
                <tr>
                    <input type="hidden" name="table" value="<?= $do; ?>">
                    <td class="mt-3">
                        <input class="btn btn-secondary me-3" type="submit" value="修改確定">
                        <input class="btn btn-light" type="reset" value="重置">
                    </td>
                </tr>
            </tbody>
        </table>
    </form>

    <!-- 新增區域 -->
    <h2 class="mt-5 mb-3 fw-medium">新增管理者帳號</h2>
    <hr>
    <form action="./api/add.php" method="post">
            <table>
                <tr>
                    <td><label for="accInput" class="form-label">帳號：</label></td>
                    <td><input class="form-control ms-2" type="text" name="acc" id="accInput"></td>
                </tr>
                <tr>
                    <td><label for="pwInput" class="form-label">密碼：</label></td>
                    <td><input class="form-control ms-2" type="password" name="pw" id="pwInput"></td>
                </tr>
                <tr>
                    <td><label for="pw2Input" class="form-label">確認密碼：</label></td>
                    <td><input class="form-control ms-2" type="password" name="pw2" id="pw2Input"></td>
                </tr>
            </table>
        <div class="mt-3">
            <input type="hidden" name="table" value="<?= $_GET['do']; ?>">
            <input class="btn btn-warning me-2" type="submit" value="新增">
            <input class="btn btn-light" type="reset" value="重置">
        </div>
    </form>
</div>