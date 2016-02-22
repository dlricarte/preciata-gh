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
	 * dados do formulário de produto
	 */
	echo $idProduto = $_POST['id'];
	echo $quantidade = $_POST['quantidade'];
	
	
	/*
	 * setando modelo de produto
	 */
	$est = new Estoque();
	$est->setIdProduto($idProduto);
	$est->setQuantidade($quantidade);
		
	$estoqueDAO = new EstoqueDao();
	
	$estoqueDAO->salvarEstoque($est);

	
/*
 * localizar produto
 */	
}elseif ($act == "find_prod"){
	
	$param = $_POST['fdBuscarProduto'];
	
	$estoqueDao = new EstoqueDao();
	$rs = $estoqueDao->buscarProduto($param);
	
	echo $rs;


/*
 * localizar produtos em estoque
 */	
}elseif ($act == "find"){
	
	$param = $_POST['fdBuscarEstoque'];
	
	$estoqueDao = new EstoqueDao();
	$rs = $estoqueDao->listarEstoque($param);
	
	echo $rs;

/*
 * Listar produtos em estoque
 */	
}elseif ($act == "list"){
	
	$param = $_POST['fdBuscarEstoque'];
	
	$estoqueDao = new EstoqueDao();
	$rs = $estoqueDao->listarEstoque($param);
	
	echo $rs;
	
/*
 * excluir cliente
 */
}elseif ($act == "ver_estoque"){
	
	$param = $_POST['fdBuscarProduto'];
	
	$estoqueDao = new EstoqueDao();
	$rs = $estoqueDao->verEstoque($param);
	
	echo $rs;
	
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
		
	$del = new ProdutoDao();
	$del->excluirProduto($id);
	
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
	 * dados do formulário de produto
	 */
	$id = $_POST['id'];
	$v1 = $_POST['add-quantidade'];
	$v2 = $_POST['quantidade'];
	
	
	$total = $v1 + $v2;
	
		
	/*
	 * setando modelo de produto
	*/
	$estoque = new Estoque();
	$estoque->setId($id);
	$estoque->setQuantidade($total);
	
	$estoqueDAO = new EstoqueDao();
	$estoqueDAO->addEstoque($estoque);
	
	if($estoqueDAO){
		$value['status'] = "sucesso";
	}else{
		$value ['status'] = "erro";
	}
	echo json_encode($value);	
}