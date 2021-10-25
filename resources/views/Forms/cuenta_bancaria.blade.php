
<!--Telefono 1-->
@isset($Cuentasbancarias)
    @foreach ($Cuentasbancarias as $cuentaB)
    
        <div class="row mb-1"  >    
            <div class="input-group mb-2 col-12 col-sm-10 col-md-12 col-lg" >
                <div class="input-group-prepend" >
                    <label class="input-group-text " >{{'Cuenta'}}</label>
                </div>
                <input type="text" name="id_cuenta[]" id="id_cuenta"  value="{{ $cuentaB->cuenta_id }}" style="display:none;">
                <input type="text" name="num_cuentaU[]" id="num_cuentaU" class="form-control datoInput clientEdit" value="{{ $cuentaB->cuenta }}" disabled maxlength="16" pattern="[0-9]{1,16}"  title="Solo numeros">
            </div>
    
            <div class="input-group mb-2 col-12 col-sm-10 col-md-12 col-lg" >
                <div class="input-group-prepend" >
                    <label class="input-group-text " >{{'Vigencia'}}</label>
                </div> 
                <input class="form-control datoInput vigencia" type="text"  value="{{ $cuentaB->fecha_vigencia }}" disabled>
                
                @php $m=explode('/',$cuentaB->fecha_vigencia); @endphp

                <select class="form-control datoInput clientEdit vigencia " name="mesE[]" style="display: none;">
                        <option value="{{ $m[0] }}">{{ $m[0] }}</option>
                        <option value="01">Enero</option>
                        <option value="02">Febrero</option>
                        <option value="03">Marzo</option>
                        <option value="04">Abril</option>
                        <option value="05">Mayo</option>
                        <option value="06">Junio</option>
                        <option value="07">Julio</option>
                        <option value="08">Agosto</option>
                        <option value="09">Septiembre</option>
                        <option value="10">Octubre</option>
                        <option value="11">Noviembre</option>
                        <option value="12">Diciembre</option>
                    </select>
                    <select class="form-control datoInput  clientEdit vigencia "name="yearE[]"  style="display: none; ">
                        <option value="{{ $m[1] }}">{{ $m[1] }}</option>
                        <option value="20"> 2020</option>
                        <option value="21"> 2021</option>
                        <option value="22"> 2022</option>
                        <option value="23"> 2023</option>
                        <option value="24"> 2024</option>
                        <option value="25"> 2025</option>
                        <option value="26"> 2026</option>
                        <option value="27"> 2027</option>
                        <option value="28"> 2028</option>
                        <option value="29"> 2029</option>
                        <option value="30"> 2030</option>
                    </select>
            </div>
    
            <div class="input-group mb-2 col-12 col-sm-10 col-md-12 col-lg-3" >
                <div class="input-group-prepend" >
                    <label class="input-group-text" >{{'CVV'}}</label>
                </div>
                <input class="form-control datoInput clientEdit" type="text" name="cvvU[]" id="cvvU"  value="{{ $cuentaB->pin}}" disabled maxlength="3"  >
            </div>
            <a class="col-12 col-sm-10 col-md-12 col-lg-1 btn btn-danger btn-block  clientEdit vigencia " onclick="return confirm('¿Seguro quieres eliminar?');" href="{{ url('/delcuenta/'.$cuentaB->cuenta_id.'/'.$cuentaB->cliente_id) }}"  id="DeleteCuenta" style="width:2.5em; height:2.5em; display:none;">
                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-credit-card-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v1H0V4z"/>
                    <path fill-rule="evenodd" d="M0 7v5a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7H0zm3 2a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1h1a1 1 0 0 0 1-1v-1a1 1 0 0 0-1-1H3z"/>
                  </svg>{{ ' x' }}
            </a>
        </div>
         
    
    @endforeach
@endisset

<input  id="AparecerCuentas" type="button" class="btn btn-outline-dark btn-block my-3" value="Cuentas Bancarias" style="display: none;"><br>

<div class="container" id="MostrarCuentas" style="display:none;">
    <div class="row">    
        <div class="input-group mb-2 col-12 col-sm-12 col-md-12 col-lg-4 " >
            <div class="input-group-prepend" >
                <label class="input-group-text " >{{'Cuenta'}}</label>
            </div>
            <input type="text" name="num_cuenta[]" id="num_cuenta" class="form-control datoInput " maxlength="16" pattern="[0-9]{1,16}" title="Solo numeros">
        </div>

        <div class="input-group mb-2 col-12 col-sm-12 col-md-6 col-lg-4 " >
            <div class="input-group-prepend" >
                <label class="input-group-text " >{{'Vigencia'}}</label>
            </div>  
            <select name="mes[]" class="form-control datoInput ">
                    <option value="01">Enero</option>
                    <option value="02">Febrero</option>
                    <option value="03">Marzo</option>
                    <option value="04">Abril</option>
                    <option value="05">Mayo</option>
                    <option value="06">Junio</option>
                    <option value="07">Julio</option>
                    <option value="08">Agosto</option>
                    <option value="09">Septiembre</option>
                    <option value="10">Octubre</option>
                    <option value="11">Noviembre</option>
                    <option value="12">Diciembre</option>
                </select>
                <select name="year[]" style="width:2em;" class="form-control datoInput col-md-auto">
                    <option value="20"> 2020</option>
                    <option value="21"> 2021</option>
                    <option value="22"> 2022</option>
                    <option value="23"> 2023</option>
                    <option value="24"> 2024</option>
                    <option value="25"> 2025</option>
                    <option value="26"> 2026</option>
                    <option value="27"> 2027</option>
                    <option value="28"> 2028</option>
                    <option value="29"> 2029</option>
                    <option value="30"> 2030</option>
                    <option value="31"> 2030</option>
                </select>
        </div>

        <div class="input-group mb-2 col-9 col-sm-9 col-md-4 col-lg-3 " >
            <div class="input-group-prepend" >
                <label class="input-group-text" >{{'CVV'}}</label>
            </div>
            <input type="text" name="cvv[]" id="cvv" class="form-control datoInput" maxlength="3" pattern="[0-9]{0,3}" title="Solo numeros">
        </div>
        <a  class=" col-sm-2 col-md-1 col-2 col-lg-1 btn btn-success addCuenta mb-2" id="addCuenta" style=" height:2.5em;">
            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-credit-card" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4zm2-1a1 1 0 0 0-1 1v1h14V4a1 1 0 0 0-1-1H2zm13 4H1v5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V7z"/>
                <path d="M2 10a1 1 0 0 1 1-1h1a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1v-1z"/>
              </svg>{{ ' +' }}
        </a>
    </div>
</div>

<script >
    $(document).ready(function(){
        
        $(document).on( 'click', '.eliminarCuenta', function(){
            $('#NuevaCuenta'+$(this).attr('id')).remove();
            $(this).parent().remove();
       });
    
        $('#AparecerCuentas').on('click', function(){
            $('#MostrarCuentas').toggle();
        });
    
       var cuenta = 1;
       $('.addCuenta').on('click', function(){
            cuenta++;
            $('#MostrarCuentas').append('<div class="row " id="NuevaCuenta'+cuenta+'" style="display:">'
            +'<div class="input-group mb-2 col-12 col-sm-10 col-md-12 col-lg" >'
                +'<div class="input-group-prepend" >'
                    +'<label class="input-group-text " >Cuenta</label>'
                +'</div>'
                +'<input type="text" name="num_cuenta[]" id="num_cuenta" class="form-control datoInput " maxlength="16" pattern="[0-9]{1,16}" title="Solo numeros">'
            +'</div>'
    
            +'<div class="input-group mb-2 col-12 col-sm-10 col-md-12 col-lg " >'
                +'<div class="input-group-prepend" >'
                    +'<label class="input-group-text " >Vigencia</label>'
                +'</div>'  
                +'<select name="mes[]" class="form-control datoInput ">'
                        +'<option value="01">Enero</option>'
                        +'<option value="02">Febrero</option>'
                        +'<option value="03">Marzo</option>'
                        +'<option value="04">Abril</option>'
                        +'<option value="05">Mayo</option>'
                        +'<option value="06">Junio</option>'
                        +'<option value="07">Julio</option>'
                        +'<option value="08">Agosto</option>'
                        +'<option value="09">Septiembre</option>'
                        +'<option value="10">Octubre</option>'
                        +'<option value="11">Noviembre</option>'
                        +'<option value="12">Diciembre</option>'
                    +'</select>'
                    +'<select name="year[]" class="form-control datoInput col-md-auto">'
                        +'<option value="20"> 2020</option>'
                        +'<option value="21"> 2021</option>'
                        +'<option value="22"> 2022</option>'
                        +'<option value="23"> 2023</option>'
                        +'<option value="24"> 2024</option>'
                        +'<option value="25"> 2025</option>'
                        +'<option value="26"> 2026</option>'
                        +'<option value="27"> 2027</option>'
                        +'<option value="28"> 2028</option>'
                        +'<option value="29"> 2029</option>'
                        +'<option value="30"> 2030</option>'
                        +'<option value="31"> 2030</option>'
                    +'</select>'
                +'</div>'
    
            +'<div class="input-group mb-2 col-12 col-sm-10 col-md-12 col-lg-3 " >'
                +'<div class="input-group-prepend" >'
                    +'<label class="input-group-text" >CVV</label>'
                +'</div>'
                +'<input type="text" name="cvv[]" id="cvv" class="form-control datoInput" maxlength="3" pattern="[0-9]{0,3}" title="Solo numeros">'
            +'</div>'
            +'<a  class="col-12 col-sm-10 col-md-12 col-lg-1 btn btn-outline-danger eliminarCuenta " id="'+cuenta+'" style="width:2.5em; height:2.5em; color:black;">'
                +'<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-credit-card" fill="currentColor" xmlns="http://www.w3.org/2000/svg">'
            +'<path fill-rule="evenodd" d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4zm2-1a1 1 0 0 0-1 1v1h14V4a1 1 0 0 0-1-1H2zm13 4H1v5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V7z"/>'
             +'<path d="M2 10a1 1 0 0 1 1-1h1a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1v-1z"/>'
            +'</svg>{{ ' -' }}'
                +'</a>'
        +'</div>');
       });
    });
    </script>
