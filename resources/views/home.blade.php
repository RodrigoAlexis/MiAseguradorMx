@extends('layouts.app')

@section('content')

@include('Icons.icons')
<div class="container" id="SEARCH">
      @foreach ($clientes as $c )
        <form action="{{ url('/cliente/'.$c->id)}}">
          <div class="container border border-primary rounded-pill cliente col-md-10 home" style="padding: 1em;">
            <div class="row" >
              <div class=" col col-md">
                <div class="col col-md">
                  <button id="md" data-toggle="modal" data-target="#mi" type="submit" class="btn btn-block" style="text-align: left;"><h4>{{ $c->id.')   '.$c->cliente }}</h4></button>
                </div>
              </div>          
              <div class="col-lg-2 col-md-2 col-sm-2 col-4" >
        </form>
        <form method="post" action="{{ url('/cliente/'.$c->id)}}">
                {{ csrf_field() }}
                {{ method_field('delete') }}
                <button type="submit" style="display: none;" onclick="return confirm('¿Seguro que quieres borrar?');" class=" delete btn btn-sm btn-outline-danger" >
                  <svg width="2.5em" height="2.5em" viewBox="0 0 16 16" class="bi bi-trash-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0v-7z"/>
                  </svg>
                </button>
              </form>
            </div>
        </div>
      </div><br>
      @endforeach
    </div>

<div >
  @isset($cliente)
    @include('modal')
  @endisset
  
    @include('Notificaciones.recordatorio')
</div> <br>

  <script>
            $(document).ready(function(){
              /*$.get("notifi", function(){
                $("#recordatorios").modal("show");
              });*/

              $("#watch").on( "click", function() {
                $('.delete').toggle(); 
              });
              
              $.get("cliente", function(){
                $("#mi").modal("show");
              });
              
              $("#buscador").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#SEARCH *").filter(function() {
                  $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
              });

              $("#btn-recordatorios").on( "click", function() {
                $('#recordatorios').modal('show')
              });

            });
  </script>

  
@endsection