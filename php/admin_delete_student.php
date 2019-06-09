
<!-- 该php文件是管理员端进行删除学生信息所执行的文件 -->
<?php
    //获取输入的学号,stu_id是输入框的名字 
    require('dbConnection.php');
    $dbc=mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
    mysqli_query($dbc,'set names utf8');
    $a_search_stuId=$_POST['stu_id'];
    $query = "
                             SELECT * FROM stuinfo WHERE stuId = '$a_search_stuId'
                             ";
    $data=mysqli_query($dbc,$query);
    $row=mysqli_fetch_array($data);
    if(mysqli_num_rows($data) >= 1){
        //执行删除的语句
        $delete_s_info1="DELETE FROM stuinfo WHERE stuId='$a_search_stuId'"; 
        $delete_s_info2="DELETE FROM grades WHERE stuId='$a_search_stuId'";
        $delete_s_info3="DELETE FROM selectcourse WHERE stuId='$a_search_stuId'";
        mysqli_query( $dbc, $delete_s_info1 );
        mysqli_query( $dbc, $delete_s_info2 );
        mysqli_query( $dbc, $delete_s_info3 );
        echo "<script>alert('数据删除成功！');</script>";
    }
    else{
        echo "<script>alert('学生不存在！');</script>";
    }
    
?>