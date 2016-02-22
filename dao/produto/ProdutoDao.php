<?php
/**
 * @author jaques
 *
 */
 

/*
 * import de classes
 */
require_once ('../../lib/jqsImports/JqsAutoImports.php');
$JqsAutoImports = new JqsAutoImports;


/*
 * inicio da classe 
 */
class ProdutoDao{	
	
	
	/*
	 * SALVAR
	 */
	public function salvarProduto($produto, $preco) {
		
		$codigo = $produto->getCodigo();
		$nome = $produto->getNome();
		$descricao = $produto->getDescricao();
		$imagem = $produto->getUrlImagem();
		
		
		$compra = $preco->getCompra();
		$venda = $preco->getVenda();
		$revenda = $preco->getReVenda();
		
		
		/*
		 * conecta o banco de dados
		 */
		$con = new JqsConnectionFactory();
		$link = $con->conectar();
		
		
		$query = "INSERT INTO tb_produtos (codigo_produto, nome_produto, descricao_produto, url_imagem) 
		values('$codigo', '$nome', '$descricao', '$imagem')";
		
		$query2 = "INSERT INTO tb_precos (preco_compra, preco_venda, preco_revenda, id_produto_preco) 
		values('$compra', '$venda', '$revenda', last_insert_id() )";
		
		try {
			mysqli_autocommit($link, FALSE);
			
			mysqli_query($link, $query) or die(mysqli_error($link)."Produto");
			mysqli_query($link, $query2) or die(mysqli_error($link)."Preço");
			
			mysqli_commit($link);
			mysqli_autocommit($link, TRUE);			
			
		} catch (Exception $e) {
			mysqli_rollback($link);
			echo $e;
		}
	}
	
	
	
	/*
	 * Buscar
	 */
	public function buscarProduto($param) {
	
		/*
		 * concta o banco de dados
		 */
		$con = new JqsConnectionFactory();
		$link = $con->conectar();
	
		/*
		 * comando sql
		 */
		$query = "select * from tb_produtos as pd join tb_precos as pc on pc.id_produto_preco = pd.id_produtos order by pd.codigo_produto";
        $query2 = "select * from tb_produtos as pd inner join tb_precos as pc on pc.id_produto_preco = pd.id_produtos where pd.nome_produto LIKE '$param%' or pd.codigo_produto LIKE '$param%'";
	
		
		if ($param == "") {
			
			/*
			 * executa query
			 */
			$result = mysqli_query($link, $query) or die(mysqli_error($link));
				
			while($rs[] = mysqli_fetch_array($result)){
				$dados = $rs;
			}
			return json_encode($dados);
		}else {
			
			/*
			 * executa query
			 */
			$result = mysqli_query($link, $query2) or die(mysqli_error($link));
			while($rs[] = mysqli_fetch_array($result)){
				$dados = $rs;
			}
			return json_encode($dados);
		}
	}//fim buscar
	
	
	/*
	 * localizar
	 */
	public function localizarProduto($param) {
		
		/*
		 * concta o banco de dados
		 */
		$con = new JqsConnectionFactory();
		$link = $con->conectar();
		
		/*
		 * comando sql
		 */
		$query = "select * from tb_produtos inner join tb_precos on id_produto_preco = id_produtos where id_produtos = $param or nome_produto = $param";
		
		/*
		 * executa query
		 */
		$result = mysqli_query($link, $query) or die(mysqli_error($link));
		
		/*
		 * retorna resultado da busca
		 */
		return $result;
		
	}
	
	/*
	 * EXCLUIR
	 *
	 */
	public function excluirProduto($id) {
	
		/*
		 * concta o banco de dados
		 */
		$con = new JqsConnectionFactory();
		$link = $con->conectar();
	
	
		//$query1 = "delete from tb_enderecos where id_cliente_endereco = $id";
		$query = "delete from tb_produtos where id_produtos = $id";
	
		//$result1 = mysqli_query($link, $query1) or die(mysqli_error($link));
		$result = mysqli_query($link, $query) or die(mysqli_error($link));
	
		if($result){
			$sucesso = true;
		}else{
			$sucesso = false;
		}
		return $sucesso;
	}
	
	/*
	 * EDITAR CLIENTE
	 */
	public function editarProduto($produto, $preco) {
	
		$id = $produto->getId();
		$codigo = $produto->getCodigo();
		$nome = $produto->getNome();
		$descricao = $produto->getDescricao();
		$imagem = $produto->getUrlImagem();
		
		
		$compra = $preco->getCompra();
		$venda = $preco->getVenda();
		$revenda = $preco->getReVenda();
	
	
		/*
		 * concta o banco de dados
		*/
		$con = new JqsConnectionFactory();
		$link = $con->conectar();
	
		/*
		 * comando sql
		*/
		$query = "update tb_produtos as pd inner join tb_precos as pc set pd.nome_produto = '$nome', pd.codigo_produto = '$codigo', 
		pd.descricao_produto = '$descricao', pd.url_imagem = '$imagem', pc.preco_compra = '$compra', pc.preco_venda = '$venda', 
		pc.preco_revenda = '$revenda' where pc.id_produto_preco = pd.id_produtos and pd.id_produtos = $id;";
	
		/*
		 * executa query
		 */
		$ditar = mysqli_query($link, $query) or die(mysqli_error($link));
	
	
		if($ditar){
			$sucesso = true;
		}else{
			$sucesso = false;
		}
		return $sucesso;
	}
}