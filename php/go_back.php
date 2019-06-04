<?php
    setcookie('back_url',$_SERVER['HTTP_REFERER']);//由于页面会自动刷新的缘故，必须给上一页设置一个cookie保存下来
    if(isset($_POST['back']))
    {
        header('Location:'.$_COOKIE['back_url']);
    } 
 ?>