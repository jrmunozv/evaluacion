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
      var sufijoarchivo = document.getElementById("sufijoarchivo").value;
      var pdf= 'si';
      var data='sufijoarchivo=' + sufijoarchivo + '&pdf=' + pdf;
    
      $.ajax({ 
        //contentType:false,
        //cache:false,
        //processData:false,
        type: 'POST',
        dataType: 'json',
        url:'archivopdfModel.php', 
        data: data,
        success: function(response){
          // si es exitosa la operación
          var archivopdf= response.archivo;
          //e.preventDefault();  //stop the browser from following
          
          
          //window.location.href= './datos/' + archivopdf; //Esta linea no lleva a una pagina en blanco
          // window.open('./datos/' + archivopdf , '_blank'); // Esta linea funciona llevando a una pagina en blanco         
          down_file('./datos/' + archivopdf,archivopdf); //Eso sirve para descargar directamente

          $('#btngenerarpdf').addClass("disabledbutton");
                  
        },
        error:function(response){
            
            alert('ERROR GENERAL DEL SISTEMA, INTENTE MAS TARDE problema');
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
			var fecha = new Date();
      var dia  = fecha.getDate();
      var mes  = fecha.getMonth();
      var anio = fecha.getFullYear();
      var hora = fecha.getHours();
      var minuto = fecha.getMinutes();
      var segundo = fecha.getSeconds();
      var sufijoarchivo= 'analisisrazonado' + anio + mes + dia + hora + minuto + segundo;
     
      $('#sufijoarchivo').val(sufijoarchivo);
      
      
      
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
      formData.append('sufijoarchivo',sufijoarchivo);
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


function down_file(url,name){
  var a = $("<a>")
      .attr("href", url)
      .attr("download", name)
      .appendTo("body");
  a[0].click();
  a.remove();
  }
  
  