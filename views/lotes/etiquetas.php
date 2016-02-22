<?php

/*
 * import de classes
 */
require_once ('../../lib/jqsImports/JqsAutoImports.php');
$JqsAutoImports = new JqsAutoImports;

$idLote = $_GET['id'];

$lote = new LoteDao();
$lt = $lote->listarItensLoteEtiquetas($idLote);	

?>

<!DOCTYPE html>
<html>
	<head>				
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">		
		
		<title>Preciata</title>		
		<link href="../assets/bootstrap-3.3.6-dist/css/bootstrap.min.css" rel="stylesheet">
		<link href="../assets/estilo_custom.css" rel="stylesheet">
		<link href="../assets/impressao.css" type="text/css" rel="stylesheet" media="print" />
		
		<script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
		<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
		<script type="text/javascript" src="../assets/bootstrap-3.3.6-dist/js/bootstrap.min.js"></script>
		<script src="../assets/scripts/jquery.mask.min.js" type="text/javascript"></script>
		<script src="../assets/scripts/jquery.mask.js" type="text/javascript"></script>				
		
		<!-- <script type="text/javascript" src="../assets/scripts/lote.js"></script>
		<script type="text/javascript" src="../assets/scripts/lote_itens_view.js"></script> -->
		
		<script type="text/javascript">
			$(function(){
				$("#fdBuscarProduto").focus();
			});			
		</script>			
						
	</head>
	<body>
		<?php require_once '../partials/menu/menu.php'; ?>	
		
		
		<div class="container no-print-lines">		
			<div class="row">
				<div class="col-md-12">
					<br>
				</div>						
					<div class="col-md-8 form-inline no-print">
						<div class="form-group">
							<img class="img-titulo" src="../assets/imagens/lotes.png">
						</div>
						<div class="form-group">
							<h4>Etiquetas</h4>
						</div>
					</div>				
							
					
					<div class="col-md-4" style="text-align: right;">
						<a href="javascript:print();" class="btn btn-default no-print">
							<span class="glyphicon glyphicon-print"></span>
							Imprimir
						</a>
						
						<a href="../lotes/" class="btn btn-default no-print">
							<span class="glyphicon glyphicon-remove"></span>
							Sair
						</a>													
					</div>		
				</div>
			
				
			<div class="row no-print">
				<div class="col-md-12">
					<hr>
				</div>
			</div>
			
			<div class="row">				
				<div class="col-md-12 table-responsive">
					<table class="table-bordered" border="1" style="background-color: #fff">					
						
						<tbody id="lista_it"  style="padding-bottom: 10px" >
							<tr>
							<?php	
								$count = 0;
								foreach ($lt as $value){								
							 
									for($i=0; $i<$value['quantidade_itens']; $i++){	
										if($count==7){
											print "</td></tr><tr>";
											$count = 0;
										}else {
										
										}
								 		print "<td class='etiquetas'>".$value['codigo_produto']."</td>";	
								 		$count++;
									}								
								}
							?>							
						</tbody>
					</table>		
				</div>				
			</div><br>
			
		</div><!-- fim container -->
	</body>
</html>