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
    
    
     <!-- 搜索输入框 -->   
      <div class="row">
        
			<div class="col-lg-6">
				<div class="input-group">
					<input type="text" class="form-control" name="search_stuid" placeholder="请输入要查询学生的学号">
					<span class="input-group-btn">
						<button type="submit" class="btn btn-default" type="button" name="search_grade">
							Go!
						</button>
            
					</span>
				</div>
            </div>

<table class="table table-bordered table-hover table-condensed">
        <thead>
 	        <tr>
            <th>课程号</th>
            <th>学号</th>
            <th>姓名</th>
            <th>班级</th>
            <th>成绩</th>
 	        </tr>
 	      </thead>
 	      <tbody>
           <?php
            require('dbConnection.php');
            if(isset($_POST['back'])){
                $url='http://'. $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/teacher_sgrades.php';
                header('Location:'.$url);
              }
            $id=$_COOKIE['teaId'];
            $dbc=mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
            mysqli_query($dbc,'set names utf8');       
            if(isset($_POST['search_grade'])){ 
                $searchById=$_POST['search_stuid'];
                $search_specific_grades=
                "SELECT grades.courseId,stuinfo.stuid,stuname,stuClass,score
                FROM stuinfo,grades,selectcourse 
                WHERE stuinfo.stuid='".$searchById."' 
                AND stuinfo.stuid=grades.stuid 
                AND stuinfo.stuid=selectcourse.stuid
                AND grades.courseid=selectcourse.courseid
                AND selectcourse.teaId='".$_COOKIE['teaId']."';";
                $data=mysqli_query($dbc,$search_specific_grades);
                $row1=mysqli_fetch_array($data);
                if(mysqli_num_rows($data)>=1){
                    $result=$dbc->query($search_specific_grades); 
                    while($row=$result->fetch_assoc()){
                        echo "<tr>
                            <td>".$row['courseId']."</td>
                            <td>".$row['stuid']."</td>
                            <td>".$row['stuname']."</td>
                            <td>".$row['stuClass']."</td>
                            <td>".$row['score']."</td>
                        </tr>";
                    }
                }
                else{
                    echo '请输入正确学号!';
                }
            }
          ?>
 	      </tbody>
  </table>
        </div>
    </form>
    </body>
    </html>