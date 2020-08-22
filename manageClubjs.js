//dont display
var card=document.getElementById("detail");
card.style.display="none";
var addForm=document.getElementById("addForm");
addForm.style.display="none";


//Display Count
var count=document.getElementsByClassName("club-but");
document.querySelector("body").addEventListener("onload",showCount(),false);
function showCount()
{
	var span=document.getElementById("count");
	span.innerHTML=count.length;
	if(count.length==0)
	{
		var temp=document.getElementsByClassName("club");
		temp[0].innerHTML="<i>You Have No Clubs <br> Click on Add to Add new Clubs</i>";
		temp[0].style.padding="0px 0px 0px 20px"
	}
}

//onclick display
var select=0;
var club=document.getElementsByClassName("club-but");
eventListener();
function eventListener()
{
	for(var i=0;i<count.length;i++)
	{	
		club[i].onclick=displayCard;
	}
}

function showUser(str)
{
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
			addForm.style.display="none";
			card.style.display="flex";
			var cardhead=document.getElementsByClassName("card-header");
			cardhead[0].innerHTML=str;
			document.getElementById("User-Details").innerHTML=this.responseText;
		}
	};
	xmlhttp.open("GET","getUser.php?q="+str,true);
	xmlhttp.send();
}

function displayCard(event)
{
	//Deleting Header Cookie
	var d=new Date();
	d.setTime(d.getTime()-1*86400);
	document.cookie="Club_Name="+""+"; expires="+d.toUTCString();

	//Creating Header Cookie
	var d=new Date();
	d.setTime(d.getTime()+1*86400);
	document.cookie="Club_Name="+event.target.innerHTML;+"; expires="+d.toUTCString();
	showUser(event.target.innerHTML);
}

//delete club
function deleteClub(e)
{
	if(count.length!=0)
	{
		var decoded=decodeURIComponent(document.cookie);
		var temp=decoded.split(";");
		var i=1;
		var uname="Club_Name";
		var name;
		while(i<temp.length)
		{
			if(temp[i].includes("Club_Name"))
			{
				name=temp[i].substring(uname.length+2,);
			}
			i++;
		}
		var check=confirm("Are You Sure You want to Delete Club->"+name.toUpperCase()+"?");
		if(check==false)
			return true;
		e.href="DeleteClub.php";
		return false;	
	}
}

var clubBut=document.getElementsByClassName("club-but");
var i=0;
while(i<clubBut.length)
{
	clubBut[i].ondblclick=function(e){
	
		window.location.href="ClubDetails.php";
	}
	i++;
}	

function clubDetails(e)
{
	if(count.length!=0)
	{
		e.href="ClubDetails.php";
		return false;	
	}
}

//Add Club
var add=document.getElementsByClassName("club-add");
add[0].onclick=function(){
	select=0;
	card.style.display="none";
	addForm.style.display="flex";
};

//Form Verification
var valid=1;
function formValidation()
{
	//console.log("F");
	var form=document.forms["Club-Add-Form"];
	if(form["Club-Name"].value=="" || form["Club-Head"].value=="" || form["Club-Contact"].value=="" || form["Club-Email"].value=="")
	{
		valid=0;
		var error=document.getElementById("error");
		error.innerHTML="<i><small>UnFilled Fields<small></i>"
		alert();
		return false;
	}
}

//insertClub
var submit=document.getElementById("submit");
submit.onclick=function(){
	formValidation();
	if(valid==0)
	{
		return;
	}
	CreateClubButton();
}

//Creating New Club List Row
function CreateClubButton()
{
	addForm.style.display="none";
	var newdivrow=document.createElement("div");
	newdivrow.setAttribute("class","row club");
	var newdivcol=document.createElement("div");
	newdivcol.setAttribute("class","col-md-2");
	var newdivbut=document.createElement("button");
	newdivbut.setAttribute("class","club-but btn btn-outline-danger btn-lg btn-block");
	var insert=document.getElementById("insert");
	var mainParent=document.getElementById("main-parent");
	mainParent.insertBefore(newdivrow,insert);
	newdivrow.appendChild(newdivcol);
	newdivcol.appendChild(newdivbut);
	var clubName=document.getElementById("clubName");
	newdivbut.innerHTML=clubName.value;
	newdivrow.style.padding="10px 0px 10px 0px";
	club=document.getElementsByClassName("club-but");
	eventListener();
	//FillOut();
	count=document.getElementsByClassName("club-but");
	showCount();
}

function FillOut()//Should be made with database values, currently made with Form values LOL
{
	var clubHead=document.getElementById("clubHead");
	document.getElementById("HOCOut").innerHTML=clubHead.value;
	var clubContact=document.getElementById("clubContact");
	document.getElementById("contactOut").innerHTML=clubContact.value;
	var clubContact=document.getElementById("clubEmail");
	document.getElementById("emailOut").innerHTML=clubEmail.value;
}

//The Form is Redirecting to itself thats y it not showing
//When Contact and email are filled in a wrong manner It shows as the form doesnt redirect