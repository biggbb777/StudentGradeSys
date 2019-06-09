<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>学生成绩信息</title>
</head>
<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<body>
<h4>学生成绩信息</h4>
        <form class="bs-example bs-example-form" enctype="multipart/form-data" role="form" action="" method="post">
                    
            <!-- 科目选择 -->
            <select name="course_choice" class="form-control">
            <option value="C01">语文</option>
            <option value="M01">数学</option>
            <option value="E01">英语</option>
            <option value="P01">物理</option>
            <option value="C02">化学</option>
            <option value="B01">生物</option>
            <option value="P02">政治</option>
            <option value="G02">地理</option>
            <option value="H01">历史</option>
            </select>
        
            <!-- 搜索输入框 -->
            <div class="row">
                <div class="col-lg-6">
                    <div class="input-group">
                        <!-- 输入框的name是one_class用于a_print_Oneclass_grades.php页面获取输入的内容 -->
                        <input type="text" class="form-control" name="one_class" placeholder="请输入要查询的班级...">
                        <span class="input-group-btn">
                            <!-- button的名子是class_grades是下面该按钮的响应时所使用的名字 -->
                            <button type="submit" class="btn btn-default" type="button" name="class_grades">
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
                //    上面button的名字,button点击后响应a_print_Oneclass_grades.php文件
                    if(isset($_POST['class_grades']))
                    {
                        // 在print_Oneclass_select_course.php页面进行操作
                        require_once('a_print_Oneclass_grades.php');
                    }
                    ?>
                </tbody>
            </table>
</body>
</html>