$(document).ready( function () {
    $('#tbl_personal').DataTable();
} );

function actualizar(){
    location.reload();
}

function cambiar_estado(id){
    console.log(id);

    $.ajax({
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        url: "/admin/actualizar_estado",
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