<!DOCTYPE html>
<html>
<head>
	<link href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">    
	<title>我的成绩</title>
</head>
<body>
	<form enctype="multipart/form-data" role="form" action="" method="post">
	  <div class="info" role="main">
 	    <table class="table table-bordered table-hover table-condensed">
        <h2 class="text-info" id="cap"><span class="glyphicon glyphicon-list-alt"></span><?php echo $_COOKIE['stuName']?>同学的成绩单</h2>
        <button type="submit" class="btn btn-primary" name="back"><span class="glyphicon glyphicon-arrow-left"></span>&nbsp返回</button>
 	      <thead>
 	        <tr>
            <th>课程号</th>
            <th>课程名</th>
            <th>成绩</th>
 	        </tr>
 	      </thead>
 	      <tbody>
           <?php
            require('dbConnection.php');
            require_once('go_back.php');
            $id=$_COOKIE['stuId'];
            $dbc=mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
            mysqli_query($dbc,'set names utf8');
            $search_grades="SELECT DISTINCT grades.stuId,stuinfo.stuClass,stuinfo.stuName,stuinfo.stuSex,courseinfo.courseId,courseinfo.courseName,grades.score FROM grades INNER JOIN courseinfo INNER JOIN stuinfo ON grades.courseId=courseinfo.courseId AND grades.stuId=stuinfo.stuId WHERE grades.stuId='$id'";
            $result=$dbc->query($search_grades);
            while($row=$result->fetch_assoc()){
              echo "<tr>
              <td>".$row['courseId']."</td>
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