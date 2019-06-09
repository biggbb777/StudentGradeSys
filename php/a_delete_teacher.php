<?php
    //删除教师信息
    $a_search_stuId=$_POST['tea_id'];
    $query = "
    SELECT * FROM teainfo WHERE teaId='$a_search_stuId'
                             ";
    $data=mysqli_query($dbc,$query);
    $row=mysqli_fetch_array($data);
    if(mysqli_num_rows($data) >= 1){
        //执行删除的语句
        $delete_s_info1="DELETE FROM teainfo WHERE teaId='$a_search_stuId'"; 
        $delete_s_info2="DELETE FROM selectcourse WHERE teaId='$a_search_stuId'";
        mysqli_query( $dbc, $delete_s_info1 );
        mysqli_query( $dbc, $delete_s_info2 );
        echo "<script>alert('数据删除成功！');</script>";
    }
    else{
        echo "<script>alert('教师不存在！');</script>";
    }
    
?>