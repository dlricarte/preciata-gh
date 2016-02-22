<?php 

/*
 * import de classes
 */
require_once ('../../lib/jqsImports/JqsAutoImports.php');
$JqsAutoImports = new JqsAutoImports;

$id = $_GET['id'];

$estoque = new EstoqueDao();
$est = $estoque->localizarEstoque($id);

?>

<!DOCTYPE html>
<html>
	<head>				
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		
		<title>Preciata</title>		
		<link href="../assets/bootstrap-3.3.6-dist/css/bootstrap.min.css" rel="stylesheet" />
		<link href="../assets/estilo_custom.css" rel="stylesheet" />			
		
		<script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
		<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
		
		<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
		<script src="//code.jquery.com/jquery-1.10.2.js"></script>
		<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
		
		
		<!-- <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
		<script src="//code.jquery.com/jquery-1.10.2.js"></script>
		<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script> -->
		<!-- <link rel="stylesheet" href="/resources/demos/style.css" />	 -->			
		
		<script type="text/javascript" src="../assets/scripts/estoque.js"></script>
		
		<script type="text/javascript"></script>			
	</head>
	<body>
		<?php require_once '../partials/menu/menu.php'; ?>
			
		
		<div class="container">
				
			<form id="frmAddEstoque" method="post" role="form" data-toggle="validator">			
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
					<?php @$id = $_GET['id']?>
					<div class="col-md-8" style="text-align: right;">
						
						<button class="btn btn-primary" id="btAdicinarEstoque" type="button">
							<span class="glyphicon glyphicon-save"></span>
							Salvar
						</button>
												
						<a href="../estoque/" class="btn btn-default">
							<span class="glyphicon glyphicon glyphicon-remove"></span> Cancelar
						</a>									
					</div>		
				</div>
				<div class="row">				
					<div class="col-md-12">
						<hr>		
					</div>				
				</div>
			
			
			<?php

			foreach ($est as $value){
				
			?>
			<div class="row">
					<div class="form-group col-md-4">
						<label class="control-label" for="codigo">Código do produto:</label>
						<input type="text" class="form-control" id="codigo" name="codigo" maxlength="50" value="<?php echo $value['codigo_produto']; ?>" disabled/>
					</div>
									
					<div class="form-group form-group col-md-8" >
						<label class="control-label" for="nome">Nome do produto:</label>
						<input type="text" class="form-control" id="nome" name="nome" maxlength="50" value="<?php echo $value['nome_produto']; ?>" disabled/>
					</div>
				</div>				
				
				
				
				<div class="row">
					<div class="form-group col-md-2" >
						<label class="control-label" for="img-produto">Imagem:</label><br>
						<img id="ver-imagem" src="<?php echo $value['url_imagem']; ?>" class="img-prod">
					</div>
					
					<div class="form-group col-md-2" >
					
					</div>
					
					<div class="form-group col-md-3" >
						<label class="control-label" for="quantidade">Quantidade atual:</label>
						<input type="number"  class="form-control" id="quantidade" name="quantidade" maxlength="4" value="<?php echo $value['quantidade_estoque']; ?>" readonly/>
					</div>
					
					<div class="form-group col-md-3" >
						<label class="control-label" for="quantidade">Quantidade a ser adicionda:</label>
						<input type="number" class="form-control" id="add-quantidade" name="add-quantidade" maxlength="4" />
					</div>					
				</div>				
				
				
				<div class="row">
					<div class="col-md-12">
						<input type="hidden" id="id" name="id">
					</div>
				</div>
			
			<div class="row">
				
				<div class="form-group col-md-10" >
				</div>	
				
			</div>
				<input type="hidden" name="id" value="<?php echo $value['id_estoque']; ?>"/>			
			<div>				
			<?php 				
			}				
			?>		
				
			</div>
			
			</form>
			
		</div>
	</body>
</html>	