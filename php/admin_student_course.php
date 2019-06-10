<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>学生选课信息</title>
</head>
<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="../css/admin_teacher_and_student.css">
<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<body>
<form class="bs-example bs-example-form" enctype="multipart/form-data" role="form" action="" method="post">
<button type="submit" class="btn btn-primary" name="back">
        <span class="glyphicon glyphicon-arrow-left"></span>&nbsp
</button>  
<h2>学生选课表</h2>
        
                        <!-- 输入标签的name是select_class1,用于print_Oneclass_select_course.php文件中获取输入的班级 -->
            <input type="text" class="form-control" name="select_class1" placeholder="请输入要查询的班级...">
                            <!-- 此处提交按钮的名字是class_course,用于下面php里判断是否提交,进行响应 -->
            <br>
            <button type="submit" class="btn btn-primary" type="button" name="class_course">
                                查询</button>
            <br>
            <br>
            <table class="table table-bordered table-hover table-condensed" align="center">
                <tbody>   
                <?php
                //    class_course是上面button的名字
                    if(isset($_POST['class_course']))
                    {
                        // 在print_Oneclass_select_course.php页面进行操作
                        require('admin_print_oneclass_select_course.php');
                    }
                    if(isset($_POST['back'])){
                        $home_url='http://'. $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/admin_student_info.php';
                        header('Location:'.$home_url); 
                    }
                    ?>
                </tbody>
            </table>
        </form>
</body>
</html>