
<!-- 
		jQuery Aluno
	 -->

<script>

	function removerPaciente(id) {
		swal({   
			title: "Confirmar exclusão ?",
		    text: "O registro será desativado",      
		    type: "warning",   
		    showCancelButton: true,   
		    confirmButtonColor: "#d9534f",
		    confirmButtonText: "Confirmar", 
		    cancelButtonText: "Cancelar", 
		    closeOnConfirm: false,
		    showLoaderOnConfirm: true
		}, 
		function(isConfirm){   
			if(isConfirm)
				$("#formRemoverPaciente"+id).submit();
		});
	}

	$('button[remover-paciente=true]').on('click', function() {
		removerPaciente($(this).attr("data-id"));
	});

	
	$('#control_aba_1').on('click', function() { 
		$("#tab_1").removeClass('active');
		$("#aba_1").removeClass('active');
		$("#aba_2").addClass('active');
		$("#tab_2").addClass('active');
	});

	//usava quando cep era obrigatorio
	@if($errors->has('cep'))
		$("#aba_2").addClass('active');
		$("#tab_2").addClass('active');
		$("#tab_1").removeClass('active');
		$("#aba_1").removeClass('active');
	@else
		$("#aba_1").addClass('active');
		$("#tab_1").addClass('active');
		$("#tab_2").removeClass('active');
		$("#aba_2").removeClass('active');
	@endif
	
</script>