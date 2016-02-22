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
class LoteDao{	
	
	
	/*
	 * SALVAR
	 */
	public function salvarLote($lote) {
		
		/*
		 * recupera dados do modelo de estoque
		 */
		$id_cliente = $lote->getClienteId();
		$data = $lote->getDataRegistro();
		$status = $lote->getStatus();
		
		
		/*
		 * conecta o banco de dados
		 */
		$con = new JqsConnectionFactory();
		$link = $con->conectar();
		
		
		/*
		 * comando sql
		 */
		$query = "INSERT INTO tb_lotes (id_cliente_lote, data_registro, status_lote) values('$id_cliente', '$data', '$status')";		
		

		/*
		 * executa query
		 */
		$salvar = mysqli_query($link, $query) or die(mysqli_error($link)."Lote");
		if ($salvar) {
			return true;
		}else{
			return false;
		}
				
	}
	
	
	/*
	 * SALVAR ITEN
	 */
	public function salvarIten($iten) {
	
		/*
		 * recupera dados do modelo de estoque
		 */
		$id_lote = $iten->getIdLote();
		$id_produto = $iten->getIdProduto();
		$quantidade = $iten->getQuantidade();
	
	
		/*
		 * conecta o banco de dados
		*/
		$con = new JqsConnectionFactory();
		$link = $con->conectar();
	
	
		/*
		 * comando sql
		*/
		$query = "INSERT INTO tb_itens_lote (id_lote_itens, quantidade_itens, id_produto_itens) values('$id_lote', '$quantidade', (select id_produtos from tb_produtos where codigo_produto = '$id_produto'))";
	
	
		/*
		 * executa query
		 */
		$salvar = mysqli_query($link, $query) or die(mysqli_error($link)."Lote");
		if ($salvar) {
			return true;
		}else{
			return false;
		}
	
	}

	
	/*
	 * Buscar
	 */
	public function buscarCliente($param) {
	
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
		
		$query = "select * from tb_clientes where fone_cliente Like '%$param'";
		
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
	public function localizarLoteCliente($param) {
		
		/*
		 * concta o banco de dados
		 */
		$con = new JqsConnectionFactory();
		$link = $con->conectar();
		
		/*
		 * comando sql
		 */
		$query = "select * from tb_lotes as l inner join tb_clientes as c on l.id_cliente_lote = c.id_cliente where c.id_cliente = $param order by id_lote desc limit 1";
		//$query = "select * from tb_lotes where id_lote = (last_insert_id())";
		
		
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
	 * localizar
	 */
	public function localizarLote($param) {
	
		/*
		 * concta o banco de dados
		 */
		$con = new JqsConnectionFactory();
		$link = $con->conectar();
	
		/*
		 * comando sql
		*/
		$query = "select * from tb_lotes as l join tb_clientes as c on l.id_cliente_lote = c.id_cliente where l.id_lote = $param ";
		//$query = "select * from tb_lotes where id_lote = (last_insert_id())";
	
	
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
	public function listarLote($param) {
	
		/*
		 * concta o banco de dados
		 */
		$con = new JqsConnectionFactory();
		$link = $con->conectar();
	
		/*
		* comando sql
		*/
		$query = "select * from tb_lotes as l inner join tb_clientes as c on l.id_cliente_lote = c.id_cliente order by l.data_registro";
	   $query2 = "select * from tb_lotes as l inner join tb_clientes as c on l.id_cliente_lote = c.id_cliente where l.id_lote = $param or l.data_registro LIKE '%$param%' or l.status_lote = '$param' or c.fone_cliente LIKE '%$param' ";
	
	
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
	 * lista itens do lote
	 */
	public function listarItensLote($param){
		
		/*
		 * concta o banco de dados
		 */
		$con = new JqsConnectionFactory();
		$link = $con->conectar();
		
		$query = "select * from tb_itens_lote as il join tb_produtos as p on p.id_produtos = il.id_produto_itens join tb_precos as prc on prc.id_produto_preco = p.id_produtos where il.id_lote_itens = $param";
		
		$list = mysqli_query($link, $query) or die(mysqli_error($link));
		
		while($rs[] = mysqli_fetch_array($list)){
			$dados = $rs;
		}
		return json_encode($dados);
		
	}
	
	
	
	/*
	 * lista itens para etiquetas etiquetas
	 */
	public function listarItensLoteEtiquetas($param){
	
		/*
		 * concta o banco de dados
		 */
		$con = new JqsConnectionFactory();
		$link = $con->conectar();
	
		$query = "select * from tb_itens_lote as il join tb_produtos as p on p.id_produtos = il.id_produto_itens join tb_precos as prc on prc.id_produto_preco = p.id_produtos where il.id_lote_itens = $param";
	
		$list = mysqli_query($link, $query) or die(mysqli_error($link));
	
		while($rs[] = mysqli_fetch_array($list)){ }
		
		return $rs;	
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
	 * ADD ESTOQUE
	 */
	public function finalizarLote($lote) {
	
		$id = $lote->getId();
		$quantidade = $lote->getQuantidadeItens();
		$valor = $lote->getValor();
	
		/*
		 * concta o banco de dados
		*/
		$con = new JqsConnectionFactory();
		$link = $con->conectar();
	
		/*
		 * comando sql
		*/
		$query = "update tb_lotes set quantidade_itens = '$quantidade', valor_lote = '$valor' where id_lote = '$id'";
	
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