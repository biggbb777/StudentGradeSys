<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>学生选课信息</title>
</head>
<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<body>
<h4>学生选课表</h4>
        <form class="bs-example bs-example-form" enctype="multipart/form-data" role="form" action="" method="post">
            <!-- 搜索输入框 -->
            <div class="row">
                <div class="col-lg-6">
                    <div class="input-group">
                        <!-- 输入标签的name是select_class1,用于print_Oneclass_select_course.php文件中获取输入的班级 -->
                        <input type="text" class="form-control" name="select_class1" placeholder="请输入要查询的班级...">
                        <span class="input-group-btn">
                            <!-- 此处提交按钮的名字是class_course,用于下面php里判断是否提交,进行响应 -->
                            <button type="submit" class="btn btn-default" type="button" name="class_course">
                                Go!
                            </button>
                        </span>
                    </div><!-- /input-group -->
                </div><!-- /.col-lg-6 -->
            </div><!-- /.row -->
            <br>
            <br>
            <table class="table table-bordered table-hover table-condensed" align="center">
                <tbody>   
                <?php
                //    class_course是上面button的名字
                    if(isset($_POST['class_course']))
                    {
                        // 在print_Oneclass_select_course.php页面进行操作
                        require('print_Oneclass_select_course.php');
                    }
                    ?>
                </tbody>
            </table>
        </form>
</body>
</html>