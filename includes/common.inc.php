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
//设置字符集
header('Content-Type:text/html;charset=utf-8');





define('ROOT_PATH',substr(dirname(__FILE__),0,-8));

//创建一个自动转义常量
define('GPC', get_magic_quotes_gpc());

//引入核心函数库
require ROOT_PATH.'includes/global.func.php';
require ROOT_PATH.'includes/mysql.func.php';


//拒绝低版本

if(PHP_VERSION<'4.1.0'){
    
    exit('PHP版本过低');
}

//数据库连接
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PWD', 'lx3238443');
define('DB_NAME', 'mytese');

_connect();

//选择数据库

_select_db();
//选择字符集
_set_name();



?>
