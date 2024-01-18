<?php include_once './api/db.php';?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0040)http://127.0.0.1/test/exercise/collage/? -->
<html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<title>卓越科技大學校園資訊系統</title>
<link href="./css/css.css" rel="stylesheet" type="text/css">
<script src="./js/jquery-1.9.1.min.js"></script>
<script src="./js/js.js"></script>
</head>

<body>
<div id="cover" style="display:none; ">
	<div id="coverr">
    	<a style="position:absolute; right:3px; top:4px; cursor:pointer; z-index:9999;" onclick="cl('#cover')">X</a>
        <div id="cvr" style="position:absolute; width:99%; height:100%; margin:auto; z-index:9898;"></div>
    </div>
</div>
	<div id="main">
		<?php 
			$title=$Title->find(['sh'=>1]);
		?>
    	<a title="<?=$title['text'];?>" href="index.php">
			<div class="ti" style="background:url('./img/<?=$title['img'];?>'); background-size:cover;"></div><!--標題--></a>
        	<div id="ms">
             	<div id="lf" style="float:left;">
            		<div id="menuput" class="dbor">
                    <!--主選單放此-->
						<span class="t botli">主選單區</span>
						<?php
						$mainmu=$Menu->all(['sh'=>1,'menu_id'=>0]);
						foreach($mainmu as $main){
						?>
						<div class='mainmu'>
							<a  href="<?=$main['href'];?>" style="color:#000; font-size:13px; text-decoration:none;"><?=$main['text'];?></a>
							<?php
							
							if($Menu->count(['menu_id'=>$main['id']])>0){
								echo "<div class='mw'>";
								$subs=$Menu->all(['menu_id'=>$main['id']]);
								foreach($subs as $sub){
									echo "<a href='{$sub['href']}'>";
									echo "<div class='mainmu2'>";
									echo $sub['text'];
									echo "</div>";
									echo "</a>";
								}
								echo "</div>";
							}
							?>
							
						</div>
							
						</a>
						<?php
						}
						?>
					</div>
                    <div class="dbor" style="margin:3px; width:95%; height:20%; line-height:100px;">
                    	<span class="t">進站總人數 : <?=$Total->find(1)['total'];?></span>
                    </div>
        		</div>

				<?php 

					$do=$_GET['do']??'main';
					$file="./front/{$do}.php";
					if(file_exists($file)){
						include $file;
					}else{
						include "./front/main.php";	
					}

					?>

                    <div class="di di ad" style="height:540px; width:23%; padding:0px; margin-left:22px; float:left; ">
                	<!--右邊-->   
					<?php
					if(isset($_SESSION['login'])){
					?>
                	<button style="width:100%; margin-left:auto; margin-right:auto; margin-top:2px; height:50px;" onclick="location.href='back.php'">返回管理</button>
                	<?php
					}else{
					?>
					<button style="width:100%; margin-left:auto; margin-right:auto; margin-top:2px; height:50px;" onclick="location.href='?do=login'">管理登入</button>
                	<?php
						}
					?>

					<div style="width:89%; height:480px;" class="dbor">
                    	<span class="t botli">校園映象區</span>
						<div class="cent" onclick="pp(1)"><img src="./icon/up.jpg" alt=""></div>
					
					<?php
					$imgs=$Image->all(['sh'=>1]);
					foreach($imgs as $idx => $img){
					?>
						<div id="ssaa<?=$idx;?>" class='im cent' >
							<img src="./img/<?=$img['img'];?>" style="width:150px;height:103px;border:3px solid orange;margin:3px">
						</div>
					<?php
					}
					?>

					<div class="cent" onclick="pp(2)"><img src="./icon/dn.jpg" alt=""></div>
						<script>
                        	var nowpage=1,num=<?=$Image->count(['sh'=>1]);?>;

							function pp(x)
							{
								var s,t;
								if(x==1 && nowpage-1>=0)
								{nowpage--;}
								if(x==2&&(nowpage+1)<=num*1-3)
								{nowpage++;}
								
								$(".im").hide()
								for(s=0;s<=2;s++)
								{
									t=s*1+nowpage*1;
									$("#ssaa"+t).show()

	 							}
							}


							pp(2)
                        </script>

                    </div>
                </div>
                            </div>
             	<div style="clear:both;"></div>
            	<div style="width:1024px; left:0px; position:relative; background:#FC3; margin-top:4px; height:123px; display:block;">
                	<span class="t" style="line-height:123px;"><?=$Bottom->find(1)['bottom'];?></span>
                </div>
    </div>

</body></html>