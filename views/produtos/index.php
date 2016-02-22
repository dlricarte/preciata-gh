<!DOCTYPE html>
<html>
	<head>					
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<title>Preciata</title>		
		<link href="../assets/bootstrap-3.3.6-dist/css/bootstrap.min.css" rel="stylesheet">
		<link href="../assets/estilo_custom.css" rel="stylesheet">
		
		<script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
		<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
		<script type="text/javascript" src="../assets/scripts/produtos.js"></script>
		<script type="text/javascript" src="../assets/scripts/jquery.blockUI.js"></script>
	</head>
	<body>
		<?php require_once '../partials/menu/menu.php'; ?>
			
		
		<div class="container">		
			<div class="row">
				<div class="col-md-12">
					<br>
				</div>
				<div class="col-md-6 form-inline">
					<div class="form-group">
						<img class="img-titulo" src="../assets/imagens/produtos.png">
					</div>
					<div class="form-group">
						<h4>Produtos</h4>
					</div>
				</div>
				
				<div class="col-md-2 form-inline">
					<div class="form-group">					
						<a href="new.php" class="btn btn-default form-control">
							<span class="glyphicon glyphicon glyphicon-barcode"></span> Cadastrar Produto
						</a>
					</div>
					<!-- <div class="form-group">
						<a href="../menu/" class="btn btn-default form-control">
							<span class="glyphicon glyphicon-th"></span> Menu
						</a>
					</div> -->					
				</div>
				
				<form id="frmBuscarProduto" >
					<div class="col-md-4 form-inline" style="text-align: right;">
						<div class="form-group">
							<input class="form-control" type="text" name="fdBuscarProduto" id="fdBuscarProduto"/>
						</div>
						
						<div class="form-group">
							<button class="btn btn-default form-control" id="btBuscarProduto" type="button">
								<span class="glyphicon glyphicon-search"></span>
								Buscar
							</button>					
						</div>
					</div>
				</form>
			</div>
			
			<div class="row">				
				<div class="col-md-12">
					<hr>		
				</div>				
			</div>
			
			<div class="row">				
				<div class="col-md-12 table-responsive lista" >
					<table class="table table-striped table-condensed table-bordered" >
						<thead>
							<tr>
								<th>Código</th>
								<th>Nome</th>
								<th>Compra</th>
								<th>Venda</th>
								<th>Revenda</th>
								<th colspan="2"></th>
							</tr>
						</thead>						
						<tbody id="lista_produtos">						
						</tbody>
					</table>		
				</div>				
			</div>
		</div>
	</body>
</html>	