<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>中学成绩管理系统登录</title>
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css"
      integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="css/login.css" />
  </head>
  <body>

  <?php
    require('php/dbConnection.php');
    $error_msg="";
    if(isset($_POST['submit'])){//检查是否提交
      //连接数据库
          $dbc=mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
          mysqli_query($dbc,'set names utf8');
          //抓取用户账号数据
          $user_userid = mysqli_real_escape_string($dbc,trim($_POST['userid']));
          $user_password = mysqli_real_escape_string($dbc, trim($_POST['password']));
          //使用函数预防数据库攻击
          if(!empty($user_userid) && !empty($user_password)){//检查用户信息是否为空
          //判断用户身份
                if($_POST['choice'] == 'option_std'){//学生
                      $query = "
                             SELECT * FROM stuinfo WHERE stuId = '$user_userid'
                             AND stuPaw = '$user_password'
                             ";
                }
                else if($_POST['choice'] == 'option_tea'){//教师
                      $query = "
                            SELECT * FROM teainfo WHERE teaId = '$user_userid'
                            AND teaPaw = '$user_password';
                      ";
                }
                else if($_POST['choice'] == 'option_admin'){//管理员
                  $query = "
                        SELECT * FROM admininfo WHERE id = '$user_userid'
                        AND password = '$user_password';
                  ";
            }
               

        //获取数据
                $data=mysqli_query($dbc,$query);
                $row=mysqli_fetch_array($data);
                if(mysqli_num_rows($data) >= 1){
                      
                 //判断用户身份，跳转至相应页面
                      if($_POST['choice']=='option_std'){//学生
                            setcookie('stuId', $row['stuId'], time() + (60 * 60 * 24 * 30));    // 保存30天
                            setcookie('stuName', $row['stuName'], time() + (60 * 60 * 24 * 30));
                            setcookie('stuClass', $row['stuClass'], time() + (60 * 60 * 24 * 30));
                            setcookie('stuSex', $row['stuSex'], time() + (60 * 60 * 24 * 30));
                            $student_url = 'http://'. $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/php/student_page.php';
                            header('Location:'.$student_url);
                            //跳转页面
                      }
                      else if($_POST['choice']=='option_tea'){//教师
                            setcookie('teaId', $row['teaId'], time() + (60 * 60 * 24 * 30));
                            setcookie('teaName', $row['teaName'], time() + (60 * 60 * 24 * 30));
                            $teacher_url = 'http://'. $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/php/teacher_page.php';
                            header('Location:'.$teacher_url);
                      }
                      else if($_POST['choice']=='option_admin'){//管理员
                        setcookie('id', $row['id'], time() + (60 * 60 * 24 * 30)); 
                        $admin_url = 'http://'. $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/php/admin_page.php';
                        header('Location:'.$admin_url);
                  }
                }
                else{
                      $error_msg='账号或密码不正确';
                      echo '<p class="error">' . $error_msg . '</p>';
                }
          }
        }
  ?>







    <div class="container">
      <form class="form-signin" id="form-test" enctype="multipart/form-data" action="" method="post">
        <h2>请登录。</h2>
        <select name="choice" class="form-control">
          <option value="option_std">学生</option>
          <option value="option_tea">教师</option>
          <option value="option_admin">管理员</option>
        </select>
        <input
          id="account"
          name="userid"
          class="form-control"
          placeholder="用户名"
          required
          autofocus
        />
        <input
          type="password"
          name="password"
          id="password"
          class="form-control"
          placeholder="密码"
          required
        />
        <input name="submit" id="submit" class="btn btn-lg btn-success btn-block" type="submit" value="登录"/>     
      </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/jquery@1.12.4/dist/jquery.min.js"></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js"
      integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
