<?php 

/*
 * import de classes
 */
require_once ('../../lib/jqsImports/JqsAutoImports.php');
$JqsAutoImports = new JqsAutoImports;

$id = $_GET['id'];

$produto = new ProdutoDao();
$est = $produto->localizarProduto($id);

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
		<link rel="stylesheet" href="/resources/demos/style.css" />				
		
		<script type="text/javascript" src="../assets/scripts/produtos.js"></script>
		
		<script type="text/javascript"></script>			
	</head>
	<body>
		<?php require_once '../partials/menu/menu.php'; ?>
			
		
		<div class="container">
				
			<form id="frmProdutoEditado" method="post" role="form" data-toggle="validator">
						
			<div class="row">
				<div class="col-md-12">
					<br>
				</div>
							
				<div class="col-md-4 form-inline">
					<div class="form-group">
						<img class="img-titulo" src="../assets/imagens/produtos.png">
					</div>
					<div class="form-group">
						<h4>Editar Produto</h4>
					</div>
				</div>
				<?php @$id = $_GET['id']?>
				<div class="col-md-8" style="text-align: right;">
					
					<button class="btn btn-primary" id="btSalvarProdutoEditado" type="button">
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
			
			
			<?php

			foreach ($est as $value){
				
			?>
			<div class="row">
				<div class="form-group col-md-4" >
					<label class="control-label" for="codigo">Código:</label>
					<input type="text" class="form-control" id="codigo" name="codigo" maxlength="50" value="<?php echo $value['codigo_produto']; ?>"/>
				</div>
				
				<div class="form-group col-md-8" >
					<label class="control-label" for="">Nome:</label>
					<input type="text" class="form-control" id="nome" name="nome" maxlength="50" value="<?php echo $value['nome_produto']; ?>"/>
				</div>
			</div>
			
			<div class="row">				
				<div class="form-group col-md-12" >
					<label class="control-label" for="">Descrção do produto:</label>
					<textarea  class="form-control" id="descricao" name="descricao"><?php echo $value['descricao_produto']; ?></textarea>
				</div>
			</div>
							
			<div class="row">				
				<div class="form-group col-md-4" >
					<label class="control-label" for="">Preço de Compra:</label>
					<input type="text" class="form-control" id="compra" name="compra" maxlength="50" value="<?php echo $value['preco_compra']; ?>"/>
				</div>						
				
				<div class="form-group col-md-4" >
					<label class="control-label" for="">Preço de venda:</label>
					<input type="text" class="form-control" id="venda" name="venda" maxlength="50" value="<?php echo $value['preco_venda']; ?>"/>
				</div>
				
				<div class="form-group col-md-4" >
					<label class="control-label" for="">Preço de Revenda:</label>
					<input type="text" class="form-control" id="revenda" name="revenda" maxlength="50" value="<?php echo $value['preco_revenda']; ?>"/>
				</div>
			</div>
			
			<div class="row">				
				<div class=" col-md-12">
					<div class="form-group">
						<label class="control-label" for="imagem">Carregar imagem:</label>
						<!-- <input type="file" class="form-control" id="foto" name="foto"> -->
						<input type="text" class="form-control" id="imagem" name="imagem" value="<?php echo $value['url_imagem']; ?>">
					</div>
					<div class="form-group">
						<button class="btn btn-default" id="btCarregarImagem" type="button">Carregar imagem</button>
					</div>						
				</div>
			</div>
			
			<div class="row">
				<div class="form-group col-md-2" >
					<label class="control-label" for="">Imagem:</label>
					<div>
						<img class="img-prod" style="width:100%;" src="<?php echo $value['url_imagem']; ?>" id="ver-imagem">
					</div>
				</div>
						
				<div class="form-group col-md-10" >
				</div>	
				
			</div>
				<input type="hidden" name="id" value="<?php echo $value['id_produtos']; ?>"/>			
			<div>				
			<?php 				
			}				
			?>		
				
			</div>
			
			</form>
			
		</div>
	</body>
</html>	