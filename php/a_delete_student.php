
<!-- 该php文件是管理员端进行删除学生信息所执行的文件 -->
<?php
    //获取输入的学号,stu_id是输入框的名字 
    $a_search_stuId=$_POST['stu_id'];

    //执行删除的语句
    $delete_s_info="DELETE FROM stuinfo WHERE stuId='$a_search_stuId'";  //删除stuinfo里面的学生信息
    $retval = mysqli_query( $dbc, $delete_s_info );
    if(!$retval )
    {
        die('无法删除数据: ' . mysqli_error($dbc));
        echo "<script>alert('!!!!!！');</script>";
    }
    else{
        echo "<script>alert('数据删除成功！');</script>";
    }
   
?>