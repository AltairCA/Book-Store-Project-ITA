// JavaScript Document

function validate(){
	
	
	var country = document.getElementsByName("country")[0].value;
	if(country=="select"){
		alert("Please Select a country");
		return false;
		
	}
	
	return true;	
}


function textchange(elem,img_elem){
	if($.trim(elem.value)!=null && $.trim(elem.value)!=""){
		
		img_elem.src="img/validate.png";
	}else{
		img_elem.src="img/loader.gif";
		
		
	}
	
	
}
function emailchange(elem,img_elem){
	var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

if($.trim(elem.value)!=null && $.trim(elem.value)!=""){
	img_elem.src="img/warning.png";
			
			if (filter.test(elem.value)) {
		
	
			
				img_elem.src="img/validate.png";
			}
	}else{
		
		img_elem.src="img/loader.gif";	
		
	}

   
	
}
function listchange(elem,img_elem){
	if(elem.value=="select"){
		img_elem.src="img/loader.gif";	
		
		
	}else{
		img_elem.src="img/validate.png";
	}
	
	
}