<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <title>修改密码</title>
    <link href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
	<link href="../css/change_my_pwd.css" rel="stylesheet">
</head>
<body>
	<?php 
    require_once ('dbConnection.php');
    if(isset($_POST['home']))
    {//回到首页
        $home_url='http://'. $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/../login.php';
        header('Location:'.$home_url);      
    }
    $error_msg = "";
     //记录错误信息
    if(isset($_POST['submit']))
    {//检查是否提交
      //连接数据库
          $dbc=mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
          mysqli_query($dbc,'set names utf8');
          //抓取用户账号数据
          $user_userid = mysqli_real_escape_string($dbc,trim($_POST['userid']));
          $user_old_password = mysqli_real_escape_string($dbc, trim($_POST['old_password']));
          $user_password = mysqli_real_escape_string($dbc, trim($_POST['password']));
          $user_c_password = mysqli_real_escape_string($dbc,trim($_POST['confirm_password']));
          //脱离数据库攻击
          if(!empty($user_userid) && 
             !empty($user_old_password) && 
             !empty($user_password) &&
             !empty($user_c_password))
          {
          	 if($_POST['choice'] == 'option_std')
                {//学生
                    $query = "SELECT stuId,stuPaw FROM stuinfo WHERE stuId = '$user_userid'
                              AND stuPaw = '$user_old_password'
                             ";
                }
                else if($_POST['choice'] == 'option_admin')
                {//管理员
                    $query = "SELECT id,password FROM admininfo WHERE id = '$user_userid'
                              AND password = '$user_old_password'
                             ";
                }
                else if($_POST['choice'] == 'option_tea')
                {//教师
                    $query = "SELECT teaId,teaPaw FROM teainfo WHERE teaId = '$user_userid'
                              AND teaPaw = '$user_old_password'
                             ";
                }
                $data=mysqli_query($dbc,$query);
                if(mysqli_num_rows($data) >= 1)
                {//找寻有无与原账号密码相匹配的记录
                  $row=mysqli_fetch_array($data);
                  if($user_c_password!=$user_password)//确认密码和新密码不匹配
                  {
                    echo "<script>alert('两次密码不匹配');</script>";
                  }
                  else if($row['password']==$user_password)//新密码和老密码相同
                  { 
                    echo "<script>alert('新密码不能和原密码相同');</script>";
                  }
                	else if($_POST['choice']=='option_std')
                	{
                		$query_change = "UPDATE stuinfo SET stuPaw = '".$user_password."' WHERE stuId = '".$user_userid."'";
                		mysqli_query($dbc,$query_change);
                        echo "<script>alert('密码修改成功');</script>";      
                	}
                	else if($_POST['choice'] == 'option_admin')
                    {
                      $query_change = "UPDATE admininfo SET password = '".$user_password."' WHERE id = '".$user_userid."'";
                		  mysqli_query($dbc,$query_change);
                          echo "<script>alert('密码修改成功');</script>";
                    }
                  else if($_POST['choice'] == 'option_tea')
                    {
                      $query_change = "UPDATE teainfo SET teaPaw = '".$user_password."' WHERE teaId = '".$user_userid."'";
                		  mysqli_query($dbc,$query_change);
                		  echo "<script>alert('密码修改成功');</script>"; 
                    }
                }
                else
                {
                    echo "<script>alert('账号或密码不正确');</script>"; 
                }
          }
          else
          { 
            echo "<script>alert('请填写账号密码');</script>"; 
          }
    }    
  ?>

<div class="container">
      <form class="form-signin" enctype="multipart/form-data" id="sso" role="form" action="" method="post">
      <button type="submit" class="btn btn-primary home_button" name="home"><span class="glyphicon glyphicon-home"></span>&nbsp<br>回到首页</button>
          <select name="choice" class="form-control">
            <option value="option_std">学生</option>
            <option value="option_tea">教师</option>
            <option value="option_admin">管理员</option>
          </select>
            <input type="text" name="userid" value="" placeholder="账号" class="form-control"autofocus>
            <input type="password" name="old_password" value="" placeholder="旧密码" class="form-control">
            <input type="password" name="password" value="" placeholder="新密码" class="form-control">
            <input type="password" name="confirm_password" value="" placeholder="确认新密码" class="form-control">
        <input name="submit" id="submit" class="btn btn-lg btn-success btn-block" type="submit" value="修改"/>
      </form>
   </div>
</body>
</html>