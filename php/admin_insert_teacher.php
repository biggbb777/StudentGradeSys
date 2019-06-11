

<?php
require('dbConnection.php');
$dbc=mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
mysqli_query($dbc,'set names utf8');
// 获取输入教师的基本信息
$add_teaId=$_POST['add_tea_id'];
$add_teaName=$_POST['add_tea_name'];
if($_POST['teacher_choice_sex']=='option_M')
{
    $add_teaSex='M';
}
if($_POST['teacher_choice_sex']=='option_F')
{
    $add_teaSex='F';
}
// $add_teaSex=$_POST['add_tea_sex'];
$add_teaPaw='123456';

//查询插入的教职工号是否存在
$a_search_teacher1=
"SELECT teaId
FROM teainfo
WHERE teaId='$add_teaId'";

$a_t_data=mysqli_query($dbc,$a_search_teacher1);
$a_t_row=mysqli_fetch_array($a_t_data);
// 如果教职工号存在插入失败
if(mysqli_num_rows(($a_t_data))>=1){
    echo "<script>alert('您输入的教职工号已存在，请输入正确的教职工号!');</script>";
}
// 若是不存在就插入
else{
     // 添加教师的基本信息
    $add_t_sql=
    "INSERT INTO teainfo 
    (teaId,teaPaw,teaName,teaSex)
    VALUES
    ('$add_teaId','$add_teaPaw','$add_teaName','$add_teaSex')";

    mysqli_query( $dbc, $add_t_sql );
    echo "<h3>这是您刚才录入的教师:</h3>";
    require_once('admin_insert_teacher_info.php');

}

?>