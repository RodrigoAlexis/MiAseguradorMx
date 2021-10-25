<div class="accordion" id="accordionE">
    @isset($polizas)
      @foreach ($polizas as $p)
      <div class="row">
        <div class="col col-sm col-md col-lg">
            <div class="card ">
              <div class=" row card-header text-center" id="heading{{ $p->id }}">
                  <div class="col col-sm col-md col-lg-9 ">
                    <button id="{{ $p->id }}"  class="btn btn-block text-left btnC  " type="button" data-toggle="collapse" 
                      data-target="#collapse{{ $p->id }}">
                        <label class="mb-0 font-weight-bold text-monospace">{{ $p->ramo.'    ' }}</label>
                          <label class="mb-0 text-monospace">{{$p->empresa.'    ' }}</label>
                        <footer class="blockquote-footer"><cite title="Source Title">{{$p->tipo }}</cite>{{' ----- '. $p->fin }}</footer>
                    </button>
                    @php
                      $estatus_poliza=
                      app('App\Http\Controllers\PolizaController')->EstatusPoliza($p->id);
                      $files= app('App\Http\Controllers\FileController')->ArchivoPoliza($p->id);
                    @endphp
                  </div>
                  @foreach ($files as $file)
                    <div  class="row col-4   col-sm-6   col-md-6  col-lg-3">
                      <div class=" col-12 col-sm-4  col-md-4   col-lg-4 ">
                        <a href="{{ $file->url }}" target="_blank" class="btn btn-outline-primary btn-md  "disabled>
                          <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-eye" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.134 13.134 0 0 0 1.66 2.043C4.12 11.332 5.88 12.5 8 12.5c2.12 0 3.879-1.168 5.168-2.457A13.134 13.134 0 0 0 14.828 8a13.133 13.133 0 0 0-1.66-2.043C11.879 4.668 10.119 3.5 8 3.5c-2.12 0-3.879 1.168-5.168 2.457A13.133 13.133 0 0 0 1.172 8z"/>
                            <path fill-rule="evenodd" d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                          </svg>
                        </a>
                      </div>
                      <div class=" col-12 col-sm-4 col-md-4   col-lg-4 ">
                        <a href="{{  url('/files/'.$file->id_file.'/download') }}" class="btn btn-outline-secondary btn-md ">
                          <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-download" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M.5 8a.5.5 0 0 1 .5.5V12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V8.5a.5.5 0 0 1 1 0V12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V8.5A.5.5 0 0 1 .5 8z"/>
                            <path fill-rule="evenodd" d="M5 7.5a.5.5 0 0 1 .707 0L8 9.793 10.293 7.5a.5.5 0 1 1 .707.707l-2.646 2.647a.5.5 0 0 1-.708 0L5 8.207A.5.5 0 0 1 5 7.5z"/>
                            <path fill-rule="evenodd" d="M8 1a.5.5 0 0 1 .5.5v8a.5.5 0 0 1-1 0v-8A.5.5 0 0 1 8 1z"/>
                          </svg>
                        </a>
                      </div>
                      <div class=" col-12 col-sm-4 col-md-4   col-lg-4 ">
                        <form method="post" action="{{ url('/poliza/'.$p->id_poliza)}}" >
                            {{ csrf_field() }}
                            {{ method_field('delete') }}
                            <button style="display:none;" type="submit"  onclick="return confirm('¿Seguro que quieres borrar?');" class=" btn btn-md btn-outline-danger shoW" >
                              <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                              <path fill-rule="evenodd" d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0v-7z"/>
                            </svg></button>
                        </form>
                      </div>
                    </div>
                  @endforeach
                  @if ($files=='[]')
                    <div  class="row col-4   col-sm-6   col-md-6  col-lg-3">
                      <div class=" col-12 col-sm-4  col-md-4   col-lg-4 ">
                        
                      </div>
                      <div class=" col-12 col-sm-4 col-md-4   col-lg-4 ">
                       
                      </div>
                      <div class=" col-12 col-sm-4 col-md-4   col-lg-4 ">
                        <form method="post" action="{{ url('/poliza/'.$p->id_poliza)}}" >
                            {{ csrf_field() }}
                            {{ method_field('delete') }}
                            <button style="display:none;" type="submit"  onclick="return confirm('¿Seguro que quieres borrar?');" class=" btn btn-md btn-outline-danger shoW" >
                              <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                              <path fill-rule="evenodd" d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0v-7z"/>
                            </svg></button>
                        </form>
                      </div>
                    </div>
                  @endif
                  
              </div>
              <div id="collapse{{ $p->id }}" class="collapse" aria-labelledby="heading{{ $p->id }}"
                data-parent="#accordionE" >

                  <div class="card-body">
                    @include('Poliza.informacion')
                  </div>
              </div>
          </div>
        </div>

          
      </div>
      @endforeach
    @endisset

    @if ($polizas=='[]')
        <div class="container text-center col-12">
          <a href="/poliza/create" class="btn btn-secondary btn-block">Agregar una poliza</a>
        </div>
    @else
        
    @endif
</div>


