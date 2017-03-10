<?php
/**
*Mytese 1.0
*=============================
*Copy 2016---2017
*Web:http://www.nourlifte.cn
*=============================
*Author:LeeX
*Date:2017-2-18
*/
if(!defined('IN_TG')){
    exit('非法调用');
}
?>
<div id ="header">
 <h1><a href="index.php">多用户留言系统</a></h1>
   <ul>
     <li><a href="index.php">首页</a></li>
     
     <?php 
        if(isset($_COOKIE['username'])){
            echo '<li><a href="member.php">'.$_COOKIE['username'].'·个人中心</a></li>';
            echo "\n";
           
        }else {
           echo '<li><a href="register.php">注册</a></li>';
           echo "\n";
           echo "\t\t";
            echo '<li><a href="login.php">登陆</a></li>';
            echo "\n";
        }
     ?>
     
     <li><a href="blog.php">好友</a></li>
     <?php 
          if(isset($_COOKIE['username'])){
              echo '<li><a href="logout.php">退出</a></li>';
          }
     ?>
     
     
     <li>退出</li>
   </ul>
</div>