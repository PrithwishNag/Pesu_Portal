var check=0;

var info=document.getElementsByClassName("info");
info[0].style.display="none";
info[1].style.display="none";
info[2].style.display="none";
info[3].style.display="none";

function show(e)
{
	var info=document.getElementsByClassName("info");
	info[e].style.display="block";
}

function dontShow(e)
{
	var info=document.getElementsByClassName("info");
	info[e].style.display="none";
	check=0;
}

function doubleShow(e)
{
	var info=document.getElementsByClassName("info");
	if(check==0)
	{
		info[e].style.display="block";
		check=1;
	}
	else if(check==1)
	{
		info[e].style.display="none";
		check=0;
	}

}