@extends('layouts.app')
@section('scripts')
<script>
$(document).ready(function(){
    $(document).on('change','input[type="file"]',function(){
	// this.files[0].size recupera el tamaño del archivo
	// alert(this.files[0].size);
	
	var fileName = this.files[0].name;
	var fileSize = this.files[0].size;

	if(fileSize > 1048576000){
		alert('El archivo no debe superar 1GB');
		this.value = '';
		this.files[0].name = '';
	}else{
		// recuperamos la extensión del archivo
		var ext = fileName.split('.').pop();
		
		// Convertimos en minúscula porque 
		// la extensión del archivo puede estar en mayúscula
		ext = ext.toLowerCase();
    
		// console.log(ext);
		switch (ext) {
			case 'pdf':
			case '.doc':
			case '.docx': break;
			default:
				alert('El archivo no tiene la extensión adecuada (pdf, .doc, .docx)');
				this.value = ''; // reset del valor
				this.files[0].name = '';
		}
	}
});
var URLactual = window.location.pathname;           
    if(URLactual == "/poliza/create"){
        $('.pl').hide();
    }
});
</script>
@endsection
@section('content')
@include('Icons.IconsCreateEdit')
    <div class=" container form-group">
        <h1 class="text-center">Nueva poliza</h1><br><br>

        <form action="{{ url('/poliza') }}" method="post" style="display:inline;" enctype="multipart/form-data">
            {{ csrf_field() }}
           
            <!--Cliente-->
            <div class="row">
                <div class="input-group mb-3 col-12 col-lg-12 col-md-12 col-sm-12">                
                    <div class="input-group-prepend">
                        <a href="/cliente/create" class="btn btn-secondary " >Cliente</a>
                    </div>
                    <select class="custom-select" name="cliente">
                        @foreach ($clientes as $c)
                            <option  value="{{ $c->id }}" >{{ $c->cliente }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row">
            <!--Ramo-->
                <div class="input-group mb-3 col-12 col-lg-4 col-md-4 col-sm-4">                
                    <div class="input-group-prepend">
                    <label class="input-group-text" for="inputGroupSelect01">Ramo</label>
                    </div>
                    <select class="custom-select" name="ramo">
                        @foreach ($ramo as $r)
                            <option value="{{ $r->id }}">{{ $r->tipo_poliza }}</option>
                        @endforeach
                    </select>
                </div> 
            <!--Tipo de poliza-->
                <div class="input-group mb-3 col-12 col-lg-4 col-md-4 col-sm-4">                
                    <div class="input-group-prepend">
                    <label class="input-group-text" for="inputGroupSelect01">Tipo </label>
                    </div>
                    <select class="custom-select" name="tipo">
                        <option value="NUEVA" >{{ "Nueva" }}</option>
                        <option value="RENOVACION" >{{ "Renovacón" }}</option>
                        <option value="DxN" >{{ "DxN" }}</option>
                        <option value="DxN RENOVACION" >{{ "DxN Renovación" }}</option>
                    </select>
                </div>
            <!--Empresa-->
                <div class="input-group mb-3 col-12 col-lg-4 col-md-4 col-sm-4">                
                    <div class="input-group-prepend">
                    <label class="input-group-text" for="inputGroupSelect01">Empresa</label>
                    </div>
                    <select class="custom-select" name="empresa">
                        @foreach ($empresas as $e)
                           <option value="{{ $e->id }}" >{{ $e->siglas }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            
            <div class="row">
            <!--Metodo_cobro-->
                <div class="input-group mb-3 col-12 col-lg-4 col-md-4 col-sm-12">                
                    <div class="input-group-prepend">
                    <label class="input-group-text" for="inputGroupSelect01">Método de cobro</label>
                    </div>
                    <select class="custom-select" name="metodo_cobro">    
                        @foreach ($metodo_cobro as $mc)
                            <option value="{{ $mc->id }}" >{{ $mc->nombre }}</option>
                        @endforeach
                    </select>
                </div>                
            <!--Forma_pago-->
                <div class="input-group mb-3 col-12 col-lg-4 col-md-4 col-sm-12">                
                    <div class="input-group-prepend">
                    <label class="input-group-text" for="inputGroupSelect01">Forma de Pago</label>
                    </div>
                    <select class="custom-select" name="forma_pago">    
                        @foreach ($forma_pago as $fp)
                            <option value="{{ $fp->id }}" >{{ $fp->nombre }}</option>
                        @endforeach
                    </select>
                </div>
            <!--Condicion_cobro-->
                <div class="input-group mb-3 col-12 col-lg-4 col-md-4 col-sm-12">                
                    <div class="input-group-prepend">
                    <label class="input-group-text" for="inputGroupSelect01">Condición de cobro</label>
                    </div>
                    <select class="custom-select" name="condicion_cobro">                       
                        @foreach ($condicion_cobro as $cc)
                            <option value="{{ $cc->id }}" >{{ $cc->nombre }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <!--Folio-->
            <div class="row">
                <div class=" mb-3 col-12 col-lg-4 col-md-4 col-sm-12">
                    <h5><label for="folio">{{ "Folio" }}</label></h5>
                    <input type="text" name="folio"  id="folio" class="form-control {{$errors->has('folio')?'is-invalid':''}}" placeholder="Folio de la poliza" value="{{ old('folio')}}">
                    {!! $errors->first('folio','<div class="invalid-feedback alert alert-danger">:message</div>') !!}
                    <br>
                </div>
            <!--Inicio Vigencia-->
                <div class="mb-3 col-12 col-lg-4 col-md-4 col-sm-6">
                    <h5> <label for="inicio_vigencia" >{{ "Inicio de vigencia" }}</label></h5>
                    <input type="date" name="inicio_vigencia"  id="inicio_vigencia" class="form-control {{$errors->has('inicio_vigencia')?'is-invalid':''}}" value="{{ old('inicio_vigencia')}}">
                    {!! $errors->first('inicio_vigencia','<div class="invalid-feedback alert alert-danger">:message</div>') !!}
                    <br>
                </div>
            <!--Prima Neta-->
                <div class="mb-3 col-12 col-lg-4 col-md-4 col-sm-6">
                    <h5> <label for="prima_neta" >{{ "Prima Neta" }}</label></h5>
                    <input type="number" name="prima_neta"  id="prima_neta" class="form-control {{$errors->has('prima_neta')?'is-invalid':''}}" placeholder="$" value="{{ old('prima_neta')}}">
                    {!! $errors->first('prima_neta','<div class="invalid-feedback alert alert-danger">:message</div>') !!}
                    <br>
                </div>
            </div>
            <!--estatus-->
            @include('Forms.NewEstatusPoliza')
            <br>
            <div class="row">
                <div class="mb-3 col-12 col-lg-12 col-md-12 col-sm-12">
                    <div>
                        <h5> <label for="pdf_poliza" >{{ "PDF " }}</label></h5>
                        <input type="file" name="file"  id="file" class="form-control" accept="application/pdf, .doc, .docx" >
                        <br>
                    </div>
                </div>
            </div>
            <input type="submit" class="btn btn-success " value="Agregar" style="width:6em ">&nbsp;  
            <a href="/home" class="btn btn-danger " style="width:6em">Cancelar</a>
        </form> 
    </div>
@endsection