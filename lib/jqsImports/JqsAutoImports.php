<?php
#################################
# CLASSE JQS AUTO IMPORTS       #
# IMPORTA TODAS AS CLASSES      #
# U.A:14/10/12 - 19:50          #
# JAQUES OLIVEIRA               #
#################################

class JqsAutoImports{
	public function __construct(){

		//BD
		require_once ('../../db/jqs/JqsConnectionFactory.php');
		require_once ('../../db/jqs/JqsConnection.php');

		//DAO
		require_once ('../../dao/cliente/ClienteDao.php');
		require_once ('../../dao/produto/ProdutoDao.php');
		require_once ('../../dao/estoque/EstoqueDao.php');
		require_once ('../../dao/lote/LoteDao.php');
		/* require_once ('dao/ProdutoDAO.php');
		require_once ('dao/EstoqueDAO.php');
		//require_once ('dao/PedidoDAO.php');
*/
		
		//MODEL
		require_once ('../../models/login/Login.php');
		require_once ('../../models/cliente/Cliente.php');
		require_once ('../../models/endereco/Endereco.php');
		require_once ('../../models/produto/Produto.php');
		require_once ('../../models/preco/Preco.php');
		require_once ('../../models/estoque/Estoque.php');
		require_once ('../../models/lote/Lote.php');
		require_once ('../../models/iten/Iten.php');
		/*require_once ('models/Produto.php');
		require_once ('models/Estoque.php');
		require_once ('models/Pedido.php');
        //require_once ('models/Pedido.php'); */
	}
}