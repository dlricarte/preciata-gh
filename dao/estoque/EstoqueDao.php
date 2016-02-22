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
class EstoqueDao{	
	
	
	/*
	 * SALVAR
	 */
	public function salvarEstoque($estoque) {
		
		/*
		 * recupera dados do modelo de estoque
		 */
		$quantidade = $estoque->getQuantidade();
		$id = $estoque->getIdProduto();		
		
		
		/*
		 * conecta o banco de dados
		 */
		$con = new JqsConnectionFactory();
		$link = $con->conectar();
		
		
		/*
		 * comando sql
		 */
		$query = "INSERT INTO tb_estoque (quantidade_estoque, id_produto_estoque) values('$quantidade', '$id')";		
		

		/*
		 * executa query
		 */
		mysqli_query($link, $query) or die(mysqli_error($link)."Produto");
				
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
		/* $query = "select * from tb_produtos as pd join tb_precos as pc on pc.id_produto_preco = pd.id_produtos";
    	$query2 = "select * from tb_produtos as pd inner join tb_precos as pc on pc.id_produto_preco = pd.id_produtos where pd.nome_produto LIKE '$param%' or pd.codigo_produto LIKE '$param%'";
	 	*/
		
		$query = "select * from tb_produtos where codigo_produto = '$param'";
		
		if ($param == "") {
			
		}else {
			
			/*
			 * executa query
			 */
			$result = mysqli_query($link, $query) or die(mysqli_error($link));
			while($rs = mysqli_fetch_object($result)){
				$dados = $rs;
			}
			return json_encode($dados);
		}
	}//fim buscar
	
	
	/*
	 * localizar
	 */
	public function localizarEstoque($param) {
		
		/*
		 * concta o banco de dados
		 */
		$con = new JqsConnectionFactory();
		$link = $con->conectar();
		
		/*
		 * comando sql
		 */
		$query = "select * from tb_estoque as e inner join tb_produtos as p on e.id_produto_estoque = p.id_produtos where e.id_estoque = $param";
		
		/*
		 * executa query
		 */
		$result = mysqli_query($link, $query) or die(mysqli_error($link));
		
		return $result;
		
		/*
		 * retorna resultado da busca
		 */	
		
	}
	
	
	/*
	 * listar
	 */
	public function listarEstoque($param) {
	
		/*
		 * concta o banco de dados
		 */
		$con = new JqsConnectionFactory();
		$link = $con->conectar();
	
		/*
		* comando sql
		*/
		$query = "select * from tb_estoque as e inner join tb_produtos as p on e.id_produto_estoque = p.id_produtos order by p.codigo_produto";
		$query2 = "select * from tb_estoque as e inner join tb_produtos as p on e.id_produto_estoque = p.id_produtos where p.nome_produto LIKE '$param%' or p.codigo_produto LIKE '$param%' or e.quantidade_estoque = '$param'";
	
	
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
	 * listar
	 */
	public function verEstoque($param) {
	
		/*
		 * concta o banco de dados
		 */
		$con = new JqsConnectionFactory();
		$link = $con->conectar();
	
		/*
			* comando sql
		*/
		//$query = "select * from tb_estoque as e inner join tb_produtos as p on e.id_produto_estoque = p.id_produtos order by p.codigo_produto";
		$query = "select * from tb_estoque as e join tb_produtos as p on e.id_produto_estoque = p.id_produtos where p.codigo_produto = '$param'";
	
		
		/*
		 * executa query
		 */
		$result = mysqli_query($link, $query) or die(mysqli_error($link));
		
		while($rs = mysqli_fetch_object($result)){
			$dados = $rs;
		}
		return json_encode($dados);
				
	}//fim buscar
	
	
	
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
	 * ADD ESTOQUE
	 */
	public function addEstoque($estoque) {
	
		$id = $estoque->getId();
		$quantidade = $estoque->getQuantidade();	
	
		/*
		 * concta o banco de dados
		*/
		$con = new JqsConnectionFactory();
		$link = $con->conectar();
	
		/*
		 * comando sql
		*/
		$query = "update tb_estoque set quantidade_estoque = '$quantidade' where id_estoque = '$id'";
	
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