@extends('layouts.app')

@section('content')
@include('Icons.IconsCreateEdit')
    <div class="container form-group">
        <h1 class="text-center">Estatus</h1>
        <form method="post" action="{{ url('/estatus/'.$estatus->id) }}">
            {{ csrf_field() }}
            {{ method_field('PATCH') }}
            <div class="row">
                <div class="col-12 col-lg-8 col-md-8 col-sm-8">
                    <h5><label for="nombre">{{'Nombre'}}</label></h5>
                    <input type="text" name="nombre" id="nombre" value="{{ $estatus->nombre }}" class="form-control {{$errors->has('nombre')?'is-invalid':''}}" maxlength="30" pattern="[a-z,A-Z]{1,30}" title="Solo letras">
                    {!! $errors->first('nombre','<div class="invalid-feedback alert alert-danger">:message</div>') !!}
                </div>
                <br/>
                <div class="col-12 col-lg-4 col-md-4 col-sm-4">
                    <h5><label  for="inputGroupSelect01">Tipo</label></h5>
                    <select class="custom-select" name="tipo" >
                        <option value="{{ $estatus->tipo }}" >{{ $estatus->tipo }}</option>
                        @if ( $estatus->tipo == 'Cliente' )
                            <option value="Poliza" >{{ "Poliza" }}</option>
                        @else 
                            <option value="Cliente" >{{ "Cliente" }}</option>
                        @endif  
                    </select>
                </div>
            </div>
            <br/>
            <h5><label for="descripcion">{{'Descripción'}}</label></h5>
            <input type="text" name="descripcion" id="descripcion"  value="{{$estatus->descripcion}}" class="form-control" maxlength="100" pattern="[a-z,A-Z]{1,100}" title="Solo letras">
            <br>
            <button type="submit" class="btn btn-success" style="width:6em">Confirmar</button>
            <a href="/estatus" class="btn btn-danger" style="width:6em">Cancelar</a>    
        </form>
    </div>
@endsection