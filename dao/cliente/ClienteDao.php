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
class ClienteDao{	
	
	
	/*
	 * SALVAR
	 */
	public function salvarCliente($cliente, $endereco) {		
		
		$nome = $cliente->getNome();
		$fone = $cliente->getFone();
		$email = $cliente->getEmail();
		$instagran = $cliente->getInstagran();
		$indicacao = $cliente->getIndicacao();
		$tipo = $cliente->getTipo();
		$whatsapp = $cliente->getWhatsapp();
		$aniversario = $cliente->getAniversario();
		$facebook = $cliente->getFacebook();
		
		//$endereco = new Endereco();
		$logradouro = $endereco->getLogradouro();
		$numero = $endereco->getNumero();
		$bairro = $endereco->getBairro();
		$cidade = $endereco->getCidade();
		$estado = $endereco->getEstado();
		$cep = $endereco->getCep();
		$complemento = $endereco->getComplemento();
		
		
		/*
		 * conecta o banco de dados
		 */
		$con = new JqsConnectionFactory();
		$link = $con->conectar();
		
		
		$query = "INSERT INTO tb_clientes (nome_cliente, fone_cliente, email_cliente, instagran_cliente, indicacao_cliente, tipo_cliente, whatsapp_cliente, aniversario_cliente, facebook_cliente) 
		values('$nome', '$fone', '$email', '$instagran', '$indicacao', '$tipo', '$whatsapp', '$aniversario', '$facebook')";
		
		$query2 = "INSERT INTO tb_enderecos (logradouro_endereco, numero_endereco, bairro_edereco, cidade_endereco, 
		estado_endereco, cep_endereco, complemento_endereco, id_cliente_endereco) values('$logradouro','$numero',
		'$bairro', '$cidade', '$estado', '$cep', '$complemento', last_insert_id())";
		
		try {
			mysqli_autocommit($link, FALSE);
			
			mysqli_query($link, $query) or die(mysqli_error($link)."cliente");
			mysqli_query($link, $query2) or die(mysqli_error($link)."endereço");;
			
			mysqli_commit($link);
			mysqli_autocommit($link, TRUE);			
			
		} catch (Exception $e) {
			mysqli_rollback($link);
			echo $e;
		}
	}
	
	
	/*
	 * EXCLUIR
	 * 
	 */
	public function excluirCliente($id) {		
		
		/*
		 * concta o banco de dados
		 */
		$con = new JqsConnectionFactory();
		$link = $con->conectar();		
		
		
		//$query1 = "delete from tb_enderecos where id_cliente_endereco = $id";
		$query = "delete from tb_clientes where id_cliente = $id";
		
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
	 * LISTAR CLIENTES
	 */
	public function listarCliente($param) {	
		
		/*
		 * concta o banco de dados
		 */
		$con = new JqsConnectionFactory();
		$link = $con->conectar();
		
				
		$query = "SELECT * FROM tb_clientes";
		$query2 = "SELECT * FROM tb_clientes WHERE nome_cliente LIKE '$param%'";
		
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
			return json_encode($dados);
		}
	}// fim de listar clientes
	
	
	/*
	 * LOCALIZAR CLIENTE
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
		$query = "select * from tb_clientes inner join tb_enderecos on id_cliente_endereco = id_cliente where id_cliente = $param";
		
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
	 * EDITAR CLIENTE
	 */
	public function editarCliente($cliente, $endereco) {		
		
		$id = $cliente->getId();
		$nome = $cliente->getNome();
		$fone = $cliente->getFone();
		$email = $cliente->getEmail();
		$instagran = $cliente->getInstagran();
		$indicacao = $cliente->getIndicacao();
		$tipo = $cliente->getTipo();
		$whatsapp = $cliente->getWhatsapp();
		$aniversario = $cliente->getAniversario();
		$facebook = $cliente->getFacebook();
		
		//$endereco = new Endereco();
		$logradouro = $endereco->getLogradouro();
		$numero = $endereco->getNumero();
		$bairro = $endereco->getBairro();
		$cidade = $endereco->getCidade();
		$estado = $endereco->getEstado();
		$cep = $endereco->getCep();
		$complemento = $endereco->getComplemento();
		
		
		/*
		 * concta o banco de dados
		 */
		$con = new JqsConnectionFactory();
		$link = $con->conectar();
		
		/*
		 * comando sql
		 */
		$query = "update tb_clientes as c inner join tb_enderecos as e set c.nome_cliente = '$nome', c.fone_cliente = '$fone', c.email_cliente = '$email', c.instagran_cliente = '$instagran', 
		c.indicacao_cliente = '$indicacao', c.tipo_cliente = '$tipo', c.whatsapp_cliente = '$whatsapp', c.aniversario_cliente = '$aniversario', c.facebook_cliente = '$facebook', 
		e.logradouro_endereco = '$logradouro', e.numero_endereco = '$numero', e.bairro_edereco = '$bairro', e.cidade_endereco = '$cidade', e.estado_endereco = '$estado', 
		e.cep_endereco = '$cep', e.complemento_endereco = '$complemento'
		where e.id_cliente_endereco = c.id_cliente and c.id_cliente = $id;";
		
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