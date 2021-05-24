<?php
require_once("../includes/config.php");
class  Rendiciones 
{
    public function guardareditarrendarch()
    {	
    	if ($_POST['accion']=='guardarrendarch')
		{
			$filas= 0;
			if($filas==1)
			{
				$_POST['accion']='editarrendarch';
				$this->editarrendarch();
			}
			else
			{
				$this->guardarrendarch();
			}
		}
    }


    

    public function descargarrendarch()
    {
    	// Inicializamos variables de mensajes y JSON
		$respuestaOK = false;
		$mensajeError = "No se puede ejecutar la aplicación";
		$contenidoOK = "";
		$buscar="";

    	$iddetarch = $_POST['iddetarch'];

		$sql = "SELECT * FROM archrend WHERE id= '".$iddetarch."'";
		$r_query= $this->conn->query($sql);

		$filas = $r_query->num_rows;
        
        if($filas==0)
        {
        }
        else
        {
			$contenidoOK = array();
		
			while($datos = $r_query->fetch_array(MYSQLI_ASSOC))
			{
				$nuevoarchivo = $datos['nuevoarchivo'];
				$ruta = $datos['ruta'];
			}

			$contenidoOK['nuevoarchivo'] = $nuevoarchivo;
			$contenidoOK['ruta'] = $ruta;
			
			echo json_encode($contenidoOK);
		}	


    	/*
    	# Pon su ruta absoluta, no importa qué tipo sea
		$rutaservidor= $_SESSION["id_empresa"].'/'.$_SESSION["id_usuariosel"].'/';
		$rutaArchivo = '../archivos/'.$rutaservidor."E1U1R2Id20200917_233510.jpg";

		# Obtener nombre sin ruta completa, únicamente para sugerirlo al guardar
		$nombreArchivo = basename($rutaArchivo);

		# Algunos encabezados que son justamente los que fuerzan la descarga
		header('Content-Type: application/octet-stream');
		header("Content-Transfer-Encoding: Binary");
		header("Content-disposition: attachment; filename=$nombreArchivo");
		# Leer el archivo y sacarlo al navegador
		readfile($rutaArchivo);
		# No recomiendo imprimir más cosas después de esto
		*/
    }

    public function guardarrendarch()
    {	
		
    	//$fecha = date('Ym', strtotime($_POST['fecha']));
		//$ano = intval(substr($fecha, 0, 4));
		//$mes = intval(substr($fecha, 4, 2));

		// Inicializamos variables de mensajes y JSON
		$respuestaOK = false;
		//$mensajeError = "El periodo Mes:".$mes." Ano:".$ano." esta cerrado. No se puede realizar la operacion solicitada.";
		$contenidoOK = "";
		$buscar="";

		//$query = "SELECT * FROM periodo WHERE ano= '". $ano."' AND mes= '". $mes."'";
        //$r_query= $this->conn->query($query);
        //$datos = $r_query->fetch_array(MYSQLI_ASSOC);
        //$ac=$datos['ac'];
		$ac= 1;
        if ($ac==0)
		{
			$salidaJson = array("respuesta" => $respuestaOK,
								"mensaje" => $mensajeError);
			echo json_encode($salidaJson);
		}
		else
		{
			//$nrorend = $_POST['folio'];
		    //$id_encRend = $_SESSION["id_usuariosel"].$_SESSION["id_empresa"].$nrorend;
			//$sql = "SELECT aprobar FROM encrend WHERE id_encrend= '".$id_encRend."'";
			//$r_query= $this->conn->query($sql);
			//$datos = $r_query->fetch_array(MYSQLI_ASSOC);
        	//$aprobar=$datos['aprobar'];

			$aprobar= 0;
        	if ($aprobar==1)
			{
				$mensajeError = "La rendicion ya se encuentra aprobada. No se puede realizar la operacion solicitada.";
				$salidaJson = array("respuesta" => $respuestaOK,
									"mensaje" => $mensajeError);
				echo json_encode($salidaJson);
			}
			else
			{
				$data = array();

				// Inicializamos variables de mensajes y JSON
				//$respuestaOK = false;
				//$mensajeError = "No se puede ejecutar la aplicación";
				//$contenidoOK = "";
				//$buscar="";	

				$archivo= $_POST['archivo'];
				$ultposder= strrpos($archivo,chr(92))+1;
				$archivo= substr($archivo,$ultposder);

				$ultposderext= strrpos($archivo,'.');
				$extension= substr($archivo,$ultposderext);

				//VALIDAR FOLIO
				//if ($_POST['folio']== 0 || $_POST['folio']== null || !filter_var($_POST['folio'], FILTER_VALIDATE_INT))
				//{
				//	$errors[] = 'Tienes que indicar el folio. ';
				//}

				//VALIDAR ARCHIVO
				if ($archivo== null )
				{
					$errors[] = 'Tienes que indicar un archivo correctamente. '.$_POST['archivo'].' Este: '.$archivo;
				}

				//VALIDAR ARCHIVO A SUBIR
				if ( 0 < $_FILES['file']['error'] )
				{
					$errors[] = 'Error en el archivo. '.$_FILES['file']['error'];
				}

				//VALIDAR TAMAÑO ARCHIVO
				if ( $_FILES["file"]["size"] > 3000000 )
				{
					$errors[] = 'El archivo supera el tamano permitido. ';
				}

				//VALIDAR TIPO ARCHIVO
				$tipoarchivo= $_FILES["file"]["type"];
				if (!(($_FILES["file"]["type"] == "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet")
					|| ($_FILES["file"]["type"] == "image/jpeg")
					|| ($_FILES["file"]["type"] == "image/png")
					|| ($_FILES["file"]["type"] == "image/jpg")
					|| ($_FILES["file"]["type"] == "application/pdf")))
				{
					//"application/x-zip-compressed"
					//"application/vnd.openxmlformats-officedocument-wordprocessingml.document"
					//"application/pdf"
					//"application/vnd.ms-excel" excel antiguo xls y csv
					//"text/plain"
					//"application/vnd.ms-excel.sheet.macroEnabled.12"
					//"application/vnd.openxmlformats-officedocument-spreadsheetml.sheet"
					
					$errors[] = 'El tipo de archivo no esta permitido. Es tipo: '.$tipoarchivo.' ';
				}

				if (empty($errors))
				{  	
					//$rutaservidor= $_SESSION["id_empresa"].'/'.$_SESSION["id_usuariosel"].'/';
					//$ruta= '%'.$_SESSION["id_empresa"].'%'.$_SESSION["id_usuariosel"];

					//$folio = $_POST['folio'];
					//$id_encRend = $_SESSION["id_usuariosel"].$_SESSION["id_empresa"].$folio;

					$tiempo=time();
					$prefijo='Datos';
					$nuevonomarch= $prefijo.'AnalisisRazonado'.date("Ymd_His", $tiempo).$extension;

					move_uploaded_file($_FILES['file']['tmp_name'], '../datos/'.$nuevonomarch);
					
					//move_uploaded_file($_FILES['file']['tmp_name'], '../archivos/'.$rutaservidor. $_FILES['file']['name']);

					//$data = array('success' => 'NO FILES ARE SENT','formData' => $_REQUEST);
					//$data = array('Tipo: ' => $_FILES["file"]["type"],'formData' => $_REQUEST);
					
					$_SESSION["archivo"]='AnalisisRazonado'.date("Ymd_His", $tiempo);
					
					
					$data = 0;	

					//$query = sprintf
					//(
					//	"INSERT INTO archrend
					//	SET
					//	id_detRend='%s',
					//	nroRend='%s',
					//	archivo='%s',
					//	nuevoarchivo='%s',
					//	ruta='%s',
					//	elim='%s'",
					//	$id_encRend,
					//	$folio,
					//	$archivo,
					//	$nuevonomarch,
					//	$ruta,
					//	1
					//);

					//$r_query= $this->conn->query($query);

					//$respuestaOK = true;
					//$mensajeError = 'Se ha guardado el registro correctamente';
					//$contenidoOK = $r_query;

					//$salidaJson = array("respuesta" => $respuestaOK,
										//"mensaje" => $mensajeError,
										//"contenido" => $contenidoOK);
					//echo json_encode($salidaJson);
					
					
					echo json_encode($data);
				}
				else
				{
					//$respuestaOK = false;
					//$mensajeError = $errors;
					//$contenidoOK = 0;

					//$salidaJson = array("respuesta" => $respuestaOK,
										//"mensaje" => $mensajeError,
										//"contenido" => $contenidoOK);
					//echo json_encode($salidaJson);
					
					$data = array('Errores: ' => $errors, 'Otro: ' => $_REQUEST);
					//$data = 0;
					echo json_encode($data);
				}
			}
		}

    }


    public function editarrendarch()
    {
    	$fecha = date('Ym', strtotime($_POST['fecha']));
		$ano = intval(substr($fecha, 0, 4));
		$mes = intval(substr($fecha, 4, 2));

		// Inicializamos variables de mensajes y JSON
		$respuestaOK = false;
		$mensajeError = "El periodo Mes:".$mes." Ano:".$ano." esta cerrado. No se puede realizar la operacion solicitada.";
		$contenidoOK = "";
		$buscar="";

		$query = "SELECT * FROM periodo WHERE ano= '". $ano."' AND mes= '". $mes."'";
        $r_query= $this->conn->query($query);
        $datos = $r_query->fetch_array(MYSQLI_ASSOC);
        $ac=$datos['ac'];

        if ($ac==0)
		{
			$salidaJson = array("respuesta" => $respuestaOK,
								"mensaje" => $mensajeError);
			echo json_encode($salidaJson);
		}
		else
		{	
	    	$nrorend = $_POST['folio'];
		    $id_encRend = $_SESSION["id_usuariosel"].$_SESSION["id_empresa"].$nrorend;
			$sql = "SELECT aprobar FROM encrend WHERE id_encrend= '".$id_encRend."'";
			$r_query= $this->conn->query($sql);
			$datos = $r_query->fetch_array(MYSQLI_ASSOC);
        	$aprobar=$datos['aprobar'];
        	if ($aprobar==1)
			{
				$mensajeError = "La rendicion ya se encuentra aprobada. No se puede realizar la operacion solicitada.";
				$salidaJson = array("respuesta" => $respuestaOK,
									"mensaje" => $mensajeError);
				echo json_encode($salidaJson);
			}
			else
			{
		    	$data = array();

				$archivo= $_POST['archivo'];
				$ultposder= strrpos($archivo,chr(92))+1;
				$archivo= substr($archivo,$ultposder);

				$ultposderext= strrpos($archivo,'.');
				$extension= substr($archivo,$ultposderext);

				//VALIDAR FOLIO
				if ($_POST['folio']== 0 || $_POST['folio']== null || !filter_var($_POST['folio'], FILTER_VALIDATE_INT))
				{
					$errors[] = 'Tienes que indicar el folio. ';
				}

				//VALIDAR ARCHIVO
				if ($archivo== null )
				{
					$errors[] = 'Tienes que indicar un archivo correctamente. '.$_POST['archivo'].' Este: '.$archivo;
				}

				//VALIDAR ARCHIVO A SUBIR
				if ( 0 < $_FILES['file']['error'] )
				{
					$errors[] = 'Error en el archivo. '.$_FILES['file']['error'];
				}

				//VALIDAR TAMAÑO ARCHIVO
				if ( $_FILES["file"]["size"] > 1000000 )
				{
					$errors[] = 'El archivo supera el tamano permitido. ';
				}

				//VALIDAR TIPO ARCHIVO	
				if (!(($_FILES["file"]["type"] == "image/pjpeg")
					|| ($_FILES["file"]["type"] == "image/jpeg")
					|| ($_FILES["file"]["type"] == "image/png")
					|| ($_FILES["file"]["type"] == "image/jpg")
					|| ($_FILES["file"]["type"] == "application/pdf")))
				{
					//"application/x-zip-compressed"
					//"application/vnd.openxmlformats-officedocument-wordprocessingml.document"
					//"application/pdf"
					//"application/vnd.ms-excel" excel antiguo xls y csv
					//"text/plain"
					//"application/vnd.ms-excel.sheet.macroEnabled.12"
					//"application/vnd.openxmlformats-officedocument-spreadsheetml.sheet"
					
					$errors[] = 'El tipo de archivo no esta permitido. ';
				}

				if (empty($errors))
				{  	
					$rutaservidor= $_SESSION["id_empresa"].'/'.$_SESSION["id_usuariosel"].'/';
					$ruta= '%'.$_SESSION["id_empresa"].'%'.$_SESSION["id_usuariosel"];

					$folio = $_POST['folio'];
					$id_encRend = $_SESSION["id_usuariosel"].$_SESSION["id_empresa"].$folio;

					$tiempo=time();
					$nuevonomarch= 'E'.$_SESSION["id_empresa"].'U'.$_SESSION["id_usuariosel"].'R'.$folio.'Id'.date("Ymd_His", $tiempo).$extension;

					move_uploaded_file($_FILES['file']['tmp_name'], '../archivos/'.$rutaservidor. $nuevonomarch);
					
					//move_uploaded_file($_FILES['file']['tmp_name'], '../archivos/'.$rutaservidor. $_FILES['file']['name']);

					//$data = array('success' => 'NO FILES ARE SENT','formData' => $_REQUEST);
					//$data = array('Tipo: ' => $_FILES["file"]["type"],'formData' => $_REQUEST);
					$data = 0;	

					$query = sprintf
					(
						"UPDATE archrend
						SET
						archivo='%s',
						nuevoarchivo='%s',
						ruta='%s',
						elim='%s'
						WHERE id= '".$_POST['iddetarch']."' LIMIT 1",
						$archivo,
						$nuevonomarch,
						$ruta,
						1
					);
					

					$r_query= $this->conn->query($query);

					//$respuestaOK = true;
					//$mensajeError = 'Se ha guardado el registro correctamente';
					//$contenidoOK = $r_query;

					//$salidaJson = array("respuesta" => $respuestaOK,
										//"mensaje" => $mensajeError,
										//"contenido" => $contenidoOK);
					//echo json_encode($salidaJson);
					
					
					echo json_encode($data);
				}
				else
				{
					//$respuestaOK = false;
					//$mensajeError = $errors;
					//$contenidoOK = 0;

					//$salidaJson = array("respuesta" => $respuestaOK,
										//"mensaje" => $mensajeError,
										//"contenido" => $contenidoOK);
					//echo json_encode($salidaJson);
					
					$data = array('Errores: ' => $errors, 'Otro: ' => $_REQUEST);
					//$data = 0;
					echo json_encode($data);
				}
			}
		}
    }

    
    public function eliminarrendarch()
    {	
    	//session_start();
		//sleep(0);
    	$fecha = date('Ym', strtotime($_POST['fecha']));
		$ano = intval(substr($fecha, 0, 4));
		$mes = intval(substr($fecha, 4, 2));

		// Inicializamos variables de mensajes y JSON
		$respuestaOK = false;
		$mensajeError = "El periodo Mes:".$mes." Año:".$ano." está cerrado. No se puede realizar la operacion solicitada.";
		$contenidoOK = "";
		$buscar="";

		$query = "SELECT * FROM periodo WHERE ano= '". $ano."' AND mes= '". $mes."'";
        $r_query= $this->conn->query($query);
        $datos = $r_query->fetch_array(MYSQLI_ASSOC);
        $ac=$datos['ac'];

        if ($ac==0)
		{
			$salidaJson = array("respuesta" => $respuestaOK,
								"mensaje" => $mensajeError);
			echo json_encode($salidaJson);
		}
		else
		{	
			$sql = "SELECT id_detRend FROM detrend WHERE id= '".$_POST['iddetarch']."'";
			$r_query= $this->conn->query($sql);
			$datos = $r_query->fetch_array(MYSQLI_ASSOC);
        	$aprobar=$datos['id_detRend'];
			//$nrorend = $_POST['folio'];
		    //$id_encRend = $_SESSION["id_usuariosel"].$_SESSION["id_empresa"].$nrorend;
			$sql = "SELECT aprobar FROM encrend WHERE id_encrend= '".$aprobar."'";
			$r_query= $this->conn->query($sql);
			$datos = $r_query->fetch_array(MYSQLI_ASSOC);
        	$aprobar=$datos['aprobar'];
        	if ($aprobar==1)
			{
				$mensajeError = "La rendicion ya se encuentra aprobada. No se puede realizar la operacion solicitada.";
				$salidaJson = array("respuesta" => $respuestaOK,
									"mensaje" => $mensajeError);
				echo json_encode($salidaJson);
			}
			else
			{
				//$fechacomp = date('Y/m/d', strtotime($_POST['fecha']));         
				$query = sprintf
				(
					"UPDATE archrend
					SET
					elim='%s'
					WHERE id= '".$_POST['iddetarch']."' LIMIT 1",
					2
				);
				
				$r_query= $this->conn->query($query);
				//$r_query = mysql_query($query,parent::con());
				
				// Validamos que se haya actualizado el registro
				//if($r_query -> affected_rows == 1){
				$respuestaOK = true;
				$mensajeError = 'Se ha eliminado el registro correctamente';
				$contenidoOK = $r_query;

				$salidaJson = array("respuesta" => $respuestaOK,
									"mensaje" => $mensajeError,
									"contenido" => $contenidoOK);
				echo json_encode($salidaJson);
			}
		}    		
    }



}


?>