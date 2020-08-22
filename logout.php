<?php
if(isset($_COOKIE["menu"])&&$_COOKIE["menu"]=="Member")
{
	setcookie("name","",time()-3600);
	setcookie("srn","",time()-3600);
	setcookie("cgpa","",time()-3600);
	setcookie("sem","",time()-3600);
	setcookie("section","",time()-3600);
	setcookie("program","",time()-3600);
	setcookie("contact","",time()-3600);
	setcookie("email","",time()-3600);
	header("Location: home.html");
}
else if(isset($_COOKIE["menu"])&&$_COOKIE["menu"]=="Admin")
{
	setcookie("Admin_name","",time()-3600);
	setcookie("Admin_email","",time()-3600);
	header("Location: home.html");
}
else if(isset($_COOKIE["menu"])&&$_COOKIE["menu"]=="Club Head")
{
	setcookie("Clubhead_name","",time()-3600);
	setcookie("Clubhead_email","",time()-3600);
	header("Location: home.html");
}
?>