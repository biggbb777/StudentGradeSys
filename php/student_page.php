<!DOCTYPE html>
 <html>
 <head>
 	<link href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="../css/std_page.css">
 	<title>学生端</title>
 </head>
 <body>
    <form enctype="multipart/form-data" role="form" action="" method="post">
 		    <h1 class="text-primary">欢迎,<?php echo $_COOKIE['stuName']; ?>同学<span class="glyphicon glyphicon-magnet"></span></h1>
        <!-- 欢迎语句 -->
        <button type="submit" class="btn btn-primary home_button" name="home"><span class="glyphicon glyphicon-home"></span>&nbsp<br>回到首页</button>
        <!-- 回到首页按钮功能 -->
        <div>
            <tr>
                <td>学号:  <?php echo $_COOKIE['stuId'] ?>  姓名:  <?php echo $_COOKIE['stuName'] ?>  班级:  <?php echo $_COOKIE['stuClass'] ?>班  性别:  <?php 
                if($_COOKIE['stuSex']=='M'){
                    echo '男';
                }
                else{
                    echo '女';
                }
                ?></dt>
                <dt></dt>
                <dt></dt>
                <dt></dt>
            </dl>
        </div>
        
        <button type="submit" name="my_grade" class="btn btn-success btn-lg">
        <span class="glyphicon glyphicon-user"></span><br>我的成绩</button>
        <!-- 查看学生自己成绩模块 -->
        
    <?php
        if(isset($_POST['home']))
        {//跳转至登录页面
          $home_url='http://'. $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/../login.php';
          header('Location:'.$home_url);      
        }
        if(isset($_POST['my_grade']))
        {//信息页面
          $url='http://'. $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/student_grade.php';
          header('Location:'.$url);
        }
    ?>
 	  </form>
 </body>
 </html>