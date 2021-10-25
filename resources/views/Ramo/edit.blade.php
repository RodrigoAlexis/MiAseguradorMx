@extends('layouts.app')

@section('content')
@include('Icons.IconsCreateEdit')
<div class="container">
<h1 class="text-center">Ramo</h1><br/>
    <form action="{{ url('/ramo/'.$data->id) }}" method="post">
        {{ csrf_field() }}
        {{ method_field('PATCH') }}
        <div class="row">
            <div class="col-12 col-lg-6 col-md-6 col-sm-6">
                <h5> <label for="tipo_poliza" class="">{{ "Nombre" }}</label></h5>
                <input type="text" name="tipo_poliza"  id="tipo_poliza" value="{{ $data->tipo_poliza}}" class="form-control {{$errors->has('tipo_poliza')?'is-invalid':''}}" maxlength="30" pattern="[a-z,A-Z]{1,30}" title="Solo letras">
                {!! $errors->first('tipo_poliza','<div class="invalid-feedback alert alert-danger">:message</div>') !!}
            </div>
            <div class="col-12 col-lg-6 col-md-6 col-sm-6">
                <h5><label for="descripcion">{{ "Descripción" }}</label></h5>
                <input type="text" name="descripcion"  id="descripcion" value="{{ $data->descripcion }}" class="form-control" maxlength="100" pattern="[a-z,A-Z,0-9]{1,100}" >
            </div>
        </div> 
            <br/> 
            <input type="submit" class="btn btn-success " value="Confirmar" style="width:6em ">
            <a href="/ramo" class="btn btn-danger " style="width:6em">Cancelar</a>
    </form>
</div>
@endsection