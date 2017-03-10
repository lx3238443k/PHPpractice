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


define('SCRIPT','active');

define('IN_TG',true);


require dirname(__FILE__).'/includes/common.inc.php';
//开始激活处理

if(!isset($_GET['active'])){
    _alert_back('非法操作');
}

if(isset($_GET['action'])&&isset($_GET['active'])&&$_GET['action']=='ok'){
   
    
    $_active = _mysql_string($_GET['active']);
    if(_fetch_array("SELECT mt_active FROM mt_user WHERE mt_active ='$_active' LIMIT 1")){
        //设置为空
        _query("UPDATE mt_user SET mt_active=NULL WHERE mt_active='$_active'LIMIT 1");
        if(_affected_rows()==1){
            _close();
            _location('账户激活成功', 'login.php');
        }else {
            _close();
            _location('账户激活失败', 'register.php');
        }
     
    }else{
        _alert_back('非法操作');
    }
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>多用户留言系统激活</title>

<?php 


   require ROOT_PATH.'includes/title.inc.php';
?>

<script type="text/javascript" src="js/register.js"></script>

</head>
<body> 

<?php 
  require ROOT_PATH.'includes/header.inc.php';
?>


<div id="active">
    <h2>激活账户</h2>
    <p>点击以下链接激活账户</p>
    <p><a href="active.php?action=ok&amp;active=<?php echo $_GET['active']?>">active.php?action=ok&amp;active=<?php echo $_GET['active']?></a>></p>
</div>



<?php 
  require ROOT_PATH.'includes/footer.inc.php';
?>

</body>
</html>
