alert(document.cookie);

var Dname=document.getElementById("Display-name");
var srn=document.getElementById("srn");
var decoded=decodeURIComponent(document.cookie);
var temp=decoded.split(";");
var i=0;
var xname="name";
var xsrn="srn";
// alert("hey");
while(i<temp.length)
{
	if(temp[i].includes("name"))
	{
		var unformatted=temp[i].substring(xname.length+2,);
		var formatted=unformatted.toUpperCase();
		Dname.innerHTML=formatted;
	}
	if(temp[i].includes("srn"))
	{
		srn.innerHTML=" "+temp[i].substring(xsrn.length+2,);
	}
	i++;
}

function delCN(e)
{
	var d=new Date();
	d.setTime(d.getTime()-60*1000);
	document.cookie="Club_Name="+";expires="+d.toUTCString();
}

function createCN(e)
{
	var d=new Date();
	d.setTime(d.getTime()+1*24*60*60*1000);
	document.cookie="Club_Name="+e.id+"; expires="+d.toUTCString();
	//alert(document.cookie)
}

try
{
	var create=document.getElementById('create');
	create.onclick=function(){
		if(window.XMLHttpRequest)
		{
			xmlhttp=new XMLHttpRequest();
		}
		else
		{
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		}
		xmlhttp.onreadystatechange= function(){
			if(this.readyState==4 && this.status==200)
			{
				document.getElementById("Claim-Table").innerHTML=this.responseText;
			}
		};
		xmlhttp.open("GET","ClaimCreate.php",true);
		xmlhttp.send();	
	}
}
catch(e)
{
	//lol
}
finally
{
	var edit=document.getElementById('edit');
	edit.onclick=function(){
		if(window.XMLHttpRequest)
		{
			xmlhttp=new XMLHttpRequest();
		}
		else
		{
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		}
		xmlhttp.onreadystatechange= function(){
			if(this.readyState==4 && this.status==200)
			{
				document.getElementById("Claim-Table").innerHTML=this.responseText;
			}
		};
		xmlhttp.open("GET","ClaimCreate.php",true);
		xmlhttp.send();	
	}
}
