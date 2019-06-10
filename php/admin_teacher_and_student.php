<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>教师的学生</title>
  </head>
  <link
    rel="stylesheet"
    href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css"
  />
  <script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
  <script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
  <body>
    <form enctype="multipart/form-data" role="form" action="" method="post">
      <h4>教师所教的学生名单</h4>
      <div class="row">
        <div class="col-lg-6">
          <div class="input-group">
            <!-- 输入教师的ID查找该教师所教的学生信息  search_teaId是输入框的名字 -->
            <input
              type="text"
              class="form-control"
              name="search_teaId"
              placeholder="请输入教职工ID..."
              required
            />
            <br />
            <!-- 这里可以输入查询的班级,也可以查询所有的学生,查询一个班级时输入对应的班级号,查询所有学生是输入ALL进行查询,search_class输入框的名字 -->
            <input
              type="text"
              class="form-control"
              name="search_class"
              placeholder="班级ID(查询所有时输入ALL)..."
              required
            />
            <!-- 进行查询的按钮  search是该按钮的name,用于下面php的响应 -->
            <button
              type="submit"
              class="btn btn-default"
              type="button"
              name="search"
            >
              查询
            </button>
          </div>
        </div>
      </div>
      <br />
      <br />
      <table
        class="table table-bordered table-hover table-condensed"
        align="center"
      >
        <tbody>
            <?php
                require('dbConnection.php');
                $dbc= $dbc=mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
                mysqli_query($dbc,'set names utf8');
            // 响应上面的查询按钮,search是查询按钮的名字
                if(isset($_POST['search'])){
                //    载入a_print_teachers_student.php文件,该文件内是输出所有查询到的结果
                    require_once('admin_print_teachers_student.php');
                }
            ?>
        </tbody>
      </table>
    </form>
  </body>
</html>
