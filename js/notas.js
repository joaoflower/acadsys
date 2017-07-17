//	Funciones de Notas
function clicknotaestu()
{
	var vlink = "not_getestu.php";
	var vlayer = "dsubcontent";
	openpageget(vlink, vlayer, true, "");
}
function clicknotaacta()
{
	var vlink = "nac_viewcurso.php";
	var vlayer = "dsubcontent";
	openpageget(vlink, vlayer, true, "");
}

//----------- Nota Estudiante -----------------
function not_verisearch(pobject)
{
	if(pobject.value.length > 1)
		not_searchestu();
}
function not_searchestu()
{
	var vNum_mat = document.fData.rNum_mat.value;
	var vPaterno = document.fData.rPaterno.value;
	var vMaterno = document.fData.rMaterno.value;
	var vNombres = document.fData.rNombres.value;
	
	var vlink = "not_viewestu.php";
	var vparam = "rNum_mat=" + vNum_mat + "&rPaterno=" + vPaterno + "&rMaterno=" + vMaterno + "&rNombres=" + vNombres;
	var vlayer = "dresult";

	clearlayer("ddatos");
	openpagepost(vlink, vparam, vlayer, true, "");
}
function not_viewnotaestu(pnum_mat, pcod_car)
{
	var vlink = "not_viewnotaestu.php";
	var vparam = "rNum_mat=" + pnum_mat + "&rCod_car=" + pcod_car;
	var vlayer = "ddatos";
	openpagepost(vlink, vparam, vlayer, true, "");
}
function not_viewdatanota(ppln_est, pcod_cur, pmod_not, pano_aca, pper_aca)
{
	var vlink = "not_viewdatanota.php";
	var vparam = "rPln_est=" + ppln_est + "&rCod_cur=" + pcod_cur + "&rMod_not=" + pmod_not + "&rAno_aca=" + pano_aca + "&rPer_aca=" + pper_aca;
	var vlayer = "ddatos";

	openpagepost(vlink, vparam, vlayer, true, "");	
}
function not_savedatanota(pform)
{
	var vNot_cur = pform.rNot_cur.value;
	
	var vlink = "not_savedatanota.php";
	var vparam = "rNot_cur=" + vNot_cur;
	var vlayer = "ddatos";
	openpagepost(vlink, vparam, vlayer, true, "");
}
function not_newnotaestu()
{
	var vlink = "not_newnotaestu.php";
	var vlayer = "ddatos";
	openpageget(vlink, vlayer, true, "");
}
function not_refreshcurso(pform)
{
	var vPln_est = pform.rPln_est.value;
	var vSem_anu = pform.rSem_anu.value;
	
	var vlink = "not_refreshcurso.php";
	var vparam = "rPln_est=" + vPln_est + "&rSem_anu=" + vSem_anu;
	var vlayer = "dcurso";
	openpagepost(vlink, vparam, vlayer, false, "");
}
function not_savenewnotaestu(pform)
{
	var vPln_est = pform.rPln_est.value;
	var vCod_cur = pform.rCod_cur.value;
	var vAno_aca = pform.rAno_aca.value;
	var vPer_aca = pform.rPer_aca.value;
	var vMod_not = pform.rMod_not.value;
	var vCod_act = pform.rCod_act.value;
	var vNot_cur = pform.rNot_cur.value;
	
	var vlink = "not_savenewnotaestu.php";
	var vparam = "rPln_est=" + vPln_est + "&rCod_cur=" + vCod_cur + "&rAno_aca=" + vAno_aca + "&rPer_aca=" + vPer_aca + "&rMod_not=" + vMod_not + "&rCod_act=" + vCod_act + "&rNot_cur=" + vNot_cur;
	var vlayer = "ddatos";
	openpagepost(vlink, vparam, vlayer, true, "");
}

//--------------- Notas por curso -------------------
function nac_viewestucurso(ppln_est, pcod_cur, psec_gru, pmod_act)
{
	var vlink = "nac_viewestucurso.php";
	var vparam = "rPln_est=" + ppln_est + "&rCod_cur=" + pcod_cur + "&rSec_gru=" + psec_gru + "&rMod_act=" + pmod_act;
	var vlayer = "dsubcontent";

	openpagepost(vlink, vparam, vlayer, true, "");	
}
function nac_getnotaestucurso(pnro_not)
{
	/*var vlink = "nac_getnotaestucurso.php";
	var vlayer = "ddatos";
	openpageget(vlink, vlayer, true, "");*/
	var vlink = "nac_getnotaestucurso.php";
	var vparam = "rNro_not=" + pnro_not;
	var vlayer = "ddatos";

	openpagepost(vlink, vparam, vlayer, true, "");	
}
function not_savenotaestucurso(pform)
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
	
	var vlink = "nac_savenotaestucurso.php";
	var vparam = "rNum_mat=" + vNum_mat + "&rMod_not=" + vMod_not + "&rNot_cur=" + vNot_cur;
	var vlayer = "ddatos";
	openpagepost(vlink, vparam, vlayer, true, "");	
}