<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>ByTime</title>

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
<link href="resources/css/default.css" rel="stylesheet" type="text/css" media="screen" />
<script type="text/javascript" src="resources/scripts/jquery-1.3.2.min.js"></script>
<script type="text/javascript">
function check() {
	if ($('#reply').val() == '') {
		alert('请填写评论内容！');
		return false;
	}
	return true;
}
</script>
</head>
<body style="background-image: url(img/bg-03.jpg);background-attachment: fixed;text-align: center;">
<?php include_once 'common/header.php';?>	
<?php include_once 'common/sidebar.php';?>
<div id="page">
<div id="content">
				<?php
					if (!isset($_REQUEST['id'])) {
						echo "<script>alert('该博客不存在! ');window.location='index.php';</script>";
						return;
					}
					$id = $_REQUEST['id'];
					$sql = "select * from news where id=$id";
					$result = mysql_query($sql);
					if ($rs = mysql_fetch_object($result)) {
				?>
					<div class="post">
						<h3 class="title"><a href="news_detail.php?id=<?php echo $rs->id;?>"><?php echo $rs->title;?></a></h3>
						<div class="byline">
							<p class="meta"><?php echo $rs->publish_time;?></p>
						</div>
						<div class="entry">
							<?php
								echo $rs->content;
							?>
						</div>
					</div>
					<div class="post">
						<h3 class="title">评论</h3>
					<?php
						$sql = "select t.*, t2.username from reply t left join `user` t2 on t.user_id=t2.id where t.news_id=$id";
							//echo $sql;
						$result = mysql_query($sql);
						while ($rs = mysql_fetch_object($result)) {
					?>
							<div  class="entry">
								<?php echo $rs->content;?>
							</div>
							<div class="byline">
								<p class="meta"><?php echo $rs->reply_time;?></p>
								<p class="links">评论人：<?php echo $rs->username;?></p>
							</div>
					<?php
						}
					?>
						<div  class="entry">
						<?php
							if (isset($_SESSION['log_id'])) {
						?>
							<form action="reply_submit.php" onsubmit="return check();" method="post">
								<input type="hidden" name="url" value="<?php echo $_SERVER['REQUEST_URI'];?>" />
								<input type="hidden" name="news_id" value="<?php echo $_REQUEST['id'];?>" />
								评论：
								<br />
								<textarea class="form-control" rows="5" name="reply" id="reply"></textarea>
								<br />
								<button type="submit" class="btn btn-primary btn-lg btn-block">提交评论</button>
							</form>
						<?php
							} else {
						?>
							<h4  style="text-align: center; color: #0BD38A;font-size: 15px;">登录后才能评论！
								 <a href="login.php" style="color: #c302fb;text-decoration: none;">现在登录</a><br><br>
								 暂时还没有帐号 ? <a href="register.php"style="color: #c302fb;text-decoration: none;">立即注册</a></h4>
						<?php
							}
						?>
						</div>
				<?php
					} else {
						echo "<script>alert('该博客不存在! ');window.location='index.php';</script>";
						return;
					}
				?>
				
<!-- end #content -->	
<!--
	作者：2676901432@qq.com
	时间：2024-2-26
	描述：脚本
-->
<hr style=" height:5px; color: gray; width: 100%;">

</div>
<!-- end #footer -->
<!--
	作者：2676901432@qq.com
	时间：2024-2-26
	描述：加载选项
-->
<div id="loader-wrapper">	
	<div id="loader"></div>
	<div class="loader-section section-left"></div>
	<div class="loader-section section-right"></div>
</div>
<!--
	作者：2676901432@qq.com
	时间：2024-2-26
	描述：加载js
-->
<script src="js/jquery-1.11.3.min.js"></script>       
<script src="js/tether.min.js"></script> 
<script src="js/bootstrap.min.js"></script>         
<script src="js/hero-slider-main.js"></script>         
<script src="js/jquery.magnific-popup.min.js"></script> 
<script>
// 定义调整页面高度的函数  
function adjustHeightOfPage(pageNo) {  
    // 计算页面的总高度  
    var totalPageHeight = 15                                    // 固定高度  
                          + $('.cd-slider-nav').outerHeight(true) // 导航栏高度（包括margin和padding）  
                          + $(".cd-hero-slider li:nth-of-type(" + pageNo + ") .js-tm-page-content").outerHeight(true) // 当前页面内容高度  
                          + 160                                    // 固定高度  
                          + $('.tm-footer').outerHeight(true);   // 页脚高度  
  
    // 根据页面总高度和窗口高度调整页面布局  
    if (totalPageHeight > $(window).height()) {  
        // 如果页面总高度大于窗口高度，则添加small-screen类并设置最小高度  
        $('.cd-hero-slider').addClass('small-screen');  
        $('.cd-hero-slider li:nth-of-type(' + pageNo + ')').css("min-height", totalPageHeight + "px");  
    } else {  
        // 否则，移除small-screen类并设置最小高度为100%  
        $('.cd-hero-slider').removeClass('small-screen');  
        $('.cd-hero-slider li:nth-of-type(' + pageNo + ')').css("min-height", "100vh"); // 使用视口高度vh代替百分比  
    }  
}  
  
// 当窗口加载完成时执行以下操作  
$(window).on('load', function() {  
    // 初始化时调整第一个页面的高度  
    adjustHeightOfPage(1);  
  
    // 初始化图片画廊的弹出功能  
    $('.tm-img-gallery').magnificPopup({  
        delegate: 'a', // 绑定到a元素上  
        type: 'image', // 弹出内容类型为图片  
        gallery: {  
            enabled: true // 启用画廊模式  
        }  
    });  
  
    // 点击导航栏链接时执行的操作  
    $('#tmNavbar a').on('click', function() {  
        // 隐藏导航栏  
        $('#tmNavbar').collapse('hide');  
          
        // 获取当前链接对应的页面编号，并调整页面高度  
        var pageNo = $(this).data("no");  
        adjustHeightOfPage(pageNo);  
    });  
  
    // 窗口大小改变时调整页面高度  
    $(window).on('resize', function() {  
        // 获取当前选中的页面编号  
        var currentPageNo = $(".cd-hero-slider li.selected .js-tm-page-content").data("page-no");  
        // 调整页面高度  
        adjustHeightOfPage(currentPageNo);  
    });  
  
    // 移除预加载器  
    $('body').addClass('loaded');  
}); 
</script>          
</body>
</html>