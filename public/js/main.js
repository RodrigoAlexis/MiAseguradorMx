document.addEventListener('DOMContentLoaded', function() {
    //Invoca el calendario con el id calendar
var calendarEl = document.getElementById('calendar');

var calendar = new FullCalendar.Calendar(calendarEl, {

    //Para que el calendario comience en una fecha especifica
    defaultDate:new Date(2020,6,1),

    //Invoca las carpetas
    plugins: [ 'dayGrid','interaction','timeGrid','list'],
    
    header: {
        left: 'dayGridMonth,timeGridWeek,timeGridDay, today',
        center: '',
        right:  'title'
    },
    footer: {
        left: '',
        center: '',
        right:'custom2 prevYear,prev,next,nextYear'
      },

   

   dateClick:function(info){

       //Limpia el modal
       limpiarFormuario();

       //Recupera la fecha del dia que se presiona
       $('#FechaIn').val(info.dateStr);

       //Muestra el boton agregar si el modal no contiene datos
       $("#btnAgregar").show();
       $("#btnModificar").hide();
       $("#btnBorrar").hide();

       //Se invoca al modal para insercion de datos
       $('#exampleModal').modal();
      
   },
   //Funcion para recuparar los datos insertados
   eventClick:function(info){

       //Muestra el boton Modificar y Eliminar si el modal contiene datos
       $("#btnAgregar").hide();
       $("#btnModificar").show();
       $("#btnBorrar").show();

       //Recuperacion de los datos del formulario
       $('#id').val(info.event.id);
       $('#Titulo').val(info.event.title);

       //variables para separar la fecha y la hora de inico
       mesI = (info.event.start.getMonth()+1);
       diaI = (info.event.start.getDate());
       anioI = (info.event.start.getFullYear());

       minutosI=info.event.start.getMinutes();
       horaI=info.event.start.getHours();
      
       //if sencillo para que se agregue un 0 a las horas y minutos menores a 10
       minutosI=(minutosI<10)?"0"+minutosI:minutosI;
       horaI=(horaI<10)?"0"+horaI:horaI;

       horarioI = (horaI+":"+minutosI);

       //if sencillo para que se agregue un 0 a los meses y dias menores a 10
       mesI=(mesI<10)?"0"+mesI:mesI;
       diaI=(diaI<10)?"0"+diaI:diaI;

       $('#FechaIn').val(anioI+"-"+mesI+"-"+diaI);
       $('#HoraI').val(horarioI);

       //variables para separar la fecha y la hora de fin
       mesF = (info.event.end.getMonth()+1);
       diaF = (info.event.end.getDate());
       anioF = (info.event.end.getFullYear());
       horarioF = (info.event.end.getHours()+":"+info.event.end.getMinutes());

       minutosF=info.event.end.getMinutes();
       horaF=info.event.end.getHours();

       //if sencillo para que se agregue un 0 a las horas y minutos menores a 10
       minutosF=(minutosF<10)?"0"+minutosF:minutosF;
       horaF=(horaF<10)?"0"+horaF:horaF;

       horarioI = (horaF+":"+minutosF);

       //if sencillo para que se agregue un 0 a los meses y dias menores a 10
       mesF=(mesF<10)?"0"+mesF:mesF;
       diaF=(diaF<10)?"0"+diaF:diaF;

       $('#FechaFi').val(anioF+"-"+mesF+"-"+diaF);
       $('#HoraF').val(horarioF);

       $('#Color').val(info.event.backgroundColor);

       $('#Descripcion').val(info.event.extendedProps.descripcion);

       $('#exampleModal').modal();
   },
   //Evento para mostrar los datos de la DB
   events:url_show

});
//Idioma
calendar.setOption('locale','Es');

//Renderiza el calendario(recarga)
calendar.render();

//Boton para insertar
$('#btnAgregar').click(function(){
    objEvento=recolectarDatosGUI("POST");

    EnviarInformacion('',objEvento);
});

//Boton para eliminar
$('#btnBorrar').click(function(){
    objEvento=recolectarDatosGUI("DELETE");
    //Se concatena el id y la accion
    EnviarInformacion('/'+$('#id').val(),objEvento);
});

//Boton para actualizar 
$('#btnModificar').click(function(){
    objEvento=recolectarDatosGUI("PATCH");
    //Se concatena el id y la accion
    EnviarInformacion('/'+$('#id').val(),objEvento);
});


//Funcion para recolectar todos los datos del formulario
function recolectarDatosGUI(method){

    nuevoEvento={
        id:$('#id').val(),
        title:$('#Titulo').val(),
        descripcion:$('#Descripcion').val(),
        color:$('#Color').val(),
        textColor:'#FFFFFF',
        start:$('#FechaIn').val()+" "+$('#HoraI').val(),
        end:$('#FechaFi').val()+" "+$('#HoraF').val(),
        
        '_token':$("meta[name='csrf-token']").attr("content"),
        '_method':method
    }

    return (nuevoEvento);
}
//Funcion para hacer una peticion ajax y enviar los datos por POST 
function EnviarInformacion(accion,objEvento){

    $.ajax({
        type:"POST",
        url:url_+accion,
        data:objEvento,
        success:function(msg){ 
            //Cuando se hace una insercion se oculta el modal y se renderiza el calendario
            $('#exampleModal').modal('toggle');
            calendar.refetchEvents();

        },  
        error:function(){
            alert("Hay un error");
        }
    });
}
//Funcion para limpiar el modal
function limpiarFormuario(){
    $('#id').val("");
    $('#Titulo').val("");
    $('#FechaIn').val("");
    $('#HoraI').val("");
    $('#FechaFi').val("");
    $('#HoraF').val("");
    $('#Color').val("");
    $('#Descripcion').val("");
}
});