window.onload=function(){
	var img =document.getElementsByTagName('img');
	for(i=0;i<img.length;i++){
		img[i].onclick = function(){
			Open(this.alt);
		};
	}
};

function Open(src){
	var faceimg = opener.document.getElementById('faceimg').src=src;
	
	opener.document.register.face.value=src;
}
 	
