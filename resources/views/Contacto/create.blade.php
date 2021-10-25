@extends('layouts.app')

@section('content')
@include('Icons.IconsCreateEdit')
<div class="container form-group">
    <h1 class="text-center">Origen</h1><br/>
    <form method="post" action="{{ url('/contacto') }}">
        {{csrf_field('')}}
        <div class="row">
            <div class="col-12 col-lg-6 col-md-6 col-sm-6">
                <h5><label for="nombre">{{'Nombre'}}</label></h5>
                <input type="text" name="nombre" id="nombre" class="form-control {{$errors->has('nombre')?'is-invalid':''}}"  value="{{ old('nombre')}}" maxlength="30" pattern="[a-z,A-Z]{1,30}" title="Solo letras">
                {!! $errors->first('nombre','<div class="invalid-feedback alert alert-danger">:message</div>') !!}
            </div>
            <div class="col-12 col-lg-6 col-md-6 col-sm-6">
                <h5><label for="descripcion">{{'Descripción'}}</label></h5>
                <input type="text" name="descripcion" id="descripcion" class="form-control " maxlength="100" pattern="[a-z,A-Z,0-9]{1,100}" >
            </div> 
        </div>  
        </br>
            <button type="submit" class="btn btn-success" style="width:6em">Agregar</button>
            <a href="/contacto" class="btn btn-danger" style="width:6em">Cancelar</a>
    </form>
</div>
@endsection