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


define('SCRIPT','register');

define('IN_TG',true);

//_login_state();

require dirname(__FILE__).'/includes/common.inc.php';
//require dirname(__FILE__).'/includes/global.func.php';
//判断

//测试





if($_GET['action']=='register1'){
    

     _check_code($_POST['yzm'], $_SESSION['code']);
    //引入验证文件
    include  ROOT_PATH.'includes/register.func.php';
     
    
    //用数组来提交。
    $_clean =array();
    $_clean['uniqid']=_check_uniqid($_POST['uniqid'], $_SESSION['uniqid']);
    $_clean['active']=_sha1_uniqid();//唯一标识符，用来刚注册的用户进行激活处理方可登陆
    $_clean['username']=_check_username($_POST['username'],2,20);
    $_clean['password']=_check_password($_POST['password'], $_POST['notpassword'],6);
    $_clean['sex']=_check_sex($_POST['sex']);
    $_clean['face']=_check_face($_POST['face']);
    $_clean['email']= _check_email($_POST['email']);
    //判断用户名

   
   
   _is_repeat("SELECT mt_username FROM mt_user WHERE mt_username='{$_clean['username']}'LIMIT 1",
        '对不起，此用户名被注册');
   
     //新增用户
    _query(
        "INSERT INTO mt_user(
                              mt_uniqid,
                              mt_active,
                              mt_username,
                              mt_password,
                              mt_email,
                              mt_sex,
                              mt_face,
                              mt_reg_time,
                              mt_last_time,
                              mt_last_ip
                              
        
                             )
                      VALUES(
                              '{$_clean['uniqid']}',
                              '{$_clean['active']}',
                              '{$_clean['username']}',
                              '{$_clean['password']}',
                              '{$_clean['email']}',
                              '{$_clean['sex']}',
                              '{$_clean['face']}',
                              NOW(),
                              NOW(),
                              '{$_SERVER["REMOTE_ADDR"]}'
                             )"
  );
    
    if(_affected_rows()==1){
   _close();
   _session_destroy();
   _location('恭喜你注册成功', 'active.php?active='.$_clean['active']);}
   else {
       _close();
       _session_destroy();
       _location('注册失败', 'register.php');
   }
}


else {
$_SESSION['uniqid']=$_uniqid=_sha1_uniqid();}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>多用户留言系统注册</title>

<?php 


   require ROOT_PATH.'includes/title.inc.php';
?>
<script type="text/javascript" src="js/code.js"></script>
<script type="text/javascript" src="js/register.js"></script>

</head>
<body> 

<?php 
  require ROOT_PATH.'includes/header.inc.php';
?>


<div id="register" >
   <h2>用户注册</h2>
   <form method="post" name="register" action="register.php?action=register1">
     <input type="hidden" name="uniqid" value="<?php echo $_uniqid ?>"/>
      <dl>
        <dt>请填写以下信息</dt>
        <dd>用户名     ：<input type="text" name="username" class="text" />(*必填，至少两位)</dd>
        <dd>密          码：<input type="password" name="password" class="text" />(*必填，至少六位)</dd>
        <dd>确认密码：<input type="password" name="notpassword" class="text" />(*必填，至少六位)</dd>
        <dd>性          别：<input type="radio" name="sex" value="男" checked="checked"/>男<input type="radio" name="sex" value="女" />女</dd>
        
        <dd class ="face"><input type="hidden" name="face" value="face/lin1.png" /><img src="face/lin1.png" alt="头像选择"  id ="faceimg"/></dd>
        <dd>电子邮件    ：<input type="text" name="email" class="text" /></dd>
        <dd>验证码     ：<input type="text" name="yzm" class="text yzm" /><img src ="code.php" id="code" /></dd>
        <dd><input type="submit" class="submit" value="注册" /></dd>
      </dl>
   </form>

</div>


<?php 
  require ROOT_PATH.'includes/footer.inc.php';
?>

</body>
</html>