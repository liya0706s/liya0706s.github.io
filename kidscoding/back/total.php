<!-- <div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;"> -->
<div class="container-fluid">
    <h1 class="text-center mt-3 mb-3">進站總人數管理</h1>
    <hr>
    <form method="post" action="/api/edit_info.php">
        <table class="table table-striped text-center">
            <tbody>
                <tr>
                    <th>進站總人數</th>
                    <th>
                        <input type="number" name="total" value="<?= $Total->find(1)['total']; ?>">
                        <input type="hidden" name="table" value="<?= $do; ?>">
                    </th>
                </tr>
            </tbody>
        </table>
        <table class="m-auto">
            <tbody>
                <tr>
                    <td></td>
                    <!-- 原本title的新增刪除 -->
                    <td class="d-flex">
                        <input class="btn btn-secondary form-control me-3" type="submit" value="修改確定">
                        <input class="btn btn-light form-control" type="reset" value="重置">
                    </td>
                </tr>
            </tbody>
        </table>

    </form>
</div>