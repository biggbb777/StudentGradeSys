
<?php
    require('dbConnection.php');
    $id=$_COOKIE['user_id'];
    $paw=$_COOKIE['user_paw'];

    $dbc=mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
    mysqli_query($dbc,'set names utf8');
    $query1="SELECT * FROM stuinfo WHERE stuId='$id' AND stuPaw='$paw'";

    $data=mysqli_query($dbc,$query1);
    $row=mysqli_fetch_array($data);


    //修改密码
    if (isset($_POST['submit'])) {     //接收表单的数据
      	
        $SPaw =$_POST['Spaw'];         //原密码
        $newPaw=$_POST['newPaw'];      //输入的新密码
        $newPaw1=$_POST['newPaw1'];    //再次输入的密码
        if($newPaw1==$newPaw){
                if($SPaw==$paw)
                {	
                    $query2="UPDATE stuinfo SET stuPaw='$newPaw' WHERE stuId='$id' ";  //更新数据库里的密码
                    mysqli_query($dbc,$query2);     //执行上一条语句
                    echo "<script>alert('密码修改成功！');</script>";
                }
        }
        else{
               echo "<script>alert('新密码与确认密码不一致!');</script>";
            }
   }


    //    //退出
	//    if(isset($_POST['log-out']))
	//    {
	//    	 $home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/student_page.php';
    //               header('Location: ' . $home_url);
    //    }
       
?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>我的信息</title>
</head>
<style>
    dl{
        text-align: center;
    }
    .div1{
        text-align: center;
    }
    .div2{
        margin: auto 0;
        display: none;
    }
    button{
        margin: auto 0;

    }
  
    
</style>
<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">  
	<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdn.staticfile.org/jquery/1.10.2/jquery.min.js">
</script>
<script>
$(document).ready(function(){
	$("#resetPaw").click(function(){
		$(".div2").fadeToggle();
	});
    $("#back").click(function(){
        window.location.href="student_page.php";
    });

});
</script>
<header>
<form class="navbar-form navbar-left" role="search" enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                    
</form>
<button type="button" id="back" class="btn btn-default btn-sm">
          <span class="glyphicon glyphicon-chevron-left"></span> 返回上一页
</button>
</header>
<body>
    <div class="div1">
    <h3 align="center">我的信息</h3>
    <div>
        <dl>
            <dt>学号:<?php echo $row['stuId'] ?></dt>
            <dt>姓名：<?php echo $row['stuName'] ?></dt>
            <dt>班级：<?php echo $row['stuClass'] ?></dt>
            <dt>性别：<?php echo $row['stuSex'] ?></dt>
        </dl>
    </div>

    <br><br>
    <button type="button" class="btn btn-primary" id="resetPaw">点击修改密码</button>
    <br><br>

    <div class="div2">
        

        <form enctype="mutipart/form-data" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <span class="ss">原密码:&nbsp;&nbsp;&nbsp;&nbsp;</span>
					<input type="password" style="height: 30px;" name="Spaw" id="Spaw" value="">
					<br><br>
					<span class="ss">新密码:&nbsp;&nbsp;&nbsp;&nbsp;</span>
					<input type="password" style="height: 30px;" name="newPaw" id="newPaw" value="">
					<br><br>
					<span class="ss">再次输入:</span>
					<input type="password" style="height: 30px;position: relative;left: 2px;" name="newPaw1" id="newPaw1" value="">
					<br><br>
					<input type="submit" class="btn btn-success" style="width: 80px;height: 30px;position: relative;left: 130px;top: 10px;" name="submit" id="ok" value="确定">
            </form>
    </div>

    </div>
</body>
</html>

