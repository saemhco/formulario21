<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>FORMULARIO - Pruebas moleculares</title>
        <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.png">
        <meta name="description" content="Formulario - seleccione el día que asistirá para realizarse su prueba molecular">
        <!-- <meta name="csrf-token" content="{{ csrf_token() }}"> -->
        
        <!-- Favicon icon -->
        <link rel="icon" type="image/png" sizes="16x16" href="{{asset('/img/icono.ico')}}">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
       
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <!-- Styles -->
        <style>
            html, body {
                background-color: #ECF0F1;
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
         
        <div class="flex-center position-ref full-height">
            
             
            
            <div class="content">
                <div id="div_verde" style="width: 500px">
                    <center>
                        @if(session()->has('message')) 
                
                        <div class="alert alert-success ti-align-justify">
                            <h3 class="text-cyan text-center">{{ session()->get('message') }} </h3>
                         Su registro se ha generado correctamente, nuestros técnicos están validando la información ingresada.
                         Dentro de<strong> 15 minutos</strong> podrá reservar su fecha a realizarse la prueba molecular.</a>
                
                        </div>
                
                        @endif 
                       </center>
                </div>
                <div>
                    <h3><img src="{{asset('img/logo.png')}}" height="40px"> UNHEVAL</h3>
                    <small>Desarrollado por Saúl Escandón & Franz Ahuanlla</small><br><hr>
                </div>

                <div class="dni">
                    <input type="text" placeholder="DNI" class="form-control text-center" id="dni" maxlength="8" style="font-size:40px;" autofocus autocomplete="off">
                </div>
                <div id="resultado">
                    
                </div>
                

               
            </div>
        </div>

         <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="{{ asset('js/welcome.js') }}"></script>
        <script>

        </script>

    </body>
</html>
