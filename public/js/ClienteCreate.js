$(document).ready(function(){
    $("#ShowFormTel").on("click",function(){
        $('#mostrar').toggle();
    });
    $("#ShowFormCuentas").on("click",function(){
        $('#MostrarCuentas').toggle();
    });
    //Funciones para cliente_estatus_create
$(document).on( 'click', '.delete', function(){
    $('#telefono'+$(this).attr('id')).remove();
    $(this).parent().remove();
});

$('.add').on('click', function(){
    $('#mostrar').attr('id');
});

$('#AparecerTelefono').on('click', function(){
    $('#mostrar').toggle();
});

var i = 1;
$('.add').on('click', function(){
    i++;
    $('#mostrar').append('<div class=" row " id="telefono'+i+'">'
    +'<div class="input-group mb-3 col-12 col-sm-6 col-md-6 col-lg-7">'
    +'<div class="input-group-prepend" >'
    +'<label class="input-group-text"  for="telefono">Telefono</label>'
    +'</div>'
    +'<input type="text" name="numero[]" id="telefono" class="form-control datoInput">'
    +'</div>' 
    +'<div class="input-group mb-3 col-9 col-sm-5 col-md-5 col-lg-4">'
    +'<div class="input-group-prepend">'
    +'<label class="input-group-text" for="tipo">Tipo</label>'
    +'</div>'
    +'<select type="text" name="tipo[]" id="tipo" class="custom-select ">'
    +'<option>Casa</option>'
    +'<option>Celular</option>'
    +'<option>Trabajo</option>'
    +'<option>Otro</option>'
    +'</select>'
    +'</div>'
    +'<a type="button" class="btn btn-danger delete col-2 col-sm-1 col-md-1 col-lg-1" id="'+i+'" style=" height:2.5em;">'
    +'<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-telephone-minus" fill="currentColor" xmlns="http://www.w3.org/2000/svg">'
    +'<path fill-rule="evenodd" d="M3.925 1.745a.636.636 0 0 0-.951-.059l-.97.97c-.453.453-.62 1.095-.421 1.658A16.47 16.47 0 0 0 5.49 10.51a16.47 16.47 0 0 0 6.196 3.907c.563.198 1.205.032 1.658-.421l.97-.97a.636.636 0 0 0-.06-.951l-2.162-1.682a.636.636 0 0 0-.544-.115l-2.052.513a1.636 1.636 0 0 1-1.554-.43L5.64 8.058a1.636 1.636 0 0 1-.43-1.554l.513-2.052a.636.636 0 0 0-.115-.544L3.925 1.745zM2.267.98a1.636 1.636 0 0 1 2.448.153l1.681 2.162c.309.396.418.913.296 1.4l-.513 2.053a.636.636 0 0 0 .167.604L8.65 9.654a.636.636 0 0 0 .604.167l2.052-.513a1.636 1.636 0 0 1 1.401.296l2.162 1.681c.777.604.849 1.753.153 2.448l-.97.97c-.693.693-1.73.998-2.697.658a17.471 17.471 0 0 1-6.571-4.144A17.47 17.47 0 0 1 .639 4.646c-.34-.967-.035-2.004.658-2.698l.97-.969zM9 3.5a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5z"/>'
    +'</svg>'
        +'</a>'
    +'</div>').appendTo('#mostrar');
});

});