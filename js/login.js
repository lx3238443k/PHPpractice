/**
 * 
 */

 window.onload= function(){
 
   code();
   
   //登陆验证
   
    var fm=document.getElementsByTagName('form')[0];
    
     fm.onsubmit=function(){
     	
     	if(fm.username.value.length<2||fm.username.value.length>20){
    		alert('用户名不得小于2,或大于20位');
    		fm.username.value='';
    		fm.username.focus();
    		return false;
    	}
    	if(/[<>\'\"\ \　]/.test(fm.username.value)){
    		alert('非法用户名');
    		fm.username.value='';
    		fm.username.focus();
    		return false;
    	}
     	
     	if(fm.password.value.length<6){
    		alert('密码不得小于6位');
    		fm.password.value='';
    		fm.password.focus();
    		return false;
    		
    	}
    	
    	if(fm.yzm.value.length!=4){
    		alert('验证码必须是4位');
    		fm.yzm.value='';
    		fm.yzm.focus();
    		return false;
    	}
    	
    	
     	
     };
    
 
 };