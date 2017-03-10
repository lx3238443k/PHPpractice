<?php
/**
*Mytese 1.0
*=============================
*Copy 2016---2017
*Web:http://www.nourlifte.cn
*=============================
*Author:LeeX
*Date:2017-3-7
*/



define('SCRIPT','blog');

define('IN_TG',true);


//公共文件
require dirname(__FILE__).'/includes/common.inc.php';



?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>好友</title>

<?php 


   require ROOT_PATH.'includes/title.inc.php';
?>


</head>
<body> 

<?php 
  require ROOT_PATH.'includes/header.inc.php';
?>

<div id="blog">
    <h2>好友列表</h2>
    <?php  for($i=10;$i<30;$i++) {?>
     <dl>
          <dd class="user">大屯</dd>
          <dt><img src="face/lin4.png" alt="大屯" /></dt> 
          <dd class="message">发消息</dd>
          <dd class="friend">加为好友</dd>
          <dd class="guest">留言</dd>
          <dd class="flower">送花</dd>
     </dl>
     <?php }?>
     
</div>    


<?php 
  require ROOT_PATH.'includes/footer.inc.php';
?>

</body>
</html>


