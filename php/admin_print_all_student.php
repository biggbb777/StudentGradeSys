<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>全体学生信息</title>
</head>
<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<body>
<form action="" method="post">
<button type="submit" class="btn btn-primary" name="back">
        <span class="glyphicon glyphicon-arrow-left"></span>&nbsp
</button>
</form>
<h4 align="center" style="font-weight:bold">所有学生信息</h4>
                <!-- 以表的形式输出所有信息 -->
    <table class="table table-bordered table-hover table-condensed" align="center">
        <tr>
            <th>编号</th>
            <th>学号</th>
            <th>姓名</th>
            <th>班级</th>
            <th>性别</th>
        </tr>
        <tbody>
            <?php
                if(isset($_POST['back'])){
                    $home_url='http://'. $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/admin_student_info.php';
                    header('Location:'.$home_url); 
                }
                require_once('admin_print_all_student_info.php');
                
            ?>
        </tbody>
    </table>
</body>
</html>
