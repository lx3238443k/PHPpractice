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
session_start();

define('SCRIPT','login');

define('IN_TG',true);
//_login_state();

require dirname(__FILE__).'/includes/common.inc.php';
//处理登陆
if($_GET['action']=='login'){
    _check_code($_POST['yzm'], $_SESSION['code']);
    //引入验证文件
    include  ROOT_PATH.'includes/login.func.php';
    //接受数据
    
    $_clean=array();
    $_clean['username']=_check_username($_POST['username'], 2, 20);
    $_clean['password']=_check_password($_POST['password'],6);
    $_clean['time']=_check_time($_POST['time']);
    //print_r($_clean);
    //到数据库验证
    
   
        
        if(!!$_rows=_fetch_array("SELECT mt_username,mt_uniqid FROM mt_user WHERE mt_username='{$_clean['username']}' AND mt_password='{$_clean['password']}'AND mt_active='' LIMIT 1 ")){
       _close();
       _session_destroy();
       
      _setcookie($_rows['mt_username'], $_rows['mt_uniqid'],$_clean['time']);
      _location('登陆成功', 'index.php');
       
       }else {
        _close();
        _session_destroy();
        _location('用户名或密码不正确,或者未激活', 'login.php');
        exit('错误');
        }
   
        
      
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>多用户留言系统登陆</title>

<?php 


   require ROOT_PATH.'includes/title.inc.php';
?>

<script type="text/javascript" src="js/code.js"></script>
<script type="text/javascript" src="js/login.js"></script>

</head>
<body> 

<?php 
  require ROOT_PATH.'includes/header.inc.php';
?>

<div id="login">
    <h2>登陆</h2>
    <form method="post" name="login" action="login.php?action=login">
    
      <dl>
        <dt> </dt>
        <dd>用户名     ：<input type="text" name="username" class="text" /></dd>
        <dd>密          码：<input type="password" name="password" class="text" /></dd>
        <dd>保          留：<input type="radio" name="time" value="0" checked="checked" />不保留<input type="radio" name="time" value="1"/>一天<input type="radio" name="time" value="2"/>一周<input type="radio" name="time" value="3"/>一个月</dd>
        <dd>验证码： <input type="text" name="yzm" class="text yzm" /><img src ="code.php" id="code" /> </dd>
        <dd><input type="submit" value="登陆" class="button" /><input type="button" value="注册"  id="location"  class="button" /></dd>
        
        
       </dl>
     </form>   
</div>

<?php 
  require ROOT_PATH.'includes/footer.inc.php';
?>

</body>
</html>

