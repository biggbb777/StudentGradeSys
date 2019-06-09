<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<body>
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
                require_once('admin_print_all_student_info.php');
            ?>
        </tbody>
    </table>
</body>
</html>
