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


if(!function_exists('_alert_back')){
    exit('_alert_back 函数不存在');
}


if(!function_exists('_mysql_string')){
    exit('_mysql_string()函数不存在');
}


/**
 * 监测用户名
 * @param string $_string
 * @param int $_min_num
 * @param int $_max_num
 * @return string
 */

function _check_username($_string,$_min_num,$_max_num){
    //qudiao空格
    $_string =trim($_string);
    if(mb_strlen($_string,'utf-8')<$_min_num||mb_strlen($_string,'utf-8')>$_max_num){
      
      _alert_back('用户名长度不能小于'.$_min_num.'位或大于'.$_max_num.'位');  
     
    }
    
    //xian zhi min gan zifu
    $_char_pattern='/[<>\'\"\ \ \　]/';
    if(preg_match($_char_pattern, $_string)){
        _alert_back('用户名不得包含敏感字符');
    }
    //yonghuming zhuan yi shuru
 return _mysql_string($_string);    
}

//验证密码
function _check_password($_first_pass,$_end_pass,$_min_num){
    
    if($_first_pass!=$_end_pass){
        _alert_back('两次密码输入不正确');
    }
    else{
    if(strlen($_first_pass)<$_min_num){
        _alert_back('密码不得小于'.$_min_num.'位');
    }
    }
    
    return _mysql_string(sha1($_first_pass));
    
}

//唯一标识符
function _check_uniqid($_first_uniqid,$_end_uniqid){
    
    if((strlen($_first_uniqid)!=40)||($_first_uniqid!=$_end_uniqid)){
        _alert_back('唯一标识符异常');
    }
    
    return _mysql_string($_first_uniqid);
}

//验证邮箱
function _check_email($_string){
    
    if(empty($_string)){
    
    return null;
    }
    else 
    {
    //copy lx3238443k@126.com
    if(!preg_match('/^[\w\-\.]+@[\w\-\.]+(\.\w+)+$/', $_string)){
        _alert_back('邮箱格式不正确');
    }
    
    
    return _mysql_string($_string);
    }
}

//性别
function _check_sex($_string){
    return _mysql_string($_string);
}

function _check_face($_string){
    return _mysql_string($_string);
}


?>
