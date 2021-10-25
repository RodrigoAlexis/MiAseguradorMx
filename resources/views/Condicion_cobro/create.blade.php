@extends('layouts.app')

@section('content')
@include('Icons.IconsCreateEdit')
    <div class=" container form-group">
        <h1 class="text-center">Condición de cobro</h1><br>
        <form action="{{ url('/condicion_cobro') }}" method="post" style="display:inline;">
            {{ csrf_field() }}
           <div class="row">
               <div class="col-12 col-lg-6 col-md-6 col-sm-6">
                    <h5> <label for="nombre" class="">{{ "Nombre" }}</label></h5>
                    <input type="text" name="nombre"  id="nombre" class="form-control {{$errors->has('nombre')?'is-invalid':''}}"   value="{{ old('nombre')}}" maxlength="30" pattern="[a-z,A-Z]{1,30}" title="Solo letras">
                    {!! $errors->first('nombre','<div class="invalid-feedback alert alert-danger">:message</div>') !!}
                </div>
                <div class="col-12 col-lg-6 col-md-6 col-sm-6">
                    <h5><label for="acronimo">{{ "Acrónimo" }}</label></h5>
                    <input type="text" name="acronimo"  id="acronimo" class="form-control {{$errors->has('acronimo')?'is-invalid':''}}"  value="{{ old('acronimo')}}"  maxlength="15" pattern="[a-z,A-Z]{1,15}" title="Solo letras">
                    {!! $errors->first('acronimo','<div class="invalid-feedback alert alert-danger">:message</div>') !!}
                </div>
            </div>
            <br>
            <input type="submit" class="btn btn-success btn-md " value="Agregar" style="width: 6em;" >&nbsp;&nbsp;  
            <a href="/condicion_cobro" class="btn btn-danger btn-md" style="width: 6em;" >Cancelar</a>&nbsp; &nbsp; 
        </form>
    </div>
@endsection