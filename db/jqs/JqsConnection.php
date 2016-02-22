<?php
/************************************
 * JQS - CONEXÄ‚ÂƒO COM BANCO DE DADOS
 * MYSQL
 ***********************************/
	
class JqsConnection{
	
	/*
	* abre conexÄ‚Å�o com o banco de dados mysql
	* @throws
	*/	
	public function jqsOpenConnection($host, $user, $password, $banco){
		
		/*
		 * tenta conectar o banco
		 */
		$conn = mysqli_connect($host, $user, $password, $banco);
		$charset = mysqli_set_charset($conn, "utf8");
		/*
		 * verifica se a conexÄƒo falhou
		 */
		if (mysqli_connect_errno()) {
			print('<center><br>Falha na conexão.<br>'.mysql_error().'<br>');
		}else {
			return $conn;
		}				
	}
}