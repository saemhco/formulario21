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
        <div class="flex-center position-ref full-height">
            <!-- <div>
                <h2>Texto</h2>
            </div> -->
            
            <div class="content">
                <div>
                    <p>Instrucciones</p>
                </div>

                <div class="dni">
                    <input type="text" placeholder="DNI" class="form-control" id="dni" maxlength="8" style="font-size:40px;" autofocus>
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
