<!DOCTYPE html>
<html>
<head>   
<meta charset="utf-8">
<style>
     /* 添加白色边框样式 */
    #content-container {
        border: 1px solid #ffffff; /* 白色边框 */
        padding: 20px; /* 内边距 */
        background-color: rgba(255, 255, 255, 0.7); /* 设置背景颜色，可以调整透明度 */
        display: inline-block; /* 使用内联块级元素，使容器大小随内容变化 */
    }

    /* 其他样式保持不变 */
    body {  
        position: relative; /* 确保伪元素可以相对于body定位 */  
        text-align: center;  
        margin: 0; /* 移除默认的边距 */  
        padding: 0; /* 移除默认的内边距 */  
        overflow: hidden; /* 隐藏超出body的内容 */  
    }  

    body::before {  
        content: ""; /* 伪元素需要内容才能显示，但这里不需要实际内容 */  
        position: absolute; /* 绝对定位，使其脱离文档流并覆盖整个body */  
        top: 0;  
        left: 0;  
        width: 100%;  
        height: 100%;  
        background-image: url('img/bg-03.jpg'); /* 背景图片 */  
        background-attachment: fixed;  
        background-size: cover; /* 背景图片覆盖整个元素 */  
        opacity: 0.2; /* 设置背景图片的透明度 */  
        z-index: -1; /* 确保伪元素在文本内容之下 */  
    }  

    /* 为了确保文本是清晰的，你可能还需要设置文本的颜色和样式 */  
    body, html {  
        color: white; /* 设置文本颜色为白色或其他与背景图片对比度高的颜色 */  
        font-family: Arial, sans-serif; /* 设置字体 */  
    }  
 </style>
<title>搜索结果</title>
<!--
    作者：2676901432@qq.com
    时间：2024-2-26
    描述：加载样式
-->
<link href="resources/css/default.css" rel="stylesheet" type="text/css" media="screen" />
<link rel="stylesheet" href="font-awesome-4.6.3/css/font-awesome.min.css">            
<link rel="stylesheet" href="css/bootstrap.min.css">                                
<link rel="stylesheet" href="css/hero-slider-style.css">                             
<link rel="stylesheet" href="css/magnific-popup.css">           
<link rel="stylesheet" href="css/templatemo-style.css">     
</head>
<body style="background-image: url(img/bg-03.jpg);background-attachment: fixed;text-align: center;">
<div class="cd-hero">
<!--
    作者：2676901432@qq.com
    时间：2024-2-26
        描述：导航
-->
    <?php include_once 'common/header.php';?>
    <div id="page"  style="margin:0 auto;">
        <!--
            作者：2676901432@qq.com
                时间：2024-2-26
                描述：搜索
         -->
    <div style="clear: both;"><br></div>
    <br><hr style=" height:5px; color: gray; width: 63%;">
    <?php include_once 'common/sidebar.php';?>
    
    <!-- end #sidebar -->
</div>


<div id="wrapper" >
    <div id="page">
                <div id="content" >
                <?php
                    $expression = " where 1=1";
                    if (isset($_REQUEST['s']) && $_REQUEST['s'] != "") {
                        $searchText = $_REQUEST['s'];
                        $expression.= " and title like '%".mysql_real_escape_string($searchText)."%'";
                        $expression.= " or content like '%".mysql_real_escape_string($searchText)."%'";
                    }
                    // 获取当前页数
                    if(isset($_GET['page']) ){
                        $page = intval($_GET['page']);
                    }
                    else{
                        $page = 1;
                    }
                    // 每页数量
                    $page_size = 6;
                    // 获取总数据量
                    $sql = "select count(*) from news $expression";
                    $result = mysql_query($sql);
                    $row = mysql_fetch_row($result);
                    $amount = $row[0];
                    // 计算总共有多少页
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

                    $pagination = '';
                    for ($i = 1; $i <= $page_count; $i++) {
                        if ($page == $i) {
                            $pagination .= '<a href="news_search.php?page='.$i.'" class="number current" title="'.$i.'">'.$i.'</a>';
                        } else {
                            $pagination .= '<a href="news_search.php?page='.$i.'" class="number" title="'.$i.'">'.$i.'</a>';
                        }
                    }


                    $sql = "select * from news $expression order by publish_time desc limit ". ($page-1)*$page_size.", $page_size";
                    $result = mysql_query($sql);
                    while ($rs = mysql_fetch_object($result)) {
                ?>
                    <div class="post">
                        <h3 class="title"><a href="news_detail.php?id=<?php echo $rs->id;?>"><?php echo $rs->title;?></a></h3>
                        <div class="byline">
                            <p class="meta"><?php echo $rs->publish_time;?></p>
                            <p class="links"><a href="news_detail.php?id=<?php echo $rs->id;?>">阅读全文</a></p>
                        </div>
                    </div>
                <?php
                    }
                ?>
                    <div class="pagination">
                    <?php
                        echo $pagination;
                    ?>
                    </div>
                    <div style="clear: both;">&nbsp;</div>
                </div>
                <!-- end #content -->
        
    </div>
<!--
    作者：2676901432@qq.com
    时间：2024-2-26
    描述：脚本
-->
<div style="clear: both;"><br></div>
<br><hr style=" height:5px; color: gray; width: 100%;">
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
<!-- end #footer -->
</body>
</html>
