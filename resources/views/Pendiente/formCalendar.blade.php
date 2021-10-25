
<!-- Input oculto-->
<div class="d-none">
    <input type="text" name="id" id="id" >
</div>

<!-- Formulario-->
<div class="form-row">
    <div class="form-group col-md-12">
        <label>Titulo:</label>
        <input type="text" class="form-control" name="Titulo" id="Titulo" maxlength="30" pattern="[a-z,A-Z]{1,30}" title="Solo letras">
    </div>
    <div class="form-group col-md-8">
        <label>Fecha Inicio:</label>
        <input type="text" class="form-control" name="FechaIn" id="FechaIn" disabled>
    </div>
    <div class="form-group col-md-4">
        <label>Hora de inicio:</label>
        <input type="time"  max="24:00" step="600" class="form-control" name="HoraI" id="HoraI">
    </div>
    <div class="form-group col-md-8">
        <label>Fecha de fin:</label>
        <input type="date" class="form-control" name="FechaFi" id="FechaFi">
    </div>
    <div class="form-group col-md-4">
        <label>Hora de fin:</label>
        <input type="time"  max="24:00" step="600" class="form-control" name="HoraF" id="HoraF">
    </div>
    <div class="form-group col-md-12">
        <label>Descripcion:</label>
        <textarea class="form-control" name="Descripcion" id="Descripcion" cols="30" rows="4" ></textarea>
    </div>
    <div class="form-group col-md-12">
        <label>Color:</label>
        <input type="color" class="form-control" name="Color" id="Color">   
    </div>
</div>
