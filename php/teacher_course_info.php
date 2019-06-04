<?php
    require('dbConnection.php');
    $id=$_COOKIE['teaId'];
    

?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>课程信息</title>
</head>
<body>

<form enctype="multipart/form-data" role="form" action="" method="post">
<div class="info" role="main">
<button type="submit" class="btn btn-primary" name="back"><span class="glyphicon glyphicon-arrow-left"></span>&nbsp返回</button>
<p align:center><?php echo $_COOKIE['teaName']?>老师，您现教授的课程及信息如下：</p>
<table class="table table-bordered table-hover table-condensed">
 	      <thead>
 	        <tr>
            <th>课程号</th>
            <th>课程名</th>
            <th>学号</th>
            <th>姓名</th>
            <th>班级</th>
            <th>性别</th>
 	        </tr>
 	      </thead>
 	      <tbody>
           <?php
                $dbc= $dbc=mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
                mysqli_query($dbc,'set names utf8');

                // 查询一个教师所教授的课程及学生信息
                $search_courses="SELECT DISTINCT courseinfo.courseId,courseinfo.courseName,stuinfo.stuId,stuinfo.stuName,stuinfo.stuClass,stuinfo.stuSex from selectcourse INNER JOIN courseinfo INNER JOIN stuinfo ON selectcourse.courseId=courseinfo.courseId and selectcourse.stuId=stuinfo.stuId WHERE teaId='$id'";
                $result=$dbc->query($search_courses);

                while($row=$result->fetch_assoc()){
                    echo "<tr>
                    <td>".$row['courseId']."</td>
                    <td>".$row['courseName']."</td>
                    <td>".$row['stuId']."</td>
                    <td>".$row['stuName']."</td>
                    <td>".$row['stuClass']."</td>
                    <td>".$row['stuSex']."</td>
                    </tr>";
                }

            ?>
 	      </tbody>
 	    </table>
 	  </div>
  </form>

    
  
</body>
</html>
