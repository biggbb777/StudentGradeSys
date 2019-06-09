<!-- 响应学生信息委会标签页的查询一个学生的所有信息 -->
<?php
        //获取输入的学号,stu_id是输入框的名字 
        $a_stuId=$_POST['stu_id'];

        // 查询一个学生的所有信息
        $search_one_student_info=
        "SELECT stuId,stuName,stuClass,courseName,teaName,score,stuSex
        FROM stuinfo NATURAL JOIN grades NATURAL JOIN selectcourse NATURAL JOIN teainfo NATURAL join courseinfo
        WHERE stuId='$a_stuId'";

        $data=mysqli_query($dbc,$search_one_student_info);
        $one_student_row=mysqli_fetch_array($data);
        if(mysqli_num_rows($data)>=1){
            echo "
            <thread>
                    <tr>
                        <th>学号</th>
                        <th>姓名</th>
                        <th>班级</th>
                        <th>课程</th>
                        <th>任课教师</th>
                        <th>成绩</th>
                        <th>性别</th>
                    </tr>
                </thread>
            ";

        
        $one_student_result=$dbc->query($search_one_student_info);

        while($one_student_row=$one_student_result->fetch_assoc()){
            echo "<tr>
            <td>".$one_student_row['stuId']."</td>
            <td>".$one_student_row['stuName']."</td>
            <td>".$one_student_row['stuClass']."</td>
            <td>".$one_student_row['courseName']."</td>
            <td>".$one_student_row['teaName']."</td>
            <td>".$one_student_row['score']."</td>
            <td>".$one_student_row['stuSex']."</td>
            </tr>";
            }
            
        }
        else{
            echo "<script>alert('请输入正确的学号!');</script>";
        }
?>