<script type="text/javascript">
			function excluir(id){
				if ( confirm('Tem certeza que deseja excluir!') ){
					window.location.href = "excluir_nivelusuario.php?id=" + id;
				}else{
					alert('Não');
				}
			}	
</script>