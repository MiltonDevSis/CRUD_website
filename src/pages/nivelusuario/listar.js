function excluir(id){
	if ( confirm('Tem certeza que deseja excluir!') ){
		window.location.href = "excluir_nivelusuario.php?id=" + id;

	}
}	