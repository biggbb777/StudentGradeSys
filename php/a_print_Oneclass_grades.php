
<!-- 班级信息标签页内信息的输出 -->
<?php
    
    //获取选择的科目 
    $a_course=$_POST['course_choice'];    //获取科目选择的内容,course_choice是select的名字
    // 获取输入的班级
    $a_class=$_POST['one_class'];      //获取输入框的内容,one_class是input的名字

    // 查询一个班级的选课情况
    $search_class_student=
    "SELECT DISTINCT stuinfo.stuId,stuinfo.stuName,stuinfo.stuClass,courseinfo.courseName,grades.score
    from stuinfo INNER JOIN courseinfo INNER JOIN grades
    ON stuinfo.stuId=grades.stuId and courseinfo.courseId=grades.courseId
    WHERE stuinfo.stuClass='$a_class' AND grades.courseId='$a_course'
    ORDER BY score DESC";
    
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
                        <th>成绩</th>
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
                <td>".$class_row['score']."</td>
            </tr>";
            $number=$number+1;
        }
    }
    // 输入不存在班级时的情况
    else{
        echo "<script>alter('请输入正确班级！！！')</script>";
    }
   
?>