
    <table class="table table-striped table-condensed  table-hover">        
        <thead class="table-color col-md-12">
            <tr>
                <!-- Titulo de la tabla -->
                <th scope="col"><center>#</center></th>
                <th scope="col">Tipo</th>
                <th scope="col">Número</th>
                <th scope="col"><center>Acciones</center></th>
            </tr>
        </thead>
        <tbody>
            @foreach($telEmpresa as $tel)
            <tr class="table-info">
                <!-- Contenido de la tabla -->
                <th scope="col"><center> {{$loop->iteration}}</center></th>
                <th scope="col"><input type="text" id="tipo{{$loop->iteration}}" value="{{$tel->tipo}}" disabled class="col-md-8 telefono tel"/>
                    <div class="input-group-prepend col-md-8">
                        <select name="tipoU[]" id="tipoU{{$loop->iteration}}" class="custom-select selectEdit " disabled style="display:none" >
                            @if($tel->tipo == 'E_información')
                            <option value="{{$tel->tipo}}">E_información</option>
                            <option value="E_emergencia">E_emergencia</option>
                            @elseif($tel->tipo == 'E_emergencia')
                            <option value="{{$tel->tipo}}">E_emergencia</option>
                            <option value="E_información">E_información</option>
                            @endif
                        </select>
                    </div>
                </th>
                <th scope="col">
                    <input type="text" name="telefonoU[]" id="telefonoU{{$loop->iteration}}" value="{{$tel->telefono}}" disabled class="col-sm-10 telefono" required/>
                    <input type="text" name="idTel[]" style="display: none ;" value="{{$tel->telefono_id}}">
                </th>
                <th scope="col" style="width:10em;"><center>
                    <!-- Boton de editar -->
                    <a  class="btn btn-outline-dark edit" id="{{$loop->iteration}}">
                        <svg class="bi bi-pencil-square" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                        </svg>
                    </a>
                    
                    <!-- Boton de borrar -->
                    <a href="{{ url('/tel/'.$tel->empresa_id.'/'.$tel->telefono_id)}}" onclick="return confirm('¿Seguro que quieres borrar?');" class="btn btn-outline-danger">
                        <svg class="bi bi-trash-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0v-7z"/>
                        </svg>
                    </a></center>
                </th>                                   
            </tr>
            @endforeach
        </tbody>
    </table>
    <!-- Formulario para agregar telefonos -->
    <button  id="AparecerTelefono" type="button" class="btn btn-outline-dark btn-block"  >Agregar telefono&nbsp;&nbsp;
    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-telephone-plus-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" d="M2.267.98a1.636 1.636 0 0 1 2.448.152l1.681 2.162c.309.396.418.913.296 1.4l-.513 2.053a.636.636 0 0 0 .167.604L8.65 9.654a.636.636 0 0 0 .604.167l2.052-.513a1.636 1.636 0 0 1 1.401.296l2.162 1.681c.777.604.849 1.753.153 2.448l-.97.97c-.693.693-1.73.998-2.697.658a17.471 17.471 0 0 1-6.571-4.144A17.47 17.47 0 0 1 .639 4.646c-.34-.967-.035-2.004.658-2.698l.97-.969zM12.5 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1 0-1H12V.5a.5.5 0 0 1 .5-.5z"/>
        <path fill-rule="evenodd" d="M12 3.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1H13v2.5a.5.5 0 0 1-1 0v-3z"/>
    </svg>
    </button><br/>
    <!-- Éste form inserta-->
    <div class="container" id="mostrar" style="display:none" name="telefonos">
        <div class="row" id="telefono">
            <div class="input-group mb-3 col-sm-6">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="telefono">{{'Telefono'}}</label>
                </div>
                <input type="text" name="numero[]" id="numero" class="form-control datoInput">
            </div>
            <div class="input-group mb-3 col-sm-5">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="tipo">{{'Tipo'}}</label>
                </div>
                <select name="tipo[]" id="tipo" class="custom-select">
                    <option value="E_emergencia">E_emergencia</option>
                    <option value="E_información">E_información</option>
                </select>
            </div>
        </div>
        <a class="btn btn-success add mb-2 btn-block" id="add">
                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-telephone-plus-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M2.267.98a1.636 1.636 0 0 1 2.448.152l1.681 2.162c.309.396.418.913.296 1.4l-.513 2.053a.636.636 0 0 0 .167.604L8.65 9.654a.636.636 0 0 0 .604.167l2.052-.513a1.636 1.636 0 0 1 1.401.296l2.162 1.681c.777.604.849 1.753.153 2.448l-.97.97c-.693.693-1.73.998-2.697.658a17.471 17.471 0 0 1-6.571-4.144A17.47 17.47 0 0 1 .639 4.646c-.34-.967-.035-2.004.658-2.698l.97-.969zM12.5 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1 0-1H12V.5a.5.5 0 0 1 .5-.5z"/>
                    <path fill-rule="evenodd" d="M12 3.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1H13v2.5a.5.5 0 0 1-1 0v-3z"/>
                </svg>
            </a>
    </div> 
       
</form>
        
<!--JavaScript-->
