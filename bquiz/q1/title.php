<h3 class="text-center">新增標題區圖片</h3>
<hr>
<form action="./add_title.php" method="post" enctype="multipart/form-data">
    <!-- add_title.php 看新增檔案有沒有成功 -->
    <table class="col-8 m-auto">
        <tr>
            <td>標題區圖片:</td>
            <td><input type="file" name="img" id=""></td>
        </tr>
        <tr>
            <td>標題區替代文字:</td>
            <td><input type="text" name="text" id=""></td>
        </tr>
    </table>
    <div class="text-center">
        <input type="submit" value="新增">
        <input type="reset" value="重置">
    </div>
</form>