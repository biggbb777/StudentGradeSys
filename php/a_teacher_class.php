<?php
    $tea_class=$_POST['tea_class'];
    $search_tea_class=
    "SELECT stuId,stuName,stuClass,courseName,stuSex,score
    FROM stuinfo NATURAL JOIN teainfo NATURAL JOIN selectcourse NATURAL JOIN courseinfo NATURAL JOIN grades
    WHERE teaId='10001' AND courseId='C01' AND stuClass='1'
    ORDER BY score DESC";
?>