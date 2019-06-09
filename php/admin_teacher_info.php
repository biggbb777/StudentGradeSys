<!-- 
管理员端教师的首页,该页面有三个功能
1. 查看所有教师的信息
2. 查看某个教师的所有学生的信息或某个老师所教的某个班级的学生成绩信息
3. 删除教师信息或增加教师信息
 -->
<?php
    //下面所有连接数据库的语句 
    require('dbConnection.php');
    $dbc= $dbc=mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
    mysqli_query($dbc,'set names utf8');
?>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>教师信息管理</title>
</head>
<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<body>
<form enctype="multipart/form-data" role="form" action="" method="post">
    <button type="submit" class="btn btn-default" type="button" name="all_teacher">全体教师信息</button>
    <button type="submit" class="btn btn-default" type="button" name="teacher_and_student">查询教师的学生</button>
    <button type="submit" class="btn btn-default" type="button" name="modify_teacher">维护教师信息</button>
    
</div>
</form>
    <?php
        if(isset($_POST['all_teacher'])){
            $home_url='http://'. $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/admin_print_all_teacher.php';
            header('Location:'.$home_url); 
        }
        if(isset($_POST['teacher_and_student'])){
            $home_url='http://'. $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/admin_teacher_and_student.php';
            header('Location:'.$home_url); 
        }
        if(isset($_POST['modify_teacher'])){
            $home_url='http://'. $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/admin_teacher_modify.php';
            header('Location:'.$home_url); 
        }
    ?>
</body>
</html>
