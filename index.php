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


define('IN_TG',true);
define('SCRIPT','index');
//定义常量，来证明本页面
if(!defined('IN_TG')){
    exit('非法调用');
}

//引入公共文件
require dirname(__FILE__).'/includes/common.inc.php';


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>多用户留言系统首页</title>

<?php 
   require ROOT_PATH.'includes/title.inc.php';
?>

</head>
<body> 

<?php 

 require ROOT_PATH.'includes/header.inc.php';

?>

<div id ="list">
   <h2>帖子列表</h2>
</div>

<div id ="user">
   <h2>会员</h2>
</div>

<div id ="pics">
   <h2>最新菜单</h2>
</div>

<?php 
require ROOT_PATH.'includes/footer.inc.php';

?>


</body>
</html>