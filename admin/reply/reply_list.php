<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Insert title here</title>
<link rel="stylesheet" href="../../resources/css/reset.css" type="text/css" media="screen" />
<link rel="stylesheet" href="../../resources/css/style.css" type="text/css" media="screen" />
<link rel="stylesheet" href="../../resources/css/invalid.css" type="text/css" media="screen" />
<script type="text/javascript" src="../../resources/scripts/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="../../resources/scripts/simpla.jquery.configuration.js"></script>
<script type="text/javascript" src="../../resources/scripts/facebox.js"></script>
<script type="text/javascript" src="../../resources/scripts/iframe-auto.js" defer="defer"></script>
<style type="text/css">
	body {
		background-image:none;
	}
</style>
<script type="text/javascript">

</script>
</head>
<body>
<?php
	include_once '../../common/conn.php';
?>
  <!-- End #sidebar -->
  <div id="main-content" style="margin:0px;padding:0px;">
    <div class="content-box">
      <!-- Start Content Box -->
      <div class="content-box-header">
        <h3>评论列表</h3>
      </div>
      <!-- End .content-box-header -->
      <div class="content-box-content">
        <div class="tab-content default-tab" id="tab1">
        <form id="form1" action="reply_list.php" method="post">
        <div>
        	<input class="text-input small-input" type="text" name="searchText" value="<?php if (isset($_POST['searchText'])) echo $_POST['searchText'];?>" />
        	<input name="submit" type="submit" value="搜索" class="button" />
        </div>
          <table>
            <thead>
              <tr>
                <th>评论内容</th>
                <th>评论博客</th>
                <th>评论人</th>
                <th>评论时间</th>
                <th>删除</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <td colspan="4">
                  <div class="pagination">
                  <?php
                  	$expression = " where 1=1";
                  	if (isset($_POST['searchText'])) {
                  		$searchText = $_POST['searchText'];
                  		$expression.= " and t.content like '%".mysql_real_escape_string($searchText)."%'";
                  		$expression.= " or t2.title like '%".mysql_real_escape_string($searchText)."%'";
                  		$expression.= " or t3.username like '%".mysql_real_escape_string($searchText)."%'";
                  	}

					// 获取当前页数
					if(isset($_GET['page']) ){
						$page = intval( $_GET['page'] );
					}
					else{
						$page = 1;
					}
					// 每页数量
					$page_size = 10;
					// 获取总数据量
					$sql = "select count(*) from reply t left join news t2 on t.news_id=t2.id left join user t3 on t.user_id=t3.id $expression";
					$result = mysql_query($sql);
					$row = mysql_fetch_row($result);
					$amount = $row[0];
					// 记算总共有多少页
					if($amount){
						//如果总数据量小于$pageSize，那么只有一页
						if($amount < $page_size ) {
							$page_count = 1;
						}
						if( $amount % $page_size ) { //取总数据量除以每页数的余数
							$page_count = (int)($amount / $page_size) + 1; //如果有余数，则页数等于总数据量除以每页数的结果取整再加一
						} else{
							$page_count = $amount / $page_size; //如果没有余数，则页数等于总数据量除以每页数的结果
						}
					} else{
						$page_count = 0;
					}

					for ($i = 1; $i <= $page_count; $i++) {
						if ($page == $i) {
							echo '<a href="reply_list.php?page='.$i.'" class="number current" title="'.$i.'">'.$i.'</a>';
						} else {
							echo '<a href="reply_list.php?page='.$i.'" class="number" title="'.$i.'">'.$i.'</a>';
						}
					}
                  ?>
                  </div>
                  <!-- End .pagination -->
                  <div class="clear"></div>
                </td>
              </tr>
            </tfoot>
            <tbody>
            <?php
            	$sql = sprintf("select t.*, t2.title, t3.username from reply t left join news t2 on t.news_id=t2.id left join user t3 on t.user_id=t3.id %s order by id limit ". ($page-1)*$page_size.", $page_size", $expression);
				$result = mysql_query($sql);
				while ($rs = mysql_fetch_object($result)) {
	            	echo '<tr>';
	            	echo '<td>';
	            	echo $rs->content;
	            	echo '</td>';
	            	echo '<td>';
	            	echo $rs->title;
	            	echo '</td>';
	            	echo '<td>';
	            	echo $rs->username;
	            	echo '</td>';
	            	echo '<td>';
	            	echo $rs->reply_time;
	            	echo '</td>';
	            	echo '<td>';
	            	echo '<a href="reply_delete.php?id='.$rs->id.'" title="删除"><img src="../../resources/images/icons/cross.png" alt="删除" /></a>';
	            	echo '</td>';
	            	echo '</tr>';
				}
				mysql_close($link);
            ?>
            </tbody>
          </table>
          </form>
        </div>
      </div>
      <!-- End .content-box-content -->
    </div>
  </div>
  <!-- End #main-content -->
</body>
</html>