@extends('layouts.app')

@section('content')

    <div class="container form-group">
        <h1>Cliente</h1><br><br>
        <form method="post" action="{{ url('/cliente/'.$cliente->id) }}">
            {{csrf_field() }}
            {{ method_field('PATCH') }}

            <div class="input-group mb-3">
            <div class="input-group-prepend">
                <label class="input-group-text"  for="nombre">{{'Nombre'}}</label>
            </div>
            <input type="text" name="nombre" id="nombre" class="form-control" value="{{$cliente->nombre}}">
        </div>
            </br>
            
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <label class="input-group-text"  for="ap_paterno">{{'Apellido Paterno'}}</label>
            </div>
            <input type="text" name="ap_paterno" id="ap_paterno" class="form-control" value="{{$cliente->ap_paterno}}">
        </div>
            </br>

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <label class="input-group-text"  for="ap_materno">{{'Apellido Materno'}}</label>
            </div>
            <input type="text" name="ap_materno" id="ap_materno" class="form-control" value="{{$cliente->ap_materno}}">
        </div>
            </br> 

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <label class="input-group-text"  for="fecha_nacimiento">{{'Fecha de nacimiento'}}</label>
            </div>
            <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" class="form-control" value="{{$cliente->fecha_nacimiento}}">
        </div>
            </br>

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <label class="input-group-text" for="sexo">{{'Sexo'}}</label>
            </div>
                <select type="text" name="sexo" id="sexo" class="custom-select" value="{{$cliente->sexo}}">
                    <option>M</option>
                    <option>F</option>
                    <option>Prefiero no decirlo</option>
                </select>
        </div>
        </br> 

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <label class="input-group-text"  for="aniversario">{{'Aniversario'}}</label>
            </div>
            <input type="date" name="aniversario" id="aniversario" class="form-control" value="{{$cliente->aniversario}}">
        </div>
            </br> 

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <label class="input-group-text"  for="relacion">{{'Relación'}}</label>
            </div>
            <input type="text" name="relacion" id="relacion" class="form-control" value="{{$cliente->relacion}}">
        </div>
            </br>  

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <label class="input-group-text" for="estatus">{{'Estatus'}}</label>
            </div>
            <select type="text" name="estatus" class="custom-select" value="{{$cliente->estatus}}">
            @foreach($estatus as $est)
                <option value="{{ $est->id }}">{{ $est->nombre }}</option>
            @endforeach
            </select>
        </div>    
        
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <label class="input-group-text" for="contacto">{{'Contacto'}}</label>
            </div>
            <select type="text" name="contacto" id="contacto" class="custom-select" value="{{$cliente->contacto}}">
            @foreach($contacto as $cont)
                <option value="{{ $cont->id }}">{{ $cont->nombre }}</option>
            @endforeach
            </select>
        </div>
         
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <label class="input-group-text"  for="user">{{'usuario'}}</label>
            </div>
            <input type="text" name="user" id="user" class="form-control" placeholder="Usuario del cliente" value="{{$clientes->userName}}">
        </div>
            </br>

            <div class="input-group mb-3">
            <div class="input-group-prepend">
                <label class="input-group-text"  for="password">{{'Contraseña'}}</label>
            </div>
            <input type="text" name="password" id="password" class="form-control" placeholder="Contraseña del cliente" value="{{$clientes->password}}" >
        </div>
            </br>
        <div class="row">
            <button type="submit" class="btn btn-success" style="width:48%;">Confirmar</button>&nbsp;&nbsp;
            <a href="/cliente" class="btn btn-danger" style="width:48%;">Cancelar</a>
        </div>
        </form>
    </div>
@endsection