<?php
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
    <!-- 所有教师信息标签页 -->
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
                        
                        
                            $search_all_teacher_infos="SELECT DISTINCT teainfo.teaId,teainfo.teaName,selectcourse.courseId,courseinfo.courseName,teainfo.teaSex from teainfo INNER JOIN selectcourse INNER JOIN courseinfo ON teainfo.teaId=selectcourse.teaId AND selectcourse.courseId=courseinfo.courseId";
                            $t_result=$dbc->query($search_all_teacher_infos);

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
        <p>教师所教的学生名单</p>
    </div>

    <!-- 教师信息管理标签页 -->
    <div class="tab-pane fade" id="teacher_info_modify">
        <p>教师信息管理</p>
    </div>
</div>
</body>
</html>
