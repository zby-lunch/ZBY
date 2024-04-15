<?php
session_start();
session_destroy();
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">

<title>退出登录</title>

<!--
	作者：2676901432@qq.com
	时间：2024-2-26
	描述：加载样式
-->

<link rel="stylesheet" href="font-awesome-4.6.3/css/font-awesome.min.css">            
<link rel="stylesheet" href="css/bootstrap.min.css">                                
<link rel="stylesheet" href="css/hero-slider-style.css">                             
<link rel="stylesheet" href="css/magnific-popup.css">           
<link rel="stylesheet" href="css/templatemo-style.css"> 	
</head>
<body style="margin: 0 auto; text-align: center;">
<div id="wrapper">
	<?php include_once 'common/header.php';?>
		<br><br><br><br><br><br><br><br><br>
	<div id="page">
		<div id="page-bgtop">
			<div id="page-bgbtm">
				<div id="content">
					<div class="post">
						<h2 class="title">正在退出，请稍等...</h2>
						<div class="entry">
						<?php
							//unset($_SESSION['username']);
							echo "<script>window.location='index.php';</script>";
						?>
						</div>
					</div>
					<div style="clear: both;">&nbsp;</div>
				</div>
				<!-- end #content -->
				<?php include_once 'common/sidebar.php';?>
				<!-- end #sidebar -->
				<div style="clear: both;">&nbsp;</div>
			</div>
		</div>
	</div>
	<?php include_once 'common/footer.php';?>
</div>
<!-- end #footer -->
</body>
</html>
