$(document).ready(function(){
	$('#calendario').fullCalendar({
            dayClick: function(fecha,jsEvent){
              $("#exampleModal").modal("show");
              $("#fecha").val(fecha.format());
              //alert(fecha.format());
               
            },
            weekends: false,
            lang:'es'
          });
});