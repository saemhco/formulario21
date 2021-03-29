 
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
                   $("#nombres").val(data.nombres);
                   $("#apellido_paterno").val(data.apellido_paterno);
                   $("#apellido_materno").val(data.apellido_materno);
                   $('#apellido_paterno').attr('readonly','');
                   $('#apellido_materno').attr('readonly','');
                   $('#nombres').attr('readonly','');

                   $("#tipo_id").focus();
                }
            });		                   
        }else{
            $('#apellido_paterno').removeAttr('readonly').val('');
            $('#apellido_materno').removeAttr('readonly').val('');
            $('#nombres').removeAttr('readonly').val('');  
        }



    });	
});
