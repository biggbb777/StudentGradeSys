
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>学生成绩查询及修改</title>
</head>
<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">  
	<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<body>
<div style="padding: 100px 100px 10px;">
<form class="bs-example bs-example-form" enctype="multipart/form-data" role="form" action="" method="post">
    <h1><button type="submit" class="btn btn-primary" name="back"><span class="glyphicon glyphicon-arrow-left"></span>&nbsp</button>学生成绩查询</h1>
    
						<button type="submit" class="btn btn-default" type="button" name="search_grade">
							点击查询学生成绩
						</button>
            <button type="submit" class="btn btn-default" type="button" name="insert_grades">
							点击录入或修改学生成绩
						</button>
            <br><br><br>
            <h4>您所教授的的所有学生的成绩</h4>
           

<table class="table table-bordered table-hover table-condensed">
        <thead>
 	        <tr>
            <th>编号</th>
            <th>课程名称</th>
            <th>学号</th>
            <th>姓名</th>
            <th>班级</th>
            <th>成绩</th>
 	        </tr>
 	      </thead>
 	      <tbody>
           <?php
            require('dbConnection.php');
            // 返回页面
            if(isset($_POST['back'])){
              $url='http://'. $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/teacher_page.php';
              header('Location:'.$url);
            }
            // 超级全局变量，教师的登录id
            $id=$_COOKIE['teaId'];
            $dbc=mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
            mysqli_query($dbc,'set names utf8');

            // 获取该教师教授课程的id
            $search_course_id=
            "SELECT DISTINCT selectcourse.courseId 
            FROM selectcourse 
            WHERE selectcourse.teaId='$id'";

            $data=mysqli_query($dbc,$search_course_id);
            $row1=mysqli_fetch_array($data);
            if(mysqli_num_rows($data)>=1){
                $course_id=$row1['courseId'];
            }
            // 查询一个教师所有学生的成绩
            $search_grades=
            "SELECT DISTINCT stuinfo.stuId,stuinfo.stuName,stuinfo.stuClass,courseinfo.courseName,grades.score 
            FROM stuinfo INNER JOIN courseinfo INNER JOIN grades INNER JOIN teainfo 
            ON stuinfo.stuId=grades.stuId and courseinfo.courseId=grades.courseId 
            WHERE teainfo.teaId='$id' AND grades.courseId='$course_id' ORDER BY score DESC ";

            $result=$dbc->query($search_grades);
            $number=1;
            while($row=$result->fetch_assoc()){
              echo "<tr>
              <td>$number</td>
              <td>".$row['courseName']."</td>
              <td>".$row['stuId']."</td>
              <td>".$row['stuName']."</td>
              <td>".$row['stuClass']."</td>
              <td>".$row['score']."</td>
              </tr>";
              $number+=1;
            }
            if(isset($_POST['search_grade'])){
              $url='http://'. $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/search_student_grade.php';
              header('Location:'.$url);
            }
            if(isset($_POST['insert_grades'])){
              $url='http://'. $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/insert_grades.php';
              header('Location:'.$url);
            }
          ?>
 	      </tbody>
  </table>
        </div>
    </form>
</body>
</html>
