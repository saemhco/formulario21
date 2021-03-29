 
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
                    console.log(data);
                }else{
                    //$("#resultado").html("No encontrado");
                    $("#resultado").html(
                        "<div class=\"alert alert-danger mt-5 mb-5\" role=\"alert\">"+
                           "<h5>Usted no se encuentra en nuestra base de datos, por favor proceda a registrarse en el siguiente enlace <a href='/registro_trabajador_UNHEVAL'><strong>REGISTRARME</strong></a><h5>"+
                        "</div>");
                }
            });		                   
        }else{
            $("#resultado").html("");      
        }



    });	
});
