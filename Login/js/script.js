function validate(){
	
	var user = document.getElementsByName("user")[0].value;
	var password = document.getElementsByName("pass")[0].value;
	
	if(user==""||user==null){
		alert("Fill the username");
		return false;
		
	}
	if(password==""||password==null){
		
		alert("Fill the password");
		return false;	
	}
	return true;
		
}