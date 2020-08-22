document.cookie="";

//deleting the cookie
function deleteMenu()
{
	var d=new Date();
	d.setTime(d.getTime()-60*1000);
	document.cookie="menu="+";expires="+d.toUTCString();
}

function createMenu(e)
{
	var d=new Date();
	d.setTime(d.getTime()+1*24*60*60*1000);
	switch(e)
	{
		case 1: document.cookie="menu=Admin"+"; expires="+d.toUTCString();break;
		case 2: document.cookie="menu=Club Head"+"; expires="+d.toUTCString();break;
		case 3: document.cookie="menu=Member"+"; expires="+d.toUTCString();break;
	}
}

function redirect(event)
{
	event.href="login.php";
	return false;
}

function profileDirect(e)
{
	var decoded=decodeURIComponent(document.cookie);
	var temp=decoded.split(";");
	var i=0,j=0;
	var menu="menu";
	var present_A=0;
	var present_M=0;
	var present_C=0;
	while(i<temp.length)
	{
		if(temp[i].includes("menu"))
		{
			if(temp[i].substring(menu.length+2,)=="Member")
			{
				while(j<temp.length)
				{
					if(temp[j].includes("srn"))
					{
						present_M=1;
						break;
					}
					if(temp[j].includes("Admin_name")||temp[j].includes("Clubhead_name"))
					{
						return true;
						break;
					}
					j++;
				}
			}
			else if(temp[i].substring(menu.length+2,)=="Admin")
			{
				while(j<temp.length)
				{
					if(temp[j].includes("Admin_name"))
					{
						present_A=1;
						break;
					}
					if(temp[j].includes("srn")||temp[j].includes("Clubhead_name"))
					{
						return true;
						break;
					}
					j++;
				}
			}
			else if(temp[i].substring(menu.length+2,)=="Club Head")
			{
				while(j<temp.length)
				{
					if(temp[j].includes("Clubhead_name"))
					{
						present_C=1;
						break;
					}
					if(temp[j].includes("srn") || temp[j].includes("Admin_name"))
					{
						return true;
						break;
					}
					j++;
				}
			}
		}
		i++;
	}
	if(present_M==1)
	{
		e.href="student-dashboard.php";
		return false;
	}
	else if(present_A==1)
	{
		e.href="AdminMain.php";
		return false;
	}
	else if(present_C==1)
	{
		e.href="clubhead-dashboard.php";
		return false;
	}
	else
	{
		return true;
	}
}

