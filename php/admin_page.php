<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>管理员页面</title>
</head>
<body>
    <form enctype="multipart/form-data" role="form" action="" method="post">
        <h1>Hi!admin<?php echo $_COOKIE['id']; ?></h1>
            <div>
            <button type="submit" name="teacher_manage">教师管理</button>
            <button type="submit" name="student_manage">学生管理</button>
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
            ?>
    </form>
</body>
</html>
