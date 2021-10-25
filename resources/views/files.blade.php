    <div class="row">
        <div class="col col-sm col-md col-lg">
            <div class="card">
                <div class="btn btn-primary hover" id="BotonArchivo">Archivos en Dropbox</div>
                <div class="card-body" id="TableArchivo" style="display:none;">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="">Nombre</th>
                                <th class="">Tamaño</th>
                                
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($files as $file)
                            <tr>
                                
                                <td class="">{{ $file->nombre }}</td>
                                <td class="">{{ $file->size }} KB</td>
                                
                                <td class="row  border border-white">
                                <div class="col-12 col-sm-4 col-md-4 col-lg-4">
                                    <a href="{{ $file->url }}" target="_blank" class="btn btn-outline-primary btn-sm btn-block shoW" style="display: none;" >
                                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-eye" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.134 13.134 0 0 0 1.66 2.043C4.12 11.332 5.88 12.5 8 12.5c2.12 0 3.879-1.168 5.168-2.457A13.134 13.134 0 0 0 14.828 8a13.133 13.133 0 0 0-1.66-2.043C11.879 4.668 10.119 3.5 8 3.5c-2.12 0-3.879 1.168-5.168 2.457A13.133 13.133 0 0 0 1.172 8z"/>
                                            <path fill-rule="evenodd" d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                                          </svg>
                                    </a>
                                </div>
                                <div class="col-12 col-sm-4 col-md-4 col-lg-4">
                                    <a href="{{  url('/files/'.$file->id_file.'/download') }}" class="btn btn-outline-secondary btn-sm btn-block shoW" style="display:none;">
                                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-file-earmark-arrow-down" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M4 1h5v1H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V6h1v7a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2z"/>
                                            <path d="M9 4.5V1l5 5h-3.5A1.5 1.5 0 0 1 9 4.5z"/>
                                            <path fill-rule="evenodd" d="M5.646 9.146a.5.5 0 0 1 .708 0L8 10.793l1.646-1.647a.5.5 0 0 1 .708.708l-2 2a.5.5 0 0 1-.708 0l-2-2a.5.5 0 0 1 0-.708z"/>
                                            <path fill-rule="evenodd" d="M8 6a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-1 0v-4A.5.5 0 0 1 8 6z"/>
                                          </svg>
                                    </a>
                                </div>
                                <div class="col-12 col-sm-4 col-md-4 col-lg-4">
                                    <a href="{{ url('/filesd/'.$file->id_file.'/'.$file->id_archivo) }}"class="btn btn-outline-danger btn-sm btn-block shoW" style="display:none;">
                                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0v-7z"/>
                                          </svg>
                                    </a>
                                </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div><br>
    <script>
        $(document).ready(function(){
            $('#BotonArchivo').on('click',function(){
                $('#TableArchivo').toggle();
            });
        });
    </script>