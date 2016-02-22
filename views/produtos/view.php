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
		
		<script type="text/javascript">
			$(function() {
			    $( "#dialog-confirm" ).dialog({
			      autoOpen: false,
			      resizable: false,
			      height:170,
			      width:300,
			      modal: true/* ,
			      buttons: {
			      	"Sim": function() {
			      		
			    					        
			          $( this ).dialog( "close" );
			        },
			        "Não": function() {
			          $( this ).dialog( "close" );
			        }
			      }  */
			    });
			    $("#btExcluirCliente").click(function(){
		         	$("#dialog-confirm").dialog("open");
			  	});	
	
			    $("#btExcluirNao").click(function(){
			    	$("#dialog-confirm").dialog("close");
				});
			    
				$("#btExcluirSim").click(function(){
					
					$.ajax({			
		    			url : '../../controllers/produto/produto_controller.php?act=del',  //URL que será chamada  
		    	        type : 'POST',  //Tipo da requisição  
		    	        data:  $('#frmExcluirProduto').serialize(),  //dado que será enviado via POST
		    	        async: true,
		    	        //data: {id:+"id_cliente"},
		    	        dataType: 'json',  //Tipo de transmissão 	                
		    	        success: function(data){
			    	        if(data.status == "sucesso"){
			    	        	alert("Produto excluido com sucesso!");
			    	        	$("#dialog-confirm").dialog("close");
			    	        	window.location = "index.php";		    	        	
				    	    }else{
								alert("Deu merda");
				    	    }		    	        
		    	        }		        	    	        
		    		});// fim ajax
				});  
			});
		</script>			
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
						<img class="img-titulo" src="../assets/imagens/produtos.png">
					</div>
					<div class="form-group">
						<h4>Visualizar Produto</h4>
					</div>
				</div>
				<?php @$id = $_GET['id']?>
				<div class="col-md-8" style="text-align: right;">
					
					<a href="edit.php?id=<?php echo $id?>" class="btn btn-default">
						<span class="glyphicon glyphicon-edit"></span>
						Editar
					</a>
					<button class="btn btn-default" id="btExcluirCliente" type="button">
						<span class="glyphicon glyphicon-erase"></span>
						Excluir
					</button>
											
					<a href="../produtos/" class="btn btn-default">
						<span class="glyphicon glyphicon-log-out"></span> sair
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
					<div><p><?php echo $value['codigo_produto']; ?></p></div>
				</div>
				
				<div class="form-group col-md-8" >
					<label class="control-label" for="">Nome:</label>
					<div><p><?php echo $value['nome_produto']; ?></p></div>
				</div>
			</div>
			
			<div class="row">				
				<div class="form-group col-md-12" >
					<label class="control-label" for="">Descrção do produto:</label>
					<div><p><?php echo $value['descricao_produto']; ?></p></div>
				</div>
			</div>
							
			<div class="row">				
				<div class="form-group col-md-4" >
					<label class="control-label" for="">Preço de Compra:</label>
					<div><p><?php echo $value['preco_compra']; ?></p></div>
				</div>						
				
				<div class="form-group col-md-4" >
					<label class="control-label" for="">Preço de venda:</label>
					<div><p><?php echo $value['preco_venda']; ?></p></div>
				</div>
				
				<div class="form-group col-md-4" >
					<label class="control-label" for="">Preço de Revenda:</label>
					<div><p><?php echo $value['preco_revenda']; ?></p></div>
				</div>
			</div>
			<div class="row">
				<div class="form-group col-md-12" >
					<hr>
				</div>
			</div>
			
			<div class="row">
				<div class="form-group col-md-2" >
					<label class="control-label" for="">Imagem:</label>
					<div>
						<img class="img-prod" style="width:100%;" src="<?php echo $value['url_imagem']; ?>">
					</div>
				</div>
						
				<div class="form-group col-md-10" >					
					
				</div>
				
				
			</div>
			<form id="frmExcluirProduto">
				<input type="hidden" name="id" value="<?php echo $value['id_produtos']; ?>"/>
			</form>
			<div>				
			<?php 				
			}				
			?>
			</div>
			
			<div id="dialog-confirm" title="Preciata"> 
				<p>Deseja excluir esse produto?</p>
				<hr>
				<button id="btExcluirSim">Sim</button>
				<button id="btExcluirNao">Não</button>
			</div>
			
		</div>
	</body>
</html>	