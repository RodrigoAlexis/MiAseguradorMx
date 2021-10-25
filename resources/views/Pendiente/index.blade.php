@extends('layouts.app')

@section('scripts')
<link rel="stylesheet" href="{{ asset('fullcalendar/core/main.css') }}">
<link rel="stylesheet" href="{{ asset('fullcalendar/daygrid/main.css') }}">
<link rel="stylesheet" href="{{ asset('fullcalendar/list/main.css') }}">
<link rel="stylesheet" href="{{ asset('fullcalendar/timegrid/main.css') }}">

<script src="{{ asset('fullcalendar/core/main.js') }}" defer></script>

<script src="{{ asset('fullcalendar/interaction/main.js') }}" defer></script>

<script src="{{ asset('fullcalendar/daygrid/main.js') }}" defer></script>
<script src="{{ asset('fullcalendar/list/main.js') }}" defer></script>
<script src="{{ asset('fullcalendar/timegrid/main.js') }}" defer></script>

<script>
    var url_="{{ url('/calendario') }}";
    var url_show="{{ url('/calendario/show') }}";
</script>
<script src="{{ asset('js/main.js') }}" defer></script>
@endsection

@section('content')

@include('Icons.IconsCreateEdit')
<div class="container cal">
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
        <!--EL id="calendar" es el que invoca todo el calendario-->
            <div id="calendar" style="color:black;"></div>
        </div>
        <div class="col"></div>
    </div>
</div>
@include('Pendiente.modalCalen')
@endsection