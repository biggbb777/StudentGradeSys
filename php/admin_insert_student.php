

<?php
require('dbConnection.php');
$dbc=mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
mysqli_query($dbc,'set names utf8');
$add_stuId=$_POST['add_stu_id'];
$add_stuName=$_POST['add_stu_name'];
$add_stuClass=$_POST['add_stu_class'];
if($_POST['student_choice_sex']=='option_M')
{
    $add_stuSex='M';
}
if($_POST['student_choice_sex']=='option_F')
{
    $add_stuSex='F';
}
// $add_stuSex=$_POST['add_stu_sex'];
$add_stuPaw='123456';

//查询插入的学号是否存在
$a_search_student1=
"SELECT stuId
FROM stuinfo
WHERE stuId='$add_stuId'";

$a_s_data=mysqli_query($dbc,$a_search_student1);
$a_s_row=mysqli_fetch_array($a_s_data);
// 如果教职工号存在插入失败
if(mysqli_num_rows(($a_s_data))>=1){
    echo "<script>alert('您输入的学号已存在，请输入正确的学号!');</script>";
}
// 若是不存在就插入
else{
    // 添加学生的基本信息
    $add_s_sql=
    "INSERT INTO stuinfo 
    (stuId,stuPaw,stuName,stuClass,stuSex)
    VALUES
    ('$add_stuId','$add_stuPaw','$add_stuName','$add_stuClass','$add_stuSex')";

    mysqli_query( $dbc, $add_s_sql );
    echo "<h3>这是您刚才录入的学生:</h3>";
    require_once('admin_insert_print_student_info.php');
}

?>