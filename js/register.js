
 
window.onload = function(){
	code();
var faceimg = document.getElementById('faceimg');

faceimg.onclick = function()
{
	window.open('face.php','face','width=900,height=900,top=0,left=0,scrollbars1');
}
  

//表单验证
   
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
    	
    	//验证密码
    	if(fm.password.value.length<6){
    		alert('密码不得小于6位');
    		fm.password.value='';
    		fm.password.focus();
    		return false;
    		
    	}
    	
    	if(fm.password.value!=fm.notpassword.value){
    		alert('密码不一样');
    		fm.password.value='';
    		fm.password.focus();
    		return false;
    		
    	}
    	
    	if(!/^[\w\-\.]+@[\w\-\.]+(\.\w+)+$/.test(fm.email.value)){
    		alert('邮件格式错误');
    		fm.email.value='';
    		fm.email.focus();
    		return false;
    	}
    	if(fm.yzm.value.length!=4){
    		alert('验证码必须是4位');
    		fm.yzm.value='';
    		fm.yzm.focus();
    		return false;
    	}
    	
    	
    	return true;
    };

};