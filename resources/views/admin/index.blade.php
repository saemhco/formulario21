<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
       
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
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
        <h2>UNHEVAL</h2>
        <div class="table-responsive">
            <table id="trabajadores" class="table table-striped table-bordered" >
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
                        <td>{{$q->nombre}}</td>
                        <td>{{$q->email}}</td>
                        <td>{{$q->celular}}</td>
                        <td>{{$q->estado}}</td>
                        <td><button type="button" class="btn btn-success" onclick="cambiar_estado({{$q->id}});">Cambiar estado</button></td>
                    </tr>    
                        
                    @endforeach
                </tbody>
                
            </table>
        </div>

         <!-- Scripts -->
        <script src="{{ asset('js/admin.js') }}"></script>
        <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
    </body>
</html>

