
<!-- 
	jQuery Agenda
-->
<script src="{{ asset('/bower_components/moment/min/moment.min.js')}}"> </script>
<script
	src="{{ asset('/bower_components/fullcalendar/dist/fullcalendar.min.js')}}"> </script>
<script
	src="{{ asset('/bower_components/fullcalendar/dist/lang/pt-br.js')}}"></script>
<script
	src="{{ asset('/bower_components/fullcalendar-scheduler/dist/scheduler.min.js')}}"></script>

<script>  
$(function() { // dom ready 
	$('#calendar').fullCalendar({ 
	    schedulerLicenseKey: 'CC-Attribution-NonCommercial-NoDerivatives', // Licença
		theme: true, //Tema
		now: '{!! $dataAtual !!}', // Set data atual
		scrollTime: '{!! $horaAtual !!}', //Set hora atual
		editable: false, // enable draggable events
		aspectRatio: 3.8, // tamanho height
		weekends: false, // escondo finais de semana
		hiddenDays: [5], // escondo a sexta feira
		businessHours: { //horario de funcionamento para os dias da semana
		    start: '09:00',  
		    end: '17:00', 
		    dow: [ 1, 2, 3, 4 ] 
		},
		minTime: '09:00:00',
		maxTime: '17:00:00',
		//Cabeçalho
		header: {
			left: 'today prev,next',
			center: 'title',
			right: 'timelineDay,agendaWeek,month'
		},
		defaultView: 'timelineDay', 
		views: {
			timelineDay: {
				slotDuration: '01:00' //1 hora de duração
			},
		},
		//Alunos
		resourceAreaWidth: '20%',
		resourceLabelText: 'Alunos',
		resources:{
			url: '{!! url("json/alunos/") !!}',
		},
		//Consultas
		slotWidth: '200',//tamanho do slot
		lazyFetching: true,
		events: [
			{ id: '1', resourceId: '1', start: '2016-03-21T09:00:00-03:00', end: '2016-03-21T10:00:00-03:00', title: 'event 1222222' },
			{ id: '2', resourceId: '1', start: '2016-03-21T11:00:00-03:00', end: '2016-03-21T12:00:00-03:00', title: 'event 2' },
			{ id: '3', resourceId: '2', start: '2016-03-21T13:00:00-03:00', end: '2016-03-21T14:00:00-03:00', title: 'event 4' },
		], 
		eventClick: function(calEvent, jsEvent, view) { 
	        var events = $('#calendar').fullCalendar('clientEvents'); 
	        
	        alert('Event: ' + calEvent.title);
	        alert('Coordinates: ' + jsEvent.pageX + ',' + jsEvent.pageY);
	        alert('View: ' + view.name); 

	        // change the border color just for fun
	        $(this).css('border-color', 'red');

	    },
	    dayClick: function (date, jsEvent, view, resourceObj) {
		    //Eventos apenas na timelineday
	        if( view.name == 'timelineDay'){ 
			    //recupero todos os eventos
		        var events = $('#calendar').fullCalendar('clientEvents');
		        for (var i = 0; i < events.length; i++) { 
		            if (moment(date).isSame(moment(events[i].start))) {
						//Caso tenha evento marcado, disponibilizo a opção para desmarca-lo.
						alert(1);
		                break;
		            }
		            else if (i == events.length - 1) {  
						//Marco a consulta 
						if(verificarHorario(date)){
							marcarConsulta( moment(date.format()), moment(date.format()).add(1, 'h'), resourceObj);
						}
		            }
		        }
	        }//end if
	    }
	});  	
});    
//Verificar se é horario de almoço
function verificarHorario(date){
	//Horário do evento 
	var hora = date.format('HH');
	/*
	A variavel date obtida no evento dayClick do full calendar vem sem o GTM
	Passo ela como parametro para o moment(), assim ele me tras com GMT local.
	A o metodo isBefore do moment, por não receber parametro está comparando a data do evento com a atual.
	*/
	var data_evento = moment(date.format()); 
 
	if (data_evento.isBefore()){
		swal("Atenção","Não é possível marcar uma consulta para um horário anterior.","info");
		return false;
	}else if(hora == 12){
		swal("Atenção","Horário de almoço","info");
		return false;
	}else{
		return true;
	}
}
//Marcar consulta
function marcarConsulta(start, end, resourceObj){  
	swal({   
		html: true,
		title: "Deseja marcar uma consulta?",   
		text:  "Aluno: " + resourceObj.title +"<br>Início: " + start.format("DD/MM/YYYY") + " às " + start.format("HH:mm:ss") + "<br>Término: " +  end.format("DD/MM/YYYY") + " às " + end.format("HH:mm:ss"),   
		type: "info",   
		showCancelButton: true,   
		confirmButtonColor: "#00a65a",   
		confirmButtonText: "Sim",   
		cancelButtonText: "Não",   
		closeOnConfirm: true,   
		closeOnCancel: true 
	}, function(isConfirm){   
		if (isConfirm) {   
			$.redirect(
				"{!! url('agenda/marcar') !!}", 
				{ 
					events_start: start.format(), 
					events_end: end.format(), 
					aluno_id: resourceObj.id, 
					aluno_nome: resourceObj.title, 
					_token: '{!! csrf_token() !!}'
				}
			);  
// 			$.post( 
// 				"{!! url('agenda/marcar') !!}", 
// 				{ 
// 					events_start: start.format(), 
// 					events_end: end.format(), 
// 					aluno_id: resourceObj.id, 
// 					aluno_nome: resourceObj.title, 
// 					_token: '{!! csrf_token() !!}'
// 				}, 
// 				function( data ) {
// 		  			console.log( data ); // John  
// 				}
// 			); 
		} 
	});
}
// readjust sizing after font load
$(window).on('load', function() {
	$('#calendar').fullCalendar('render');
});
</script>
