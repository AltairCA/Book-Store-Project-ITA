function usernamechange(elem,elem2){
		
	//var value = document.getElementsByName(elem)[0].value;
	
	if($.trim(elem.value)!=""){
		var letters = /[^\w\s]/gi;
		if(!(elem.value.match(letters))){
			$.post('js/action.php',{name:elem.value},function(data){
				//alert(data);
				if($.trim(data)=="found"){
					elem.style.backgroundColor="#F3B39C";
					document.getElementsByName(elem2)[0].innerHTML="User Name already taken";
					return false;
				}else{
					elem.style.backgroundColor="#CAF7C8";
					document.getElementsByName(elem2)[0].innerHTML="User Name Available";
					
					return true;
				}
						
			});
			
			
		}else{
			elem.style.backgroundColor="#F3B39C";
			elem.value = elem.value.replace(/[^\w\s]/gi, '');
			alert("Type only characters");
			return false;
		}
	}else{
		//alert(elem.value);
		elem.style.backgroundColor="white";
		document.getElementsByName(elem2)[0].innerHTML="Type Username";
		return false;
	}
	return false;
	
	
}
function passchange(elem,elem2,elem3){
	
	if($.trim(elem.value)!=""){
		if($.trim(elem2.value)!=""){
			if($.trim(elem.value)==$.trim(elem2.value)){
					elem.style.backgroundColor="#CAF7C8";
					elem2.style.backgroundColor="#CAF7C8";
					document.getElementsByName(elem3)[0].innerHTML="Password Match";
					return true;
			}else{
					elem.style.backgroundColor="#F3B39C";
					elem2.style.backgroundColor="#F3B39C";
					document.getElementsByName(elem3)[0].innerHTML="Password Mismatch";
					return false;
				
			}
			
		}else{
			document.getElementsByName(elem3)[0].innerHTML="Fill Properly";
			elem2.style.backgroundColor="white";
			return false;
		}
	
	}else{
		if($.trim(elem2.value)!=""){
		}else{
			document.getElementsByName(elem3)[0].innerHTML="Fill Properly";
			elem2.style.backgroundColor="white";
			return false;
		}
		document.getElementsByName(elem3)[0].innerHTML="Fill Properly";
		elem.style.backgroundColor="white";
		return false;
	}
	
}
function countrychange(elem){
	if(elem.value!="select"){
		elem.style.backgroundColor="#CAF7C8";
		return true;
		
	}else{
		elem.style.backgroundColor="white";
		return false;
	}
	
}
function filechange(elem){
	var filePath = elem.value;
    var ext = filePath.substring(filePath.lastIndexOf('.') + 1).toLowerCase();
	if(ext=="jpg"||ext=="jpeg"){
		return true;	
		
	}else{
			elem.value="";
			alert("not a valid file type");
			return false;
	}
}


function emailchange(elem,elem2){
		
	//var value = document.getElementsByName(elem)[0].value;
	
	if($.trim(elem.value)!=""){
		
		var x = elem.value;
    var atpos = x.indexOf("@");
    var dotpos = x.lastIndexOf(".");
    if (atpos< 1 || dotpos<atpos+2 || dotpos+2>=x.length) {
        document.getElementsByName(elem2)[0].innerHTML="";
		elem.style.backgroundColor="white";
        return false;
    }
		
			$.post('js/action.php',{email:elem.value},function(data){
				//alert(data);
				if($.trim(data)=="found"){
					elem.style.backgroundColor="#F3B39C";
					document.getElementsByName(elem2)[0].innerHTML="Email address already registerd";
					return false;
				}else{
					elem.style.backgroundColor="#CAF7C8";
					document.getElementsByName(elem2)[0].innerHTML="Email Available";
					return true;
				}
						
			});
			
			
		
	}else{
		//alert(elem.value);
		elem.style.backgroundColor="white";
		document.getElementsByName(elem2)[0].innerHTML="Type Email address";
		return false;
	}
	return false;
	
	
}

function validate(elem,elem2,elem3,elem4,elem5,elem6,elem7,elem8,elem9){
	
	if(document.getElementsByName(elem2)[0].innerHTML=="User Name Available"){
		
		if(passchange(elem3,elem4,elem5)){
			
			if(countrychange(elem6)){
				
				if(filechange(elem7)){
					
					if(document.getElementsByName(elem9)[0].innerHTML=="Email Available"){
						
						return true;
					}else{
						alert("Check Email");
						return false;	
					}
				}else{
					alert("Check Picture");
					return false;	
				}
			}else{
				alert("Check Country");
				return false;	
			}
			
		}else{
			alert("Check Password");
			return false;	
		}
		
	}else{
		alert("Check username");
		return false;	
	}
}


	
	
