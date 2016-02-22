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
	$id = $_POST['id'];
	//$quantidade = $_POST['quantidade'];
	
	
	/*
	 * setando modelo de produto
	 */
	$lote = new Lote();
	$lote->setClienteId($id);
	$lote->setDataRegistro(date('d/m/Y'));
	
		
	$loteDAO = new LoteDao();
	$salvar = $loteDAO->salvarLote($lote);
	
	if($salvar){
		 $value['status'] = "sucesso";		
	}else{
		$value ['status'] = "erro";
	}
	echo json_encode($value);
	
/*
 * add itens ao lote
 */	
}elseif ($act == "new_iten") {
	
	/*
	 * dados do formulário de produto
	 */
	$idProduto = $_POST['fdBuscarProduto'];
	$idLote = $_POST['idLote'];
	$quantidade = $_POST['fdQuantidade'];
	
	
	/*
	 * setando modelo de produto
	 */
	$lt = new Iten();
	$lt->setIdLote($idLote);
	$lt->setIdProduto($idProduto);
	$lt->setQuantidade($quantidade);
	
	
		
	$loteDAO = new LoteDao();
	$salvar = $loteDAO->salvarIten($lt);
	
	if($salvar){
		 $value['status'] = "sucesso";		
	}else{
		$value ['status'] = "erro";
	}
	echo json_encode($value);
	
/*
 * localizar produto
 */	
}elseif ($act == "find_cli"){
	
	$param = $_POST['fdBuscarCliente'];
	
	$loteDao = new LoteDao();
	$rs = $loteDao->buscarCliente($param);
	
	echo $rs;


/*
 * localizar produtos em estoque
 */	
}elseif ($act == "find"){
	
	@$param = $_POST['fdBuscarEstoque'];
	
	$estoqueDao = new EstoqueDao();
	$rs = $estoqueDao->listarEstoque($param);
	
	echo $rs;

/*
 * Listar lotes
 */	
}elseif ($act == "list"){
	
	$param = $_POST['fdBuscarLote'];
	
	$loteDao = new LoteDao();
	$rs = $loteDao->listarLote($param);
	
	echo $rs;
	
/*
 * excluir cliente
 */
}elseif ($act == "list_itens"){
	
	@$param = $_POST['idLote'];

	$loteDao = new LoteDao();
	$rs = $loteDao->listarItensLote($param);

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
	 * dados do formulário de lote
	 */
	$quantidade = $_POST['fdQuantidadeItens'];
	$total = $_POST['vlTotal'];
	$idLote = $_POST['idLote'];
	
	/*
	 * setando modelo de produto
	 */
	$lt = new Lote();
	$lt->setQuantidadeItens($quantidade);
	$lt->setValor($total);
	$lt->setId($idLote);
		
	
	$loteDAO = new LoteDao();
	$salvar = $loteDAO->finalizarLote($lt);
	
	
	if($salvar){
		$value['status'] = "sucesso";
	}else{
		$value ['status'] = "erro";
	}
	echo json_encode($value);	
}