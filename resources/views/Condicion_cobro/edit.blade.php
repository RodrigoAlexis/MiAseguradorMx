@extends('layouts.app')

@section('content')
@include('Icons.IconsCreateEdit')
<div class="container">
<h1 class="text-center">Condición de cobro</h1><br/>
    <form action="{{ url('/condicion_cobro/'.$data->id) }}" method="post">
        {{ csrf_field() }}
        {{ method_field('PATCH') }}
        <div class="row">
            <div class="col-12 col-lg-6 col-md-6 col-sm-6">
                <h5> <label for="nombre" class="">{{ "Nombre" }}</label></h5>
                <input type="text" name="nombre"  id="nombre" value="{{ $data->nombre}}"class="form-control {{$errors->has('nombre')?'is-invalid':''}}" maxlength="30" pattern="[a-z,A-Z]{1,30}" title="Solo letras" >
                {!! $errors->first('nombre','<div class="invalid-feedback alert alert-danger">:message</div>') !!}
            </div>
            <div class="col-12 col-lg-6 col-md-6 col-sm-6">
                <h5><label for="acronimo">{{ "Acrónimo" }}</label></h5>
                <input type="text" name="acronimo"  id="acronimo" value="{{ $data->acronimo }}" class="form-control {{$errors->has('acronimo')?'is-invalid':''}}"  maxlength="15" pattern="[a-z,A-Z]{1,15}" title="Solo letras">
                {!! $errors->first('acronimo','<div class="invalid-feedback alert alert-danger">:message</div>') !!}
            </div>
        </div>
        <br>
            <input type="submit" class="btn btn-success " value="Confirmar" style="width: 6em;">&nbsp;
            <a href="/condicion_cobro" class="btn btn-danger" style="width: 6em;">Cancelar</a>
        
    </form>
</div>
@endsection