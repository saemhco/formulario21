
function cambiar_estado(id){
    
    $.ajax({
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        url: "/admin/actualizar_estado",
        type: "GET" ,
        datatype: "json",
        cache:false,
        data: id, 
        
        success:function(data){
           console.log("estado actualizado");
          
        },
        error: function(data){
           // console.log("error");
        }

    });
}