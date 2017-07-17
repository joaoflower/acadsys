function clickestudiantes()
{
	var vlink = "est_getestu.php";
	var vlayer = "dsubcontent";
	openpageget(vlink, vlayer, true, "");
}
function clickdocentes()
{
	var vlink = "doc_getdoce.php";
	var vlayer = "dsubcontent";
	openpageget(vlink, vlayer, true, "");
}
function clickplanes()
{
	var vlink = "pln_getplan.php";
	var vlayer = "dsubcontent";
	openpageget(vlink, vlayer, true, "");
}
function clickcarreras()
{
	var vlink = "car_viewcarrera.php";
	var vlayer = "dsubcontent";
	openpageget(vlink, vlayer, true, "");
}
function clickano()
{
	var vlink = "ano_viewano.php";
	var vlayer = "dsubcontent";
	openpageget(vlink, vlayer, true, "");
}
function clickperiodo()
{
	var vlink = "per_viewperiodo.php";
	var vlayer = "dsubcontent";
	openpageget(vlink, vlayer, true, "");
}
function clickmodact()
{
	var vlink = "act_viewmodact.php";
	var vlayer = "dsubcontent";
	openpageget(vlink, vlayer, true, "");
}
function clickmodnot()
{
	var vlink = "not_viewmodnot.php";
	var vlayer = "dsubcontent";
	openpageget(vlink, vlayer, true, "");
}
function clickmodmat()
{
	var vlink = "mat_viewmodmat.php";
	var vlayer = "dsubcontent";
	openpageget(vlink, vlayer, true, "");
}
function clickgrupo()
{
	var vlink = "gru_viewgrupo.php";
	var vlayer = "dsubcontent";
	openpageget(vlink, vlayer, true, "");
}

//----------- Estudiantes -----------------
function est_verisearch(pobject)
{
	if(pobject.value.length > 1)
		est_searchestu();
}
function est_searchestu()
{
	var vNum_mat = document.fData.rNum_mat.value;
	var vPaterno = document.fData.rPaterno.value;
	var vMaterno = document.fData.rMaterno.value;
	var vNombres = document.fData.rNombres.value;
	
	var vlink = "est_viewestu.php";
	var vparam = "rNum_mat=" + vNum_mat + "&rPaterno=" + vPaterno + "&rMaterno=" + vMaterno + "&rNombres=" + vNombres;
	var vlayer = "dresult";

	clearlayer("ddatos");
	openpagepost(vlink, vparam, vlayer, true, "");
}
function est_viewdataestu(pnum_mat, pcod_car)
{
	var vlink = "est_viewdataestu.php";
	var vparam = "rNum_mat=" + pnum_mat + "&rCod_car=" + pcod_car;
	var vlayer = "ddatos";
	openpagepost(vlink, vparam, vlayer, true, "");
}
function est_getdataestu()
{
	var vlink = "est_getdataestu.php";
	var vlayer = "ddatos";
	openpageget(vlink, vlayer, true, "");
}
function est_getdatanomestu()
{
	var vlink = "est_getdatanomestu.php";
	var vlayer = "ddatos";
	openpageget(vlink, vlayer, true, "");
}
function est_savedataestu(pform)
{
	var vTip_doc = pform.rTip_doc.value;
	var vNum_doc = pform.rNum_doc.value;
	var vFch_nac = pform.rAno_nac.value + "-" + pform.rMes_nac.value + "-" + pform.rDia_nac.value;
	var vSexo = pform.rSexo.value;
	var vEst_civ = pform.rEst_civ.value;
	var vFono = pform.rFono.value;
	var vCelular = pform.rCelular.value;
	var vDirec = pform.rDirec.value;
	var vEmail = pform.rEmail.value;
	
	var vlink = "est_savedataestu.php";
	var vparam = "rTip_doc=" + vTip_doc + "&rNum_doc=" + vNum_doc + "&rFch_nac=" + vFch_nac + "&rSexo=" + vSexo + "&rEst_civ=" + vEst_civ + "&rFono=" + vFono + "&rCelular=" + vCelular + "&rDirec=" + vDirec + "&rEmail=" + vEmail;
	var vlayer = "ddatos";

	openpagepost(vlink, vparam, vlayer, true, "");
}
function est_savedatanomestu(pform)
{
	var vPaterno = pform.rPaterno2.value;
	var vMaterno = pform.rMaterno2.value;
	var vNombres = pform.rNombres2.value;
	
	var vlink = "est_savedatanomestu.php";
	var vparam = "rPaterno=" + vPaterno + "&rMaterno=" + vMaterno + "&rNombres=" + vNombres;
	var vlayer = "ddatos";

	openpagepost(vlink, vparam, vlayer, true, "");
}
function est_newdataestu()
{
	var vlink = "est_newdataestu.php";
	var vlayer = "ddatos";
	openpageget(vlink, vlayer, true, "");
}
function est_savenewdataestu(pform)
{
	var vNum_mat = pform.rNum_matn.value;
	var vPaterno = pform.rPaternon.value;
	var vMaterno = pform.rMaternon.value;
	var vNombres = pform.rNombresn.value;
	var vTip_doc = pform.rTip_doc.value;
	var vNum_doc = pform.rNum_doc.value;
	var vFch_nac = pform.rAno_nac.value + "-" + pform.rMes_nac.value + "-" + pform.rDia_nac.value;
	var vSexo = pform.rSexo.value;
	var vEst_civ = pform.rEst_civ.value;
	var vFono = pform.rFono.value;
	var vCelular = pform.rCelular.value;
	var vDirec = pform.rDirec.value;
	var vEmail = pform.rEmail.value;
	
	var vlink = "est_savenewdataestu.php";
	var vparam = "rNum_mat=" + vNum_mat + "&rPaterno=" + vPaterno + "&rMaterno=" + vMaterno + "&rNombres=" + vNombres + "&rTip_doc=" + vTip_doc + "&rNum_doc=" + vNum_doc + "&rFch_nac=" + vFch_nac + "&rSexo=" + vSexo + "&rEst_civ=" + vEst_civ + "&rFono=" + vFono + "&rCelular=" + vCelular + "&rDirec=" + vDirec + "&rEmail=" + vEmail;
	var vlayer = "ddatos";
//	alert(vparam);

	openpagepost(vlink, vparam, vlayer, true, "");
}

//-------------------------------------------------------

//----------- Docentes -----------------
function doc_verisearch(pobject)
{
	if(pobject.value.length > 1)
		doc_searchdoce();
}
function doc_searchdoce()
{
	var vCod_prf = document.fData.rCod_prf.value;
	var vPaterno = document.fData.rPaterno.value;
	var vMaterno = document.fData.rMaterno.value;
	var vNombres = document.fData.rNombres.value;
	
	var vlink = "doc_viewdoce.php";
	var vparam = "rCod_prf=" + vCod_prf + "&rPaterno=" + vPaterno + "&rMaterno=" + vMaterno + "&rNombres=" + vNombres;
	var vlayer = "dresult";

	clearlayer("ddatos");
	openpagepost(vlink, vparam, vlayer, true, "");
}
function doc_viewdatadoce(pcod_prf, pcod_car)
{
	var vlink = "doc_viewdatadoce.php";
	var vparam = "rCod_prf=" + pcod_prf + "&rCod_car=" + pcod_car;
	var vlayer = "ddatos";
	openpagepost(vlink, vparam, vlayer, true, "");
}
function doc_getdatadoce()
{
	var vlink = "doc_getdatadoce.php";
	var vlayer = "ddatos";
	openpageget(vlink, vlayer, true, "");
}
function doc_savedatadoce(pform)
{
	var vTip_doc = pform.rTip_doc.value;
	var vNum_doc = pform.rNum_doc.value;
	var vFch_nac = pform.rAno_nac.value + "-" + pform.rMes_nac.value + "-" + pform.rDia_nac.value;
	var vSexo = pform.rSexo.value;
	var vEst_civ = pform.rEst_civ.value;
	var vFono = pform.rFono.value;
	var vCelular = pform.rCelular.value;
	var vDirec = pform.rDirec.value;
	var vEmail = pform.rEmail.value;
	
	var vlink = "doc_savedatadoce.php";
	var vparam = "rTip_doc=" + vTip_doc + "&rNum_doc=" + vNum_doc + "&rFch_nac=" + vFch_nac + "&rSexo=" + vSexo + "&rEst_civ=" + vEst_civ + "&rFono=" + vFono + "&rCelular=" + vCelular + "&rDirec=" + vDirec + "&rEmail=" + vEmail;
	var vlayer = "ddatos";

	openpagepost(vlink, vparam, vlayer, true, "");
}
function doc_newdatadoce()
{
	var vlink = "doc_newdatadoce.php";
	var vlayer = "ddatos";
	openpageget(vlink, vlayer, true, "");
}
function doc_savenewdatadoce(pform)
{
	var vCod_prf = pform.rCod_prfn.value;
	var vPaterno = pform.rPaternon.value;
	var vMaterno = pform.rMaternon.value;
	var vNombres = pform.rNombresn.value;
	var vTip_doc = pform.rTip_doc.value;
	var vNum_doc = pform.rNum_doc.value;
	var vFch_nac = pform.rAno_nac.value + "-" + pform.rMes_nac.value + "-" + pform.rDia_nac.value;
	var vSexo = pform.rSexo.value;
	var vEst_civ = pform.rEst_civ.value;
	var vFono = pform.rFono.value;
	var vCelular = pform.rCelular.value;
	var vDirec = pform.rDirec.value;
	var vEmail = pform.rEmail.value;
	
	var vlink = "doc_savenewdatadoce.php";
	var vparam = "rCod_prf=" + vCod_prf + "&rPaterno=" + vPaterno + "&rMaterno=" + vMaterno + "&rNombres=" + vNombres + "&rTip_doc=" + vTip_doc + "&rNum_doc=" + vNum_doc + "&rFch_nac=" + vFch_nac + "&rSexo=" + vSexo + "&rEst_civ=" + vEst_civ + "&rFono=" + vFono + "&rCelular=" + vCelular + "&rDirec=" + vDirec + "&rEmail=" + vEmail;
	var vlayer = "ddatos";
//	alert(vparam);

	openpagepost(vlink, vparam, vlayer, true, "");
}
//-------------------------------------------------------

//----------------Planes y cursos---------------------------------------
function pln_viewcursos(ppln_est)
{
	var vlink = "pln_viewcursos.php";
	var vparam = "rPln_est=" + ppln_est;
	var vlayer = "ddatos";
	openpagepost(vlink, vparam, vlayer, true, "");
}
function pln_viewdatacurso(pcod_cur)
{
	var vlink = "pln_viewdatacurso.php";
	var vparam = "rCod_cur=" + pcod_cur;
	var vlayer = "ddatos";
	openpagepost(vlink, vparam, vlayer, true, "");
}
function pln_getdatacurso()
{
	var vlink = "pln_getdatacurso.php";
	var vparam = "rOption=Upd";
	var vlayer = "ddatos";
	openpagepost(vlink, vparam, vlayer, true, "");
}
function pln_savedatacurso(pform)
{
	var vNom_cur = pform.rNom_cur.value;
	var vNom_ofi = pform.rNom_ofi.value;
	var vSem_anu = pform.rSem_anu.value;
	var vTip_cur = pform.rTip_cur.value;
	var vHrs_teo = pform.rHrs_teo.value;
	var vHrs_pra = pform.rHrs_pra.value;
	var vHrs_tot = pform.rHrs_tot.value;
	var vCrd_cur = pform.rCrd_cur.value;
	var vTip_pre = pform.rTip_pre.value;
	var vCrd_pre = pform.rCrd_pre.value;
	
	var vlink = "pln_savedatacurso.php";
	var vparam = "rNom_cur=" + vNom_cur + "&rNom_ofi=" + vNom_ofi + "&rSem_anu=" + vSem_anu + "&rTip_cur=" + vTip_cur + "&rHrs_teo=" + vHrs_teo + "&rHrs_pra=" + vHrs_pra + "&rHrs_tot=" + vHrs_tot + "&rCrd_cur=" + vCrd_cur + "&rTip_pre=" + vTip_pre + "&rCrd_pre=" + vCrd_pre;
	var vlayer = "ddatos";

	openpagepost(vlink, vparam, vlayer, true, "");
}
function pln_newdatacurso()
{
	var vlink = "pln_getdatacurso.php";
	var vparam = "rOption=Ins";
	var vlayer = "ddatos";
	openpagepost(vlink, vparam, vlayer, true, "");
}

function pln_newplan()
{
	var vlink = "pln_getdataplan.php";
	var vparam = "rOption=Ins";
	var vlayer = "dsubcontent";
	openpagepost(vlink, vparam, vlayer, true, "");
}
function pln_editplan(ppln_est)
{
	var vlink = "pln_getdataplan.php";
	var vparam = "rOption=Upd&rPln_est=" + ppln_est;
	var vlayer = "dsubcontent";
	openpagepost(vlink, vparam, vlayer, true, "");
}
function pln_savedataplan(pform)
{
	var vDoc_cre = pform.rDoc_cre.value;
	var vAno_ini = pform.rAno_ini.value;
	var vAno_fin = pform.rAno_fin.value;
	var vTot_crd = pform.rTot_crd.value;
	var vDes_pln = pform.rDes_pln.value;
	
	var vlink = "pln_savedataplan.php";
	var vparam = "rDoc_cre=" + vDoc_cre + "&rAno_ini=" + vAno_ini + "&rAno_fin=" + vAno_fin + "&rTot_crd=" + vTot_crd + "&rDes_pln=" + vDes_pln;
	var vlayer = "dsubcontent";

	openpagepost(vlink, vparam, vlayer, true, "");
}
function pln_newrequ(psem_anu)
{
	var vlink = "pln_newrequ.php";
	var vparam = "rSem_anu=" + psem_anu;
	var vlayer = "ddatos";
	openpagepost(vlink, vparam, vlayer, true, "");
}
function pln_saverequ(pform)
{
	var i = 0;
	var vDat_cur = "";

	for (i = 0; i < pform.elements.length; i++) 
	{
		if(pform.elements[i].type == "checkbox") 
		{
			if(pform.elements[i].checked == true)
			{
				vDat_cur = vDat_cur + pform.elements[i].value;
			}
		}
	}
	
	if(vDat_cur != "")
	{
		var vlink = "pln_saverequ.php";
		var vparam = "rDat_cur=" + vDat_cur;
		var vlayer = "ddatos";

		openpagepost(vlink, vparam, vlayer, true, "");
	}
	else
	{
		alert("No selecciono curso alguno");
	}
}
function pln_delrequ(pcur_pre)
{
	var vlink = "pln_delrequ.php";
	var vparam = "rCur_pre=" + pcur_pre;
	var vlayer = "ddatos";
	openpagepost(vlink, vparam, vlayer, true, "");
}
//-------------------------------------------------------

//---------------- Carreras -------------------------
function car_newcarrera()
{
	var vlink = "car_getdatacarrera.php";
	var vparam = "rOption=Ins";
	var vlayer = "dsubcontent";
	openpagepost(vlink, vparam, vlayer, true, "");
}
function car_editcarrera(pcod_car)
{
	var vlink = "car_getdatacarrera.php";
	var vparam = "rOption=Upd&rCod_car=" + pcod_car;
	var vlayer = "dsubcontent";
	openpagepost(vlink, vparam, vlayer, true, "");
}
function car_savedatacarrera(pform)
{
	var vCar_des = pform.rCar_des.value;
	var vDoc_cre = pform.rDoc_cre.value;
	var vAno_dur = pform.rAno_dur.value;
	var vSem_dur = pform.rSem_dur.value;
	var vGrado = pform.rGrado.value;
	var vTitulo = pform.rTitulo.value;
	var vAbr_car = pform.rAbr_car.value;
	
	var vlink = "car_savedatacarrera.php";
	var vparam = "rCar_des=" + vCar_des + "&rDoc_cre=" + vDoc_cre + "&rAno_dur=" + vAno_dur + "&rSem_dur=" + vSem_dur + "&rGrado=" + vGrado + "&rTitulo=" + vTitulo + "&rAbr_car=" + vAbr_car;
	var vlayer = "dsubcontent";

	openpagepost(vlink, vparam, vlayer, true, "");
}
//-------------------------------------------------------

//---------------- Año Académico -------------------------
function ano_newano()
{
	var vlink = "ano_getdataano.php";
	var vparam = "rOption=Ins";
	var vlayer = "dsubcontent";
	openpagepost(vlink, vparam, vlayer, true, "");
}
function ano_editano(pano_aca)
{
	var vlink = "ano_getdataano.php";
	var vparam = "rOption=Upd&rAno_aca=" + pano_aca;
	var vlayer = "dsubcontent";
	openpagepost(vlink, vparam, vlayer, true, "");
}
function ano_savedataano(pform)
{
	var vAno_aca = pform.rAno_aca.value;

	var vlink = "ano_savedataano.php";
	var vparam = "rAno_aca=" + vAno_aca;
	var vlayer = "dsubcontent";

	openpagepost(vlink, vparam, vlayer, true, "");
}
//-------------------------------------------------------

//---------------- Periodo Académico -------------------------
function per_newperiodo()
{
	var vlink = "per_getdataperiodo.php";
	var vparam = "rOption=Ins";
	var vlayer = "dsubcontent";
	openpagepost(vlink, vparam, vlayer, true, "");
}
function per_editperiodo(pper_aca)
{
	var vlink = "per_getdataperiodo.php";
	var vparam = "rOption=Upd&rPer_aca=" + pper_aca;
	var vlayer = "dsubcontent";
	openpagepost(vlink, vparam, vlayer, true, "");
}
function per_savedataperiodo(pform)
{
	var vPer_des = pform.rPer_des.value;
	var vPer_abr = pform.rPer_abr.value;

	var vlink = "per_savedataperiodo.php";
	var vparam = "rPer_des=" + vPer_des + "&rPer_abr=" + vPer_abr;
	var vlayer = "dsubcontent";

	openpagepost(vlink, vparam, vlayer, true, "");
}
//-------------------------------------------------------

//---------------- Modalidad de acta -------------------------
function act_newmodact()
{
	var vlink = "act_getdatamodact.php";
	var vparam = "rOption=Ins";
	var vlayer = "dsubcontent";
	openpagepost(vlink, vparam, vlayer, true, "");
}
function act_editmodact(pmod_act)
{
	var vlink = "act_getdatamodact.php";
	var vparam = "rOption=Upd&rMod_act=" + pmod_act;
	var vlayer = "dsubcontent";
	openpagepost(vlink, vparam, vlayer, true, "");
}
function act_savedatamodact(pform)
{
	var vAct_des = pform.rAct_des.value;

	var vlink = "act_savedatamodact.php";
	var vparam = "rAct_des=" + vAct_des;
	var vlayer = "dsubcontent";

	openpagepost(vlink, vparam, vlayer, true, "");
}
//-------------------------------------------------------

//---------------- Modalidad de nota -------------------------
function not_newmodnot()
{
	var vlink = "not_getdatamodnot.php";
	var vparam = "rOption=Ins";
	var vlayer = "dsubcontent";
	openpagepost(vlink, vparam, vlayer, true, "");
}
function not_editmodnot(pmod_not)
{
	var vlink = "not_getdatamodnot.php";
	var vparam = "rOption=Upd&rMod_not=" + pmod_not;
	var vlayer = "dsubcontent";
	openpagepost(vlink, vparam, vlayer, true, "");
}
function not_savedatamodnot(pform)
{
	var vNot_des = pform.rNot_des.value;
	var vMod_act = pform.rMod_act.value;

	var vlink = "not_savedatamodnot.php";
	var vparam = "rNot_des=" + vNot_des + "&rMod_act=" + vMod_act;
	var vlayer = "dsubcontent";

	openpagepost(vlink, vparam, vlayer, true, "");
}
//-------------------------------------------------------s

//---------------- Modalidad de matricula -------------------------
function mat_newmodmat()
{
	var vlink = "mat_getdatamodmat.php";
	var vparam = "rOption=Ins";
	var vlayer = "dsubcontent";
	openpagepost(vlink, vparam, vlayer, true, "");
}
function mat_editmodmat(pmod_mat)
{
	var vlink = "mat_getdatamodmat.php";
	var vparam = "rOption=Upd&rMod_mat=" + pmod_mat;
	var vlayer = "dsubcontent";
	openpagepost(vlink, vparam, vlayer, true, "");
}
function mat_savedatamodmat(pform)
{
	var vMod_des = pform.rMod_des.value;
	var vMod_act = pform.rMod_act.value;
	var vMod_not = pform.rMod_not.value;

	var vlink = "mat_savedatamodmat.php";
	var vparam = "rMod_des=" + vMod_des + "&rMod_act=" + vMod_act + "&rMod_not=" + vMod_not;
	var vlayer = "dsubcontent";

	openpagepost(vlink, vparam, vlayer, true, "");
}
//-------------------------------------------------------

//---------------- Grupo -------------------------
function gru_newgrupo()
{
	var vlink = "gru_getdatagrupo.php";
	var vparam = "rOption=Ins";
	var vlayer = "dsubcontent";
	openpagepost(vlink, vparam, vlayer, true, "");
}
function gru_editgrupo(psec_gru)
{
	var vlink = "gru_getdatagrupo.php";
	var vparam = "rOption=Upd&rSec_gru=" + psec_gru;
	var vlayer = "dsubcontent";
	openpagepost(vlink, vparam, vlayer, true, "");
}
function gru_savedatagrupo(pform)
{
	var vSec_des = pform.rSec_des.value;

	var vlink = "gru_savedatagrupo.php";
	var vparam = "rSec_des=" + vSec_des;
	var vlayer = "dsubcontent";

	openpagepost(vlink, vparam, vlayer, true, "");
}
//-------------------------------------------------------