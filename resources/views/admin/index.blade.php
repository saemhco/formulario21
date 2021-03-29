<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
       
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/jquery.dataTables.min.css') }}" rel="stylesheet">
        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }


            .content {
                text-align: center;
            }

            .title {
                font-size: 70px;
            }

            .dni {
                margin-bottom: 30px;
                margin:10px;
            }
        </style>
    </head>
    <body>
        
            <div class="float-right">
                <h2>ADMINISTRADOR UNHEVAL</h2>
                <a class="btn btn-danger mb-2" href="{{route('logout')}}">Salir</a>
            </div>
        
        
        
        <button type="button" class="btn btn-primary mb-2 mt-5" onclick="actualizar();">Actualizar tabla</button>
        <br>
        <br>
        <div class="table-responsive">



            <table id="tbl_personal" class="table-striped" >
                <thead class="text-white"style="background-color:#1e94c2;">
                    <tr>
                        
                        <th>DNI</th>
                        <th>Apellidos</th>
                        <th>Nombres</th>
                        <th>Correo Electrónico</th>
                        <th>Celular</th>
                        <th>Estado</th>
                        <th>Acción</th>
                                                   
                        
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

         <!-- Scripts -->
        
        <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
        <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('js/admin.js') }}"></script>
    </body>
</html>

