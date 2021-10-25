$(document).ready(function(){
    $.get("empresa", function(){
        $("#Modal").modal("show");
    });
    $(document).on( 'click', '.eliminar', function(){
        $('#telefono'+$(this).attr('id')).remove();
        $(this).parent().remove();
   });
    $('.add').on('click', function(){
        $('#mostrar').attr('id');
    });
    $('#AparecerTelefono').on('click', function(){
        $('#mostrar').toggle();
        $('#save').toggle();
    });
    $('.edit').on('click',function(){
        $('#guardar').show();
        $('#cancelar').show();
    });
    $('.edit').on('click',function(){
        $('#telefonoU'+$(this).attr('id')).prop('disabled',false);
        $('#tipoU'+$(this).attr('id')).prop('disabled',false);
    });
    $('.edit').on('click',function(){
        $('.tel').hide();
    });
    $('.edit').on('click',function(){
        $('.selectEdit').show();
    });
    $('#cancelar').on('click',function(){
        $('.tel').show();
    });
    $('#cancelar').on('click',function(){
        $('.selectEdit').hide();
    });
    $('#cancelar').on('click',function(){
        $('.telefono').prop('disabled',true); 
    });
    $('#cancelar').on('click',function(){
        $('#guardar').toggle();
        $('#cancelar').toggle(); 
    });
    $('#save').on('click',function(){
        $('.telefono').prop('disabled',false);
        $('.selectEdit').prop('disabled',false);
    });
    $('.edit').on('click',function(){
        $('.guardar').show();
    });
    $('#cancelar').on('click',function(){
        $('.guardar').hide();
    });
   var i = 1;
   $('.add').on('click', function(){
        i++;
        $('#mostrar').append('<div class=" row" id="telefono'+i+'">'
        +'<div class="input-group mb-3 col-sm-6">'
        +'<div class="input-group-prepend" >'
        +'<label class="input-group-text"  for="telefono">Telefono</label>'
        +'</div>'
        +'<input type="text" name="numero[]" id="telefono" class="form-control datoInput">'
        +'</div>' 
        +'<div class="input-group mb-3 col-sm-5">'
        +'<div class="input-group-prepend">'
        +'<label class="input-group-text" for="tipo">Tipo</label>'
        +'</div>'
        +'<select name="tipo[]" id="tipo" class="custom-select ">'
        +'<option value="E_emergencia">E_emergencia</option>'
        +'<option value="E_información">E_información</option>'
        +'</select>'
        +'</div>'
        +'<div class="container">'
        +'<button  class="btn btn-danger mb-2 eliminar btn-block" id="'+i+'">'
        +'<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-telephone-minus-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">'
        +'<path fill-rule="evenodd" d="M2.267.98a1.636 1.636 0 0 1 2.448.152l1.681 2.162c.309.396.418.913.296 1.4l-.513 2.053a.636.636 0 0 0 .167.604L8.65 9.654a.636.636 0 0 0 .604.167l2.052-.513a1.636 1.636 0 0 1 1.401.296l2.162 1.681c.777.604.849 1.753.153 2.448l-.97.97c-.693.693-1.73.998-2.697.658a17.471 17.471 0 0 1-6.571-4.144A17.47 17.47 0 0 1 .639 4.646c-.34-.967-.035-2.004.658-2.698l.97-.969zM9 3.5a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5z"/>'    
        +'</svg>'
        +'</button>'
        +'</div>'
        +'</div>').appendTo('#mostrar');
       
   });
});