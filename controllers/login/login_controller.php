<?php

/*
 * dados do usuario
 */
$usuario = $_POST['usuario'];
$senha = $_POST['senha'];

/*
 * import de classes
 */
require_once ('../../lib/jqsImports/JqsAutoImports.php');
$JqsAutoImports = new JqsAutoImports;

/*
 * verifica se dados do usuario estao vazios
 */
if ($usuario == null or $senha == null) {
	//header("Location:../views/login");
	header("Location:../../views/inicio");
}else{	
	header("Location:../../views/inicio");
	
	/* $login = new Login();
	$login->setUsuario($usuario);
	$login->setSenha($senha); */
}