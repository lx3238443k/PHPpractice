<?php
/**
*Mytese 1.0
*=============================
*Copy 2016---2017
*Web:http://www.nourlifte.cn
*=============================
*Author:LeeX
*Date:2017-3-3
*/

// if(!defined('IN_TG')){
//     exit('非法调用');
// }




/*
 *_connect()连接数据库
 *@access public
 *return void 
 */


function _connect(){
    
   global $_conn;
    if(!$_conn = mysql_connect(DB_HOST,DB_USER,DB_PWD)){
        exit('数据库连接失败');
    }
}

/*
 * _select_db() 选择数据库
 * return void
 */

function _select_db(){
    if(!mysql_select_db(DB_NAME)){
        exit('Can‘t found sql');
    }
    
     
}


function _set_name(){
    if(!mysql_query('SET NAMES UTF8')){
        exit('wrong');
    }
    
}

function _query($_sql){
    if(!$_result=mysql_query($_sql)){
        exit('执行失败');
    }
    return $_result;
}

//查询数组
function _fetch_array($_sql){
    return mysql_fetch_array(_query($_sql));
}

//判断
function _is_repeat($_sql,$_info){
    
   if(_fetch_array($_sql)){
       _alert_back($_info);
   }
    
}

function _close(){
   if(!mysql_close()){
       exit('关闭异常');
   }
}
/*
 * _affected_rows表示影响到的记录数
 */
function _affected_rows(){
    return mysql_affected_rows();
}



?>
