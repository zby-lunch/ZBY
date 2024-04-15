<html lang="zh-CN">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ByTime</title>
    <!-- 引入FontAwesome图标 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- 引入Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- 自定义CSS -->
    <style>
        /* 添加自定义样式 */
        body {
            background-image: url("img/bg-01.jpg");
            background-attachment: fixed;
            text-align: center;
            color: #fff;
        }

        .navbar {
            background-color: rgba(0, 0, 0, 0.5) !important;
        }

        .navbar-brand {
            font-size: 24px;
            color: #fff !important;
        }

        .navbar-nav .nav-item .nav-link {
            font-size: 18px;
            color: #fff !important;
            margin-left: 10px;
        }

        .content {
            margin-top: 20px;
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.5);
            border-radius: 5px;
            color: #000;
        }

        .post {
            margin-bottom: 40px;
        }

        .title a {
            color: #007bff;
            font-size: 24px;
            font-weight: bold;
            text-decoration: none;
        }

        .entry {
            font-size: 18px;
        }

        .meta {
            font-size: 14px;
            color: #6c757d;
            margin-bottom: 5px;
        }

        .links a {
            color: #0BD38A;
            text-decoration: none;
        }

        .links a:hover {
            text-decoration: underline;
        }

        hr {
            height: 5px;
            background-color: #ccc;
            width: 100%;
            border: none;
            margin-top: 40px;
        }
        
        /* 新增样式用于头像 */
        .avatar {
            float: left;
            margin-right: 20px;
            margin-bottom: 20px;
            border-radius: 50%;
            width: 100px; /* 调整头像大小 */
            height: 100px;
            overflow: hidden;
        }

        .avatar img {
            width: 100%;
            height: auto;
        }
        .navbar-toggler {
        display: none !important;
        }
    </style>
</head>

<body>
    <!-- 导航 -->
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="#">LOYO空间</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="#">首页</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="register.php">注册</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">登录</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="admin/" target="_blank">后台管理</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>