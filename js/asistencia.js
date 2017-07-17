function clickregasis()
{
	var vlink = "rea_getasis.php";
	var vlayer = "dsubcontent";
	openpageget(vlink, vlayer, true, "");
}
function clickviewasis()
{
	var vlink = "via_getestu.php";
	var vlayer = "dsubcontent";
	openpageget(vlink, vlayer, true, "");
}
function clickviewasisestu()
{
	var vlink = "res_getestu.php";
	var vlayer = "dsubcontent";
	openpageget(vlink, vlayer, true, "");
}
function clickviewasisdoce()
{
	var vlink = "rdo_getdoce.php";
	var vlayer = "dsubcontent";
	openpageget(vlink, vlayer, true, "");
}

//---------------- Registro de asistencia -------------------------
function rea_verisearch(pobject)
{
	if(pobject.value.length >= 6)
		rea_saveasis(pobject.value);
}
function rea_saveasis(pnum_mat)
{
	var vlink = "rea_saveasis.php";
	var vparam = "rNum_mat=" + pnum_mat;
	var vlayer = "ddatos";

	openpagepost(vlink, vparam, vlayer, true, "");
}

//----------------Resumen de asistencia de estudiantes ------------
function res_verisearch(pobject)
{
	if(pobject.value.length > 1)
		res_searchestu();
}
function res_searchestu()
{
	var vNum_mat = document.fData.rNum_mat.value;
	var vPaterno = document.fData.rPaterno.value;
	var vMaterno = document.fData.rMaterno.value;
	var vNombres = document.fData.rNombres.value;
	
	var vlink = "res_viewestu.php";
	var vparam = "rNum_mat=" + vNum_mat + "&rPaterno=" + vPaterno + "&rMaterno=" + vMaterno + "&rNombres=" + vNombres;
	var vlayer = "dresult";

	clearlayer("ddatos");
	openpagepost(vlink, vparam, vlayer, true, "");
}
function res_viewasis(pnum_mat, pcod_car)
{
	var vlink = "res_viewasis.php";
	var vparam = "rNum_mat=" + pnum_mat + "&rCod_car=" + pcod_car;
	var vlayer = "ddatos";
	openpagepost(vlink, vparam, vlayer, true, "");
}
//---------------------------------------------

//----------------Resumen de asistencia de docentes ------------
function rdo_verisearch(pobject)
{
	if(pobject.value.length > 1)
		rdo_searchdoce();
}
function rdo_searchdoce()
{
	var vCod_prf = document.fData.rCod_prf.value;
	var vPaterno = document.fData.rPaterno.value;
	var vMaterno = document.fData.rMaterno.value;
	var vNombres = document.fData.rNombres.value;
	
	var vlink = "rdo_viewdoce.php";
	var vparam = "rCod_prf=" + vCod_prf + "&rPaterno=" + vPaterno + "&rMaterno=" + vMaterno + "&rNombres=" + vNombres;
	var vlayer = "dresult";

	clearlayer("ddatos");
	openpagepost(vlink, vparam, vlayer, true, "");
}