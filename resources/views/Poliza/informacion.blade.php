
<script>
    $(document).ready(function(){
        $(document).on('change','input[type="file"]',function(){
        // this.files[0].size recupera el tamaño del archivo
        // alert(this.files[0].size);
        
        var fileName = this.files[0].name;
        var fileSize = this.files[0].size;

        if(fileSize > 1048576000){
            alert('El archivo no debe superar 1GB');
            this.value = '';
            this.files[0].name = '';
        }else{
            // recuperamos la extensión del archivo
            var ext = fileName.split('.').pop();
            
            // Convertimos en minúscula porque 
            // la extensión del archivo puede estar en mayúscula
            ext = ext.toLowerCase();
        
            // console.log(ext);
            switch (ext) {
                case 'pdf':
                case 'doc':
                case 'txt':
                case 'docx': break;
                default:
                    alert('El archivo no tiene la extensión adecuada (pdf, .doc, .docx)');
                    this.value = ''; // reset del valor
                    this.files[0].name = '';
            }
        }
    });
    });
</script>

    <form action="{{ url('/poliza/'.$p->id_poliza) }}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ method_field('PATCH') }}

            <h5><label for="folio">{{ "Folio" }}</label></h5>
            <input type="text" name="folio"  id="folio"  class="form-control clientEdit" placeholder="Folio de la poliza" required value="{{ $p->folio }}" disabled maxlength="49">
            <br>
            <input type="text" value="{{ $p->id_cliente }}" name="id_cliente" style="display:none;">
            
            <div class=" row ">
                <!--Ramo-->
                <div class="input-group mb-3 col-12 col-sm-12 col-md-6 col-lg-4" >
                    <div class="input-group-prepend" >
                        <label class="input-group-text">Ramo</label>
                    </div>
                    <select class="custom-select clientEdit" name="ramo" disabled>
                        @foreach ($ramo as $r)
                                @if ($p->ramo == $r->tipo_poliza)
                                    <option value="{{ $r->id }}">{{ $p->ramo }}</option>
                                @endif
                        @endforeach
                        @foreach ($ramo as $r)
                            @if( $r->tipo_poliza!=$p->ramo )
                                <option value="{{ $r->id }}">{{ $r->tipo_poliza }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>

                <!--Tipo de poliza-->
                <div class="input-group mb-3 col-12 col-sm-12 col-md-6 col-lg-4">
                        <div class="input-group-prepend">
                        <label class="input-group-text">Tipo </label>
                        </div>

                        <select class="custom-select clientEdit" name="tipo" disabled>
                            @if ($p->tipo!='N/A')
                                <option value="{{ $p->tipo }}">{{ $p->tipo }}</option>
                                <option value="NUEVA" >{{ "Nueva" }}</option>
                                <option value="RENOVACION" >{{ "Renovacón" }}</option>
                                <option value="DxN" >{{ "DxN" }}</option>
                                <option value="DxN RENOVACION" >{{ "DxN Renovación" }}</option>
                                <option value=""></option>
                            @else 
                                <option value=""></option>
                                <option value="NUEVA" >{{ "Nueva" }}</option>
                                <option value="RENOVACION" >{{ "Renovacón" }}</option>
                                <option value="DxN" >{{ "DxN" }}</option>
                                <option value="DxN RENOVACION" >{{ "DxN Renovación" }}</option>
                                
                            @endif

                        </select>
                </div>
                <!--Empresa-->
                <div class="input-group mb-3 col-12 col-sm-12 col-md-6 col-lg-4">
                        <div class="input-group-prepend">
                        <label class="input-group-text">Empresa</label>
                        </div>

                        <select class="custom-select clientEdit" name="empresa" disabled>
                            @foreach ($empresas as $e)
                                @if ($e->siglas==$p->empresa)
                                    <option value="{{ $e->id }}">{{ $p->empresa }}</option>
                                @endif
                            @endforeach
                            @foreach ($empresas as $e)
                                @if( $e->siglas != $p->empresa )
                                    <option value="{{ $e->id }}">{{ $e->siglas }}</option>
                                @endif
                            @endforeach

                        </select>
                    </div>
            
                <!--Metodo_cobro-->
                <div class="input-group mb-3 col-12 col-sm-12 col-md-6 col-lg-4">
                    <div class="input-group-prepend">
                        <label class="input-group-text">Metodo de cobro</label>
                        </div>

                        <select class="custom-select clientEdit" name="metodo_cobro" disabled>
                        
                            @foreach ($metodo_cobro as $mc)
                                @if ($p->metodo_cobro == $mc->nombre)
                                    <option value="{{ $mc->id }}">{{ $p->metodo_cobro }}</option>
                                @endif
                            @endforeach
                            @foreach ($metodo_cobro as $mc)
                                @if( $mc->nombre != $p->metodo_cobro )
                                    <option value="{{ $mc->id }}">{{ $mc->nombre }}</option>
                                @endif
                            @endforeach
                        

                        

                        </select>
                    </div>
                <!--Forma_pago-->
                <div class="input-group mb-3 col-12 col-sm-12 col-md-6 col-lg-4">                
                        <div class="input-group-prepend">
                        <label class="input-group-text" >Forma de Pago</label>
                        </div>

                        <select class="custom-select clientEdit" name="forma_pago" disabled>
                            @if (isset($p->forma_pago))  
                                @foreach ($forma_pago as $fp)
                                    @if ($fp->nombre==$p->forma_pago)
                                        <option value="{{ $fp->id }}">{{ $p->forma_pago }}</option>

                                    @endif
                                @endforeach
                                @foreach ($forma_pago as $fp))
                                    @if( $fp->nombre != $p->forma_pago )
                                        <option value="{{ $fp->id }}">{{ $fp->nombre}}</option>                                    
                                    @endif                                
                                @endforeach
                                <option value=""></option>
                            @else
                            <option value=""></option>
                                @foreach ($forma_pago as $fp))
                                    @if( $fp->nombre != $p->forma_pago )
                                        <option value="{{ $fp->id }}">{{ $fp->nombre}}</option>                                    
                                    @endif
                                    
                                @endforeach
                            @endif
                        </select>
                    </div>

                <!--Condicion_cobro-->
                <div class="input-group mb-3 col-12 col-sm-12 col-md-6 col-lg-4">                
                        <div class="input-group-prepend">
                        <label class="input-group-text">Condicion de cobro</label>
                        </div>

                        <select class="custom-select clientEdit" name="condicion_cobro" disbaled>                       
                            

                            @if (isset($p->condicion_cobro))
                                @foreach ($condicion_cobro as $cc)
                                    @if ($cc->nombre==$p->condicion_cobro)
                                        <option value="{{ $cc->id }}">{{ $p->condicion_cobro }}</option>
                                    @endif
                                @endforeach
                                @foreach ($condicion_cobro as $cc))
                                    @if( $cc->nombre != $p->condicion_cobro )
                                        <option value="{{ $cc->id }}">{{ $cc->nombre}}</option>
                                    @endif
                                @endforeach
                                <option value=""></option>
                            @else
                                <option value=""></option>
                                @foreach ($condicion_cobro as $cc))
                                    @if( $cc->nombre != $p->condicion_cobro )
                                        <option value="{{ $cc->id }}">{{ $cc->nombre}}</option>
                                    @endif
                                @endforeach
                                
                            @endif
        
                        </select>
                    </div>
            </div>
            
            <div class="row">
                <div class="col-6">
                    <h5><label>{{ "Inicio de vigencia" }}</label></h5>
                    <input type="date" name="inicio_vigencia"  id="inicio_vigencia" class="form-control clientEdit" required value="{{ $p->inicio_vigencia }}" disabled><br>
                </div>
                <div class="col-6">
                    <h5> <label  >{{ "Fin de vigencia" }}</label></h5>
                    <input type="text" name="fin_vigencia"  id="fin_vigencia" class="form-control" required value=" {{ $p->fin_vigencia }}" disabled><br>
                </div>
            </div>
            
            <h5> <label for="prima_neta" >{{ "Prima Neta" }}</label></h5>
            <input type="text" name="prima_neta"  id="prima_neta" class="form-control clientEdit" placeholder="$" required value="{{ $p->prima_neta }}"
             disabled maxlength="8"  title="solo numeros"><br>
            
            @include('Forms.estatus_poliza')
            @if ($files!='[]')
                 @include('files')
            @else
                <h5> <label for="pdf_poliza" >{{ "PDF " }}</label></h5>
                <input type="file" name="file"  id="file" class="form-control clientEdit" placeholder="" disabled accept="application/pdf, .doc, .docx, .txt"><br>
            @endif
           
            <div class="row">
                <input type="submit" class="btn btn-success btn-block shoW" value="Confirmar" style="display:none;">
            </div>
    </form> 