function vale(id){
var frm = document.getelementbyid(id);
if(frm.password.value == "")
{
	alert("Entrer le mot de passe.");
	frm.password.focus(); 
	return false;
}elseif(frm.confirmpassword.value == "")
{
	alert("confirmer votre mot de passe.");
	return false;
}elseif(frm.confirmpassword.value != frm.password.value)
{
	alert("Les mots de passe ne sont pas identique.");
	return false;
}else
return true;
}

