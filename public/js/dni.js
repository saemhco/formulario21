 
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
            $.get("/api_reniec/"+dni+"/dni",function(data){
                if (data != "error") {
                    var $html =     "<br><h4>NOMBRES Y APELLIDOS: </h4>";
                        $html +=    `<h2><b>${data.nombres} ${data.apellido_paterno} ${data.apellido_materno}</b></h2>`;
                    $("#resultado").html($html);
                    console.log(data);
                }else{
                    $("#resultado").html("No encontrado");
                    
                    
                }
            });		                   
        }else{
            $("#resultado").html("");   

        }



    });	
});
