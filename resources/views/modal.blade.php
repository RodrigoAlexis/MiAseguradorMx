@foreach ( $cliente as $cl)
    
<link rel="stylesheet" href="{{asset('css/estilos.css')}}" />
<!-- Inicio del modal-->
<div class="modal " tabindex="-1" role="dialog" id="mi" data-controls-modal="#mi" data-backdrop="static" data-keyboard="false" >
  
    <div class="modal-dialog modal-xl"  >
    <div class="modal-content modBack">
      <div class="modal-header">
        <!-- Titulo del modal-->
        <h3 class="modal-title" style="color: black;">{{  $cl->cliente  }}</h3>
        <a href="/cliente" class="btn btn-danger">x</a>
      </div>
      <!--Contenido del modal-->
      <div class="modal-body">

        <!--Inicio de tabs-->
      <ul class="nav nav-tabs md-tabs barratabs" id="myTabMD" role="tablist">

        <!--Titulo tab 1-->
        <li class="nav-item tab1">
          <a class="nav-link active" id="General_tab" data-toggle="tab" href="#home-md" role="tab" aria-controls="home-md"aria-selected="true">General</a>
        </li>

        <!--Titulo tab 2-->
        <li class="nav-item tab2">
          <a class="nav-link" id="Poliza_tab" data-toggle="tab" href="#profile-md" role="tab" aria-controls="profile-md"aria-selected="false">Pólizas</a>
        </li>
      </ul>
      <!--Contenido de las tabs-->
      <div class="tab-content card pt-5 tabs" id="myTabContentMD">
          <!--Contenido tab 1-->
          <div class="tab-pane fade show active" id="home-md" role="tabpanel" aria-labelledby="home-tab-md">
            @isset($tablaCliente)
              @include('Cliente.informacion')
            @endisset
          </div>
          <!--Contenido tab 2-->
          <div class="tab-pane fade" id="profile-md" role="tabpanel" aria-labelledby="profile-tab-md">
            @isset($polizas)
              @include('Poliza.poliza_cliente')
            @endisset
         </div>
        </div>
      </div>
      <!--Pie del modal-->
      <div class="modal-footer">
        <input type="button" id="tab_edit" class="btn btn-outline-info" value="Editar">
        <a href="/cliente" class="btn btn-secondary">Close</a>
      </div>
    </div>
  </div>
@endforeach

  <script>
    $(document).ready(function(){
      
      $("#Pendiente_tab").on( "click", function() {
        $('#tab_edit').hide(); 
        $('#tab_edit').attr('class',' btn btn-outline-info');
          $('#tab_edit').attr('value','Editar');
          $('.clientEdit').prop('disabled',true); 
      });
     
      $("#General_tab").on( "click", function() {
        $('#tab_edit').show(); 
      });
      
      $("#tab_edit").on( "click", function() {
          $('.eliminar').toggle();          
          $('#AparecerTelefono').toggle();
          $('#mostrar').hide();
          $('.vigencia').toggle(); 
          $('#AparecerCuentas').toggle();
          $('#AparecerTelefonos').toggle();
          $('.shoW').toggle();

        if($(this).attr('value')=='Editar'){
          $(this).attr('class',' btn btn-danger');
          $(this).attr('class',' btn btn-danger');
          $(this).attr('value','Cancelar');
          $('.clientEdit').prop('disabled',false);
          $('#confirmarEdicionCliente').show();
        }else{

          $(this).attr('class',' btn btn-outline-info');
          $(this).attr('value','Editar');
          $('.clientEdit').prop('disabled',true); 
          $('#confirmarEdicionCliente').hide();
          $('.EstatusPoliza').hide();
          $('#MostrarCuentas').hide();

        }
        
      });

      $('.btnC').on('click',function(){
        var myC=$('#collapse'+this.id);
        
        if(myC.hasClass('show')){
          myC.toggle();
          myC.removeClass('show');
        }
        else{
          
          myC.addClass('show');
        }
      });
    });
  </script>