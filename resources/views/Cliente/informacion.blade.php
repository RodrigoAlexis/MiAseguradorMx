<form action="{{ url('/cliente/'.$cl->id) }}" method="post">
    {{ csrf_field() }}
    {{ method_field('PATCH') }}
    <div class="container">

        @foreach ( $tablaCliente as $tc)
            <!-- Nombres -->
            <div class="row">
                <div class="input-group mb-3 col-12 col-sm-6 col-md-6 col-lg-4">
                    <div class="input-group-prepend">
                    <span class="input-group-text "  >Nombre</span>
                    </div>
                    <input id="nombre" name="nombre" value="{{ $tc->nombre }}" disabled type="text" class="form-control clientEdit  " aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" required maxlength="49"  pattern="[a-z,A-Z]{1,49}" title="Solo letras">
                </div>

                <div class="input-group mb-3 col-12 col-sm-6 col-md-6 col-lg-4">
                    <div class="input-group-prepend">
                    <span class="input-group-text "  >A.Paterno</span>
                    </div>
                    <input id="ap_paterno" name="ap_paterno" value="{{ $tc->ap_paterno }}" disabled type="text" class="form-control clientEdit  " aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" required maxlength="49"  pattern="[a-z,A-Z]{1,49}" title="Solo letras">
                </div>

                <div class="input-group mb-3 col-12 col-sm-6 col-md-6 col-lg-4">
                    <div class="input-group-prepend">
                    <span class="input-group-text "  >A.Materno</span>
                    </div>
                    <input id="ap_materno" name="ap_materno" value="{{ $tc->ap_materno }}" disabled type="text" class="form-control clientEdit  " aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" required maxlength="49"  pattern="[a-z,A-Z]{1,49}" title="Solo letras">
                </div>

                <!-- Fechas-->
                <div class="input-group mb-3 col-12 col-sm-6 col-md-6 col-lg-4">
                    <div class="input-group-prepend">
                    <span class="input-group-text "  >Cumpleaños</span>
                    </div>
                    <input id="fecha_nacimiento" name="fecha_nacimiento" value="{{ $tc->fecha_nacimiento }}"  type="date" class="form-control clientEdit  " aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"disabled required>
                </div>
                
                <div class="input-group mb-3 col-12 col-sm-6 col-md-6 col-lg-4">
                    <div class="input-group-prepend">
                        <span class="input-group-text "  >Aniversario</span>
                    </div>
                    <input id="aniversario" name="aniversario" value="{{ $tc->aniversario }}" disabled type="date" class="form-control clientEdit  " aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                </div>

                <div class="input-group mb-3 col-12 col-sm-6 col-md-6 col-lg-4">
                    <div class="input-group-prepend">
                    <span class="input-group-text "  >Acronimo</span>
                    </div>
                    <input id="ap_materno" name="ap_materno" value="{{ $tc->acronimo }}" disabled type="text" class="form-control   " aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                </div>

                <!-- info -->            
                <div class="input-group mb-3 col-12 col-sm-6 col-md-6 col-lg-4">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="contacto">{{'sexo'}}</label>
                    </div>
                    <select disabled  name="sexo" id="sexo" class="custom-select clientEdit">
                     <option value="M">M</option>
                     <option value="F">F</option>
                     <option value="Prefiero no decirlo">Prefiere no decirlo</option>
                    </select>   
                </div>

                <div class="input-group mb-3 col-12 col-sm-6 col-md-6 col-lg-4">
                    <div class="input-group-prepend">
                    <span class="input-group-text "  >Relacion</span>
                    </div>
                    <input id="relacion" name="relacion" value="{{ $tc->relacion }}" disabled type="text" class="form-control clientEdit  " aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" maxlength="40">
                </div>

                <div class="input-group mb-3 col-12 col-sm-6 col-md-6 col-lg-4">
                    <div class="input-group-prepend">
                        <span class="input-group-text "  >Estatus</span>
                    </div>

                    <select disabled class="custom-select clientEdit" name="estatus">
                        @foreach ($estatus as $es)
                            @if ($tc->estatus== $es->id )
                                <option value="{{ $es->id }}" >{{ $es->nombre }}</option>
                            @endif
                        @endforeach
                        @foreach ($estatus as $es)
                            @if ($tc->estatus!= $es->id )
                                <option value="{{ $es->id }}" >{{ $es->nombre }}</option>
                            @endif
                        @endforeach

                    </select>
                </div>
            
                <!-- origen user name password -->
                <!--Contacto-->
                <div class="input-group mb-3 col-12 col-sm-6 col-md-6 col-lg-4">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="contacto">{{'Origen'}}</label>
                    </div>
                    <select disabled type="text" name="contacto" id="contacto" class="custom-select clientEdit">
                    @foreach($contacto as $cont)
                        <option value="{{ $cont->id }}">{{ $cont->nombre }}</option>
                    @endforeach
                    </select>
                </div>

                <div class="input-group mb-3 col-12 col-sm-6 col-md-6 col-lg-4">
                    <div class="input-group-prepend">
                    <span class="input-group-text "  >Nombre de usuario</span>
                    </div>
                    <input id="usuario" name="usuario" value="{{ $cl->userName }}" disabled type="text" class="form-control clientEdit  " aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" required maxlength="44">
                </div>

                <div class="input-group mb-3 col-12 col-sm-6 col-md-6 col-lg-4">
                    <div class="input-group-prepend">
                    <span class="input-group-text "  >Contraseña</span>
                    </div>
                    <input id="password" name="password" value="{{ $cl->password }}" disabled type="text" class="form-control clientEdit  " aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" required maxlength="44">
                </div>
            </div>
        @endforeach

        <div class="row">
            <div class="col">
              <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">

                <a class="nav-link active telefonos" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Telefonos</a>
                <a name="inicio" class="nav-link cuentas" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Cuentas bancarias</a>
               <!--  <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Usuario</a>
               <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Settings</a>-->
              </div>
            </div>
            <div class="col-8 col-sm-10 col-md-9 col-lg-10">
              <div class="tab-content" id="v-pills-tabContent">
                <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                    @include('Forms.formTelefonoCliente')
                </div>
                <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                    @include('Forms.cuenta_bancaria')
                </div>
                <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                    
                </div>
                <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">...</div>
              </div>
            </div>
            
        </div>
    </div>

    <input  id="confirmarEdicionCliente" type="submit" class="btn btn-success btn-block" value="Confirmar edicion" style="display:none;">
</form>

<script>
    $(document).ready(function(){
     
    });
  </script>
