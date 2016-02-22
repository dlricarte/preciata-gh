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
		<script src="../assets/scripts/jquery.mask.min.js" type="text/javascript"></script>
		<script src="../assets/scripts/jquery.mask.js" type="text/javascript"></script>		
		
		<script type="text/javascript" src="../assets/scripts/produtos.js"></script>						
	</head>
	<body>
		<?php require_once '../partials/menu/menu.php'; ?>
			
		
		<div class="container">
				
			<form id="frmCadastrarProduto" method="post" role="form" data-toggle="validator" enctype="multipart/form-data">
				<div class="row">
					<div class="col-md-12">
						<br>
					</div>
				
					<div class="col-md-9 form-inline">
						<div class="form-group">
							<img class="img-titulo" src="../assets/imagens/produtos.png">
						</div>
						<div class="form-group">
							<h4>Cadastrar Produto</h4>
						</div>
					</div>
					
					<div class="col-md-3" style="text-align: right;">
						<button class="btn btn-primary" id="btSalvarProduto" type="button">
							<span class="glyphicon glyphicon-save"></span>
							Salvar
						</button>						
						<a href="../produtos/" class="btn btn-default">
							<span class="glyphicon glyphicon glyphicon-remove"></span> Cancelar
						</a>									
					</div>		
				</div>
				<div class="row">				
					<div class="col-md-12">
						<hr>		
					</div>				
				</div>
	
			
				<div class="row">
					<div class="form-group col-md-4" >
						<label class="control-label" for="codigo">Código:</label>
						<input type="text" class="form-control" id="codigo" name="codigo" maxlength="50"/>
					</div>
									
					<div class="form-group col-md-8" >
						<label class="control-label" for="nome">Nome do produto:</label>
						<input type="text" class="form-control" id="nome" name="nome" maxlength="50"/>
					</div>
				</div>				
				
				<div class="row">				
					<div class="form-group col-md-12">
						<label class="control-label" for="descricao">Descrição do produto:</label>
						<textarea  class="form-control" id="descricao" name="descricao"></textarea>
					</div>
				</div>
				
				<div class="row">
					<div class="form-group col-md-4" >
						<label class="control-label" for="compra">Preço de compra:</label>
						<input type="text" class="form-control" id="compra" name="compra" maxlength="50"/>
					</div>
					
					<div class="form-group col-md-4" >
						<label class="control-label" for="venda">Preço de venda:</label>
						<input type="text" class="form-control" id="venda" name="venda" maxlength="50"/>
					</div>
					
					<div class="form-group col-md-4" >
						<label class="control-label" for="revenda">Preço de revenda:</label>
						<input type="text" class="form-control" id="revenda" name="revenda" maxlength="50"/>
					</div>
				</div>
				
				<div class="row">				
					<div class=" col-md-12">
						<div class="form-group">
							<label class="control-label" for="imagem">Carregar imagem:</label>
							<!-- <input type="file" class="form-control" id="foto" name="foto"> -->
							<input type="text" class="form-control" id="imagem" name="imagem" placeholder="Imagem da internet">
						</div>
						<div class="form-group">
							<button class="btn btn-default" id="btCarregarImagem" type="button">Carregar imagem</button>
						</div>						
					</div>
				</div>
				
				<div class="row">
					<div class=" col-md-2">
						<div class="form-group">
							<img class="img-prod" id="ver-imagem" width="100%">
						</div>
					</div>				
					<div class=" col-md-10">
						
					</div>
				</div>				
			</form>			
		</div>
	</body>
</html>