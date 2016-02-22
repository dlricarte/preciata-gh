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
		<script type="text/javascript" src="../assets/bootstrap-3.3.6-dist/js/bootstrap.min.js"></script>
		<script src="../assets/scripts/jquery.mask.min.js" type="text/javascript"></script>
		<script src="../assets/scripts/jquery.mask.js" type="text/javascript"></script>		
		
		<script type="text/javascript" src="../assets/scripts/estoque.js"></script>	
						
	</head>
	<body>
		<?php require_once '../partials/menu/menu.php'; ?>
			
		
		<div class="container">		
			<div class="row">
				<div class="col-md-12">
					<br>
				</div>				
				<div class="col-md-4 form-inline">
					<div class="form-group">
						<img class="img-titulo" src="../assets/imagens/estoque.png">
					</div>
					<div class="form-group">
						<h4>Adicionar estoque</h4>
					</div>
				</div>
				
				<form id="frmBuscarProduto">
					<div class="col-md-4 form-inline" >										
						<div class="form-group">
							<input class="form-control" type="text" name="fdBuscarProduto" id="fdBuscarProduto" placeholder="Código do produto"/>
						</div>
						
						<div class="form-group">
							<button class="btn btn-default form-control" id="btBuscarProduto" type="button">
								<span class="glyphicon glyphicon-searc"></span>
								Carregar produto
							</button>					
						</div>	
					</div>
				</form>				
				
				<div class="col-md-4" style="text-align: right;">
					<button id="btSalvarEstoque" class="btn btn-primary">
						<span class="glyphicon glyphicon-save"></span>
						Salvar
					</button>
					
					<a href="../estoque/" class="btn btn-default">
						<span class="glyphicon glyphicon glyphicon-remove"></span>
						Cancelar
					</a>									
				</div>		
			</div>
			
			<div class="row">				
				<div class="col-md-12">
					<hr>		
				</div>				
			</div>
		
			<form id="frmCadastrarEstoque" action="../../controllers/estoque/estoque_controller.php?act=new" method="post">
							
				<div class="row">
					<div class="form-group col-md-4">
						<label class="control-label" for="codigo">Código do produto:</label>
						<input type="text" class="form-control" id="codigo" name="codigo" maxlength="50" disabled/>
					</div>
									
					<div class="form-group form-group col-md-8" >
						<label class="control-label" for="nome">Nome do produto:</label>
						<input type="text" class="form-control" id="nome" name="nome" maxlength="50" disabled/>
					</div>
				</div>				
				
				<div class="row">				
					<div class="form-group col-md-12">
						<label class="control-label" for="descricao">Descrição do produto:</label>
						<textarea  class="form-control" id="descricao" name="descricao" disabled></textarea>
					</div>
				</div>				
				
				<div class="row">
					<div class="form-group col-md-2" >
						<label class="control-label" for="img-produto">Imagem:</label><br>
						<img id="ver-imagem" src="" class="img-prod">
					</div>
					
					<div class="form-group col-md-2" >
					
					</div>
					
					<div class="form-group col-md-4" >
						<label class="control-label" for="quantidade">Quantidade:</label>
						<input type="number" class="form-control" id="quantidade" name="quantidade" maxlength="4"/>
					</div>
				</div>				
				
				
				<div class="row">
					<div class="col-md-12">
						<input type="hidden" id="id" name="id">
					</div>
				</div>				
			</form>			
		</div>
	</body>
</html>