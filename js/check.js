function mayor_edad(document,form){
	var dia_user = form.day.value;
	var mes_user = form.month.value;
	var anio_user = form.year.value;

	var status = validar(dia_user,mes_user,anio_user);

	if(status==true){
		var fecha = new Date();
		var dia_pc = fecha.getDate();
		var mes_pc = fecha.getMonth()+1;
		var anio_pc = fecha.getFullYear();

		var edad_estimada = anio_pc-anio_user;

		if(edad_estimada>=18){
			continuar(document);
		}else{
			if(edad_estimada==17){
				if(mes_user<mes_pc){
					continuar(document);
				}else{
					if(mes_user==mes_pc){
						if(dia_user>=dia_pc){
							continuar(document);
						}else{
							mostrar(document,1);
						}
					}else{
						mostrar(document,1);
					}
				}
			}else{
				mostrar(document,1);
			}
		}
	}else{
		mostrar(document,2);
	}

}

function validar(dia, mes, anio){
	if(mes<=12 && mes>0){
		if(mes==1){
			if(dia>=1 & dia<=31){
				return true;
			}else{
				return false;
			}
		}
		if(mes==2){
			if(dia>=1 & dia<=28){
				return true;
			}else{
				return false;
			}
		}
		if(mes==3){
			if(dia>=1 & dia<=31){
				return true;
			}else{
				return false;
			}
		}
		if(mes==4){
			if(dia>=1 & dia<=30){
				return true;
			}else{
				return false;
			}
		}
		if(mes==5){
			if(dia>=1 & dia<=31){
				return true;
			}else{
				return false;
			}
		}
		if(mes==6){
			if(dia>=1 & dia<=30){
				return true;
			}else{
				return false;
			}
		}
		if(mes==7){
			if(dia>=1 & dia<=31){
				return true;
			}else{
				return false;
			}
		}
		if(mes==8){
			if(dia>=1 & dia<=31){
				return true;
			}else{
				return false;
			}
		}
		if(mes==9){
			if(dia>=1 & dia<=30){
				return true;
			}else{
				return false;
			}
		}
		if(mes==10){
			if(dia>=1 & dia<=31){
				return true;
			}else{
				return false;
			}
		}
		if(mes==11){
			if(dia>=1 & dia<=30){
				return true;
			}else{
				return false;
			}
		}
		if(mes==12){
			if(dia>=1 & dia<=30){
				return true;
			}else{
				return false;
			}
		}
	}else{
		return false;
	}
}

function mostrar(document,type){
	if(type==1){
		document.getElementById("error").style.display="block";
		document.getElementById("error_1").style.display="none";
	}else{
		document.getElementById("error_1").style.display="block";
		document.getElementById("error").style.display="none";
	}

}

function continuar(document){
	document.getElementById("select_lag_1_alert").style.display="none";
	var div_contendio = document.getElementById("select_lag_1_div");
	var div_fondo = document.getElementById("fondo_div");

	var boton_menu = document.getElementById("boton_menu");


	//div_contendio.className = 'select_lag_1_OK';
	//div_fondo.className = 'fondo_OK';
	//boton_menu.className = 'yes_show';

	iniciar();
}

function iniciar(){
	window.location = "inicio.html"
}
