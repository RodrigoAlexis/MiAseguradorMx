@extends('layouts.app')
@section('scripts')
<script src="{{ asset('js/ClienteCreate.js') }}"></script>
<script>
    $(document).ready(function(){
   //Funciones para CuentaBancaria_cliente_create
   $(document).on( 'click', '.eliminarCuenta', function(){
        $('#NuevaCuenta'+$(this).attr('id')).remove();
        $(this).parent().remove();
   });
    $('#AparecerCuentas').on('click', function(){
        $('#MostrarCuentas').toggle();
    });
   var cuenta = 1;
   $('.addCuenta').on('click', function(){
        cuenta++;
        $('#MostrarCuentas').append('<div class="row " id="NuevaCuenta'+cuenta+'" style="display:">'
        +'<div class="input-group mb-2 col-12 col-sm-12 col-md-12 col-lg-4" >'
            +'<div class="input-group-prepend" >'
                +'<label class="input-group-text " >Cuenta</label>'
            +'</div>'
            +'<input type="text" name="num_cuenta[]" id="num_cuenta" class="form-control datoInput ">'
        +'</div>'

        +'<div class="input-group mb-2 col-12 col-sm-12 col-md-6 col-lg-4 " >'
            +'<div class="input-group-prepend" >'
                +'<label class="input-group-text " >Vigencia</label>'
            +'</div>'  
            +'<select name="mes[]" class="form-control datoInput ">'
                    +'<option value="01">Enero</option>'
                    +'<option value="02">Febrero</option>'
                    +'<option value="03">Marzo</option>'
                    +'<option value="04">Abril</option>'
                    +'<option value="05">Mayo</option>'
                    +'<option value="06">Junio</option>'
                    +'<option value="07">Julio</option>'
                    +'<option value="08">Agosto</option>'
                    +'<option value="09">Septiembre</option>'
                    +'<option value="10">Octubre</option>'
                    +'<option value="11">Noviembre</option>'
                    +'<option value="12">Diciembre</option>'
                +'</select>'
                +'<select name="year[]" class="form-control datoInput col-md-auto">'
                    +'<option value="20"> 2020</option>'
                    +'<option value="21"> 2021</option>'
                    +'<option value="22"> 2022</option>'
                    +'<option value="23"> 2023</option>'
                    +'<option value="24"> 2024</option>'
                    +'<option value="25"> 2025</option>'
                    +'<option value="26"> 2026</option>'
                    +'<option value="27"> 2027</option>'
                    +'<option value="28"> 2028</option>'
                    +'<option value="29"> 2029</option>'
                    +'<option value="30"> 2030</option>'
                    +'<option value="31"> 2030</option>'
                +'</select>'
            +'</div>'

        +'<div class="input-group mb-2 col-9 col-sm-9 col-md-4 col-lg-3" >'
            +'<div class="input-group-prepend" >'
                +'<label class="input-group-text" >CVV</label>'
            +'</div>'
            +'<input type="text" name="cvv[]" id="cvv" class="form-control datoInput">'
        +'</div>'
        +'<a  class="col-sm-2 col-md-1 col-2 col-lg-1 btn btn-danger eliminarCuenta " id="'+cuenta+'" style="width:2.5em; height:2.5em;">'
            +'<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-credit-card" fill="currentColor" xmlns="http://www.w3.org/2000/svg">'
        +'<path fill-rule="evenodd" d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4zm2-1a1 1 0 0 0-1 1v1h14V4a1 1 0 0 0-1-1H2zm13 4H1v5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V7z"/>'
         +'<path d="M2 10a1 1 0 0 1 1-1h1a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1v-1z"/>'
        +'</svg>{{ ' -' }}'
            +'</a>'
    +'</div>');
   });
            var URLactual = window.location.pathname;
                if(URLactual == "/cliente/create"){
                    $('.cl').hide();
                }
});
</script>
@endsection
@section('content')
@include('Icons.IconsCreateEdit')
<div class="container form-group">
    <h1>Cliente</h1><br>
    <form method="post" action="{{ url('/cliente') }}">
        {{csrf_field()}}
        <!--Campos Nombre-->
            <div class="row">
                <!--Nombre-->
                <div class="input-group mb-4 col-lg-4 col-md-4 col-sm-12">
                    <div class="input-group-prepend">
                        <label class="input-group-text"  for="nombre">{{'Nombre(s)'}}</label>
                    </div>
                    <input type="text" name="nombre" id="nombre" class="form-control {{$errors->has('nombre')?'is-invalid':''}}" value="{{ old('nombre')}}">
                    {!! $errors->first('nombre','<div class="invalid-feedback alert alert-danger">:message</div>') !!}
                </div> 
                <!--Apellido paterno-->
                <div class="input-group mb-4 col-lg-4 col-md-4 col-sm-12">
                    <div class="input-group-prepend">
                        <label class="input-group-text"  for="ap_paterno">{{'Apellido Paterno'}}</label>
                    </div>
                    <input type="text" name="ap_paterno" id="ap_paterno" class="form-control {{$errors->has('ap_paterno')?'is-invalid':''}}" value="{{ old('ap_paterno')}}"> 
                    {!! $errors->first('ap_paterno','<div class="invalid-feedback alert alert-danger">:message</div>') !!}
                </div>
                
                <!--Apellido Materno-->
                <div class="input-group mb-4 col-lg-4 col-md-4 col-sm-12">
                    <div class="input-group-prepend">
                        <label class="input-group-text"  for="ap_materno">{{'Apellido Materno'}}</label>
                    </div>
                    <input type="text" name="ap_materno" id="ap_materno" class="form-control {{$errors->has('ap_materno')?'is-invalid':''}}" value="{{ old('ap_materno')}}">  
                    {!! $errors->first('ap_materno','<div class="invalid-feedback alert alert-danger">:message</div>') !!}  
                </div>
            </div>
        <!--Fecha de Nacimiento-->
        <div class="row">
            <div class="input-group mb-3 col-lg-6 col-md-6 col-sm-12" >
                <div class="input-group-prepend">
                    <label class="input-group-text"  for="fecha_nacimiento">{{'Fecha de nacimiento'}}</label>
                </div>
                <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" class="form-control {{$errors->has('fecha_nacimiento')?'is-invalid':''}}" min="1950" max="2030"  value="{{ old('fecha_nacimiento')}}">
                {!! $errors->first('fecha_nacimiento','<div class="invalid-feedback alert alert-danger ">:message</div>') !!}  
            </div>
            <!--Aniversario-->
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="input-group  ">
                    <div class="input-group-prepend">
                        <label class="input-group-text"  for="aniversario">{{'Aniversario'}}</label>
                    </div>
                    <input type="date" name="aniversario" id="aniversario" class="form-control">
                </div>
            </div>
        </div>
        <div class="row">
            <!--Sexo-->
            <div class="input-group mb-3 col-lg-2 col-md-2 col-sm-4">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="sexo">{{'Sexo'}}</label>
                </div>
                <select type="text" name="sexo" id="sexo" class="custom-select">
                    <option>M</option>
                    <option>F</option>
                    <option>Prefiero no decirlo</option>
                </select>
            </div>
            <!--Estatus-->
            <div class="input-group mb-3 col-lg-5 col-md-5 col-sm-8">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="estatus">{{'Estatus'}}</label>
                </div>
                <select type="text" name="estatus" class="custom-select">
                @foreach($estatus as $est)
                    <option value="{{ $est->id }}">{{ $est->nombre }}</option>
                @endforeach
                </select>
            </div> 
            <!--Contacto-->
            <div class="input-group mb-3 col-lg-5 col-md-5 col-sm-12">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="contacto">{{'Contacto'}}</label>
                </div>
                <select type="text" name="contacto" id="contacto" class="custom-select">
                @foreach($contacto as $cont)
                    <option value="{{ $cont->id }}">{{ $cont->nombre }}</option>
                @endforeach
                </select>
            </div>
        </div>
            <!--Relacion-->
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <label class="input-group-text"  for="relacion">{{'Relación'}}</label>
                </div>
                <input type="text" name="relacion" id="relacion" class="form-control" placeholder="Relación con el cliente">
            </div>  
        <div class="row">
            <!--Usuario-->
            <div class="input-group mb-3 col-lg-6 col-md-6 col-sm-12 ">
                <div class="input-group-prepend">
                    <label class="input-group-text"  for="user">{{'usuario'}}</label>
                </div>
                <input type="text" name="user" id="user" class="form-control  {{$errors->has('user')?'is-invalid':''}}" placeholder="Usuario del cliente" value="{{ old('user')}}">
                {!! $errors->first('user','<div class="invalid-feedback alert alert-danger ">:message</div>') !!}  
            </div>  
            <!--Contraseña-->
            <div class="input-group mb-3 col-lg-6 col-md-6 col-sm-12 ">
                <div class="input-group-prepend">
                    <label class="input-group-text"  for="password">{{'Contraseña'}}</label>
                </div>
                <input type="text" name="password" id="password" class="form-control {{$errors->has('password')?'is-invalid':''}}" placeholder="Contraseña del cliente" value="{{ old('password')}}">
                {!! $errors->first('password','<div class="invalid-feedback alert alert-danger ">:message</div>') !!}  
            </div>
        </div>

        <!--Telefono-->
        <input  id="ShowFormTel" type="button" class="btn btn-dark btn-block" value="Agregar telefono" >
        @include('Forms.formTelefonoCliente')  

         
        <input  id="ShowFormCuentas" type="button" class="btn  btn-block btn-dark mb-1.5" value="Agregar Cuentas Bancarias" >
        @include('Forms.cuenta_bancaria')
        <!--Botones--> 
        <br>
        <div class="container row">
            
            <button type="submit" class="btn btn-success" style="width:6em;">Agregar</button>&nbsp;&nbsp; 
            <a href="/home" class="btn btn-danger" style="width:6em;">Cancelar</a>&nbsp; &nbsp;  
        </div>
    </form>
</div>
@endsection