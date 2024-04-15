<?php error_reporting(0);
session_start();
	include_once 'conn.php';
?>

<div class="cd-slider-nav">
		<nav class="navbar">
			<button class="navbar-toggler hidden-md-up" type="button" data-toggle="collapse" data-target="#tmNavbar">
				&#9776;
			</button>
			<div class="collapse navbar-toggleable-sm text-xs-center text-uppercase tm-navbar" id="tmNavbar">
				<ul class="nav navbar-nav">
			        <li class="nav-item active selected"><a class="nav-link" href="index.php" >首页 </a></li>
					<?php
					 if (isset($_SESSION['username']))  { 
					 	?>
					<li class="nav-item" ><a class="nav-link" href="logout.php">退出</a></li>
					
				    <?php
				     } else { 
				     	?>
					<li  class="nav-item"><a class="nav-link"  href="register.php">注册</a></li>
					<li  class="nav-item"><a class="nav-link" href="login.php">登录</a></li>
				   <?php 
					 } 
					 ?>
				   	<li  class="nav-item"><a  class="nav-link" href="admin/" target="_blank">后台管理</a></li>					
				</ul>
			</div>
		</nav>
</div> 

