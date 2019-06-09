<!-- 
管理员端教师的首页,该页面有三个功能
1. 查看所有教师的信息
2. 查看某个教师的所有学生的信息或某个老师所教的某个班级的学生成绩信息
3. 删除教师信息或增加教师信息
 -->
<?php

    //下面所有连接数据库的语句 
    require('dbConnection.php');
    $dbc= $dbc=mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
    mysqli_query($dbc,'set names utf8');
?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>教师信息管理</title>
</head>
<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<body>

<!-- 标签导航页 -->
<ul id="myTab" class="nav nav-tabs">
    <li class="active">
        <a href="#teacher_infos" data-toggle="tab">
             所有教师信息
        </a>
    </li>
    <li><a href="#teachers_student_list" data-toggle="tab">教师所教的学生名单</a></li>
    <li><a href="#teacher_info_modify" data-toggle="tab">教师信息维护</a></li>
</ul>
<!-- 导航面板 -->
<div id="myTabContent" class="tab-content">
    <!-- 所有教师信息标签页:输出所有教师的信息 -->
    <div class="tab-pane fade in active" id="teacher_infos">
        <form enctype="multipart/form-data" role="form" action="" method="post">
                <h4 align="center" style="font-weight:bold">所有教师信息</h4>
                <table class="table table-bordered table-hover table-condensed" align="center">
                    <thread>
                        <tr>
                            <th>编号</th>
                            <th>教职工号</th>
                            <th>姓名</th>
                            <th>教授课程</th>
                            <th>性别</th>
                        </tr>
                    </thread>
                    <tbody>
                        <?php
                        
                            //查询所有教师的语句 
                            $search_all_teacher_infos=
                            "SELECT DISTINCT teainfo.teaId,teainfo.teaName,selectcourse.courseId,courseinfo.courseName,teainfo.teaSex 
                            FROM teainfo INNER JOIN selectcourse INNER JOIN courseinfo 
                            ON teainfo.teaId=selectcourse.teaId AND selectcourse.courseId=courseinfo.courseId";

                            $t_result=$dbc->query($search_all_teacher_infos);
                            // 记录数据的条数
                            $number=1;
                            while($t_row=$t_result->fetch_assoc()){
                                echo "<tr>
                                <td>$number</td>
                                <td>".$t_row['teaId']."</td>
                                <td>".$t_row['teaName']."</td>
                                <td>".$t_row['courseName']."</td>
                                <td>".$t_row['teaSex']."</td>
                                </tr>";
                                $number=$number+1;
                            }
                        ?>
                    </tbody>
                </table>
            </form>
    </div>

    <!-- 教师所教学生所教名单标签页 -->
    <div class="tab-pane fade" id="teachers_student_list">
        <h4>教师所教的学生名单</h4>
        <form class="bs-example bs-example-form" enctype="multipart/form-data" role="form" action="" method="post">
            <div class="row">
                <div class="col-lg-6">
                    <div class="input-group">
                        <!-- 输入教师的ID查找该教师所教的学生信息  search_teaId是输入框的名字 -->
                        <input type="text" class="form-control" name="search_teaId" placeholder="请输入教职工ID..." required>
                        <br>
                        <!-- 这里可以输入查询的班级,也可以查询所有的学生,查询一个班级时输入对应的班级号,查询所有学生是输入ALL进行查询,search_class输入框的名字 -->
                        <input type="text" class="form-control" name="search_class" placeholder="班级ID(查询所有时输入ALL)..." required>
                        <!-- 进行查询的按钮  search是该按钮的name,用于下面php的响应 -->
                        <button type="submit" class="btn btn-default" type="button" name="search">查询</button>
                    </div>
                </div>
            </div>
            <br>
            <br>
            <table class="table table-bordered table-hover table-condensed" align="center">
                <tbody>   
                <?php
                // 响应上面的查询按钮,search是查询按钮的名字
                   if(isset($_POST['search']))
                   {
                    //    载入a_print_teachers_student.php文件,该文件内是输出所有查询到的结果
                       require_once('a_print_teachers_student.php');
                   }
                    
                    ?>
                </tbody>
            </table>
        </form>
    </div>

    <!-- 教师信息管理标签页 -->
    <div class="tab-pane fade" id="teacher_info_modify">
        <p>教师信息管理</p>
    </div>
</div>
</body>
</html>
