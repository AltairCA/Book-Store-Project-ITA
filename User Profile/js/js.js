function show()
{
	
	var elem1 = document.form["address"]["add1"].value;
	var elem2 = document.form["address"]["add2"].value;
	var elem3 = document.form["address"]["add3"].value;
	elem1.style.display = "block";
	elem2.style.display = "block";
	elem3.style.display = "block";
	
	
}

function formvalidation()
{

	var email        		= document.form["myform"]["email"].value;
	var profile_pics 		= document.form["myform"]["file"].value;
	var phone_number 		= document.form["myform"]["phone number"].value;
	var password     		= document.form["myform"]["password"].value;
	var streetaddress_1 	= document.form["myform"]["add1"].value;
	var streetaddress_2		= document.form["myform"]["add2"].value;
	var city                = document.form["myform"]["add3"].value;
	
}
//edit profile
function isEmpty(elemValue,"phone_number")
{
	if(phone_number==" " ||phone_number==null)
	{
		alert("You cannot have " + phone_number + "phone_number empty");
		return true;
	}
	else
	{
		return false;
	}
}

/*function emailvalidation(elemValue)
{
		if(!isEmpty(elemValue,"email"))
		{
		var atpos  = elemValue.indexOf("@");
		var dotpos = elemValue.indexOf(".");
			if(atpos < 1 || dotpos + 2 > = elem.length || atpos + 2 >dotpos)
				{	
					alert("Enter a valid email address");
					return false;
				}
			else
				{
					return true;
				}
		}		
		else
		{
			return false;
		}
*/

function profile_picsvalidation(elemValue)
{
	if(!isEmpty(elemValue,"file")
	{
		
		
		
		
		
		
		
		
		
}

function 		