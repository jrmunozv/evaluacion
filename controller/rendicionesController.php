<?php
if (empty($_POST['accion']))
{
	//require_once("view/rendiciones.phtml");
}
else
{
	//require_once("../includes/config.php");
	require_once("../model/rendicionesModel.php");
	switch ($_POST['accion'])
	{
		case 'guardarrendarch':
			$comp=new Rendiciones();
			$comp->guardareditarrendarch();
		break;

		case 'subirrendarch':
			$comp=new Rendiciones();
			$comp->subirrendarch();
		break;

		case 'descargarrendarch':
			$comp=new Rendiciones();
			$comp->descargarrendarch();
		break;

	}
}
?>