<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=0;"/>
<title>登录确认</title>
<link rel="stylesheet" type="text/css" href="css/style.css" />
<link rel="stylesheet" href="font-awesome-4.6.3/css/font-awesome.min.css">            
<link rel="stylesheet" href="css/bootstrap.min.css">                                
<link rel="stylesheet" href="css/hero-slider-style.css">                             
<link rel="stylesheet" href="css/magnific-popup.css">           
<link rel="stylesheet" href="css/templatemo-style.css"> 	
<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="js/phone.js" ></script>
<script type="text/javascript" src="js/login.js"></script>
</head>
<body>
  <!--
	作者：2676901432@qq.com
	时间：2024-2-26
    	描述：登录检查
    -->
   
<div id="wrapper">
	 <?php include_once 'common/header.php';?>
	 	<br>	<br>	<br>	<br>	<br>	<br>
	<div id="page">
		<div id="page-bgtop">
			<div id="page-bgbtm">
				<div id="content">
					<div class="post">
						<h2 class="title">登录检查中。。。</h2>
						<div class="entry">
						<?php
							$username = $_POST['username'];
							$password = $_POST['password'];
							$result = mysql_query("select * from user where username='".mysql_real_escape_string($username)."' and password='".mysql_real_escape_string($password)."'");
							if ($rs = mysql_fetch_object($result)) {
								$_SESSION["log_id"] = $rs->id;
								$_SESSION["username"] =  $rs->username;
								echo "<script> window.location='index.php'; </script>";
								return;
							}
							echo "<script>alert('用户名或密码错误！请检查后重新登录！ ');window.location='login.php';</script>";
						?>
						</div>
					</div>				
				</div>
			</div>				
		</div>
<!--
	作者：2676901432@qq.com
	时间：2024-2-26
	描述：脚本
-->
<hr style=" height:5px; color: gray; width: 100%;">
<br><br>
	<?php include_once 'common/footer.php';?>
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