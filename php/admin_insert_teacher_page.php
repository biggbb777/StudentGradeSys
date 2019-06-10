<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>添加教师</title>
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
<h2>增加教师信息</h2>
                <!-- 增加教师基本信息 -->
                <input type="text" class="form-control" name="add_tea_id" placeholder="教职工号..." required>
                <!-- <br> -->
                <input type="text" class="form-control" name="add_tea_name" placeholder="教师姓名..." required>
                <br>
                <input type="text" class="form-control" name="add_tea_sex" placeholder="教师性别..." required>
                <br>
                <!-- 添加信息按钮 -->
                <button id="add" type="submit" class="btn btn-success" type="button" name="add_teacher">添加</button>
                <?php
                if(isset($_POST['add_teacher'])){
                    // 执行添加教师信息
                    require_once('admin_insert_teacher.php');
                }
                ?>
</form>
</body>
</html>