
<?php

$add_stuId1=$_POST['add_stu_id'];
$add_s_search=
"SELECT * 
FROM stuinfo
WHERE stuId='$add_stuId1'";

$add_s_data=mysqli_query($dbc,$add_s_search);
$ass_s_row=mysqli_fetch_array($add_s_data);
if(mysqli_num_rows($add_s_data)>=1){
    echo "
    <table class='table table-bordered table-hover table-condensed'>
    <thread>
        <tr>
        <th>学号</th>
        <th>姓名</th>
        <th>班级</th>
        <th>性别</th>
        </tr>
    </thread>
    ";
    $add_s_result=$dbc->query($add_s_search);
    while($add_s_row1=$add_s_result->fetch_assoc()){
        echo "
        <tr>
        <td>".$add_s_row1['stuId']."</td>
        <td>".$add_s_row1['stuName']."</td>
        <td>".$add_s_row1['stuClass']."</td>
        <td>".$add_s_row1['stuSex']."</td>
        </tr>
            ";
    }
    echo "</table>";
}
?>