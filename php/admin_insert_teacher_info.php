
<?php

$add_teaId1=$_POST['add_tea_id'];
$add_t_search=
"SELECT * 
FROM teainfo
WHERE teaId='$add_teaId1'";

$add_t_data=mysqli_query($dbc,$add_t_search);
$ass_t_row=mysqli_fetch_array($add_t_data);
if(mysqli_num_rows($add_t_data)>=1){
    echo "
    <table class='table table-bordered table-hover table-condensed'>
    <thread>
        <tr>
        <th>教职工号</th>
        <th>教师姓名</th>
        <th>性别</th>
        </tr>
    </thread>
    ";
    $add_t_result=$dbc->query($add_t_search);
    while($add_t_row1=$add_t_result->fetch_assoc()){
        echo "
        <tr>
        <td>".$add_t_row1['teaId']."</td>
        <td>".$add_t_row1['teaName']."</td>
        <td>".$add_t_row1['teaSex']."</td>
        </tr>
            ";
    }
    echo "</table>";
}
?>