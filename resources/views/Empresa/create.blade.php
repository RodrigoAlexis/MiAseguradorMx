@extends('layouts.app')

@section('scripts')
<script >
    $(document).ready(function(){
        $(document).on( 'click', '.eliminar', function(){
            
            $('#telefono'+$(this).attr('id')).remove();
            $(this).parent().remove();
    });
        $('.add').on('click', function(){
            $('#mostrar').attr('id');
        });
    var i = 1;
    $('.add').on('click', function(){
            i++;
            $('#mostrar').append('<div class="container" id="telefono'+i+'">'
            +'<div class="row" >'
            +'<div class="input-group mb-3 col-12 col-sm-5 col-md-6 col-lg-6">'
            +'<div class="input-group-prepend" >'
            +'<label class="input-group-text"  for="telefono">Telefono</label>'
            +'</div>'
            +'<input type="text" name="numero[]" id="telefono" class="form-control datoInput">'
            +'</div>'
            +'<div class="input-group mb-3 col-12 col-sm-5 col-md-4 col-lg-4 ">'
            +'<div class="input-group-prepend">'
            +'<label class="input-group-text" for="tipo">Tipo</label>'
            +'</div>'
            +'<select type="text" name="tipo[]" id="tipo" class="custom-select ">'
            +'<option>E_información</option>'
            +'<option>E_emergencia</option>'
            +'</select>'
            +'</div>'
            +'<div class="col-12 col-sm-2 col-md-2 col-lg-2 ">'
            +'<button type="button" class="btn btn-danger btn-block eliminar" id="'+i+'">'
            +'<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-telephone-minus-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">'
            +'<path fill-rule="evenodd" d="M2.267.98a1.636 1.636 0 0 1 2.448.152l1.681 2.162c.309.396.418.913.296 1.4l-.513 2.053a.636.636 0 0 0 .167.604L8.65 9.654a.636.636 0 0 0 .604.167l2.052-.513a1.636 1.636 0 0 1 1.401.296l2.162 1.681c.777.604.849 1.753.153 2.448l-.97.97c-.693.693-1.73.998-2.697.658a17.471 17.471 0 0 1-6.571-4.144A17.47 17.47 0 0 1 .639 4.646c-.34-.967-.035-2.004.658-2.698l.97-.969zM9 3.5a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5z"/>'    
            +'</svg>'
            +'</button>'
            +'</div>'
            +'</div>');
        });
    });
</script>
@endsection

@section('content')
@include('Icons.IconsCreateEdit')
    <div class=" container form-group">
        <h1 class="text-center">Empresa</h1><br/>

        <form action="{{ url('/empresa') }}" method="post" >
            {{ csrf_field() }}
            
                <div class="row">
                    <div class="col-12 col-lg-6 col-md-6 col-sm-6"> 
                    <!--Nombre-->
                        <h5><label  for="nombre">{{'Nombre'}}</label></h5>
                        <input type="text" name="nombre" id="nombre" class="form-control {{$errors->has('nombre')?'is-invalid':''}} " value="{{ old('nombre')}}" maxlength="40" pattern="[a-z,A-Z]{1,40}" title="Solo letras">
                        {!! $errors->first('nombre','<div class="invalid-feedback alert alert-danger">:message</div>') !!}
                    </div>
                    <div class="col-12 col-lg-6 col-md-6 col-sm-6">
                    <!--Siglas-->
                        <h5><label  for="siglas">{{'Siglas'}}</label></h5>
                        <input type="text" name="siglas" id="siglas" class="form-control {{$errors->has('siglas')?'is-invalid':''}} " value="{{ old('siglas')}}" maxlength="10" pattern="[a-z,A-Z]{1,10}" title="Solo letras">
                        {!! $errors->first('siglas','<div class="invalid-feedback alert alert-danger">:message</div>') !!}
                    </div>
                </div>
                        <br/>
                        @include('Forms.formTelefono')         
            <!--Botones--> 
            <input onclick="" id="guardar" type="submit" class="btn btn-success " value="Agregar" style="width:6em; ">&nbsp;
            <a href="/empresa" class="btn btn-danger " style="width:6em;">Cancelar</a>
        </form>
    </div>
@endsection