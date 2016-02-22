<?php

/*
 * import de classes
 */
require_once ('../../lib/jqsImports/JqsAutoImports.php');
$JqsAutoImports = new JqsAutoImports;

$idLote = $_GET['id'];

$lote = new LoteDao();
$lt = $lote->localizarLote($idLote);	

?>

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
		
		<script type="text/javascript" src="../assets/scripts/lote.js"></script>
		<script type="text/javascript" src="../assets/scripts/lote_itens_view.js"></script>
		
		<script type="text/javascript">
			$(function(){
				$("#fdBuscarProduto").focus();
			});			
		</script>
			
						
	</head>
	<body>
		<?php require_once '../partials/menu/menu.php'; ?>	
		<?php
			
							foreach ($lt as $value){
							
						?>
		<div class="container">		
			<div class="row">
				<div class="col-md-12">
					<br>
				</div>						
					<div class="col-md-8 form-inline">
						<div class="form-group">
							<img class="img-titulo" src="../assets/imagens/lotes.png">
						</div>
						<div class="form-group">
							<h4>Visualizar lote</h4>
						</div>
					</div>				
					
					<div class="col-md-4" style="text-align: right;">
						<a href="../lotes/etiquetas.php?id=<?php echo $value['id_lote']?>" class="btn btn-default">
							<span class="glyphicon glyphicon-tags"></span>
							Etiquetas
						</a>
						
						<a href="../lotes/" class="btn btn-default">
							<span class="glyphicon glyphicon-remove"></span>
							cancelar
						</a>
						
						<!-- <button id="btFinalizarItens" class="btn btn-primary" disabled>
							<span class="glyphicon glyphicon-save"></span>
							Finalizar
						</button> -->								
					</div>		
				</div>
			
			<div class="row">				
				<div class="col-md-12">
					<hr>		
				</div>				
			</div>
		
			<form id="frmAddIten">
				<div class="row">						
						
						
						<div class="form-group col-md-2">
							<label class="control-label" for="idLote">Lote:</label>
							<input type="text" class="form-control" id="idLote" name="idLote" maxlength="50" value="<?php echo $value['id_lote']; ?>" style="border: none;" readonly/>
						</div>
						
						<div class="form-group col-md-2">
							<label class="control-label" for="data">Data:</label>
							<input type="text" class="form-control" id="data" name="data" maxlength="50" value="<?php echo $value['data_registro']; ?>" style="border: none;" disabled/>
						</div>
						
						<div class="form-group col-md-4">
							<label class="control-label" for="cliente">Cliente:</label>
							<input type="text" class="form-control" id="cliente" name="cliente" maxlength="50" value="<?php echo $value['nome_cliente']; ?>" style="border: none;" disabled/>
						</div>
						
						<div class="form-group col-md-2">
							<label class="control-label" for="quantidade">Quantidade:</label>
							<input type="number" class="form-control" id="fdQuantidadeItens" name="fdQuantidadeItens" maxlength="50" value="<?php echo $value['quantidade_itens']; ?>" style="border: none;" readonly/>
						</div>
						
						<div class="form-group col-md-2">
							<label class="control-label" for="vlTotal" >Valor Total:</label>
							<input maxlength="2" class="form-control" id="vlTotal" type="number" name="vlTotal" style="border: none;" value="<?php echo $value['valor_lote']; ?>" readonly />
						</div>
					<!-- </form> -->			
						
				<?php }?>		
				</div>			
										
				
			</form>
			<div class="row">
				<div class="col-md-12">
					<hr>
				</div>
			</div>
			
			<div class="row">				
				<div class="col-md-12 table-responsive" style="overflow-y: scroll; height:300px;">
					<table class="table table-striped table-condensed table-bordered" style="table-layout:fixed;">
						<thead>
							<tr>
								<th>Código</th>
								<th>Descrição</th>
								<th>Quantidade</th>
								<th>Valor unitário</th>
							</tr>
						</thead>
						
						<tbody id="lista_it"  style="padding-bottom: 10px" >							
						</tbody>
					</table>		
				</div>				
			</div><br>
			
		</div><!-- fim container -->
		<br>
	</body>
</html>