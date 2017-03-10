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
define('SCRIPT','face');
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
<title>头像选择</title>
<?php 
   require ROOT_PATH.'includes/title.inc.php';
?>

<script type="text/javascript" src="js/opener.js"></script>

</head>
<body> 

<div id="face">
    <h3>选择头像</h3>
    <dl>
       <?php foreach (range(1,9)as $num){ ?>
       <dd class ="face"><img src="face/lin<?php echo $num?>.png" alt="face/lin<?php echo $num?>.png" title="头像<?php echo $num?>"  /></dd>
       <?php }?>
    </dl>
</div>









</body>
</html>