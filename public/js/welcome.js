 
$(document).ready(function(){
    $("#dni").bind('keypress', function(event) {
        var regex = new RegExp("^[0-9]+$");
        var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
        if (!regex.test(key)) {
          event.preventDefault();
          return false;
        }
    });
    
    $('#dni').on('keyup',function(){
        //alert("peru");
        var dni = $('#dni').val();
        var count = $('#dni').val().length;
        this.value = this.value.replace(/[^0-9]/g,'');
        if(count>8)  this.value = this.value.slice(0,8); //return false;

        if (count == 8) { //probar con dni de 6 dígitos '?
            //console.log(dni); return false;
            $.get("/search_personal/"+dni+"/dni",function(data){
                if (data != "error") {
                    var $html =    data; 
                    $("#resultado").html($html);
                    //console.log(data);
                }else{
                    const $html ="<br><h4>No se ha encontrado el DNI en nuestra base de datos, puede registrar sus datos ingresando al siguiente enlace: <a href='/register'>Clic aquí para registrarse</a></h4>";
                    $("#resultado").html($html);
                }
            });		                   
        }else{
            $("#resultado").html("");      
        }
    });	
});
function enviar(){
    
    if( !($('#dia_1').is(':checked') || $('#dia_2').is(':checked')) ){
        alert("Elegir una opción"); return false
    }
    const $data=$("#form_cita").serialize();
     console.log("formData",$data);
     $.ajax({
        headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}, 
        data:  $data,
        url:   '/registrar_cita',
        type: 'POST',
        beforeSend: function () {
            console.log('enviando....');
        },
        success:  function (response){
        console.log(response);
        },
        error: function (response){
            console.log("Error",response.data);
        }
    });
    
}
