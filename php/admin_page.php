<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../css/admin_page.css">
    <title>管理员页面</title>
</head>
<body>
    <form enctype="multipart/form-data" role="form" action="" method="post">
    <button type="submit" class="btn btn-primary home_button" name="home"><span class="glyphicon glyphicon-home"></span>&nbsp<br>回到首页</button>
        <h1>Hi! Admin:<?php echo $_COOKIE['id']; ?></h1>
            <div>
            <button type="submit" name="teacher_manage" class="btn btn-primary btn-lg">教师管理</button>
            <button type="submit" name="student_manage" class="btn btn-success btn-lg">学生管理</button>
            </div>

            <?php
              //跳转到学生信息管理页面
                if(isset($_POST['student_manage']))
                {
                  
                    $home_url='http://'. $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/admin_student_info.php';
                    header('Location:'.$home_url); 
                }
                  //跳转到教师信息管理页面
                if(isset($_POST['teacher_manage']))
                {
                    // 
                    $home_url='http://'. $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/admin_teacher_info.php';
                    header('Location:'.$home_url); 
                }
                if(isset($_POST['home']))
                {//跳转至登录页面
                    $home_url='http://'. $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/../login.php';
                    header('Location:'.$home_url);      
                }
            ?>
    </form>
</body>
</html>
