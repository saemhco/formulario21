
function actualizar(){
    location.reload();
}

function cambiar_estado(id){
    //console.log(id);
    const ruta = $("#trabajadores").data("rutaestado");
    //alert(ruta);
    $.ajax({
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        url: ruta,
        type: "GET",
        datatype: "json",
        data: {id}, 
        
        success:function(data){
           console.log("estado actualizado",data);
           location.reload();
        },
        error: function(data){
           // console.log("error");
        }

    });

    //$('#tbl_personal').DataTable().ajax.reload();
}

function importar(){
    var file=document.getElementById('importar-diplomas').files[0];
      //console.log(file);
      var route="/admin/bd_importar";
      var formData = new FormData();
          formData.append('file', file);
          formData.append('_token', $('input[name=_token]').val());
      $.ajax({
        data: formData,
        url:   route,
        type: 'POST',
        cache:false,
        contentType: false,
        processData: false,
        beforeSend: function () {
        Swal.fire({
            // title: 'Importando Usuarios',
            html:
              "<h3><span><i class=\"fa fa-spinner fa-spin fa-lg\"></i></span> Importando Usuarios</h3>"+
                          'Por favor espere, este proceso puede tardar unos minutos...<br>'+
              '<br><p><b>NOTA:</b> Evite repetir valores en la coluna DNI, estos registros se omitirán para evitar errores.</p>'
                      }
                    )
        },
        success:  function (response) {
            //console.log(response);
          //$('#datatable-ajax').DataTable().ajax.reload();
          
          Swal.fire(
                    '¡Éxito!',
                    'Se registraron correctamente',
                    'success'
                    )
            //actualizar_tablas();
            location.reload();
        },
        error:  function (response) {
          Swal.fire(
                    '¡Error!',
                    'Ocurrió un error, revise lo siguiente: <br> -Que todos los datos del archivo .xlsx sean válidos (no nulos). <br> -Pruebe con menos registros.',
                    'error'
                    )
          console.log(response);
        }
      });
      document.getElementById('importar-diplomas').value = '';
  }