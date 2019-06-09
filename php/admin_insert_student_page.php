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
  <script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
  <script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<body>
<form enctype="multipart/form-data" role="form" action="" method="post">
<h4>增加学生信息</h4>
                <!-- 增加学生基本信息 -->
        <input type="text" class="form-control" name="add_stu_id" placeholder="学生学号..." required>
                <!-- <br> -->
        <input type="text" class="form-control" name="add_stu_name" placeholder="姓名..." required>
                <br>
        <input type="text" class="form-control" name="add_stu_class" placeholder="班级..." required>
                <!-- <br> -->
        <input type="text" class="form-control" name="add_stu_sex" placeholder="性别..." required>
            <br>
                <!-- 添加信息按钮 -->
        <button id="add" type="submit" class="btn btn-default" type="button" name="add_student">添加</button>
            <?php
            if(isset($_POST['add_student'])){
                    // 执行添加学生信息
                require_once('admin_insert_student.php');
            }
            ?>
</form>
</body>
</html>
