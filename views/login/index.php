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
		<script type="text/javascript" src="../assets/scripts/myScript.js"></script>		
	</head>
	<body>	
		<div class="login-centro">					
			<!-- <img alt="" src="../assets/imagens/preciata-logo.png" class="logo"> -->
			
			<div class="panel panel-default">
				<div class="panel-heading">
			    	<h3 class="panel-title">Login</h3>
			  	</div>
			  	<div class="panel-body">
			    	<form id="frmLogin" action="../inicio/" method="post" role="form">
		        		
		        		<div class="form-group">
		          			<label class="control-label" for="usuario">Usuário:</label>					
				  			<input class="form-control" type="" name="usuario" id="usuario" maxlength="20">
				  		</div>
				  		
				  		<div class="form-group">
				  			<label class="control-label" for="senha">Senha:</label>
				  			<input class="form-control" type="password" name="senha" id="senha" maxlength="10">	
		        		</div>
		        		
		        		<button type="button" class="btn btn-default" id="btEntrar">Entrar</button>
		      		</form>
			  	</div>
			</div>			
		</div>		
	</body>
</html>