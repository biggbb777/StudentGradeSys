<!-- 该页面用于管理员端的教师页面进行查询一个教师所教的所有学生的信息的响应,执行后会输出所有查询到的结果 -->

<?php
    // 获取输入的教职工号,search_teaId是输入框(教师ID)的name
    $a_teaId=$_POST['search_teaId'];
    // 获取输入的班级,search_class是输入框(输入班级id)的name
    $a_search_class=$_POST['search_class'];

    //下面用if语句进行判断是查询所有的学生信息还是查询一个班级的学生信息
    // 当$a_search_class为ALL时查询所有学生的成绩信息
    if($a_search_class=='ALL')
    {
        // 一个教师的所有学生的查询语句
        $a_all_students=
        "SELECT stuId,stuName,stuClass,courseName,stuSex,score
        FROM stuinfo NATURAL JOIN teainfo NATURAL JOIN selectcourse NATURAL JOIN courseinfo NATURAL JOIN grades
        WHERE teaId='$a_teaId' 
        ORDER BY score DESC";

        $all_data=mysqli_query($dbc,$a_all_students);
        $all_row=mysqli_fetch_array($all_data);
        if(mysqli_num_rows($all_data)>=1){
            echo "
                <thead>
                    <tr>
                        <th>编号</th>
                        <th>学号</th>
                        <th>姓名</th>
                        <th>班级</th>
                        <th>课程号</th>
                        <th>性别</th>
                        <th>成绩</th>
                    </tr>
                </thead>
                ";

            $all_result=$dbc->query($a_all_students); 
            // 记录有多少条记录
            $number=1;
            while($all_row=$all_result->fetch_assoc()){
                echo "<tr>
                    <td>$number</td>
                    <td>".$all_row['stuId']."</td>
                    <td>".$all_row['stuName']."</td>
                    <td>".$all_row['stuClass']."</td>
                    <td>".$all_row['courseName']."</td>
                    <td>".$all_row['stuSex']."</td>
                    <td>".$all_row['score']."</td>
                </tr>";
                $number+=1;
            }
        }

    }
    // 否则就查询输入的班级id进行查询响应班级的学生成绩信息
   else{
        // 查询一个教师所教的一个班级的所有学生成绩
        $a_one_students=
        "SELECT stuId,stuName,stuClass,courseName,stuSex,score
        FROM stuinfo NATURAL JOIN teainfo NATURAL JOIN selectcourse NATURAL JOIN courseinfo NATURAL JOIN grades
        WHERE teaId='$a_teaId' AND stuClass='$a_search_class' 
        ORDER BY score DESC";

        $one_data=mysqli_query($dbc,$a_one_students);
        // 判断上一条语句是否执行成功
        if (!$one_data) {
            printf("Error: %s\n", mysqli_error($dbc));
            exit();
           }
        $one_class_row=mysqli_fetch_array($one_data);
        // 当查询到的数据大于等于一条时输出
        if(mysqli_num_rows($one_data)>=1){
            echo "
                <thead>
                    <tr>
                        <th>编号</th>
                        <th>学号</th>
                        <th>姓名</th>
                        <th>班级</th>
                        <th>课程号</th>
                        <th>性别</th>
                        <th>成绩</th>
                    </tr>
                </thead>
                ";

            $one_class_result=$dbc->query($a_one_students); 
            // 记录有多少条记录
            $number=1;
            while($one_class_row=$one_class_result->fetch_assoc()){
                echo "<tr>
                    <td>$number</td>
                    <td>".$one_class_row['stuId']."</td>
                    <td>".$one_class_row['stuName']."</td>
                    <td>".$one_class_row['stuClass']."</td>
                    <td>".$one_class_row['courseName']."</td>
                    <td>".$one_class_row['stuSex']."</td>
                    <td>".$one_class_row['score']."</td>
                </tr>";
                $number+=1;
            }
        }
        // 当未查询信息时(也就是输入的班级并不是你输入教师所带的班级,此时提示你需要正确输入)
        else{
            echo "<script>alert('请正确输入!');</script>";
        }
   }
?>