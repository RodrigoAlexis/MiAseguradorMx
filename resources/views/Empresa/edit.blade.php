@extends('layouts.app')

@section('content')
@include('Icons.IconsCreateEdit')
<div class="container">
    <h1 class="text-center">Empresa</h1><br/>
    <form action="{{ url('/empresa/'.$data->id) }}" method="post">
        {{ csrf_field() }}
        {{ method_field('PATCH') }}
    <div class="row">
        <div class="col-12 col-lg-6 col-md-6 col-sm-6">
            <h5> <label for="nombre" class="">{{ "Nombre" }}</label></h5>
            <input type="text" name="nombre"  id="nombre" value="{{ $data->nombre}}"class="form-control  {{$errors->has('nombre')?'is-invalid':''}}" maxlength="40" pattern="[a-z,A-Z]{1,40}" title="Solo letras">
            {!! $errors->first('nombre','<div class="invalid-feedback alert alert-danger">:message</div>') !!}
        </div>
        <div class="col-12 col-lg-6 col-md-6 col-sm-6">
            <h5><label for="siglas">{{ "Siglas" }}</label></h5>
            <input type="text" name="siglas"  id="siglas" value="{{ $data->siglas }}" class="form-control  {{$errors->has('siglas')?'is-invalid':''}}" maxlength="10" pattern="[a-z,A-Z]{1,10}" title="Solo letras">
            {!! $errors->first('siglas','<div class="invalid-feedback alert alert-danger">:message</div>') !!}
        </div>
    </div>
        <br>
        
            <input type="submit" class="btn btn-success " value="Confirmar" style="width:6em"> 
            <a href="/empresa" class="btn btn-danger " style="width:6em">Cancelar</a>
        
    </form>
</div>
@endsection