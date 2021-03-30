
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