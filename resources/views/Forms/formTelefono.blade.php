<!--Telefonos-->
<div id="mostrar" style="display:inlaine" name="telefonos" class="row">   

    <div class="input-group mb-3 col-12 col-sm-5 col-md-6 col-lg-6">
        <div class="input-group-prepend ">
            <label class="input-group-text"  for="telefono">{{'Telefono'}}</label>
        </div>
        <input type="text" name="numero[]" id="numero" class="form-control datoInput ">
    </div>

    <div class="input-group mb-3 col-12 col-sm-5 col-md-4 col-lg-4 ">
        <div class="input-group-prepend ">
            <label class="input-group-text" for="tipo">{{'Tipo'}}</label>
        </div>
        <select type="text" name="tipo[]" id="tipo" class="custom-select ">
            <option>E_información</option>
            <option>E_emergencia</option>
        </select>
        
    </div>
    <div class="col-12 col-sm-2 col-md-2 col-lg-2">
        <a class="btn btn-success btn-block add"  id="add" >
            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-telephone-plus-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M2.267.98a1.636 1.636 0 0 1 2.448.152l1.681 2.162c.309.396.418.913.296 1.4l-.513 2.053a.636.636 0 0 0 .167.604L8.65 9.654a.636.636 0 0 0 .604.167l2.052-.513a1.636 1.636 0 0 1 1.401.296l2.162 1.681c.777.604.849 1.753.153 2.448l-.97.97c-.693.693-1.73.998-2.697.658a17.471 17.471 0 0 1-6.571-4.144A17.47 17.47 0 0 1 .639 4.646c-.34-.967-.035-2.004.658-2.698l.97-.969zM12.5 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1 0-1H12V.5a.5.5 0 0 1 .5-.5z"/>
                <path fill-rule="evenodd" d="M12 3.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1H13v2.5a.5.5 0 0 1-1 0v-3z"/>
            </svg>
        </a>
    </div>
</div>
<br/>


