<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html> 
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<?php
	include_once '../../common/conn.php';
	$id=$_POST['id'];
	$title=$_POST['title'];
	$content=$_POST['content'];
	$publish_time=$_POST['publish_time'];
	$news_type_id=$_POST['news_type_id'];
	$sql = "update news set "
				."title='".mysql_real_escape_string($title)."',"
				."content='".mysql_real_escape_string($content)."',"
				."publish_time='".mysql_real_escape_string($publish_time)."',"
				."news_type_id=".mysql_real_escape_string($news_type_id)
				." where id=".mysql_real_escape_string($id);
	$result = mysql_query($sql);
	mysql_close($link);
	echo "<script>alert('更新成功! ');window.location='news_list.php';</script>";

?>
</head>
</html>