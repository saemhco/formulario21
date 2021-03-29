@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Formulario de Registro') }}</div>

                <div class="card-body">
                    @if(session()->has('message')) 

                    <div class="alert alert-success ti-align-justify">
                        <h3 class="text-cyan text-center">{{ session()->get('message') }} </h3>
                     Su registro se ha generado correctamente, nuestros técnicos están validando la información ingresada.
                     Dentro de<strong> 15 minutos</strong> podrá reservar su fecha a realizarse la prueba molecular, mediante el siguiente
                     enlace <a href='{{route('index')}}' > <strong>RESERVAR CITA</strong> </a>

                    </div>

                 @endif 
                 <br>
                    <form method="POST" action="{{ route('registro_trabajador') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="dni" class="col-md-4 col-form-label text-md-right">DNI / CARNÉ DE EXTRANJERÍA</label>

                            <div class="col-md-6">
                                <input id="dni" type="text" name="dni" class="form-control @error('dni') is-invalid @enderror" value="{{ old('dni') }}" required autocomplete="dni" autofocus>

                                @error('dni')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="nombres" class="col-md-4 col-form-label text-md-right">NOMBRES</label>

                            <div class="col-md-6">
                                <input id="nombres" type="text" class="form-control @error('nombres') is-invalid @enderror" name="nombres" value="{{ old('nombres') }}" required autocomplete="nombres">

                                @error('nombres')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="apellido_paterno" class="col-md-4 col-form-label text-md-right">APELLIDO PATERNO</label>

                            <div class="col-md-6">
                                <input id="apellido_paterno" type="text" class="form-control @error('apellido_paterno') is-invalid @enderror" name="apellido_paterno" value="{{ old('apellido_paterno') }}" required autocomplete="apellido_paterno">

                                @error('apellido_paterno')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="apellido_materno" class="col-md-4 col-form-label text-md-right">APELLIDO MATERNO</label>

                            <div class="col-md-6">
                                <input id="apellido_materno" type="text" class="form-control @error('apellido_materno') is-invalid @enderror" name="apellido_materno" value="{{ old('apellido_materno') }}" required autocomplete="apellido_materno">

                                @error('apellido_materno')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="tipo_id" class="col-md-4 col-form-label text-md-right">TIPO</label>
                            <div class="col-md-6">
                                <select class="form-control" name="tipo_id" id="tipo_id">
                                    @foreach($tipos as $tipo)
                                    
                                        <option value="{{$tipo->id}}">{{$tipo->nombre}}</option>
                                    
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        
                      <!--  <div class="row form-group mt-3 mb-3">
                            <div class="col-4"></div>
                            <div class="col col-4 form-check float-right">
                                <input class="form-check-input" type="radio" name="radio" id="radio1" value=0 required>
                                <label class="form-check-label" for="radio1" class="col-md-4 col-form-label text-md-right">NO SOY LOCADOR</label>
                            </div>
                            <div class="col col-4 form-check">
                                <input class="form-check-input" id="radio2" type="radio" name="radio" value=1 required>
                                <label class="form-check-label" for="radio2" class="col-md-4 col-form-label text-md-right">SOY LOCADOR</label>
                            </div>
                        </div> 
                    -->
                        
                        
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">CORREO ELECTRÓNICO</label>

                            <div class="col-md-6"> 
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="celular" class="col-md-4 col-form-label text-md-right">CELULAR</label>

                            <div class="col-md-6">
                                <input id="celular" type="number" class="form-control @error('celular') is-invalid @enderror" name="celular" maxlength="9" min="1" value="{{ old('celular') }}" required autocomplete="celular">

                                @error('celular')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary btn-block">
                                    {{ __('Registrar') }}
                                </button>
                            </div>
                        </div>
                    </form>
                    <br>
                    
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
