<?php
    require('dbConnection.php');
    $dbc=mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
    mysqli_query($dbc,'set names utf8');
    // 查询所有学生信息的语句
    $search_all_student_infos=
    "SELECT stuId,stuName,stuClass,stuSex FROM stuinfo";
    $s_result=$dbc->query($search_all_student_infos);

    // 记录有多少条数据
    $number=1;
    while($s_row=$s_result->fetch_assoc()){
        echo "<tr>
        <td>$number</td>
        <td>".$s_row['stuId']."</td>
        <td>".$s_row['stuName']."</td>
        <td>".$s_row['stuClass']."</td>
        <td>".$s_row['stuSex']."</td>
        </tr>";
        $number=$number+1;
    }
?>