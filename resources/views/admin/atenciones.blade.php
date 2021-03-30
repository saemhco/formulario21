@extends('layouts.app')
@section('css')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">

                

                <div class="card-header">ATENCIONES REALIZADAS</div>
                <div class="card-body">
                    <button type="button" class="btn btn-primary mb-4" onclick="actualizar();">Actualizar tabla</button> 
                <br>
                         
                <div class="table-responsive">
                   
                    <table id="trabajadores" class="table table-striped" data-rutaestado="/admin/actualizar_cita">
                        <thead class="text-white"style="background-color:#1e94c2;">
                            <tr>
                                
                                <th>DNI</th>
                                <th>Apellidos</th>
                                <th>Nombres</th>
                                <th>Celular</th>
                                <th>DÍA</th>
                                <th>HORA</th>
                                <th>Atencion</th>
                                                        
                                
                            </tr>
                        </thead>
                        <tbody>
                            
                            @foreach ($query as $q)
                            <tr>
                                <td>{{$q->personal->dni}}</td>
                                <td>{{$q->personal->apellido_paterno}} {{$q->personal->apellido_materno}}</td>
                                <td>{{$q->personal->nombres}}</td>
                                <td>{{$q->personal->celular}}</td>
                                <td>
                                    @if($q->dia=='1')
                                        Martes 30 de marzo
                                    @else
                                       Miercoles 31 de marzo
                                    @endif
                                </td>
                                <td>{{$array_hora[$q->hora]}}</td>
                                <td>{{$q->updated_at}}</button></td>
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
