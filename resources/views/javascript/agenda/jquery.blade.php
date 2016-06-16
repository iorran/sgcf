
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
		now: '{!! date ( "Y-m-d" ) !!}', // Set data atual
		scrollTime: '{!! date ( "H:i" ) !!}', //Set hora atual
		editable: false, // enable draggable events
		aspectRatio: 3.3, // tamanho height
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
				slotDuration: '01:00', //1 hora de duração 
				slotLabelFormat: 'H:mm'
			},
		},
		//Alunos
		resourceAreaWidth: '20%',
		resourceLabelText: 'Alunos',
		resources:{
			url: '{!! url("json/alunos/") !!}',
		},
		//Consultas
		slotWidth: '100',//tamanho do slot
		lazyFetching: true, 
		eventSources: [ 
	        // your event source
	        {
	        	url: '{!! url("json/agendas/") !!}',
	            color: 'green',    // an option!
	            cache: true,
	            error: function() {
	            	swal("Problemas para carregar as consultas", "Tente novamente");
	            },
	        } 
	    ],
		/*
			Eventos
		*/
		eventClick: function(calEvent, jsEvent, view) {
			/*
			Verifico se a data do evento clicado ainda não passou
			assim defino se o botão de iniciar a consulta deverá ser apresentado ou não.
			*/
			var editavel = moment(calEvent.start).isAfter();   
	        gerenciarConsulta(calEvent,editavel); 
	    },
	    dayClick: function (date, jsEvent, view, resourceObj) {
		    //Eventos apenas na timelineday
	        if( view.name == 'timelineDay'){ 
			    //recupero todos os eventos
		        var events = $('#calendar').fullCalendar('clientEvents'); 
 				if( events.length != 0 ){
			        for (var i = 0; i < events.length; i++) { 
				        //Caso tenha evento marcado, disponibilizo a opção para gerencia-lo. 
			        	if ( moment(date.format()).isSame(events[i].start.format()) && events[i].resourceId == resourceObj.id) {
							var editavel = verificarHorario(date,false);
					        gerenciarConsulta(events[i],editavel);
				        	break;// necessita do break, o for percorre todos os eventos do dia. Caso encontre o evento onde foi clicado forço a parada.
			            }
			            else if (i == events.length - 1) {  
							//Marco a consulta 
							if(verificarHorario(date,true)){
								marcarConsulta( moment(date.format()), moment(date.format()).add(1, 'h'), resourceObj);
							}
			            }
			        }
 				}else{
 	 				//Marco a consulta 
					if(verificarHorario(date,true)){
						marcarConsulta( moment(date.format()), moment(date.format()).add(1, 'h'), resourceObj);
					}
 				}
	        }//end if
	    }
	});  	
});    
/*
 * Verificar se é horario de almoço
 * Verificar se ainda é possivel marcar a consulta
 * A mensagem exibida é flexivel
 */
function verificarHorario(date,exibirMsg){
	//Horário do evento 
	var hora = date.format('HH');
	/*
	A variavel date obtida no evento dayClick do full calendar vem sem o GTM
	Passo ela como parametro para o moment(), assim ele me tras com GMT local.
	A o metodo isBefore do moment, por não receber parametro está comparando a data do evento com a atual.
	*/
	var data_evento = moment(date.format()); 
 
	if (data_evento.isBefore()){
		if(exibirMsg)
			swal("Atenção","Impossível alterar uma data anterior a atual.","info");
		return false;
	}else if(hora == 12){ 
		if(exibirMsg)
			swal("Atenção","Horário de almoço","info");
		return false;
	}else{
		return true;
	}
}
//Marcar consulta
function marcarConsulta(start, end, resourceObj){   
	if( {!! Session('usuario.0.perfil') !!}  == 1){ // Somente professor marca as consultas
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
					"{!! route('agenda.create') !!}", 
					{ 
						events_start: start.format(), 
						events_end: end.format(), 
						aluno_id: resourceObj.id, 
						aluno_nome: resourceObj.title, 
						_token: '{!! csrf_token() !!}'
					}
				);  
			} 
		});
	}
}
//Gerenciar a consulta 
function gerenciarConsulta(param,param2){
	var evento = param;
	var editavel = param2; 
	swal({   
		html: true,
		title: "Gerenciar consulta",   
		text : "Paciente: "+ evento.title +"<br>Início: " + evento.start.format("DD/MM/YYYY") + " às " + evento.start.format("HH:mm:ss") + "<br>Término: " +  evento.end.format("DD/MM/YYYY") + " às " + evento.end.format("HH:mm:ss"),   
		type: "info",   
		showCancelButton: true,   
		confirmButtonColor: "#00a65a",   
		confirmButtonText: "Abrir painel",   
		cancelButtonText: "Cancelar",   
		closeOnConfirm: true,   
		closeOnCancel: true 
	}, function(isConfirm){   
		if (isConfirm) {    
			$.redirect( 
				"{!! url('agenda/detalhes') !!}", 
				{ 
					events_id: evento.id, 
					editavel: editavel, 
					_token: '{!! csrf_token() !!}'
				}
			);  
		} 
	});
}
//Desmarcar a consulta
function desmarcarConsulta(id) {
	swal({   
		title: "Deseja realmente desmarcar ?",
	    text: "Você poderá remarca-la.",         
	    type: "warning",   
	    showCancelButton: true,   
	    confirmButtonColor: "#d9534f",
	    confirmButtonText: "Confirmar", 
	    cancelButtonText: "Cancelar", 
	    closeOnConfirm: false,
	    showLoaderOnConfirm: true
	}, 
	function(isConfirm){    
		if(isConfirm){ 
			$.redirect( 
				"{!! url('agenda/desmarcarConsulta') !!}", 
				{  
					id : id,  
					_token: '{!! csrf_token() !!}'
				}
			); 
		} 
	}); 
}

$('a[desmarcar-consulta="true"]').on('click', function() { 
	desmarcarConsulta($(this).attr('data-id')); 
});

//Iniciar Tratamento  
$('a[iniciar_tratamento="true"]').on('click', function() {
	$.redirect( 
		"{!! route('tratamento.iniciar') !!}", 
		{  
			id : $(this).attr('data-id'),  
			_token: '{!! csrf_token() !!}'
		}
	);  
});

// readjust sizing after font load
$(window).on('load', function() {
	$('#calendar').fullCalendar('render');
});
</script>
