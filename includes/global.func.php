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

function _alert_back($_info){
    
   
    echo  "<script type='text/javascript'>alert('".$_info."');history.back();</script>";
    exit();
}

function _check_code($_first_code,$_end_code){
    
    if($_first_code!=$_end_code){
        _alert_back('验证码错误');
    }
    
    
}

//自动转义
function _mysql_string($_string){
    
    if(!GPC){
        return mysql_real_escape_string($_string);
    }
    else{
        return $_string;
    }
    
}



//tiaozhuanyemian
function _location($_info,$_url){
    if(!empty($_info)){
        echo  "<script type='text/javascript'>alert('$_info');location.href='$_url';</script>";
        exit();
    }
    else{
        header('Location:'.$_url);
   }
    
}

//yanzhenma
function _code(){
    
    $_rnd_num=4;
    
    for($i=0;$i<$_rnd_num;$i++){
        $n_msg.= dechex(mt_rand(0,15));
    }
    //save
    $_SESSION['code']= $n_msg;
    
    $_width=105;
    $_height=35;
    
    //create img
    $_img = imagecreatetruecolor($_width, $_height);
    
    $_white = imagecolorallocate($_img, 255, 255, 255);
    imagefilter($_img, 0,0,$_white);
    
    $_black =imagecolorallocate($_img, 0, 0, 0);
    imagerectangle($_img, 0, 0, $_width-1, $_height-1, $_black);
    
    //随即画出6个线条
    for($i=0;$i<6;$i++)
    {
        $_rnd_color=imagecolorallocate($_img, mt_rand(0, 255), mt_rand(0, 255),mt_rand(0, 255));
        imageline($_img, mt_rand(0, $_width), mt_rand(0, $_height), mt_rand(0, $_width), mt_rand(0, $_height), $_rnd_color);
    
    }
    
    //随即雪花
    for($i=0;$i<100;$i++){
        $_rnd_color=imagecolorallocate($_img, mt_rand(200, 255), mt_rand(200, 255),mt_rand(200, 255));
        imagestring($_img, 1, mt_rand(0, $_width-1), mt_rand(0, $_height-1), '*', $_rnd_color);
    
    }
    
    //输出验证码
    for($i=0;$i<strlen($_SESSION['code']);$i++){
        imagestring($_img, mt_rand(4, 6), $i*$_width/$_rnd_num+mt_rand(1,10),
            mt_rand(1, $_height/2),$_SESSION['code'][$i],
            imagecolorallocate($_img, mt_rand(0, 100), mt_rand(0, 150),mt_rand(0, 200)));
    
    }
    
    
    //输出
    header('Content-Type:image/png');
    imagepng($_img);
    
    imagedestroy($_img);
    
    
}


//jiamibianma
function _sha1_uniqid(){
    
   return _mysql_string(sha1(uniqid(rand(),true)));
    
   
}

//清空session
function _session_destroy(){
    
    session_destroy();
}

//退出，清空cookie
function _unsetcookies(){
    setcookie('username','',time()-1);
    setcookie('uniqid','',time()-1);
    _session_destroy();
    _location(null, 'index.php');
    
}

//登陆的状态，防止登陆之后进入注册界面
function _login_state(){
    
    if(isset($_COOKIE['username'])){
        _alert_back('登陆状态下无法进行本操作');
    }
    
}







?>
