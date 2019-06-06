<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">  
	<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <title>录入或修改学生成绩</title>
</head>
<body>
    
    <div style="padding: 100px 100px 10px;">
        <form class="bs-example bs-example-form" enctype="multipart/form-data" role="form" action="" method="post">
        <h1><button type="submit" class="btn btn-primary" onclick="window.location.href='teacher_sgrades.php'"><span class="glyphicon glyphicon-arrow-left"></span>&nbsp</button>录入成绩。</h1>
            <div class="row">
                <div class="col-lg-6">
                    <div class="input-group">
                        <input type="text" class="form-control" name="search_stuid" placeholder="请输入学生的学号" required>
                        <input type="text" class="form-control" name="insert_grade" placeholder="请输入成绩" required>
                        <button type="submit" class="btn btn-default" type="button" name="insert">录入</button>
                    </div>
                </div>
            </div>
        </form>
    <table class="table table-bordered table-hover table-condensed">
       <tbody>
    <?php
        require('dbConnection.php');
        $id=$_COOKIE['teaId'];
        $dbc=mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
        mysqli_query($dbc,'set names utf8'); 
        if(isset($_POST['insert'])){
            
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
                if($_POST['insert_grade']>100 || $_POST['insert_grade']<0){
                    echo "<script>alert('请输入规范的成绩!');</script>";
                }
                else{
                    $query2="UPDATE grades 
                    SET score='".$_POST['insert_grade']."' 
                    WHERE stuid='".$searchById."'
                    AND courseid='".$row1['courseId']."'";
                    mysqli_query($dbc,$query2);
                    echo "<script>alert('录入成功!');</script>"; 
                    echo "<h3>这是您刚才录入的成绩:</h3>";
                    require_once('print_student_info.php');
                }
            }
            else{
                echo "<script>alert('请输入正确的学号!');</script>";
            }
            
        }
    ?>
        </tbody>
    </table>
    </div>
    
</body>
</html>