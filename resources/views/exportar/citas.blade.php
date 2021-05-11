<!DOCTYPE html>
<html>
    <head>
        <title>Reporte PERSONAL</title>
    </head>
    
 <style>
    .tabla-reporte  td, .tabla-reporte  th {
        padding:5px;
        border: 1px solid black;
        font-size: 12px;
    }
    .tabla-reporte  th {
        font-weight: bold;
        text-align: center;
        background-color: rgba(234, 237, 237, .6 )
    }
    
    .tabla-reporte {
        width: 100%;
        border-collapse: collapse;
        border:  blue 1px solid;
    }
</style>
    <body>
        <table class="tabla-reporte">
                <thead>
                   
                    <tr>
                        <td  align="center" colspan="6">CITAS - PRUEBAS COVID19 2021</td>
                    </tr>
                    <tr>
                        <th>DNI</th>
                        <th>Nombres</th> 
                        <th>Paterno</th> 
                        <th>Materno</th> 
                        <th>Fecha</th> 
                        <th>Hora</th>                
                                                                
                    </tr>
                </thead>
                <tbody>   
                    @foreach($data["citas"] as $key => $p)    
                    <tr>
                        <td align="center"> {{$p->personal->dni }} </td>
                        <td>{{$p->personal->nombres}}</td>  
                        <td align="center">{{$p->personal->apellido_paterno}}</td>  
                        <td align="center">{{$p->personal->apellido_materno}}</td>  
                        <td align="center">{{$data["dia"][$p->dia]}}</td> 
                        <td align="center">{{$data["hora"][$p->hora]}}</td>                                       
                    </tr> 
                    @endforeach     
                                       
                </tbody>                                            
        </table>  


    </body>
</html>

