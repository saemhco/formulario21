<br><h4>NOMBRES Y APELLIDOS: </h4>
<h2><b>{{$personal->nombres}} {{$personal->apellido_paterno}} {{$personal->apellido_materno}}</b></h2>
<br>
<div class="bg-secondary p-3">
<br><h4 class="text-white">REALIZARÉ MI PRUEBA MOLECULAR EL DÍA:</h4>
<form id='form_cita'>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <div>
   
            <table class="table">
                <tr>
                    <td align="right"> <input class="form-check-input" type="radio" name="dia" value="1" id="dia_1" style="height:25px; width:35px;vertical-align: middle;" >   </td>
                    <td align="left"> <label class="form-check-label text-white" for="dia_1" style="font-size:20px;">Día 1 - 30 de marzo 2021</label></td>
                </tr>
                <tr>
                    <td align="right"> <input class="form-check-input" type="radio" name="dia" value="2" id="dia_2" style="height:25px; width:35px;vertical-align: middle; "> </td>
                    <td align="left"><label class="form-check-label text-white" for="dia_2" style="font-size:20px;">Día 2 - 31 de marzo 2021</label></td>
                </tr>
            </table>
            <button type="button" class="btn btn-block btn-success" onclick="enviar()">Enviar</button>
    </div>
    
</form>
</div>