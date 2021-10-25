<input  id="AparecerEP{{ $p->id }}" type="button" class="btn btn-dark btn-block clientEdit" value="Estatus de Poliza" disabled><br>
@isset($estatus_poliza)
    @foreach ($estatus_poliza as $estP)
    <div class="container">
        <div class="row" id="MostrarEP{{ $loop->iteration }}" >
            <div class="input-group mb-3 col col-sm-10 col-md-10 col-lg-10">
                <div class="input-group-prepend">
                        <label class="input-group-text" >Estatus</label>
                    </div>
                    <select class="custom-select clientEdit" name="estatusU[]" id="estatusU[]{{ $loop->iteration }}" disabled >
                        <option value="" >{{ $estP->estatus }}</option>
                        @foreach ($estatusPoliza as $es)
                            @if ( $estP->id == $es->id  )
                            <option value="{{ $es->id }}" >{{ $estP->estatus }}</option>
                            @elseif( $estP->estatus != $es->nombre )
                            <option value="{{ $es->id }}" >{{ $es->nombre }}</option> 
                            @endif
                        @endforeach
                    </select>
                    <input type="text" name="idEstPol[]" style="display: none ;" value="{{$estP->id}}">
            </div>
            <div class="col-3 col-sm-2 col-md-2 col-lg-2 ">
               <a class="  btn btn-outline-danger btn-block deleteEP clientEdit" href="{{ url('/estPoliza/'.$estP->id)}}" onclick="return confirm('¿Seguro que quieres borrar?');"  id="deleteEP{{ $loop->iteration }}" style="display:none;" >
                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-x-circle-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-4.146-3.146a.5.5 0 0 0-.708-.708L8 7.293 4.854 4.146a.5.5 0 1 0-.708.708L7.293 8l-3.147 3.146a.5.5 0 0 0 .708.708L8 8.707l3.146 3.147a.5.5 0 0 0 .708-.708L8.707 8l3.147-3.146z"/>
                  </svg></a>
            </div>
        </div>
    </div>
    @endforeach
@endisset

        <div class="container EstatusPoliza" id="MostrarEP{{ $p->id }}" style="display:none;">
            <div class="row">
            <div class="input-group mb-3 col col-sm-10 col-md-10 col-lg-10s">
                    <div class="input-group-prepend">
                        <label class="input-group-text" >Estatus</label>
                    </div>
                    <select class="custom-select" name="estatus[]">
                    <option value="" ></option>
                        @foreach ($estatusPoliza as $es)
                            <option value="{{ $es->id }}" >{{ $es->nombre }}</option>
                        @endforeach
                    </select>
            </div>
            <div class="col-3 col-sm-2 col-md-2 col-lg-2 ">
                    <a  class="btn btn-outline-info btn-block addEP  " id="addEP{{ $p->id }}" style=" color:black;">
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-plus" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M8 3.5a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-.5.5H4a.5.5 0 0 1 0-1h3.5V4a.5.5 0 0 1 .5-.5z"/>
                            <path fill-rule="evenodd" d="M7.5 8a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1H8.5V12a.5.5 0 0 1-1 0V8z"/>
                        </svg>
                    </a>
                </div>
            
            </div>
        </div>
        

<!--JavaScript-->
<script >
$(document).ready(function(){
    var EstatusP = 1;
    $(document).on( 'click', '.eliminarEP', function(){
       
        $(this).parent().remove();
   });
    $('#AparecerEP{{ $p->id }}').on('click', function(){
        $('#MostrarEP{{ $p->id }}').toggle();
    });
    
   $('#addEP{{ $p->id }}').on('click', function(){
        EstatusP++;
        $('#MostrarEP{{ $p->id }}').append('<div class="row " id="NuevaEP'+EstatusP+'" style="display:">'
            +'<div class="input-group mb-3 col-10 col-sm-10 col-md-10 col-lg-10">'
            +'<div class="input-group-prepend">'
            +'<label class="input-group-text" >Estatus</label>'
            +'</div>'
            +'<select class="custom-select" name="estatus[]">'
            +'<option value="" ></option>'
            +' @foreach ($estatusPoliza as $es)'
            +'<option value="{{ $es->id }}" >{{ $es->nombre }}</option>'
            +'@endforeach'
            +'</select>'
            +'</div>'
            +'<a  class=" col-2 col-sm-2 col-md-2 col-lg-2 btn btn-outline-danger btn-block eliminarEP " id="'+EstatusP+'" style="width:2.5em; height:2.5em; color:black;">'
            +'<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-x-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">'
            +'<path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>'
            +'<path fill-rule="evenodd" d="M11.854 4.146a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708-.708l7-7a.5.5 0 0 1 .708 0z"/>'
            +'<path fill-rule="evenodd" d="M4.146 4.146a.5.5 0 0 0 0 .708l7 7a.5.5 0 0 0 .708-.708l-7-7a.5.5 0 0 0-.708 0z"/>'
            +'</svg>'
            +'</a>'
        );
    });
    $('#tab_edit').on('click',function(){
        if($(this).attr('value')=='Editar'){
        $('.deleteEP').show();
        }else{
        $(this).attr('value','Cancelar');
        $('.deleteEP').hide();
        }
    });
});
</script>