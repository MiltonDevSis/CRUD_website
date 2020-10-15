<?php
/*
	Classe Autenticacao
	Esta classe controla a autenticação do usuário no sistema
*/
class Autenticacao {
	/*
		Método isSenhaForte
		#type: static
		@senha: Senha informada pelo usuário
		#return: Boolean

		Este método valida se a senha é considera forte		
	*/
	public static function isSenhaForte($senha){
		return self::isIntervaloCaracteresValidados($senha);
	}
	
	/*
		Método isIntervaloCaracteresValidados
		#type: static
		@senha: Senha informada pelo usuário
		#return: Boolean

		Valida se a quantidade de caracteres da senha		
	*/	
	private static function isIntervaloCaracteresValidados($senha){
		if (strlen($senha) >= 8 && strlen($senha) <= 32){
			return true;
		}
		return false;
	}
}