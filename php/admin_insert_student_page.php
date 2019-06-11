<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>增加学生</title>
</head>
<link
    rel="stylesheet"
    href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css"
  />
  <link rel="stylesheet" href="../css/admin_teacher_and_student.css">
  <script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
  <script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<body>
<form enctype="multipart/form-data" role="form" action="" method="post">
<button type="submit" class="btn btn-primary" name="back">
        <span class="glyphicon glyphicon-arrow-left"></span>&nbsp
</button>  
<h2>增加学生信息</h2>
                <!-- 增加学生基本信息 -->
        <input type="text" class="form-control" name="add_stu_id" placeholder="学生学号...">
                <!-- <br> -->
        <input type="text" class="form-control" name="add_stu_name" placeholder="姓名...">
        <input type="text" class="form-control" name="add_stu_class" placeholder="班级...">
                <!-- <br> -->
        <input type="text" class="form-control" name="add_stu_sex" placeholder="性别...">
            <br>
                <!-- 添加信息按钮 -->
        <button id="add" type="submit" class="btn btn-primary" type="button" name="add_student">添加</button>
            <?php
            if(isset($_POST['add_student'])){
                    // 执行添加学生信息
                require_once('admin_insert_student.php');
            }
            if(isset($_POST['back'])){
                $home_url='http://'. $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/admin_student_modify.php';
                header('Location:'.$home_url); 
            }
            ?>
</form>
</body>
</html>
