@extends('layouts.app')
@section('css')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">

                

                <div class="card-header">SOLICITUDES DE REGISTRO
                <button type="button" class="btn btn-sm btn-primary  float-end" onclick="actualizar_tablas();">Actualizar tablas</button>
                    <label type="button" class="btn btn-sm btn-success mt-2" for="importar-diplomas">Importar desde excel</label> 
                    <input type="file" id="importar-diplomas" onchange="importar()" type="file" style='display: none;' accept=".xlsx"/>
                    <a href="{{asset('plantilla/plantilla.xlsx')}}">Descargar plantilla</a>
                </div>
                <div class="card-body">
                    <button type="button" class="btn btn-primary mb-4" onclick="actualizar();">Actualizar tabla</button> 
                <br>
                         
                <div class="table-responsive">
                   
                    <table id="trabajadores" class="table table-striped" data-rutaestado="/admin/actualizar_estado">
                        <thead class="text-white"style="background-color:#1e94c2;">
                            <tr>
                                
                                <th>DNI</th>
                                <th>Apellidos</th>
                                <th>Nombres</th>
                                <th>Correo Electrónico</th>
                                <th>Celular</th>
                                <th>Estado</th>
                                <th>Cambiar Estado</th>
                                                        
                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($query as $q)
                            <tr>
                                <td>{{$q->dni}}</td>
                                <td>{{$q->apellido_paterno}} {{$q->apellido_materno}}</td>
                                <td>{{$q->nombres}}</td>
                                <td>{{$q->email}}</td>
                                <td>{{$q->celular}}</td>
                                <td>{{$q->estado}}</td>
                                <td><button type="button" class="btn btn-success" onclick="cambiar_estado({{$q->id}});">Dar de alta</button></td>
                            </tr>    
                                
                            @endforeach
                        </tbody>
                        
                    </table>
                </div>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('js')
<script src="{{ asset('js/dni.js') }}"></script>
<script src = "http://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js" defer ></script>
<script src="{{ asset('js/datatable.js') }}"></script>
<script src="{{ asset('js/admin.js') }}"></script>

@endsection
