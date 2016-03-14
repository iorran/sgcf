
<!-- 
		jQuery Aluno
	 -->

<script>

	function removerPaciente(id) {
		swal({   
			title: "Confirmar exclusão ?",
		    text: "Não será possível recuperar o paciente",         
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
	</script>