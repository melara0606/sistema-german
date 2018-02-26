$(document).ready(function(){
	$('#calendario').fullCalendar({
	    dayClick: function(fecha, jsEvent){
	      /*$("#exampleModal").modal("show");
	      $("#fecha").val(fecha.format());*/
	      var event = { id:1 , title: 'New event', start:  fecha};
	      $('#calendario').fullCalendar( 'renderEvent', event, true);
	    },
	    weekends: false,
	    editable: true,
	    lang:'es'
  	});
});