<?php
   require('dbConnection.php');
    $id=$_COOKIE['user_id'];
    $paw=$_COOKIE['user_paw'];

    $dbc=mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
    mysqli_query($dbc,'set names utf8');
    
?>
<!DOCTYPE html>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>查询成绩</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="">
    </head>
    <style>
        .tb{
            border: 2;
            margin: auto;
            text-align: center;
        }
        .div1{
            position: relative;
            top:50px;
        }
        
    </style>
    <script src="https://cdn.staticfile.org/jquery/1.10.2/jquery.min.js"></script>
    <script>
    
    </script>
    <body>

    <div class="div1">

        <h1 align="center">课程信息及成绩</h1>
       
        <table class="tb" border="2">
        <tr>
            <th>学号</th>
            <th>班级</th>
            <th>姓名</th>
            <th>性别</th>
            <th>课程号</th>
            <th>课程名</th>
            <th>成绩</th>
        </tr>

        <?php

        $sql="SELECT DISTINCT grades.stuId,stuinfo.stuClass,stuinfo.stuName,stuinfo.stuSex,courseinfo.courseId,courseinfo.courseName,grades.score FROM grades INNER JOIN courseinfo INNER JOIN stuinfo ON grades.courseId=courseinfo.courseId AND grades.stuId=stuinfo.stuId WHERE grades.stuId='$id'";
        $result=$dbc->query($sql);

        
        while($row=$result->fetch_assoc())
        {
        
        echo "<tr>
                <td>".$row['stuId']."</td>
                <td>".$row['stuClass']."</td>
                <td>".$row['stuName']."</td>
                <td>".$row['stuSex']."</td>
                <td>".$row['courseId']."</td>
                <td>".$row['courseName']."</td>
                <td>".$row['score']."</td>
                </tr>";
        }
            
        ?>
        </table>

        </div>
    </body>
</html>
