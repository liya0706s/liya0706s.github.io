<?php
include_once "./api/db.php";

$rows = $Reviews->all(" limit 1");
foreach ($rows as $row) {
	// dd($rows);
	// break;
?>

	<div id="reviews" class="container marketing">
		<div class="row featurette">
			<div class="col-md-7">
				<!-- title -->
				<h2 class="featurette-heading fw-normal lh-1">
					<!-- 55688.... -->
					<?= $row['title']; ?>
				</h2>

				<!-- subtitle -->
				<span class="text-body-secondary fs-2">
					<!-- content..... -->
					<?= $row['subti']; ?>
				</span>

				<!-- review -->
				<p class="lead">
					<!-- Some great placeholder content for the first featurette here. Imagine some exciting prose here. -->
					<?= $row['review']; ?>
				</p>
			</div>
			<div class="col-md-5">
				<!-- image -->
				<!-- <svg class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 500x500" preserveAspectRatio="xMidYMid slice" focusable="false">
					<title>Placeholder</title>
					<rect width="100%" height="100%" fill="var(--bs-secondary-bg)" /><text x="50%" y="50%" fill="var(--bs-secondary-color)" dy=".3em">500x500</text>
				</svg> -->
				<img src="./img/<?= $row['img']; ?>" style="width:500px;height:500px" alt="">
				<!-- <img src="https://picsum.photos/id/119/500/500" alt=""> -->
			</div>
		</div>
	<?php
	}
	?>

<hr class="featurette-divider">

<?php
$rows = $Reviews->all(" limit 1,1");
// 資料表中第1筆中，取1筆資料
// 使用LIMIT語法時，資料表的開始是由第0筆開始計算
foreach ($rows as $row) {
	// dd($rows);
	// break;
?>
	<div class="row featurette">
		<div class="col-md-7 order-md-2">
			<!-- title -->
			<h2 class="featurette-heading fw-normal lh-1">
				<?= $row['title']; ?>
				<!-- 4567Oh yeah, it’s that good. -->
			</h2>

			<!-- subtitle -->
			<span class="text-body-secondary fs-2">
				<?= $row['subti']; ?>
				<!-- See for yourself. -->
			</span>
			<!-- review -->
			<p class="lead">
				<?= $row['review']; ?>
				<!-- Another featurette? Of course. More placeholder content here to give you an idea of how this layout would work with some actual real-world content in place. -->
			</p>
		</div>
		<div class="col-md-5 order-md-1">
			<!-- <svg class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 500x500" preserveAspectRatio="xMidYMid slice" focusable="false">
					<title>Placeholder</title>
					<rect width="100%" height="100%" fill="var(--bs-secondary-bg)" /><text x="50%" y="50%" fill="var(--bs-secondary-color)" dy=".3em">500x500</text>
				</svg> -->
			<!-- <img src="https://picsum.photos/id/109/500/500" alt=""> -->
			<img src="./img/<?= $row['img']; ?>" style="width:500px;height:500px" alt="">
		</div>
	</div>

	<?php
	}
	?>

<hr class="featurette-divider">

