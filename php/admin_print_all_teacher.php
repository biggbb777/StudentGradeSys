<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>全体教师信息</title>
</head>
<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<body>
    <form enctype="multipart/form-data" role="form" action="" method="post">
    <div id="myTabContent" class="tab-content">
    <!-- 所有教师信息标签页:输出所有教师的信息 -->
        <h4 align="center" style="font-weight:bold">所有教师信息</h4>
                <table class="table table-hover table-condensed table-striped" align="center">
                        <tr>
                            <th>编号</th>
                            <th>教职工号</th>
                            <th>姓名</th>
                            <th>教授课程</th>
                            <th>性别</th>
                        </tr>
                    <tbody>
                        <?php
                            require('dbConnection.php');
                            $dbc= $dbc=mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
                            mysqli_query($dbc,'set names utf8');
                            require_once('admin_print_all_teacher_info.php');
                        ?>
                    </tbody>
                </table>
           
    </div>
    </form>
</body>
</html>