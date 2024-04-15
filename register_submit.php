<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">

        <title>LOYO时光</title>

        <link rel="stylesheet" href="font-awesome-4.6.3/css/font-awesome.min.css">            
        <link rel="stylesheet" href="css/bootstrap.min.css">                                
        <link rel="stylesheet" href="css/hero-slider-style.css">                             
        <link rel="stylesheet" href="css/magnific-popup.css">           
        <link rel="stylesheet" href="css/templatemo-style.css">	
        <script type="text/javascript" src="resources/scripts/jquery-1.3.2.min.js"></script>
        <link rel="stylesheet" type="text/css" href="css/style.css" />
        <script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
        <script type="text/javascript" src="js/phone.js" ></script>
        <script type="text/javascript" src="js/login.js"></script>
    </head>
    <body style="background-image:url(img/bg-03.jpg); text-align: center;">

        <div id="wrapper">
            <?php include_once 'common/header.php'; ?>
            <br><br><br>	<br><br><br>	<br><br><br>
            <div class="post">
                <h1 class="title">注册检查中。。。</h1>
                <div class="entry">
                    <?php
                    header("Content-Type: text/html;charset=utf-8");
// $Id:$ //声明变量
                    $username = isset($_POST['username']) ? $_POST['username'] : "";
                    $password = isset($_POST['password']) ? $_POST['password'] : "";
                    $re_password = isset($_POST['re_password']) ? $_POST['re_password'] : "";
                    $qq = isset($_POST['qq']) ? $_POST['qq'] : "";
                    $email = isset($_POST['email']) ? $_POST['email'] : "";
                    $phone = isset($_POST['phone']) ? $_POST['phone'] : "";
                    $address = isset($_POST['address']) ? $_POST['address'] : "";

                    if ($password == $re_password) { //建立连接
                        $conn = mysqli_connect("localhost", "root", "123456789", "php_blog"); //准备SQL语句,查询用户名
                        mysqli_set_charset($conn, "utf8");
                        $sql_select = "SELECT * FROM user WHERE username = '$username'"; //执行SQL语句
                        $ret = mysqli_query($conn, $sql_select);
                        $row = mysqli_fetch_array($ret); //判断用户名是否已存在
                        if ($username == $row['username']) { //用户名已存在，显示提示信息
                            header("Location:register.php?err=1");
                        } else { //用户名不存在，插入数据 //准备SQL语句
                            $sql_insert = "INSERT INTO user(username,password,qq,email,phone,address) 
VALUES('$username','$password','$qq','$email','$phone','$address')"; //执行SQL语句
                            mysqli_query($conn, $sql_insert);
                            header("Location:register.php?err=3");
                        } //关闭数据库
                        mysqli_close($conn);
                    } else {
                        header("Location:register.php?err=2");
                    }
                    ?>
                </div>

            </div>

            <div class="whole">

                <div class="coordinates-icon">
                    <div class="coordinates topAct">
                        <img src="image/coordinates.png" />
                    </div>
                    <div class="circle-1-1 circle-show-2"></div>
                    <div class="circle-2-2 circle-show-1"></div>
                    <div class="circle-3-3 circle-show"></div>
                </div>		
            </div>

            <div style="clear: both;"></div>
            <br><br><br>
            <hr style=" height:5px; color: gray; width: 100%;">
            <?php include_once 'common/footer.php'; ?>
        </div>
        <!-- end #footer -->      
    </body>
</html>