
<?php
    require('dbConnection.php');
   //获取得到的账号和密码
    $id=$_COOKIE['user_id'];
    $paw=$_COOKIE['user_paw'];
   //连接数据库
   $dbc=mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
   mysqli_query($dbc,'set names utf8');

   $query="SELECT * FROM stuinfo WHERE stuId = '$id' AND stuPaw='$paw'";
   $data=mysqli_query($dbc,$query);
   $row=mysqli_fetch_array($data);
    ?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>学生端</title>
</head>
<style>
    .div1{
        position: relative;
        top:300px;
        left: 200px;
    }
    .btn{
        width: 150px;
        height: 150px;
        background: skyblue;
        border: none;
        color: white;
        margin: 6px 10px;
    }
    .btnStyle1{
        /* 防止border-radius失效 */
        border-radius: 20px !important; 
        font-size: 20px;
    }
    .btnStyle2{
        border-radius: 20px !important;
        /* position: relative; */
        font-size: 20px;
    }
    .btnStyle3{
        border-radius: 20px !important;
        /* position: relative; */
        font-size: 20px;
    }
    .btnStyle4{
        border-radius: 20px !important;
        /* position: relative; */
        font-size: 20px;
    }
</style>
<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://cdn.staticfile.org/jquery/1.10.2/jquery.min.js"></script>
<script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function(){
        // 成绩查询页面
        $(".btnStyle1").click(function(){
            window.location.href="studentSelect.php";
            
        });
       // 个人信息页面
       $(".btnStyle2").click(function(){
            window.location.href="student_info.php";
        });
    });
</script>
<body>
    <div class="alert alert-success" style="border: 1px ;float: right;position: relative;right: 50px;top: 20px;">
				<span class="glyphicon glyphicon-home" style="color: black;font-weight: bold;"> 欢迎 <?php echo $row['stuName'] ?> 登陆成绩查询系统</span>
			</div>
    <div class="div1">
        <button class="btn btnStyle1">
            <span>
            <a href="#">
            <span class="glyphicon glyphicon-map-marker"></span>
            </a><br>
            查询成绩
            </span>
        </button>

        <button class="btn btnStyle2">
        <span>
        <a href="#">
          <span class="glyphicon glyphicon-pencil"></span>
        </a><br>
        我的信息
        </span>
        </button>

        <button class="btn btnstyle3">
            <span>
            <a href="#">
                <span class="glyphicon glyphicon-edit"></span>
            </a><br>
            修改密码
            </span>
        </button>
    </div>
</body>
</html>
