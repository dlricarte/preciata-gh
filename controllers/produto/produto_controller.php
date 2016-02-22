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
	$codigo = $_POST['codigo'];
	$nome = $_POST['nome'];
	$descricao = $_POST['descricao'];
	$imagem = $_POST['imagem'];	
	
	$compra = $_POST['compra'];
	$venda = $_POST['venda'];
	$revenda = $_POST['revenda'];
	
	
	/*
	 * setando modelo de produto
	 */
	$produto = new Produto();
	$produto->setCodigo($codigo);
	$produto->setNome($nome);
	$produto->setDescricao($descricao);
	$produto->setUrlImagem($imagem);	
	
	/*
	 * setando modelo de preços
	 */
	$preco = new Preco();
	$preco->setCompra($compra);
	$preco->setVenda($venda);
	$preco->setReVenda($revenda);
	
	try {
		$precoDAO = new ProdutoDao();
		$precoDAO->salvarProduto($produto, $preco);
		$dados['status']="success";
	} catch (Exception $e) {
		$dados['status']="fail";
	}
	echo json_encode($dados);

	
/*
 * localizar produto
 */	
}elseif ($act == "find"){
	
	@$param = $_POST['fdBuscarProduto'];
	
	$produtoDao = new ProdutoDao();
	$rs = $produtoDao->buscarProduto($param);
	
	echo $rs;
	
	/*
	 * concta o banco de dados
	 *
	$con = new JqsConnectionFactory();
	$link = $con->conectar();
	
	@$param = $_POST['fdBuscarProduto'];
	
	//$query = "select * from tb_produtos inner join tb_precos on id_produto_preco = id_produto where id_ = $param";
	$query = "select * from tb_produtos as pd join tb_precos as pc on pc.id_produto_preco = pd.id_produtos";
    $query2 = "select * from tb_produtos as pd inner join tb_precos as pc on pc.id_produto_preco = pd.id_produtos where pd.nome_produto LIKE '$param%' or pd.codigo_produto LIKE '$param%'";
	
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
	}*/
	
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
	$codigo = $_POST['codigo'];
	$nome = $_POST['nome'];
	$descricao = $_POST['descricao'];
	$imagem = $_POST['imagem'];
	
	$compra = $_POST['compra'];
	$venda = $_POST['venda'];
	$revenda = $_POST['revenda'];
	
	
	/*
	 * setando modelo de produto
	*/
	$produto = new Produto();
	$produto->setId($id);
	$produto->setCodigo($codigo);
	$produto->setNome($nome);
	$produto->setDescricao($descricao);
	$produto->setUrlImagem($imagem);
	
	/*
	 * setando modelo de preços
	*/
	$preco = new Preco();
	$preco->setCompra($compra);
	$preco->setVenda($venda);
	$preco->setReVenda($revenda);
	
	$produtoDAO = new ProdutoDao();
	$produtoDAO->editarProduto($produto, $preco);
	
	if($produtoDAO){
		$value['status'] = "sucesso";
	}else{
		$value ['status'] = "erro";
	}
	echo json_encode($value);	
}