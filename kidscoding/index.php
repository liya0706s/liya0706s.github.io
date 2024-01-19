<?php include_once "./api/db.php";

?>

<!DOCTYPE html>
<html lang="en">

<!-- <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> -->
<!-- saved from url=(0040)http://127.0.0.1/test/exercise/collage/? -->
<!-- <html xmlns="http://www.w3.org/1999/xhtml"> -->

<head>
	<!-- <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"> -->
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- favicon -->
	<link rel="icon" href="./img/kids_coding-removebg-preview.png" type="image/x-icon">
	<title>從小學程式，程式從小學</title>
	<link href="./css/css.css" rel="stylesheet" type="text/css">
	<script src="./js/jquery-1.9.1.min.js"></script>
	<script src="./js/js.js"></script>
	<!-- font-awesome cdn css -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<!-- bootstrap 5.3.2 cdn js -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

	<!-- carousel script and link  -->
	<script src="./js/color-modes.js"></script>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
	<link href="./css/bootstrap.min.css" rel="stylesheet">

	<style>
		/* carousel style START  */
		.bd-placeholder-img {
			font-size: 1.125rem;
			text-anchor: middle;
			-webkit-user-select: none;
			-moz-user-select: none;
			user-select: none;
		}

		@media (min-width: 768px) {
			.bd-placeholder-img-lg {
				font-size: 3.5rem;
			}
		}

		.b-example-divider {
			width: 100%;
			height: 3rem;
			background-color: rgba(0, 0, 0, .1);
			border: solid rgba(0, 0, 0, .15);
			border-width: 1px 0;
			box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
		}

		.b-example-vr {
			flex-shrink: 0;
			width: 1.5rem;
			height: 100vh;
		}

		.bi {
			vertical-align: -.125em;
			fill: currentColor;
		}

		.nav-scroller {
			position: relative;
			z-index: 2;
			height: 2.75rem;
			overflow-y: hidden;
		}

		.nav-scroller .nav {
			display: flex;
			flex-wrap: nowrap;
			padding-bottom: 1rem;
			margin-top: -1px;
			overflow-x: auto;
			text-align: center;
			white-space: nowrap;
			-webkit-overflow-scrolling: touch;
		}

		.btn-bd-primary {
			--bd-violet-bg: #712cf9;
			--bd-violet-rgb: 112.520718, 44.062154, 249.437846;

			--bs-btn-font-weight: 600;
			--bs-btn-color: var(--bs-white);
			--bs-btn-bg: var(--bd-violet-bg);
			--bs-btn-border-color: var(--bd-violet-bg);
			--bs-btn-hover-color: var(--bs-white);
			--bs-btn-hover-bg: #6528e0;
			--bs-btn-hover-border-color: #6528e0;
			--bs-btn-focus-shadow-rgb: var(--bd-violet-rgb);
			--bs-btn-active-color: var(--bs-btn-hover-color);
			--bs-btn-active-bg: #5a23c8;
			--bs-btn-active-border-color: #5a23c8;
		}

		.bd-mode-toggle {
			z-index: 1500;
		}

		.bd-mode-toggle .dropdown-menu .active .bi {
			display: block !important;
		}

		/* carousel style END  */
		.carousel-item img {
			vertical-align: middle;
		}
	</style>
	<!-- Custom styles for this carousel template -->
	<link href="./css/carousel.css" rel="stylesheet">
</head>

<body>
	<main>
		<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
			<div class="container-fluid">
				<!-- <a class="navbar-brand" href="index.php">
					<i class="fa-solid fa-school"></i>
				</a> -->
					<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
					<div class="collapse navbar-collapse row" id="navbarNav">
					</div>
					<div class="col-9">
						<ul class="navbar-nav">

							<li class="nav-item">
								<a class="nav-link active" href="#">
									<i class="fa-solid fa-code"></i>
									<!-- <img src="./img/kids_coding-removebg-preview.png" style="width:25px; height:25px"> -->
								</a>
							</li>

							<!-- 靜態導航項目 -->
							<li class="nav-item">
								<a class="nav-link" aria-current="page" href="#">Home</a>
							</li>

							<li class="nav-item">
								<a class="nav-link" aria-current="page" href="#product">Product</a>
							</li>

							<li class="nav-item">
								<a class="nav-link" aria-current="page" href="#reviews">Reviews</a>
							</li>

							<!-- 動態生成的主選單和子選單 -->
							<!-- 有子選單開始 -->
							<!-- <li class="nav-item dropdown">
								<a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">Dropdown</a>
								<ul class="dropdown-menu">
									<li><a class="dropdown-item" href="#">Action</a></li>
									<li><a class="dropdown-item" href="#">Another action</a></li>
									<li><a class="dropdown-item" href="#">Something else here</a></li>
								</ul>
							</li> -->

							<!-- <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal2" class="btn btn-primary" ></a> -->
							<!-- 以上a link 可以toggle modal -->

							<?php
							$mainMenus = $Menu->all(['sh' => 1, 'menu_id' => 0]);
							foreach ($mainMenus as $main) {
								$subMenus = $Menu->all(['menu_id' => $main['id']]);
								$hasSub = count($subMenus) > 0;

								echo "<li class='nav-item";
								echo $hasSub ? " dropdown" : "";
								echo "'>";

								echo "<a class='nav-link";
								echo $hasSub ? " dropdown-toggle' href='#' id='navbarDropdown{$main['id']}' role='button' data-bs-toggle='dropdown' aria-expanded='false'" : "' data-bs-toggle='modal' data-bs-target='#exampleModal' href='{$main['href']}'";
								echo ">{$main['text']}</a>";
					

								if ($hasSub) {
									echo "<ul class='dropdown-menu' aria-labelledby='navbarDropdown{$main['id']}'>";
									foreach ($subMenus as $sub) {
										echo "<li><a class='dropdown-item' href='{$sub['href']}'>{$sub['text']}</a></li>";
									}
									echo "</ul>";
								}

								echo "</li>";
							}
							?>
							<!-- 有子選單結束 -->
						</ul>
					</div>

					<div class="col-3  d-flex">
						<ul class="navbar-nav ml-auto">
							<!-- 判斷有沒有登入的狀態，顯示不同的連結 -->
							<li class="item">
								<?php
								if (isset($_SESSION['login'])) {
								?>
									<a class="nav-link active me-5" href="back.php">
										<i class="fa-solid fa-list-check"></i>&nbsp;返回管理
									</a>
								<?php
								} else {
								?>
									<!-- open sidebar / offcanvas -->
									<a class="nav-link active" href="#sidebar" data-bs-toggle="offcanvas" role="button" aria-controls="sidebar-label">
										<i class="fa-solid fa-right-to-bracket"></i>
										&nbsp;會員登入
									</a>
								<?php
								}
								?>
							</li>
							<li class="item mt-2">
								<i class="fa-solid fa-chart-simple me-1"></i>
								今日人數 <?= $Total->find(1)['total']; ?>
							</li>
						</ul>

					</div>
			</div>
		</nav>

		<div>
			<!-- offcanvas -->
			<div class="offcanvas offcanvas-end" tabindex="-1" id="sidebar" aria-labelledby="sidebar-label">
				<div class="offcanvas-header">
					<h5 class="offcanvas-title" id="sidebar-label">會員登入</h5>
					<button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
				</div>
				<div class="offcanvas-body">
					<form action="./api/check.php" method="post">
						<?php
						// 透過session，如果有登入成功就直接到後台
						if (isset($_SESSION['login'])) {
							to("./back.php");
						}

						// 登入的功能，這裡是GET傳值的error 帳號或密碼錯誤
						if (isset($_GET['error'])) {
							echo "<span style='color:red;'>";
							echo $_GET['error'];
							unset($_GET['error']);
							echo "</span>";
						}
						?>

						<div class="container mt-3">
							<h3></h3>
							<div class="mb-3 mt-3">
								<label for="acc">帳號:</label>
								<input type="text" class="form-control" id="acc" placeholder="Enter acc" name="acc">
							</div>
							<div class="mb-3 mt-3">
								<label for="pw">密碼:</label>
								<input type="password" class="form-control" id="pw" placeholder="Enter password" name="pw">
							</div>
							<div class="form-check mb-3">
								<label class="form-check-label">
									<!-- <input class="form-check-input" type="checkbox" name="remember"> 註冊 -->
									<a href="./front/reg.php">註冊帳號</a>
								</label>
							</div>
							<!-- <button type="submit" class="btn btn-primary">Submit</button> -->
							<div class="modal-footer">
								<button type="reset" class="btn btn-secondary">重置</button>
								<button type="submit" class="btn btn-primary">送出</button>
							</div>
					</form>
				</div>

			</div>
		</div>

		<!-- Button trigger modal -->
		<!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
						Launch demo modal -->
		<!-- data-bs-toggle='modal' data-bs-target='#exampleModal'接在nav管理登入的a連結中 -->
		<!-- </button> -->

		<!-- Modal -->
		<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h3 class="modal-title ms-4" id="exampleModalLabel">登入</h3>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
						<!-- ... -->
						<?php
						// 透過session，如果有登入成功就直接到後台
						if (isset($_SESSION['login'])) {
							to("./back.php");
						}

						// 登入的功能，這裡是GET傳值的error 帳號或密碼錯誤
						if (isset($_GET['error'])) {
							echo "<span style='color:red;'>";
							echo $_GET['error'];
							unset($_GET['error']);
							echo "</span>";
						}
						?>

						<div class="container mt-3">
							<h3></h3>
							<form action="./api/check.php" method="post">
								<div class="mb-3 mt-3">
									<label for="acc">帳號:</label>
									<input type="text" class="form-control" id="acc" placeholder="Enter acc" name="acc">
								</div>
								<div class="mb-3 mt-3">
									<label for="pw">密碼:</label>
									<input type="password" class="form-control" id="pw" placeholder="Enter password" name="pw">
								</div>
								<div class="form-check mb-3">
									<label class="form-check-label">
										<!-- <input class="form-check-input" type="checkbox" name="remember"> 註冊 -->
										<a href="./front/reg.php">註冊帳號</a>
									</label>
								</div>
								<!-- <button type="submit" class="btn btn-primary">Submit</button> -->
								<div class="modal-footer">
									<button type="reset" class="btn btn-secondary">重置</button>
									<button type="submit" class="btn btn-primary">送出</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- alert 文字廣告 原本的marquee  -->
		<div class="alert alert-warning alert-dismissible fade show" role="alert" style="margin-top: 0; height:52px; margin-bottom:0">
			<marquee>
				<?php
				$ads = $Ad->all(['sh' => 1]);
				foreach ($ads as $ad) {
					echo $ad['text'];
					echo '&nbsp;&nbsp;|&nbsp;&nbsp;';
				}
				?>
			</marquee>
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>
		<!-- alert 文字廣告結束 -->

		<!-- bootstrap carousel start -->

		<div id="carouselExampleAutoplaying" class="carousel slide mb-4" data-bs-ride="carousel">
			<div class="carousel-inner">
				<div class="carousel-item active" data-bs-interval="3000" style="height:864px">
					<img src="./img/slide-1.jpg" class="d-block w-100" alt="...">
					<!-- <div style="background-image:url('./img/school.jpg');background-size:cover; "></div> -->
				</div>
				<div class="carousel-item" data-bs-interval="3000" style="height:864px">
					<img src="./img/slide-2.jpg" class="d-block w-100" alt="...">
				</div>
				<div class="carousel-item" data-bs-interval="3000" style="height:864px">
					<img src="./img/scratch-coding-1.jpg" class="d-block w-100" alt="...">
				</div>
			</div>
			<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
				<span class="visually-hidden">Previous</span>
			</button>
			<button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
				<span class="carousel-control-next-icon" aria-hidden="true"></span>
				<span class="visually-hidden">Next</span>
			</button>
		</div>
		<!-- bootstrap carousel end -->

		<!-- product plans start -->
		<section id="product" class="bg-light mt-0">
			<div class="container-fluid">
				<div class="text-center">
					<h2>Pricing Plans</h2>
					<p class="lead text-muted">Choose a pricing plan to suit you</p>
				</div>

				<div class="row my-5 align-items-center justify-content-center g-5 mt-0">
					<div class="col-8 col-lg-4 col-xl-3">
						<div class="card border-0 mb-2">
							<img src="./img/KIBO-120519_9358.jpg" class="card-img-top" alt="...">
							<div class="card-body text-center py-4">
								<h4 class="card-title">KIBO 程式機器人套件</h4>
								<p class="lead card-subtitle">適合中大班-低年級</p>
								<p class="display-5 my-4 text-primary fw-bold">$79.9</p>
								<p class="card-text mx-5 text-muted d-none d-lg-block">
								KIBO 是一套針對幼兒及小學生的無屏幕可編程機器人套件，使用實體木製編碼積木，孩子們可以排列並掃描這些積木，來設計他們自己的創意程式。
								</p>
								<a href="./front/shop.php" class="btn btn-outline-primary btn-lg mt-3 text-decoration-none">Buy Now</a>
							</div>
						</div>
					</div>

					<div class="col-8 col-lg-4 col-xl-3">
						<div class="card border-2 border-primary mb-2">
							<di class="card-header text-center text-primary fw-bolder">Most Popular</di>
							<img src="./img/multi-page.png" class="card-img-top border border-light" alt="...">
							<div class="card-body text-center py-4">
								<h4 class="card-title">ScratchJr</h4>
								<p class="lead card-subtitle">適合中大班-中年級</p>
								<p class="display-5 my-4 text-primary fw-bold">$89.9</p>
								<p class="card-text mx-5 text-muted d-none d-lg-block">
								ScratchJr 是適合兒童的免費程式語言。利用區塊程式讓孩子們創造自己的互動故事和遊戲。截至2023年8月，該應用程式已超過4,500萬用戶，已創建超過1.94億個專案。目前被翻譯成48種語言！
								</p>
								<a href="./front/shop.php" class="btn btn-outline-primary btn-lg mt-3 text-decoration-none">Buy Now</a>
							</div>
						</div>
					</div>

					<div class="col-8 col-lg-4 col-xl-3">
						<div class="card border-0 mb-2">
							<img src="./img/scratch_microbit.jpg" class="card-img-top border border-light" alt="...">
							<div class="card-body text-center py-4">
								<h4 class="card-title">Scratch & micro:bit</h4>
								<p class="lead card-subtitle">適合高年級-國中三年級</p>
								<p class="display-5 my-4 text-primary fw-bold">$99.9</p>
								<p class="card-text mx-5 text-muted d-none d-lg-block">
								Scratch 是世界上最大的兒童編寫程式語言平台，具有簡單視覺化介面的編碼語言，可增進運算思維和解決問題的能力、創意教育及學習、自我表達和協作。
								micro:bit 是一塊微型電路板，旨在幫助孩子學習編寫程式和利用科技進行創作。包括LED顯示器、按鈕和運動感應器等功能，可以連接到Scratch結合數位和物理的創意項目。
								</p>
								<a href="./front/shop.php" class="btn btn-outline-primary btn-lg mt-3 text-decoration-none">Buy Now</a>
							</div>
						</div>
					</div>

				</div>
		</section>
		<!-- product plans end -->

		<!-- review area / carousel with words start -->
		<?php
		include "./front/reviews.php"
		?>
		<!-- review area / carousel with words end -->


		<!-- <div class="container-fluid"> -->
			<!-- <div class="row"> -->
				<!-- 中間區塊開始 -->
				<?php
				// $do = $_GET['do'] ?? 'main';
				// $file = "./front/{$do}.php";
				// if (file_exists($file)) {
				// 	include $file;
				// } else {
				// 	include "./front/main.php";
				// }
				// ?>
				<!-- 中間區塊結束 -->
			<!-- </div> -->
		<!-- </div> -->

		<!-- footer start -->
		<div class="container">
			<footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
				<div class="col-md-4 d-flex align-items-center">
					<a href="https://getbootstrap.com/" class="mb-3 me-2 mb-md-0 text-body-secondary text-decoration-none lh-0.5">
						<svg class="bi" width="30" height="24">
							<use xlink:href="#bootstrap"></use>
						</svg>
					</a>
					<span class="mb-3 mb-md-0 text-body-secondary">© 2024 Angie Lee Website. All rights reserved.</span>
				</div>

				<ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
					<li class="ms-3">
						<a class="text-body-secondary" href="https://www.facebook.com">
							<i class="fa-brands fa-facebook fa-xl" style="color: #6c757d;"></i>
						</a>
					</li>
					<li class="ms-3">
						<a class="text-body-secondary" href="https://www.instagram.com">
							<i class="fa-brands fa-instagram fa-xl" style="color: #6c757d;"></i>
						</a>
					</li>
					<li class="ms-3">
						<a class="text-body-secondary" href="mailto:liya0706s@gmail.com">
							<!-- <i class="fa-brands fa-threads fa-xl" style="color: #6c757d;"></i> -->
							<i class="fa-solid fa-envelope fa-xl" style="color: #6c757d;"></i>
						</a>
					</li>
				</ul>
			</footer>
		</div>
		<!-- footer end  -->
	</main>
</body>

<!-- 在文件末尾加入 Bootstrap JS 和 Popper.js -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>

</html>