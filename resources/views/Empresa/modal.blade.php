<form action="" ></form>
<form method="post" action="{{url('/telU/'.$id_empresa)}}">
    {{ csrf_field() }}
    {{ method_field('PATCH') }}
 @foreach($empresa as $e)
<!-- Modal -->
 <div class="modal " id="Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg ">
        <div class="modal-content modBack">
            <div class="modal-header">
            <!-- Titulo del Modal -->
                <h5 class="modal-title" id="exampleModalLabel" style="color: black;">{{$e->nombre }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- Cuerpo del Modal -->
            <div class="modal-body">
                @include('Forms.formTelefonoEmpresa')
            </div>
            <!-- Pie del modal -->
            <div class="modal-footer">
            <button type="submit" class="btn btn-success guardar" id="save" style="display:none;">Guardar</button>
                <input type="button" class="btn btn-danger" id="cancelar" value="Cancelar" style="display:none;"/>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div> 
        </div>
    </div>
</div> 
@endforeach
</form>

