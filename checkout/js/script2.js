// JavaScript Document

function validate(){
	
	
	var method = document.getElementsByName("method")[0].value;
	var package = document.getElementsByName("package")[0].value;
	var checked = document.getElementsByName("agreement")[0].checked;
	if(package=="select"){
		alert("Please Select a package");
		return false;
		
	}else if(method=="select"){
		alert("Please Select a Payment Method");
		return false;
		
	}else if(!checked){
		alert("Please Tick");
		return false;
	}
	
	return true;	
}


function textchange(elem,img_elem){
	if(elem.value!=null&&elem.value!=""){
		
		img_elem.src="img/validate.png";
	}else{
		img_elem.src="img/loader.gif";
		
		
	}
	
	
}
function emailchange(elem,img_elem){
	var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

if(elem.value!=null&&elem.value!=""){
	img_elem.src="img/warning.png";
			
			if (filter.test(elem.value)) {
		
	
			
				img_elem.src="img/validate.png";
			}
	}else{
		
		img_elem.src="img/loader.gif";	
		
	}

   
	
}
function listchange(elem,img_elem,base){
	if(elem.value=="select"){
		img_elem.src="img/loader.gif";	
		
		
	}else{
		
		img_elem.src="img/validate.png";
	}
	if(elem==document.getElementsByName("package")[0]){
			
			var package_price = document.getElementsByName("package")[0].value.replace( /^\D+/g, '');
			//alert(package_price);
			var raw_price = base
			document.getElementById("price").innerHTML = "Your Total $"+Number(Number(raw_price)+Number(package_price));
			document.getElementsByName("net_price")[0].value = Number(Number(raw_price)+Number(package_price));
			//alert(document.getElementsByName("net_price")[0].value);
			//alert("Your Total $"+Number(Number(raw_price)+Number(package_price)));
		}
	
	
	
}