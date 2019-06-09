
<!-- 响应admin_student_info.php页面的学生选课标签页,作用是输出一个班级的选课情况 -->

<?php
    
    // 获取输入的班级
    $a_class1=$_POST['select_class1'];    //获取input标签页内输入的班级,select_class是input标签的名字

    // 查询一个班级的选课情况
    $search_class_student=
    "SELECT stuinfo.stuId,stuinfo.stuName,stuinfo.stuClass,courseinfo.courseName,teainfo.teaName,stuinfo.stuSex 
    FROM stuinfo INNER JOIN selectcourse INNER JOIN courseinfo INNER JOIN teainfo 
    ON selectcourse.stuId=stuinfo.stuId AND selectcourse.courseId=courseinfo.courseId AND selectcourse.teaId=teainfo.teaId 
    WHERE stuinfo.stuClass='$a_class1'";
    
    $data=mysqli_query($dbc,$search_class_student);
    $row1=mysqli_fetch_array($data);
    if(mysqli_num_rows($data)>=1){
        echo "
                <thread>
                    <tr>
                        <th>编号</th>
                        <th>学号</th>
                        <th>姓名</th>
                        <th>班级</th>
                        <th>课程名称</th>
                        <th>任课教师</th>
                        <th>学生性别</th>
                    </tr>
                </thread>
             ";

            // 执行查询 
        $result=$dbc->query($search_class_student); 
        // 计数（记录的条数）
        $number=1;
        while($class_row=$result->fetch_assoc()){
            echo "<tr>
                <td>$number</td>
                <td>".$class_row['stuId']."</td>
                <td>".$class_row['stuName']."</td>
                <td>".$class_row['stuClass']."</td>
                <td>".$class_row['courseName']."</td>
                <td>".$class_row['teaName']."</td>
                <td>".$class_row['stuSex']."</td>
            </tr>";
            $number=$number+1;
        }
    }
    // 输入不存在班级时的情况
    else{
        echo "<script>alter('请输入正确班级！！！')</script>";
    }
   
?>