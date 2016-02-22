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
		<script type="text/javascript" src="../assets/scripts/lote.js"></script>
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
						<img class="img-titulo" src="../assets/imagens/lotes.png">
					</div>
					<div class="form-group">
						<h4>Lotes</h4>
					</div>
				</div>
				
				<div class="col-md-2 form-inline">
					<div class="form-group">					
						<a href="registrar.php" class="btn btn-default form-control">
							<span class="glyphicon glyphicon glyphicon-barcode"></span> Registrar lote
						</a>
					</div>
					<!-- <div class="form-group">
						<a href="../menu/" class="btn btn-default form-control">
							<span class="glyphicon glyphicon-th"></span> Menu
						</a>
					</div> -->					
				</div>
				
				<form id="frmBuscarLote" >
					<div class="col-md-4 form-inline" style="text-align: right;">
						<div class="form-group">
							<input class="form-control" type="text" name="fdBuscarLote" id="fdBuscarLote"/>
						</div>
						
						<div class="form-group">
							<button class="btn btn-default form-control" id="btBuscarLote" type="button">
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
						<thead style=" position: relative;">							
							<tr>
								<th>Id</th>
								<th>Cliente</th>
								<th>Tipo</th>
								<th>Data</th>
								<th>Cituação</th>
								<th>Itens</th>
								<th>Valor</th>
								<th colspan="2"></th>
							</tr>
						</thead>						
						<tbody id="lista_lotes">						
						</tbody>
					</table>		
				</div>				
			</div>
			<br>
		</div>
	</body>
</html>	