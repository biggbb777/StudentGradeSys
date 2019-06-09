
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
    <title>学生信息管理</title>
</head>

<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
    
<body>
<ul id="myTab" class="nav nav-tabs">
    <li class="active">
        <a href="#studen_infos" data-toggle="tab">
             所有学生信息
        </a>
    </li>
    <li><a href="#student_select_course" data-toggle="tab">学生选课表</a></li>
    <li><a href="#one_class_student_infos" data-toggle="tab">一个班级的学生信息</a></li>
    <li><a href="#student_info_modify" data-toggle="tab">学生信息维护</a></li>
</ul>
<!-- 导航面板 -->
<div id="myTabContent" class="tab-content">
    <!-- 所有学生信息标签页 -->
    <div class="tab-pane fade in active" id="studen_infos">
    <form enctype="multipart/form-data" role="form" action="" method="post">
                <h4 align="center" style="font-weight:bold">所有学生信息</h4>
                <table class="table table-bordered table-hover table-condensed" align="center">
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
                            $search_all_student_infos="SELECT stuId,stuName,stuClass,stuSex FROM stuinfo";
                            $s_result=$dbc->query($search_all_student_infos);

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
        <p>学生选课表</p>
    </div>

    <!-- 一个班级的学生信息标签页 -->
    <div class="tab-pane fade" id="one_class_student_infos">
        <p>一个班级的学生信息</p>
    </div>

    <!-- 学生信息维护的标签页 -->
    <div class="tab-pane fade" id="student_info_modify">
        <p>学生信息维护</p>
    </div>
</div>
</body>
</html>
