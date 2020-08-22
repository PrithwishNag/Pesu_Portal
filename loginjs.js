var form=document.getElementsByClassName("login-form");
var headChange=document.getElementById("sub-head-change");
var decoded=decodeURIComponent(document.cookie);
var temp=decoded.split(";");
var i=0;
var uname="menu";
var name;
// alert(document.cookie)
while(i<temp.length)
{
	if(temp[i].includes(uname))
	{
		name=temp[i].substring(uname.length+2,);
	}
	i++;
}
headChange.innerHTML=name;

function redirect(e)
{
	if(name=="Member")
	{
		e.href="signup.php";
	}
	else if(name=="Club Head")
	{
		e.href="signup.php";
	}
	return false;
}

function check()
{	
	var inp=document.getElementsByClassName("form-inp");
	if(inp[0].value==''||inp[1].value=='')
	{	
		var incorrect=document.getElementById("incorrect");
		incorrect.innerHTML="Empty Fields";
		return false;
	}
	else
		return true;
}