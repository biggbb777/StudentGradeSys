<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>学生信息维护</title>
</head>
<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="../css/admin_teacher_modify.css">
<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<body>
<form enctype="multipart/form-data" role="form" action="" method="post">
    <button type="submit" class="btn btn-primary" name="back">
        <span class="glyphicon glyphicon-arrow-left"></span>&nbsp
    </button>
    <div class="container">
        <button type="submit" class="btn btn-primary btn-lg" type="button" name="insert_student">添加学生</button>
        <button type="submit" class="btn btn-success btn-lg" type="button" name="delete_student">删除学生</button>
    </div>
     <?php
        if(isset($_POST['insert_student'])){
            $home_url='http://'. $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/admin_insert_student_page.php';
            header('Location:'.$home_url); 
        }
        if(isset($_POST['delete_student'])){
            $home_url='http://'. $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/admin_delete_student_page.php';
            header('Location:'.$home_url); 
        }
        if(isset($_POST['back'])){
            $home_url='http://'. $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/admin_student_info.php';
            header('Location:'.$home_url); 
          }
    ?>
</form>
</body>
</html>