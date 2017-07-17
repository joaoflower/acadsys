//	Funciones de Matriculas
function clickingresantes()
{
	var vlink = "ing_getestu.php";
	var vlayer = "dsubcontent";
	openpageget(vlink, vlayer, true, "");
}
function clickregulares()
{
	var vlink = "reg_getestu.php";
	var vlayer = "dsubcontent";
	openpageget(vlink, vlayer, true, "");
}
function clickedicion()
{
	var vlink = "edt_getestu.php";
	var vlayer = "dsubcontent";
	openpageget(vlink, vlayer, true, "");
}
function clickcarga()
{
	var vlink = "cga_viewcarga.php";
	var vlayer = "dsubcontent";
	openpageget(vlink, vlayer, true, "");
}
function clickaplazado()
{
	var vlink = "apl_viewapla.php";
	var vlayer = "dsubcontent";
	openpageget(vlink, vlayer, true, "");
}
function clickestumat()
{
	var vlink = "rpt_getviewestumat.php";
	var vlayer = "dsubcontent";
	openpageget(vlink, vlayer, true, "");
}
function clickcurmat()
{
	var vlink = "rpt_viewcurmat.php";
	var vlayer = "dsubcontent";
	openpageget(vlink, vlayer, true, "");
}
function clickcuadrome()
{
	var vlink = "cdr_viewsem.php";
	var vlayer = "dsubcontent";
	openpageget(vlink, vlayer, true, "");
}

//----------- Ingresantes -----------------
function ing_verisearch(pobject)
{
	if(pobject.value.length > 1)
		ing_searchestu();
}
function ing_searchestu()
{
	var vNum_mat = document.fData.rNum_mat.value;
	var vPaterno = document.fData.rPaterno.value;
	var vMaterno = document.fData.rMaterno.value;
	var vNombres = document.fData.rNombres.value;
	
	var vlink = "ing_viewestu.php";
	var vparam = "rNum_mat=" + vNum_mat + "&rPaterno=" + vPaterno + "&rMaterno=" + vMaterno + "&rNombres=" + vNombres;
	var vlayer = "dresult";

	clearlayer("ddatos");
	openpagepost(vlink, vparam, vlayer, true, "");
}
function ing_getdatamatri(pnum_mat, pcod_car)
{
	var vlink = "ing_getdatamatri.php";
	var vparam = "rNum_mat=" + pnum_mat + "&rCod_car=" + pcod_car;
	var vlayer = "ddatos";
	openpagepost(vlink, vparam, vlayer, true, "");
}
function ing_selectcurso(pform)
{
	var vPln_est = pform.rPln_est.value;
	var vSec_gru = pform.rSec_gru.value;
	var vTur_est = pform.rTur_est.value;
	var vMod_mat = pform.rMod_mat.value;
	
	var vlink = "ing_selectcurso.php";
	var vparam = "rPln_est=" + vPln_est + "&rSec_gru=" + vSec_gru + "&rTur_est=" + vTur_est + "&rMod_mat=" + vMod_mat;
	var vlayer = "dsubcontent";

	openpagepost(vlink, vparam, vlayer, true, "");
}
// --------------------- Matriculas -----------------------
function mtr_matricular(pform, ptipo, padd)
{
	var i = 0;
	var vCod_cur = "";
	var vSec_gru = "";
	var vTur_est = "";
	var vCrd_cur = 0;	
	var vCrd_curs = parseFloat(pform.rCrd_cur.value);
	
	var oSec_gru;
	var oTur_est;
	var oCrd_cur;
	
	if(vCrd_curs > 0)
	{
		for (i = 0; i < pform.elements.length; i++) 
		{
			if(pform.elements[i].type == "checkbox") 
			{
				if(pform.elements[i].checked == true)
				{
					vCod_cur = vCod_cur + pform.elements[i].value;
					
					oSec_gru = document.getElementById("rSec_gru" + pform.elements[i].value);
					vSec_gru = vSec_gru + oSec_gru.value;
					
					oTur_est = document.getElementById("rTur_est" + pform.elements[i].value);
					vTur_est = vTur_est + oTur_est.value;
					
					oCrd_cur = document.getElementById("rCrd_cur" + pform.elements[i].value);
					vCrd_cur = vCrd_cur + parseFloat(oCrd_cur.value);
				}
			}
		}
	}
	if((vCrd_cur <= vCrd_curs) && vCrd_cur > 0 && vCod_cur != "")
	{
		if(padd == 'addmatri')
			var vlink = "mtr_matricular.php";
		else
			var vlink = "edt_matricular.php";
		var vparam = "rCod_cur=" + vCod_cur + "&rSec_gru=" + vSec_gru + "&rTur_est=" + vTur_est + "&rCrd_cur=" + vCrd_cur + "&rTipo=" + ptipo;
		var vlayer = "dsubcontent";

		openpagepost(vlink, vparam, vlayer, true, "");
	}
	else
	{
		alert("No se puede realizar la Matricula porque no selecciono curso alguno");
	}
}

//----------- Regulares -----------------
function reg_verisearch(pobject)
{
	if(pobject.value.length > 1)
		reg_searchestu();
}
function reg_searchestu()
{
	var vNum_mat = document.fData.rNum_mat.value;
	var vPaterno = document.fData.rPaterno.value;
	var vMaterno = document.fData.rMaterno.value;
	var vNombres = document.fData.rNombres.value;
	
	var vlink = "reg_viewestu.php";
	var vparam = "rNum_mat=" + vNum_mat + "&rPaterno=" + vPaterno + "&rMaterno=" + vMaterno + "&rNombres=" + vNombres;
	var vlayer = "dresult";

	clearlayer("ddatos");
	openpagepost(vlink, vparam, vlayer, true, "");
}
function reg_getdatamatri(pnum_mat, pcod_car)
{
	var vlink = "reg_getdatamatri.php";
	var vparam = "rNum_mat=" + pnum_mat + "&rCod_car=" + pcod_car;
	var vlayer = "ddatos";
	openpagepost(vlink, vparam, vlayer, true, "");
}
function reg_selectcurso(pform)
{
	var vPln_est = pform.rPln_est.value;
	var vSem_anu = pform.rSem_anu.value;
	var vSec_gru = pform.rSec_gru.value;
	var vTur_est = pform.rTur_est.value;
	var vMod_mat = pform.rMod_mat.value;
	
	var vlink = "reg_selectcurso.php";
	var vparam = "rPln_est=" + vPln_est + "&rSem_anu=" + vSem_anu + "&rSec_gru=" + vSec_gru + "&rTur_est=" + vTur_est + "&rMod_mat=" + vMod_mat;
	var vlayer = "dsubcontent";

	openpagepost(vlink, vparam, vlayer, true, "");
}

//-------- Edicion de matricula ---------------

function edt_verisearch(pobject)
{
	if(pobject.value.length > 1)
		edt_searchestu();
}
function edt_searchestu()
{
	var vNum_mat = document.fData.rNum_mat.value;
	var vPaterno = document.fData.rPaterno.value;
	var vMaterno = document.fData.rMaterno.value;
	var vNombres = document.fData.rNombres.value;
	
	var vlink = "edt_viewestu.php";
	var vparam = "rNum_mat=" + vNum_mat + "&rPaterno=" + vPaterno + "&rMaterno=" + vMaterno + "&rNombres=" + vNombres;
	var vlayer = "dresult";

	clearlayer("ddatos");
	openpagepost(vlink, vparam, vlayer, true, "");
}
function edt_viewmatri(pnum_mat, pcod_car)
{
	var vlink = "edt_viewmatri.php";
	var vparam = "rNum_mat=" + pnum_mat + "&rCod_car=" + pcod_car;
	var vlayer = "dsubcontent";
	openpagepost(vlink, vparam, vlayer, true, "");
}
function edt_edtcurso(pcod_cur)
{
	var vlink = "edt_edtcurso.php";
	var vparam = "rCod_cur=" + pcod_cur;
	var vlayer = "dsubcontent";
	openpagepost(vlink, vparam, vlayer, true, "");
}
function edt_savecurso(pform)
{
	var vSec_gru = pform.rSec_gru.value;
	var vTur_est = pform.rTur_est.value;
	
	var vlink = "edt_savecurso.php";
	var vparam = "rSec_gru=" + vSec_gru + "&rTur_est=" + vTur_est;
	var vlayer = "dsubcontent";
	openpagepost(vlink, vparam, vlayer, true, "");
}
function edt_delcurso(pcod_cur, pcrd_cur)
{
	var vlink = "edt_delcurso.php";
	var vparam = "rCod_cur=" + pcod_cur + "&rCrd_cur=" + pcrd_cur;
	var vlayer = "dsubcontent";
	openpagepost(vlink, vparam, vlayer, true, "");
}
function edt_delmatri()
{
	var vlink = "edt_delmatri.php";
	var vlayer = "dsubcontent";
	openpageget(vlink, vlayer, true, "");
}
function edt_addcurso()
{
	var vlink = "edt_addcurso.php";
	var vlayer = "dsubcontent";
	openpageget(vlink, vlayer, true, "");
}

//------------ Carga Académica --------------
function cga_newcarga()
{
	var vlink = "cga_newcarga.php";
	var vlayer = "dsubcontent";
	openpageget(vlink, vlayer, true, "");
}
function cga_verisearch(pobject)
{
	if(pobject.value.length > 1)
		cga_searchdoce();
}
function cga_searchdoce()
{
	var vCod_prf = document.fData.rCod_prf.value;
	var vPaterno = document.fData.rPaterno.value;
	var vMaterno = document.fData.rMaterno.value;
	var vNombres = document.fData.rNombres.value;
	
	var vlink = "cga_viewdoce.php";
	var vparam = "rCod_prf=" + vCod_prf + "&rPaterno=" + vPaterno + "&rMaterno=" + vMaterno + "&rNombres=" + vNombres;
	var vlayer = "dresult";

	clearlayer("ddatos");
	openpagepost(vlink, vparam, vlayer, true, "");
}
function cga_viewcurso(pcod_prf, pcod_car)
{
	var vlink = "cga_viewcurso.php";
	var vparam = "rCod_prf=" + pcod_prf + "&rCod_car=" + pcod_car;
	var vlayer = "ddatos";

	openpagepost(vlink, vparam, vlayer, true, "");
}
function cga_savenewcarga(pform)
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
		var vlink = "cga_savenewcarga.php";
		var vparam = "rDat_cur=" + vDat_cur;
		var vlayer = "dsubcontent";

		openpagepost(vlink, vparam, vlayer, true, "");
	}
	else
	{
		alert("No selecciono curso alguno");
	}
}
function cga_delcarga(ppln_est, pcod_cur, psec_gru, pmod_act)
{
	var vlink = "cga_delcarga.php";
	var vparam = "rPln_est=" + ppln_est + "&rCod_cur=" + pcod_cur + "&rSec_gru=" + psec_gru + "&rMod_act=" + pmod_act;
	var vlayer = "dsubcontent";

	openpagepost(vlink, vparam, vlayer, true, "");
}
//------------ Aplazados --------------
function apl_newapla()
{
	var vlink = "apl_viewcurso.php";
	var vlayer = "dsubcontent";
	openpageget(vlink, vlayer, true, "");
}
function apl_viewestucurso(ppln_est, pcod_cur, psec_gru, pmod_act)
{
	var vlink = "apl_viewestucurso";
	var vparam = "rPln_est=" + ppln_est + "&rCod_cur=" + pcod_cur + "&rSec_gru=" + psec_gru + "&rMod_act=" + pmod_act;
	var vlayer = "dsubcontent";

	openpagepost(vlink, vparam, vlayer, true, "");	
}
function apl_savenewapla(pform)
{
	var i = 0;
	var vDat_num = "";

	for (i = 0; i < pform.elements.length; i++) 
	{
		if(pform.elements[i].type == "checkbox") 
		{
			if(pform.elements[i].checked == true)
			{
				vDat_num = vDat_num + pform.elements[i].value;
			}
		}
	}
	
	if(vDat_num != "")
	{
		var vlink = "apl_savenewapla.php";
		var vparam = "rDat_num=" + vDat_num;
		var vlayer = "dsubcontent";

		openpagepost(vlink, vparam, vlayer, true, "");
	}
	else
	{
		alert("No selecciono curso alguno");
	}
}
function apl_viewestuapla(ppln_est, pcod_cur, psec_gru, pmod_act)
{
	var vlink = "apl_viewestuapla.php";
	var vparam = "rPln_est=" + ppln_est + "&rCod_cur=" + pcod_cur + "&rSec_gru=" + psec_gru + "&rMod_act=" + pmod_act;
	var vlayer = "dsubcontent";

	openpagepost(vlink, vparam, vlayer, true, "");	
}
function apl_getnotaestuapla()
{
	var vlink = "apl_getnotaestuapla.php";
	var vlayer = "ddatos";
	openpageget(vlink, vlayer, true, "");
}
function apl_savenotaestuapla(pform)
{
	var i = 0;
	var vNum_mat = "";
	var vNot_cur = "";
	var vMod_not = "";
	
	var oMod_not;

	for (i = 0; i < pform.elements.length; i++) 
	{
		if(pform.elements[i].type == "text") 
		{
			if(pform.elements[i].value == "")
				pform.elements[i].value = 0;

			if(parseFloat(pform.elements[i].value) >= 0 && parseFloat(pform.elements[i].value) <= 20)
			{
				vNum_mat = vNum_mat + pform.elements[i].id;

				oMod_not = document.getElementById("rMod_not" + pform.elements[i].id);
				vMod_not = vMod_not + oMod_not.value;

				if(parseFloat(pform.elements[i].value) < 10)
					vNot_cur = vNot_cur + "0";
				vNot_cur = vNot_cur + parseFloat(pform.elements[i].value);
			}
			else
			{
				alert("La NOTA ingresada es Incorrecta");
				pform.elements[i].focus();
				return false;
			}
		}
	}
	
	var vlink = "apl_savenotaestuapla.php";
	var vparam = "rNum_mat=" + vNum_mat + "&rMod_not=" + vMod_not + "&rNot_cur=" + vNot_cur;
	var vlayer = "ddatos";
//	alert(vparam);
	openpagepost(vlink, vparam, vlayer, true, "");	
}

//----------------- Reportes -------------
function rpt_viewestucurmat(ppln_est, pcod_cur, psec_gru, pmod_act)
{
	var vlink = "rpt_viewestucurmat.php";
	var vparam = "rPln_est=" + ppln_est + "&rCod_cur=" + pcod_cur + "&rSec_gru=" + psec_gru + "&rMod_act=" + pmod_act;
	var vlayer = "dsubcontent";

	openpagepost(vlink, vparam, vlayer, true, "");	
}
//-------------Reportes---------------------------
function rpt_viewestumat(pform)
{
	var vSem_anu = pform.rSem_anu.value;
	var vSec_gru = pform.rSec_gru.value;
	var vTur_est = pform.rTur_est.value;
	
	var vlink = "rpt_viewestumat.php";
	var vparam = "rSem_anu=" + vSem_anu + "&rSec_gru=" + vSec_gru + "&rTur_est=" + vTur_est;
	var vlayer = "ddatos";
	openpagepost(vlink, vparam, vlayer, true, "");
}

//-------------Cuadro de meritos --------------------
function crd_viewcuadrosem(psem_anu)
{
	var vlink = "crd_viewcuadrosem.php";
	var vparam = "rSem_anu=" + psem_anu;
	var vlayer = "dsubcontent";
	openpagepost(vlink, vparam, vlayer, true, "");
}