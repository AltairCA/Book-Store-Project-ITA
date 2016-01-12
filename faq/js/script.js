
function changer(elem,elem2){
	
	if(document.getElementById(elem2).style.opacity =="1"){
		document.getElementById(elem2).style.opacity ="0";
		document.getElementById(elem2).style.position ="absolute";
		document.getElementById(elem2).style.zIndex ="0";
		
		document.getElementById(elem2).style.visibility="hidden";
		
	}else{
	document.getElementById(elem2).style.opacity ="1";
	document.getElementById(elem2).style.position ="relative";
	document.getElementById(elem2).style.visibility="visible";
	document.getElementById(elem2).style.zIndex ="5";
	
	document.getElementById(elem2).style.height ="auto";
	
	$.post('js/action.php',{id:elem},function(data){
			//alert(data);	
	});
	}
	
	
}

function sleep(milliseconds) {
  var start = new Date().getTime();
  for (var i = 0; i < 1e7; i++) {
    if ((new Date().getTime() - start) > milliseconds){
      break;
    }
  }
}