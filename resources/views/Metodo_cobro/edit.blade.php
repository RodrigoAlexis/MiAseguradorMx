@extends('layouts.app')

@section('content')
@include('Icons.IconsCreateEdit')
<div class="container">
<h1 class="text-center">Método de cobro</h1>
    <form action="{{ url('/metodo_cobro/'.$data->id) }}" method="post">
        {{ csrf_field() }}
        {{ method_field('PATCH') }}

        <h5> <label for="nombre" class="">{{ "Nombre" }}</label></h5>
        <input type="text" name="nombre"  id="nombre" value="{{ $data->nombre}}"class="form-control {{$errors->has('nombre')?'is-invalid':''}}" maxlength="30" pattern="[a-z,A-Z]{1,30}" title="Solo letras">
        {!! $errors->first('nombre','<div class="invalid-feedback alert alert-danger">:message</div>') !!}
        <br>

            <input type="submit" class="btn btn-success " value="Confirmar" style="width:6em ">&nbsp;&nbsp;  
            <a href="/metodo_cobro" class="btn btn-danger " style="width:6em">Cancelar</a>&nbsp; &nbsp; 
       
    </form>
</div>
@endsection