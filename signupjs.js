var form=document.getElementsByClassName("signup-form");

var headChange=document.getElementById("sub-head-change");
var decoded=decodeURIComponent(document.cookie);
var temp=decoded.split(";");
var i=1;
var uname="menu";
var name,exists;
while(i<temp.length)
{
	if(temp[i].includes("menu"))
	{
		name=temp[i].substring(uname.length+2,);
	}
	if(temp[i].includes("checkemail"))
	{
		exists=1;
	}
	i++;
}
headChange.innerHTML=name;

if(exists)
{
	emailExists();
}


//Password verify
function verify(e){
	
	pass=form[0].elements[1].value;
	var incorrect=document.getElementById("incorrect");
	var nonspecial=/^[A-Za-z0-9]+$/
	var isvalid=nonspecial.test(pass);
	for(var i=0;i<form[0].elements.length-1;i++)
	{
		if(form[0].elements[i].value=="")
		{
			incorrect.innerHTML="Fill All Fields";
			return false;
		}
	}
	if(!isvalid)
	{
		incorrect.innerHTML="Doesn't Contain Special Characters";
		pass.value="";
		return false;
	}
}

var inputs=document.getElementsByClassName("form-inp");

function notify(e)
{
	e.style.borderBottom="3px solid red";
	e.onblur=function(){
		e.style.borderBottom="1px solid black";
	}
}

function emailExists()
{
	var temp=document.getElementById("incorrect");
	temp.innerHTML="Account With This Email Already Exists";
}