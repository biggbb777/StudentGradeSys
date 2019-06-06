<?php
    
    $searchById=$_POST['search_stuid'];
    $search_specific_grades=
    "SELECT grades.courseId,stuinfo.stuid,stuname,stuClass,score
    FROM stuinfo,grades,selectcourse 
    WHERE stuinfo.stuid='".$searchById."' 
    AND stuinfo.stuid=grades.stuid 
    AND stuinfo.stuid=selectcourse.stuid
    AND grades.courseid=selectcourse.courseid
    AND selectcourse.teaId='".$_COOKIE['teaId']."';";
    $data=mysqli_query($dbc,$search_specific_grades);
    $row1=mysqli_fetch_array($data);
    if(mysqli_num_rows($data)>=1){
        echo "
        <thead>
        <tr>
        <th>课程号</th>
        <th>学号</th>
        <th>姓名</th>
        <th>班级</th>
        <th>成绩</th>
        </tr>
        </thead>
    ";
        $result=$dbc->query($search_specific_grades); 
        while($row=$result->fetch_assoc()){
            setcookie('stuid', $row['stuid'], time() + (60 * 60 * 24 * 30));
            echo "<tr>
                <td>".$row['courseId']."</td>
                <td>".$row['stuid']."</td>
                <td>".$row['stuname']."</td>
                <td>".$row['stuClass']."</td>
                <td>".$row['score']."</td>
            </tr>";
        }
    }
    else{
        echo "<script>alert('请输入正确的学号!');</script>";
    }
?>