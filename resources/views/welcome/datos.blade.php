<br><h4>NOMBRES Y APELLIDOS: </h4>
<h3><b>{{$cita->personal->nombres}} <br>{{$cita->personal->apellido_paterno}} {{$cita->personal->apellido_materno}}</b></h3>

<div class="bg-primary p-3">
<br><h4 class="text-white"><b>PRUEBA MOLECULAR</b></h4>
            <table class="table">
                <tr class="text-white">
                    <td align="right" style="font-size:20px;"><b>ORDEN DE ATENCIÓN </b></td>
                    <td align="left"> <label class="form-check-label" for="dia_1" style="font-size:20px;"><b>{{$cita->turno}}</b></label></td>
                </tr>
                <tr class="text-white">
                    <td align="right" style="font-size:20px;"><b>FECHA </b></td>
                    <td align="left"> <label class="form-check-label" for="dia_1" style="font-size:20px;"><b>{{$array_dia[$cita->dia]}}</b></label></td>
                </tr>
                <tr class="text-white">
                    <td align="right" style="font-size:20px;"><b>HORA </b></td>
                    <td align="left"> <label class="form-check-label" for="dia_1" style="font-size:20px;"><b>{{$array_hora[$cita->hora]}}</b></label></td>
                </tr>
            </table>
            <button class="btn btn-success" onclick="window.print()"> Guardar</button>
</div>