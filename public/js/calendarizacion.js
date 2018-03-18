$(document).ready(function(){
	$('#calendario').fullCalendar({
	    dayClick: function(fecha, jsEvent){
	      $("#exampleModal").modal("show");

	      console.log(fecha)	      

	      $("#btnSubmit").on("click", function(event){
	      	var evento = $("#eventoId").val();
	      	var descripcion = $("#descripcion").val();

	      	var fechaInicio = new Date(fecha);
	      	fechaInicio = fechaInicio.getFullYear() + '-' + fechaInicio.getMonth() + '-' + fechaInicio.getDay();

	      	$.ajax({
	      		method: 'GET',
	      		url: '/sisverapaz/public/AddCalendarizaciones',
	      		data: { evento: evento, descripcion: descripcion, updated_at: fechaInicio, created_at: fechaInicio  }
	      	}).then(function(json){

	      	})
	      })

	      /*$("#fecha").val(fecha.format());
	      var event = { id: 1  , title: 'Nuevo evento', start:  fecha};
	      $('#calendario').fullCalendar( 'renderEvent', event, true);*/
	    },
	    weekends: false,
	    editable: true,
	    lang:'es'
  	});
});