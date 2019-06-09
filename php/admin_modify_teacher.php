<html lang="zh-CN">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>维护教师信息</title>
  </head>
  <link
    rel="stylesheet"
    href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css"
  />
  <script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
  <script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <body>
    <form enctype="multipart/form-data" role="form" action="" method="post">
      <div class="row">
        <div class="col-lg-6">
          <div class="input-group">
            <h2>删除教师</h2>
            <div class="input-group">
            <input
              type="text"
              class="form-control"
              name="tea_id"
              placeholder="输入工号"
              required
            />
            
              <button
                type="submit"
                class="btn btn-danger"
                type="button"
                name="delete_teacher"
              >
                删除
              </button>
            </span>
          </div>
        </div>
      </div>
    </form>
    <?php
        require('dbConnection.php');
        $dbc= $dbc=mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
        mysqli_query($dbc,'set names utf8');
        if(isset($_POST['delete_teacher'])){
            require_once('admin_delete_teacher.php');
        }
    ?>
  </body>
</html>
