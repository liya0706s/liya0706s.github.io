<?php
// 透過session，如果有登入成功就直接到後台
if(isset($_SESSION['login'])){
	to("back.php");
}

// 登入的功能
// 這裡的error是 帳號或密碼錯誤
if(isset($_GET['error'])){
	echo "<script>alert('{$_GET['error']}');</script>";
	// echo "<span style='color:red;'>{$_GET['error']}</span>";
}

?>

<div class="di" style="height:540px; border:#999 1px solid; width:53.2%; margin:2px 0px 0px 0px; float:left; position:relative; left:20px;">
	<!-- marquee start -->
	<?php include "./front/marquee.php" ?>
	<div style="height:32px; display:block;"></div>
	<!--正中央-->
	<form method="post" action="./api/check.php" >
		<p class="t botli">管理員登入區</p>
			<p class="cent">帳號 ： 
				<input name="acc" type="text" value=""></p>
			<p class="cent">密碼 ： 
				<input name="pw" type="password" value=""></p>
		<p class="cent"><input value="送出" type="submit"><input type="reset" value="清除"></p>
	</form>
</div>