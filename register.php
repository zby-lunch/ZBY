<!DOCTYPE html>
<html>
    <head>
        <style>
            body
            {
                margin: 0;
                padding: 0;
            }
            #bigBox
            {
                margin: 0 auto;	/* login框剧中 */
                margin-top: 5px; /* login框与顶部的距离 */
                padding: 20px 50px;	/* login框内部的距离(内部与输入框和按钮的距离) */
                background-color: #00000090;	/* login框背景颜色和透明度 */
                width: 400px;
                height: 700px;
                border-radius: 10px;	/* 圆角边 */
                text-align: center;	/* 框内所有内容剧中 */
            }
            #bigBox h1
            {
                color: white;	/* LOGIN字体颜色 */
                font-family: "Comic Sans MS";
            }
            #bigBox .inputBox
            {
                margin-top: 15px;	/* 输入框顶部与LOGIN标题的间距 */
            }
            #bigBox .inputBox .inputText
            {
                margin-top: 2px;	/* 输入框之间的距离 */
            }
            #bigBox .inputBox .inputText input
            {
                border: 0;	/* 删除输入框边框 */
                padding: 10px 10px;	/* 输入框内的间距 */
                border-bottom: 1px solid white;	/* 输入框白色下划线 */
                background-color: #00000000;	/* 输入框透明 */
                color: white;	/* 输入字体的颜色 */
            }
            #bigBox .loginButton
            {

                margin-right: 30px;
                margin-top: 14px;	/* 按钮顶部与输入框的距离 */
                width: 100px;
                height: 25px;
                color: white;	/* 按钮字体颜色 */
                border: 0; /* 删除按钮边框 */
                border-radius: 20px;	/* 按钮圆角边 */
                background-image: linear-gradient(to right, #b8cbb8 0%, #b8cbb8 0%, #b465da 0%, #cf6cc9 33%, #ee609c 66%, #ee609c 100%);	/* 按钮颜色 */
            }
            .m-left{
                margin-left: 40px;

            }
        </style>
        <meta charset="utf-8">

        <title>注册·ByTime</title>
        <link rel="stylesheet" type="text/css" href="css/style.css" />
        <script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
        <script type="text/javascript" src="js/phone.js" ></script>
        <script type="text/javascript" src="js/login.js"></script>
        <link rel="stylesheet" href="font-awesome-4.6.3/css/font-awesome.min.css">            
        <link rel="stylesheet" href="css/bootstrap.min.css">                                
        <link rel="stylesheet" href="css/hero-slider-style.css">                             
        <link rel="stylesheet" href="css/magnific-popup.css">           
        <link rel="stylesheet" href="css/templatemo-style.css"> 	
        <script type="text/javascript" src="resources/scripts/jquery-1.3.2.min.js"></script>
        <script type="text/javascript">
            function check() {
                if ($('#username').val() == '' || $('#password').val() == '') {
                    alert('请输入用户名和密码！');
                    return false;
                }
                return true;
            }
        </script>	
    </head>
    <body style="background-image:url(img/bg-03.jpg); text-align: center;">

        <div class="whole">
            <?php include_once 'common/header.php'; ?>
            <br><br><br>
            <div class="title" style="color:blue;">欢迎注册·LOYO时光</div>
            <div class="coordinates-icon">
                <div class="coordinates topAct">
                    <img src="image/coordinates2.png" />
                </div>
                <div class="circle-1-1 circle-show-2"></div>
                <div class="circle-2-2 circle-show-1"></div>
                <div class="circle-3-3 circle-show"></div>
            </div>
        </div>
        <div id="bigBox">
            <h1>注册页面</h1>
            
            <form action="register_submit.php" method="post" name="form1">
                <div class="inputBox">

                    <div class="inputText">
                        <input type="text" id="id_name" name="username" required="required" placeholder="Username">
                    </div>
                    <div class="inputText">
                        <input type="password" id="password" name="password" required="required" placeholder="Password">
                    </div>
                    <div class="inputText">
                        <input type="password" id="re_password" name="re_password" required="required" placeholder="PasswordAgain">
                    </div>
                    <div class="inputText">
                        <input type="text" id="qq" name="qq" required="required" placeholder="QQ">
                    </div>
                    <div class="inputText">
                        <input type="email" id="email" name="email" required="required" placeholder="Email">
                    </div>
                    <div class="inputText">
                        <input type="text" id="phone" name="phone" required="required" placeholder="Phone">
                    </div>
                    <div class="inputText">
                        <input type="text" id="address" name="address" required="required" placeholder="Address">
                    </div>
                    <div style="color: red;font-size: 10px" >
                        <!--提示信息-->
                        <?php
                        $err = isset($_GET["err"]) ? $_GET["err"] : "";
                        switch ($err) {
                            case 1:
                                echo "用户名已存在！";
                                break;

                            case 2:
                                echo "密码与重复密码不一致！";
                                break;

                            case 3:
                                echo "注册成功！";
                                break;
                        }
                        ?>
                    </div>
                    <div>
                        <input type="submit" id="register" name="register" value="注册" class="loginButton m-left"><input type="reset" id="reset" name="reset" value="重置" class="loginButton">
                        <br />
                        <a href="login.php" style="color: white">已有账号，去登录!</a>
                    </div>
                </div>

            </form>
        </div>

        <div id="loader-wrapper">	
            <div id="loader"></div>
            <div class="loader-section section-left"></div>
            <div class="loader-section section-right"></div>
        </div>
        <!--
                描述：加载js
        -->
        <script src="js/jquery-1.11.3.min.js"></script>       
        <script src="js/tether.min.js"></script> 
        <script src="js/bootstrap.min.js"></script>         
        <script src="js/hero-slider-main.js"></script>         
        <script src="js/jquery.magnific-popup.min.js"></script> 
        <script>
        function adjustHeightOfPage(pageNo) {
            // Get the page height
            var totalPageHeight = 15 + $('.cd-slider-nav').height()
                    + $(".cd-hero-slider li:nth-of-type(" + pageNo + ") .js-tm-page-content").height() + 160
                    + $('.tm-footer').height();
            // Adjust layout based on page height and window height
            if (totalPageHeight > $(window).height())
            {
                $('.cd-hero-slider').addClass('small-screen');
                $('.cd-hero-slider li:nth-of-type(' + pageNo + ')').css("min-height", totalPageHeight + "px");
            } else
            {
                $('.cd-hero-slider').removeClass('small-screen');
                $('.cd-hero-slider li:nth-of-type(' + pageNo + ')').css("min-height", "100%");
            }

        }
        /*
         Everything is loaded including images.
         */
        $(window).load(function () {
            adjustHeightOfPage(1); // Adjust page height
            /* Gallery pop up
             -----------------------------------------*/
            $('.tm-img-gallery').magnificPopup({
                delegate: 'a', // child items selector, by clicking on it popup will open
                type: 'image',
                gallery: {enabled: true}
            });
            /* Collapse menu after click 
             -----------------------------------------*/
            $('#tmNavbar a').click(function () {
                $('#tmNavbar').collapse('hide');
                adjustHeightOfPage($(this).data("no")); // Adjust page height       
            });
            /* Browser resized 
             -----------------------------------------*/
            $(window).resize(function () {
                var currentPageNo = $(".cd-hero-slider li.selected .js-tm-page-content").data("page-no");
                adjustHeightOfPage(currentPageNo);
            });
            // Remove preloader
            // https://ihatetomatoes.net/create-custom-preloading-screen/
            $('body').addClass('loaded');
        });
        </script>          
    </body>
</html>