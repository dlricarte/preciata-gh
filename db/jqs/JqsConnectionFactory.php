<?php 

/**
 * @author jaques
 *
 */

/*
 * imports das classes utilizadas
 */
require_once ('../../lib/jqsImports/JqsAutoImports.php');
$JqsAutoImports = new JqsAutoImports;

class JqsConnectionFactory{
	
	/*
	 * conecta o banco de dados 
	 */
	public function conectar(){
		$jqsConn = new JqsConnection();
		$myConn = $jqsConn->jqsOpenConnection("localhost", "root", "123456", "preciata");
		//$myConn = $jqsConn->jqsOpenConnection("mysql.hostinger.com.br", "u714219368_root", "preciata123", "u714219368_preci");
		
		return $myConn;
	}
}