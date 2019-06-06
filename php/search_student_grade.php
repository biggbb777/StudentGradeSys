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
    <h1><button type="submit" class="btn btn-primary" onclick="window.location.href='teacher_sgrades.php'"><span class="glyphicon glyphicon-arrow-left"></span>&nbsp</button>学生成绩查询</h1>
    
    
     <!-- 搜索输入框 -->   
      <div class="row">
        
			<div class="col-lg-6">
				<div class="input-group">
					<input type="text" class="form-control" name="search_stuid" placeholder="请输入要查询学生的学号" required>
					<span class="input-group-btn">
						<button type="submit" class="btn btn-default" type="button" name="search_grade">
							查询
						</button>
					</span>
				</div>
            </div>

<table class="table table-bordered table-hover table-condensed">
       
 	      <tbody>
           <?php
            require('dbConnection.php');
            $id=$_COOKIE['teaId'];
            $dbc=mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
            mysqli_query($dbc,'set names utf8');       
            if(isset($_POST['search_grade'])){ 
                require_once('print_student_info.php');
                
            }
          ?>
 	      </tbody>
  </table>
        </div>
    </form>
    </body>
    </html>