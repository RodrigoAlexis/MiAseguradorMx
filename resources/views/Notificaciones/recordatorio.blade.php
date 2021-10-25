
    
<!-- Inicio del modal-->

<div class="modal fade" id="recordatorios" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md"  >
    <div class="modal-content modBack">
      <div class="modal-header">
        <!-- Titulo del modal-->
        <h3 class="modal-title" style="color: black;">{{  'Notificaciones'  }}</h3>
        
        <a class=" close"data-dismiss="modal" aria-label="Close">x</a>
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
          <a class="nav-link" id="Poliza_tab" data-toggle="tab" href="#profile-md" role="tab" aria-controls="profile-md"aria-selected="false">Personas</a>
        </li>

        <!--Titulo tab 3-->
        <li class="nav-item tab3">
          <a class="nav-link" id="Pendiente_tab" data-toggle="tab" href="#contact-md" role="tab" aria-controls="contact-md"aria-selected="false">Polizas</a>
        </li>
        <div class="mb-0 alert alert-warning alert-block" role="alert">
          @isset($now)
            {{ $now[0]->time}}
          @endisset 
      </div>
      </ul>
      <!--Contenido de las tabs-->
      <div class="tab-content card pt-5 tabs" id="myTabContentMD">
          <!--Contenido tab 1-->
          <div class="tab-pane fade show active" id="home-md" role="tabpanel" aria-labelledby="home-tab-md">
            @isset($notificacionesCliente)
                @foreach ($notificacionesCliente as $notC)
                   @if ($notC->recordatorio_aniversario =='es hoy')
                       <div class="alert alert-secondary" role="alert">
                         <a href="/cliente/{{ $notC->id }}">{{ 'El aniversario de '.$notC->cliente.' '.$notC->recordatorio_aniversario }}</a>
                        </div>
                    @endif
                    @if ($notC->recordatorio_cumpleaños =='es hoy')
                       <div class="alert alert-success" role="alert">
                        <a href="/cliente/{{ $notC->id }}">{{ 'El cumpleaños de '.$notC->cliente.' '.$notC->recordatorio_cumpleaños }}</a>
                        </div>
                    @endif
                @endforeach
                @foreach ($notificacionesPoliza as $notP)
                @if ($notP->fin_vigencia =='hoy vence')
                    <div class="alert alert-danger" role="alert">
                      <a href="/cliente/{{ $notP->id_cliente }}">{{$notP->fin_vigencia.' una poliza del cliente '.$notP->cliente }}</a>
                    </div>
                @elseif($notP->aviso_vigencia== $now[0]->time)
                  <div class="alert alert-warning" role="alert">
                    <a href="/cliente/{{ $notP->id_cliente }}">{{'La poliza '.$notP->ramo.' está por expirar en dos dias'}}</a>
                  </div>
                @endif
                
             @endforeach
            @endisset
          </div>
          <!--Contenido tab 2-->
          <div class="tab-pane fade" id="profile-md" role="tabpanel" aria-labelledby="profile-tab-md">
            @foreach ($notificacionesCliente as $notC)
            @if ($notC->recordatorio_aniversario =='es hoy')
            <div class="alert alert-secondary" role="alert">
              <a href="/cliente/{{ $notC->id }}">{{ 'El aniversario de '.$notC->cliente.' '.$notC->recordatorio_aniversario }}</a>
             </div>
         @endif
         @if ($notC->recordatorio_cumpleaños =='es hoy')
            <div class="alert alert-info" role="alert">
             <a href="/cliente/{{ $notC->id }}">{{ 'El cumpleaños de '.$notC->cliente.' '.$notC->recordatorio_cumpleaños }}</a>
             </div>
         @endif
         
             @endforeach
         </div>
          <!--Contenido tab 3-->
          <div class="tab-pane fade" id="contact-md" role="tabpanel" aria-labelledby="contact-tab-md">
               @foreach ($notificacionesPoliza as $notP)
                @if ($notP->fin_vigencia =='hoy vence')
                    <div class="alert alert-danger" role="alert">
                      <a href="/cliente/{{ $notP->id_cliente }}">{{$notP->fin_vigencia.' una poliza del cliente '.$notP->cliente }}</a>
                    </div>
                @elseif($notP->aviso_vigencia== $now[0]->time)
                  <div class="alert alert-warning" role="alert">
                    <a href="/cliente/{{ $notP->id_cliente }}">{{'La poliza del cliente '.$notP->ramo.'está por expirar en dos dias'}}</a>
                  </div>
                @endif
                
             @endforeach
          </div>
        </div>
      </div>
      <!--Pie del modal-->
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>

