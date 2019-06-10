
<!-- 
管理员端学生页面,该页面主要的功能有四个
1. 查看所有学生的信息 
2. 查看学生的选课情况,在该页面选择查看的班级,就能查看到选择的班级的所有学生的选课情况
3. 班级成绩信息,在该页面选择科目和班级,能够看到选择的班级和科目的所有学生的成绩
4. 学生信息维护,该页面可以删除学生的信息和增加学生的信息,在删除的时候需要输入学号先查询核对后再进行删除
-->
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>学生信息管理</title>
</head>
<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="../css/admin_page.css">
<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style>
    .btn-lg{
        margin-top: 150px;
        width: 280px;
        height: 320px;
        font-size: 40px;
    }
</style>
<body>
    <form enctype="multipart/form-data" role="form" action="" method="post">
    <button type="submit" class="btn btn-primary" name="back">
        <span class="glyphicon glyphicon-arrow-left"></span>&nbsp
    </button>
    <div class="container">
        <button type="submit" class="btn btn-primary btn-lg" type="button" name="all_student">全体学生信息</button>
        <button type="submit" class="btn btn-success btn-lg" type="button" name="student_course">学生选课表</button>
        <button type="submit" class="btn btn-warning btn-lg" type="button" name="class_grade">班级成绩信息</button>
        <button type="submit" class="btn btn-info btn-lg" type="button" name="student_modify">学生信息维护</button>
    </div>
    </form>
    <?php
        if(isset($_POST['all_student'])){
            $home_url='http://'. $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/admin_print_all_student.php';
            header('Location:'.$home_url); 
        }
        if(isset($_POST['student_course'])){
            $home_url='http://'. $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/admin_student_course.php';
            header('Location:'.$home_url); 
        }
        if(isset($_POST['class_grade'])){
            $home_url='http://'. $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/admin_class_grade.php';
            header('Location:'.$home_url); 
        }
        if(isset($_POST['student_modify'])){
            $home_url='http://'. $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/admin_student_modify.php';
            header('Location:'.$home_url); 
        }
        if(isset($_POST['back'])){
            $home_url='http://'. $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/admin_page.php';
            header('Location:'.$home_url); 
        }
    ?>


</body>
</html>
