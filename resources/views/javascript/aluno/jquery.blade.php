
<!-- 
		jQuery Aluno
	 -->

<script>

	function removerAluno(id) {
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
				$("#formRemoverAluno"+id).submit();
		});
	}

	$('button[remover-aluno=true]').on('click', function() {
		removerAluno($(this).attr("data-id"));
	});
	</script>