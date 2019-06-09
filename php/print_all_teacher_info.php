<?php
                        
                            //查询所有教师的语句 
                            $search_all_teacher_infos=
                            "SELECT DISTINCT teainfo.teaId,teainfo.teaName,selectcourse.courseId,courseinfo.courseName,teainfo.teaSex 
                            FROM teainfo INNER JOIN selectcourse INNER JOIN courseinfo 
                            ON teainfo.teaId=selectcourse.teaId AND selectcourse.courseId=courseinfo.courseId";

                            $t_result=$dbc->query($search_all_teacher_infos);
                            // 记录数据的条数
                            $number=1;
                            while($t_row=$t_result->fetch_assoc()){
                                echo "<tr>
                                <td>$number</td>
                                <td>".$t_row['teaId']."</td>
                                <td>".$t_row['teaName']."</td>
                                <td>".$t_row['courseName']."</td>
                                <td>".$t_row['teaSex']."</td>
                                </tr>";
                                $number=$number+1;
                            }
                        ?>