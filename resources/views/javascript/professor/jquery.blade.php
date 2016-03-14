
<!-- 
		jQuery Aluno
	 -->

<script>

	function removerProfessor(id) {
		swal({   
			title: "Confirmar exclusão ?",
		    text: "Não será possível recuperar o professor",         
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
				$("#formRemoverProfessor"+id).submit();
		});
	}

	$('button[remover-professor=true]').on('click', function() {
		removerProfessor($(this).attr("data-id"));
	});
	</script>