
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
		maxTime: '18:00:00',
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
		resourceAreaWidth: '10%',
		resourceLabelText: 'Alunos',
		resources:{
			url: '{!! url("json/alunos/") !!}',
		},
		//Consultas
		slotWidth: '200',//tamanho do slot
		lazyFetching: true,
		events: [
			{ id: '1', resourceId: '1', start: '2016-03-21T09:00:00', end: '2016-03-21T10:00:00', title: 'event 1222222' },
			{ id: '2', resourceId: '1', start: '2016-03-21T11:00:00', end: '2016-03-21T12:00:00', title: 'event 2' },
			{ id: '3', resourceId: '2', start: '2016-03-21T13:00:00', end: '2016-03-21T14:00:00', title: 'event 4' },
		]
	});  	
});  
	// readjust sizing after font load
	$(window).on('load', function() {
		$('#calendar').fullCalendar('render');
	});
</script>
