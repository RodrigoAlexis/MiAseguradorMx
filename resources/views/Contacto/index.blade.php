@extends('layouts.app')
@section('scripts')
<script>
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
</script>
@endsection
@section('content')
@include('Icons.iconsIndex')
    <div class="container">
        <h1 class="text-center">Origen</h1>
        <a href="/home" class="btn btn-primary btn-lg">
            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-house-door-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path d="M6.5 10.995V14.5a.5.5 0 0 1-.5.5H2a.5.5 0 0 1-.5-.5v-7a.5.5 0 0 1 .146-.354l6-6a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 .146.354v7a.5.5 0 0 1-.5.5h-4a.5.5 0 0 1-.5-.5V11c0-.25-.25-.5-.5-.5H7c-.25 0-.5.25-.5.495z"/>
                <path fill-rule="evenodd" d="M13 2.5V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/>
            </svg>
        </a>
        <a href="/contacto/create" class="btn btn-success btn-lg">Agregar origen</a>
    </div><br>
    <div class="container">
        <table class="table table-striped table-condensed table-hover" id="contactot">
            <thead class="table-color">
                <tr>
                    <th scope="col"><center>#</center></th>
                    <th scope="col"><center>Nombre</center></th>
                    <th scope="col"><center>Acciones</center></th>
                </tr>
            </thead>
            <tbody>
                @foreach($contactos as $contacto)
                <tr class="table-info">
                    <th scope="col"><center>{{ $loop->iteration  }}</center></th>
                    <th scope="col" data-toggle="tooltip" data-placement="top" title="{{ $contacto->descripcion }}"><center>{{ $contacto->nombre }}</center></th>
                    <th scope="col-lg"><center>
                        <a href="{{ url('/contacto/'.$contacto->id.'/edit') }}" class="btn btn-outline-dark">
                        <svg class="bi bi-pencil-square" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                        </svg>
                        </a>
                        
                        <form method="post" action="{{ url('/contacto/'.$contacto->id) }}" style="display:inline">
                        {{csrf_field()}}
                        {{method_field('DELETE')}}
                            <button class="btn btn-outline-danger" type="submit" 
                            onclick="return confirm('¿Seguro que desea eliminar el elemento seleccionado?')">
                            <svg class="bi bi-trash-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0v-7z"/>
                            </svg>
                            </button>
                        </form>
                    </center>
                    </th>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection