@extends('layouts.app')

@section('content')
@include('Icons.IconsCreateEdit')
    <div class=" container form-group">
        <h1 class="text-center">Ramo</h1><br/>
        <form action="{{ url('/ramo') }}" method="post" style="display:inline;">
            {{ csrf_field() }}
           <div class="row">
               <div class="col-12 col-lg-6 col-md-6 col-sm-6">
                    <h5> <label for="tipo_poliza" class="">{{ "Nombre" }}</label></h5>
                    <input type="text" name="tipo_poliza"  id="tipo_poliza" class="form-control {{$errors->has('tipo_poliza')?'is-invalid':''}}" placeholder="Algun tipo de poliza" value="{{ old('nombre')}}" maxlength="30" pattern="[a-z,A-Z]{1,30}" title="Solo letras">
                    {!! $errors->first('tipo_poliza','<div class="invalid-feedback alert alert-danger">:message</div>') !!}
                </div>
                <div class="col-12 col-lg-6 col-md-6 col-sm-6">
                    <h5><label for="descripcion">{{ "Descripción" }}</label></h5>
                    <input type="text" name="descripcion"  id="descripcion" class="form-control" placeholder="Descripcion de la poliza" maxlength="100" pattern="[a-z,A-Z,0-9]{1,100}">
                </div>
            </div>
            <br>

                <input type="submit" class="btn btn-success " value="Agregar" style="width:6em">&nbsp; 
                <a href="/ramo" class="btn btn-danger " style="width:6em">Cancelar</a>
            
        </form> 
    </div>
@endsection