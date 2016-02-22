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
		
		<script type="text/javascript" src="../assets/scripts/myScript.js"></script>						
	</head>
	<body>
		<?php require_once '../partials/menu/menu.php'; ?>
				
		<div class="container">				
			<form id="frmCadastrarCliente" method="post" role="form" data-toggle="validator">				
				<div class="col-md-12">
					<br>
				</div>
				
				<div class="row">				
					<div class="col-md-9 form-inline">
						<div class="form-group">
							<img class="img-titulo" src="../assets/imagens/clientes.png">
						</div>
						<div class="form-group">
							<h4>Cadastrar Cliente</h4>
						</div>
					</div>
					
					<div class="col-md-3" style="text-align: right;">
						<button class="btn btn-primary" id="btSalvarCliente" type="button">
							<span class="glyphicon glyphicon-save"></span>
							Salvar
						</button>						
						<a href="../clientes/" class="btn btn-default">
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
						<label class="control-label" for="nome">Nome:</label>
						<input type="text" class="form-control" id="nome" name="nome" maxlength="50"/>
					</div>
					
					<div class="form-group col-md-2">
						<label class="control-label" for="fone">Fone:</label>
						<input type="text" class="form-control" id="fone" name="fone" maxlength="15">
					</div>
					
					<div class="form-group col-md-2">
						<label class="control-label" for="whatsapp">Whatsapp:</label>
						<input type="text" class="form-control" id="whatsapp" name="whatsapp" maxlength="15">
					</div>
					
					<div class="form-group col-md-4">
						<label class="control-label" for="facebook">Facebook:</label>
						<input type="text" class="form-control" id="facebook" name="facebook" maxlength="40">
					</div>
				</div>
				
				<div class="row">				
					<div class="form-group col-md-4">
						<label class="control-label" for="email">E-mail:</label>
						<input type="text" class="form-control" id="email" name="email" maxlength="50">
					</div>
					
					<div class="form-group col-md-2">
						<label class="control-label" for="tipo">Tipo:</label>
						<select class="form-control" id="tipo" name="tipo" required>
							<option></option>
							<option>Varejo</option>
							<option>Atacado</option>							
						</select>
					</div>
					
					<div class="form-group col-md-2">
						<label class="control-label" for="indicacao">Indicação:</label>
						<input type="text" class="form-control" id="indicacao" name="indicacao" maxlength="23">
					</div>
					
					<div class="form-group col-md-2">
						<label class="control-label" for="instagran">Instagran:</label>
						<input type="text" class="form-control" id="instagran" name="instagran" maxlength="25">
					</div>
					
					<div class="form-group col-md-2">
						<label class="control-label" for="aniversario">Aniversário:</label>
						<input type="date" class="form-control" id="aniversario" name="aniversario" maxlength="10">
					</div>
				</div>
								
				<div class="row">				
					<div class="form-group col-md-2">
						<label class="control-label" for="cep">Cep:</label>
						<input type="text" class="form-control" id="cep" name="cep" maxlength="9">
					</div>						
					
					<div class="form-group col-md-3">
						<label class="control-label" for="logradouro">Logradouro:</label>
						<input type="text" class="form-control" id="logradouro" name="logradouro" maxlength="40"/>
					</div>
					
					<div class="form-group col-md-1">
						<label class="control-label" for="numer">Número:</label>
						<input type="text" class="form-control" id="numero" name="numero" maxlength="6">
					</div>
					
					<div class="form-group col-md-2">
						<label class="control-label" for="bairro">Bairro:</label>
						<input type="text" class="form-control" id="bairro" name="bairro" maxlength="30">
					</div>
					
					<div class="form-group col-md-2">
						<label class="control-label" for="cidade">Cidade:</label>
						<input type="text" class="form-control" id="cidade" name="cidade" maxlength="30">
					</div>
					
					<div class="form-group col-md-2">
						<label class="control-label" for="estado">Estado:</label>
						<input type="text" class="form-control" id="estado" name="estado" maxlength="30">
					</div>
				</div>
				<div class="row">				
					<div class="form-group col-md-12">
						<label class="control-label" for="complemento">Complemento:</label>
						<textarea  class="form-control" id="complemento" name="complemento"></textarea>
					</div>
				</div>	
			</form>			
		</div>
	</body>
</html>