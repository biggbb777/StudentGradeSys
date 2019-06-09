
<!-- 
管理员端学生页面,该页面主要的功能有四个
1. 查看所有学生的信息 
2. 查看学生的选课情况,在该页面选择查看的班级,就能查看到选择的班级的所有学生的选课情况
3. 班级成绩信息,在该页面选择科目和班级,能够看到选择的班级和科目的所有学生的成绩
4. 学生信息维护,该页面可以删除学生的信息和增加学生的信息,在删除的时候需要输入学号先查询核对后再进行删除
-->
<?php

    // 连接数据库,以下所有标签页的连接数据的语句都是以下三行
    require('dbConnection.php');
    $dbc=mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
    mysqli_query($dbc,'set names utf8');
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>学生信息管理</title>
</head>

<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
    
<body>
    <!-- 标签页的导航栏 -->
<ul id="myTab" class="nav nav-tabs">
    <li class="active">
        <a href="#studen_infos" data-toggle="tab">
             所有学生信息
        </a>
    </li>
    <li><a href="#student_select_course" data-toggle="tab">学生选课表</a></li>
    <li><a href="#one_class_student_infos" data-toggle="tab">班级成绩信息</a></li>
    <li><a href="#student_info_modify" data-toggle="tab">学生信息维护</a></li>
</ul>
<!-- 导航面板,这是总的div -->
<div id="myTabContent" class="tab-content">
    <!-- 第一个导航标签页:所有学生信息标签页 -->
    <div class="tab-pane fade in active" id="studen_infos">
        <form enctype="multipart/form-data" role="form" action="" method="post">
                <h4 align="center" style="font-weight:bold">所有学生信息</h4>
                <!-- 以表的形式输出所有信息 -->
                <table class="table table-bordered table-hover table-condensed" align="center">
                    <!-- 表头信息 -->
                    <thread>
                        <tr>
                            <th>编号</th>
                            <th>学号</th>
                            <th>姓名</th>
                            <th>班级</th>
                            <th>性别</th>
                        </tr>
                    </thread>
                    <tbody>
                        <?php

                            // 查询所有学生信息的语句
                            $search_all_student_infos=
                            "SELECT stuId,stuName,stuClass,stuSex FROM stuinfo";
                            $s_result=$dbc->query($search_all_student_infos);

                            // 记录有多少条数据
                            $number=1;
                            while($s_row=$s_result->fetch_assoc()){
                                echo "<tr>
                                <td>$number</td>
                                <td>".$s_row['stuId']."</td>
                                <td>".$s_row['stuName']."</td>
                                <td>".$s_row['stuClass']."</td>
                                <td>".$s_row['stuSex']."</td>
                                </tr>";
                                $number=$number+1;
                            }
                        ?>
                    </tbody>
                </table>
            </form>
    </div>

    <!-- 学生选课标签页 -->
    <div class="tab-pane fade" id="student_select_course">
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
    </div>

    <!-- 班级信息标签页 -->
    <div class="tab-pane fade" id="one_class_student_infos">
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
            
        </form>
    </div>

    <!-- 学生信息维护的标签页 -->
    <div class="tab-pane fade" id="student_info_modify">
        <form class="bs-example bs-example-form" enctype="multipart/form-data" role="form" action="" method="post">
        <h4>学生信息维护</h4>
         <!-- 搜索输入框 -->
         <div class="row">
                <div class="col-lg-6">
                    <div class="input-group">
                        <!-- 输入框的名字是stu_id用于a_search_student.php中获取输入的学号 -->
                        <input type="text" class="form-control" name="stu_id" placeholder="先输入删除的学生学号核对后再删除...">
                        <span class="input-group-btn">
                            <!-- button的name是select_student,用于后面判断是否提交 -->
                            <button id="Go" type="submit" class="btn btn-default" type="button" name="select_student">
                                Go!
                            </button>
                        </span>
                    </div><!-- /input-group -->
                </div><!-- /.col-lg-6 -->
            </div><!-- /.row -->
            
            <table class="table table-bordered table-hover table-condensed" align="center">
                
                <tbody>   
                    <?php
                    // 上面的button按钮提交后进行响应,select_student是上面button的名字
                    if(isset($_POST['select_student']))
                    {
                        // 载入a_search_student.php文件
                        require_once('a_search_student.php');
                    }
                    ?>
                </tbody>
            </table>
            <!-- 此按钮的功能是删除查找出来的学生信息,按钮的name是delete_btn -->
            <button type="submit" name="delete_btn">删除</button>
            <?php
            // 响应删除按钮
                if(isset($_POST['delete_btn'])){
                    // 载入a_delete_student.php文件,在该文件中执行删除的语句
                    require_once('a_delete_student.php');
                }
            ?>
        </form>    

    </div>
</div>
</body>
</html>
