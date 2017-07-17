function clickmespago()
{
	var vlink = "mep_viewmespago.php";
	var vlayer = "dsubcontent";
	openpageget(vlink, vlayer, true, "");
}
function clickregpago()
{
	var vlink = "rep_getestu.php";
	var vlayer = "dsubcontent";
	openpageget(vlink, vlayer, true, "");
}


//---------------- Meses de pago -------------------------
function mep_newmespago()
{
	var vlink = "mep_getdatamespago.php";
	var vparam = "rOption=Ins";
	var vlayer = "dsubcontent";
	openpagepost(vlink, vparam, vlayer, true, "");
}
function mep_editmespago(pano, pcod_mes)
{
	var vlink = "mep_getdatamespago.php";
	var vparam = "rOption=Upd&rAno=" + pano + "&rCod_mes=" + pcod_mes;
	var vlayer = "dsubcontent";
	openpagepost(vlink, vparam, vlayer, true, "");
}
function mep_delmespago(pano, pcod_mes)
{
	var vlink = "mep_deldatamespago.php";
	var vparam = "rAno=" + pano + "&rCod_mes=" + pcod_mes;
	var vlayer = "dsubcontent";
	openpagepost(vlink, vparam, vlayer, true, "");
}
function mep_savedatamespago(pform)
{
	var vAno = pform.rAno.value;
	var vCod_mes = pform.rCod_mes.value;

	var vlink = "mep_savedatamespago.php";
	var vparam = "rAno=" + vAno + "&rCod_mes=" + vCod_mes;
	var vlayer = "dsubcontent";

	openpagepost(vlink, vparam, vlayer, true, "");
}
//-------------------------------------------------------

//---------------- Registro de pago -------------------------
function rep_verisearch(pobject)
{
	if(pobject.value.length > 1)
		rep_searchestu();
}
function rep_searchestu()
{
	var vNum_mat = document.fData.rNum_mat.value;
	var vPaterno = document.fData.rPaterno.value;
	var vMaterno = document.fData.rMaterno.value;
	var vNombres = document.fData.rNombres.value;
	
	var vlink = "rep_viewestu.php";
	var vparam = "rNum_mat=" + vNum_mat + "&rPaterno=" + vPaterno + "&rMaterno=" + vMaterno + "&rNombres=" + vNombres;
	var vlayer = "dresult";

	clearlayer("ddatos");
	openpagepost(vlink, vparam, vlayer, true, "");
}
function rep_viewpagoestu(pnum_mat, pcod_car)
{
	var vlink = "rep_viewpagoestu.php";
	var vparam = "rNum_mat=" + pnum_mat + "&rCod_car=" + pcod_car;
	var vlayer = "ddatos";
	openpagepost(vlink, vparam, vlayer, true, "");
}

function rep_newregpagoestu()
{
	var vlink = "rep_getdataregpagoestu.php";
	var vparam = "rOption=Ins";
	var vlayer = "ddatos";
	openpagepost(vlink, vparam, vlayer, true, "");
}
function rep_editregpagoestu(pano, pcod_mes)
{
	var vlink = "rep_getdataregpagoestu.php";
	var vparam = "rOption=Upd&rAno=" + pano + "&rCod_mes=" + pcod_mes;
	var vlayer = "ddatos";
	openpagepost(vlink, vparam, vlayer, true, "");
}
function rep_delregpagoestu(pano, pcod_mes)
{
	var vlink = "rep_deldataregpagoestu.php";
	var vparam = "rAno=" + pano + "&rCod_mes=" + pcod_mes;
	var vlayer = "ddatos";
	openpagepost(vlink, vparam, vlayer, true, "");
}
function rep_savedataregpagoestu(pform)
{
	var vAno_mes = pform.rAno_mes.value;
	var vNum_rec = pform.rNum_rec.value;
	var vMon_pag = pform.rMon_pag.value;

	var vlink = "rep_savedataregpagoestu.php";
	var vparam = "rAno_mes=" + vAno_mes + "&rNum_rec=" + vNum_rec + "&rMon_pag=" + vMon_pag;
	var vlayer = "ddatos";

	openpagepost(vlink, vparam, vlayer, true, "");
}
//-------------------------------------------------------