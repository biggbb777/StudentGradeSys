<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>删除教师</title>
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

    <h2>
      <button type="submit" class="btn btn-primary" name="back">
          <span class="glyphicon glyphicon-arrow-left"></span>&nbsp
      </button>
      删除教师
    </h2>
            <input
              type="text"
              class="form-control"
              name="tea_id"
              placeholder="输入工号"
            />
            <br>
              <button
                type="submit"
                class="btn btn-danger"
                type="button"
                name="delete_teacher"
              >
                删除
              </button>
            </span>
</form>
<?php
        require('dbConnection.php');
        $dbc= $dbc=mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
        mysqli_query($dbc,'set names utf8');
        if(isset($_POST['delete_teacher'])){
            require_once('admin_delete_teacher.php');
        }
        if(isset($_POST['back'])){
          $home_url='http://'. $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/admin_teacher_modify.php';
          header('Location:'.$home_url); 
        }
    ?>
</body>
</html>