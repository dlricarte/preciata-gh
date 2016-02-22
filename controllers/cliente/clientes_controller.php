<?php 



$act = $_GET['act'];


/*
 * import de classes
 */
require_once ('../../lib/jqsImports/JqsAutoImports.php');
$JqsAutoImports = new JqsAutoImports;


/*
 * DAO
 */
if ($act == "new") {
	
	/*
	 * dados do formulário de clientes
	 */
	$nome = $_POST['nome'];
	$fone = $_POST['fone'];
	$whatsapp = $_POST['whatsapp'];
	$facebook = $_POST['facebook'];
	$email = $_POST['email'];
	$tipo = $_POST['tipo'];
	$indicacao = $_POST['indicacao'];
	$instagran = $_POST['instagran'];
	$aniversario = $_POST['aniversario'];
	
	$cep = $_POST['cep'];
	$logradouro = $_POST['logradouro'];
	$numero = $_POST['numero'];
	$bairro = $_POST['bairro'];
	$cidade = $_POST['cidade'];
	$estado = $_POST['estado'];
	$complemento = $_POST['complemento'];
	
	/*
	 * setando modelo de cliente
	 */
	$preoduto = new Cliente();
	$preoduto->setNome($nome);
	$preoduto->setFone($fone);
	$preoduto->setWhatsapp($whatsapp);
	$preoduto->setFacebook($facebook);
	$preoduto->setEmail($email);
	$preoduto->setTipo($tipo);
	$preoduto->setIndicacao($indicacao);
	$preoduto->setInstagran($instagran);
	$preoduto->setAniversario($aniversario);
	
	/*
	 * setando modelo de endereco
	 */
	$preco = new Endereco();
	$preco->setCep($cep);
	$preco->setLogradouro($logradouro);
	$preco->setNumero($numero);
	$preco->setBairro($bairro);
	$preco->setCidade($cidade);
	$preco->setEstado($estado);
	$preco->setComplemento($complemento);
	
	try {
		$precoDAO = new ClienteDao();
		$precoDAO->salvarCliente($preoduto, $preco);
		$dados['status']="success";
	} catch (Exception $e) {
		$dados['status']="fail";
	}
	echo json_encode($dados);

	
/*
 * localizar cliente
 */	
}elseif ($act == "find"){	
	
	/*
	 * concta o banco de dados
	 */
	$con = new JqsConnectionFactory();
	$link = $con->conectar();
	
	@$param = $_POST['fdBuscarCliente'];
	
	$query = "SELECT * FROM tb_clientes";
	$query2 = "SELECT * FROM tb_clientes WHERE nome_cliente LIKE '$param%' or fone_cliente LIKE '%$param'";
	
	if ($param == "") {
		$result = mysqli_query($link, $query) or die(mysqli_error($link));
			
		while($rs[] = mysqli_fetch_array($result)){
			$dados = $rs;
		}
		echo json_encode($dados);
	}else {
		$result = mysqli_query($link, $query2) or die(mysqli_error($link));
		while($rs[] = mysqli_fetch_array($result)){
			$dados = $rs;
		}
		echo json_encode($dados);
	}
	
/*
 * excluir cliente
 */
}elseif ($act == "del"){
	/*
	 * concta o banco de dados
	 */
	$con = new JqsConnectionFactory();
	$link = $con->conectar();
	
	@$id = $_POST['id'];
		
	$del = new ClienteDao();
	$del->excluirCliente($id);
	
	if($del){
		 $value['status'] = "sucesso";		
	}else{
		$value ['status'] = "erro";
	}
	echo json_encode($value);
		
/*
 * editar cliente
 */
}elseif ($act == "edit"){	
	
	/*
	 * dados do formulário de clientes
	 */
	$id = $_POST['id'];
	$nome = $_POST['nome'];
	$fone = $_POST['fone'];
	$whatsapp = $_POST['whatsapp'];
	$facebook = $_POST['facebook'];
	$email = $_POST['email'];
	$tipo = $_POST['tipo'];
	$indicacao = $_POST['indicacao'];
	$instagran = $_POST['instagran'];
	$aniversario = $_POST['aniversario'];
	
	$cep = $_POST['cep'];
	$logradouro = $_POST['logradouro'];
	$numero = $_POST['numero'];
	$bairro = $_POST['bairro'];
	$cidade = $_POST['cidade'];
	$estado = $_POST['estado'];
	$complemento = $_POST['complemento'];
	
	
	/*
	 * setando modelo de cliente
	 */
	$preoduto = new Cliente();
	$preoduto->setId($id);
	$preoduto->setNome($nome);
	$preoduto->setFone($fone);
	$preoduto->setWhatsapp($whatsapp);
	$preoduto->setFacebook($facebook);
	$preoduto->setEmail($email);
	$preoduto->setTipo($tipo);
	$preoduto->setIndicacao($indicacao);
	$preoduto->setInstagran($instagran);
	$preoduto->setAniversario($aniversario);
	
	/*
	 * setando modelo de endereco
	 */
	$preco = new Endereco();
	$preco->setCep($cep);
	$preco->setLogradouro($logradouro);
	$preco->setNumero($numero);
	$preco->setBairro($bairro);
	$preco->setCidade($cidade);
	$preco->setEstado($estado);
	$preco->setComplemento($complemento);
		
			
	$precoDAO = new ClienteDao();
	$precoDAO->editarCliente($preoduto, $preco);
	
	if($precoDAO){
		$value['status'] = "sucesso";
	}else{
		$value ['status'] = "erro";
	}
	echo json_encode($value);
	
}