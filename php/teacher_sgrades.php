
<html lang="en">
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
    <p>学生成绩查询</p>
    <form class="bs-example bs-example-form" enctype="multipart/form-data" role="form" action="" method="post">
     <!-- 搜索输入框 -->   
        <div class="row">
			<div class="col-lg-6">
				<div class="input-group">
					<input type="text" class="form-control" placeholder="请输入要查询学生的学号">
					<span class="input-group-btn">
						<button class="btn btn-default" type="button">
							Go!
						</button>
					</span>
				</div>
            </div>
            
            <br><br><br>
            <h4>您所教授的的所有学生的成绩</h4>
           

<table class="table table-bordered table-hover table-condensed">
        <thead>
 	        <tr>
            <th>学号</th>
            <th>姓名</th>
            <th>班级</th>
            <th>课程名称</th>
            <th>成绩</th>
 	        </tr>
 	      </thead>
 	      <tbody>
           <?php
            require('dbConnection.php');
            // require_once('go_back.php');
            $id=$_COOKIE['teaId'];
            $dbc=mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
            mysqli_query($dbc,'set names utf8');

            $search_course_id="SELECT DISTINCT selectcourse.courseId FROM selectcourse WHERE selectcourse.teaId='$id'";
            $data=mysqli_query($dbc,$search_course_id);
            $row1=mysqli_fetch_array($data);
            if(mysqli_num_rows($data)>=1){
                $course_id=$row1['courseId'];
            }

            $search_grades="SELECT DISTINCT stuinfo.stuId,stuinfo.stuName,stuinfo.stuClass,courseinfo.courseName,grades.score from stuinfo INNER JOIN courseinfo INNER JOIN grades INNER JOIN teainfo ON stuinfo.stuId=grades.stuId and courseinfo.courseId=grades.courseId WHERE teainfo.teaId='$id' AND grades.courseId='$course_id' ORDER BY score DESC ";
            $result=$dbc->query($search_grades);
            while($row=$result->fetch_assoc()){
              echo "<tr>
              <td>".$row['stuId']."</td>
              <td>".$row['stuName']."</td>
              <td>".$row['stuClass']."</td>
              <td>".$row['courseName']."</td>
              <td>".$row['score']."</td>
              </tr>";
            }
          ?>
 	      </tbody>
         </table>
         
        </div>
    </form>
    
   
</body>
</html>
