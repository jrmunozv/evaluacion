/* Desarrollado por Jose Munoz */
$(document).ready(function(){
  //alert("hola");

  $('#btngenerarpdf').addClass("disabledbutton");


  $('#btnbajarplantillas').click(function(){
    
    window.location.href='./plantillas/PlantillaAnalisisRazonado.xlsx'  
    
  });


  //require_once("view/index.phtml");
  // Seleccionar empresa
  $('#btngenerarpdf').click(function(){
    //alert("hola");
    //<?php include("model/archivopdfModel.php");?>
      var cod= 'no';
      var pdf= 'si';
      var data='cod=' + cod + '&pdf=' + pdf;
    
      $.ajax({ 
        contentType:false,
        cache:false,
        processData:false,
        type: 'POST',
        //dataType: 'json',
        url:'archivopdfModel.php', 
        data: data,
        success: function(response){
          // si es exitosa la operación
          
          
          

          location.href='./datos/AnalisisRazonado20210524_192058.pdf';
          //$('a#btngenerarpdf').attr({target: '_blank',
            //                  href  : './datos/AnalisisRazonado20210524_182515.pdf'});
                  
        },
        error:function(){
            alert('ERROR GENERAL DEL SISTEMA, INTENTE MAS TARDE');
          }
      });       
    
    
    
  }); 



  //Guardar ARCHIVOS****************************************
	//
	$('#btnGuardarRendArch').click(function(){
		///////////
    //alert("bien");
		var verificar = true;
		var expRegNombre=/^[a-zA-ZÑñÁáÉéÍíÓóÚúÜü\s]+$/;
		var expRegEmail=/^[\w-\.]+@([\w]+\.)+[\w-]{2,4}$/;
		
		var archivo = document.getElementById("subirarchivo").value;

		$('#archivodetarch').val(archivo);

		if(archivo == "")
		{
			//$('#nuevoarchivo').val(null);
			alert("Debe seleccionar un archivo");
			archivo.focus();
			verificar = false;
		}
		
		else if(archivo == 0)
		{
			archivo.focus();
			verificar = false;	
		}
		
		
		
		/////
		
		if (verificar)
		{
			
      var accion= 'guardarrendarch';
			//var folio= document.getElementById("folio").value;
			//var iddetarch= document.getElementById("iddetarch").value;
			var archivo= document.getElementById("subirarchivo").value;
			//var fecha= document.getElementById("fecha").value;

      var formData = new FormData();
      //var files = $('#subirarchivo')[0].files[0];
      var files =$("#subirarchivo").prop("files")[0];
 
      formData.append('file',files);
      formData.append('accion',accion);
      //formData.append('folio',folio);
      //formData.append('iddetarch',iddetarch);
      formData.append('archivo',archivo);
      //formData.append('fecha',fecha);

			//alert(formData);
      $.ajax({
        url:'./controller/rendicionesController.php',
        type: "post",
        dataType: "text",
        data: formData,
        cache: false,
        contentType: false,
	     	processData: false,
	     	success: function(data) {
	        if (data == 0) {
	          //limpiarrendarch();
			    	//cargargridarch();
            $('#btnGuardarRendArch').addClass("disabledbutton");
            document.getElementById("btngenerarpdf").className = document.getElementById("btngenerarpdf").className.replace(/\bdisabledbutton\b/,'');
	          alert('Archivo subido exitosamente.');               
	        }
	        else
	        {
	          var mens= 'Hay un problema. El archivo no se subio. Datos: ' + data;
	          //alert('Hay un problema. El archivo no se subio.');
						//alert(data);
						alert(mens);
					}
        }	
      });
		}		
	});
	//*/





  
});
//FIN FUNCTION READY DOCUMENT





