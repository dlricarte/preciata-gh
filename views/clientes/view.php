<?php 

/*
 * import de classes
 */
require_once ('../../lib/jqsImports/JqsAutoImports.php');
$JqsAutoImports = new JqsAutoImports;

$id = $_GET['id'];

$preoduto = new ClienteDao();
$cli = $preoduto->buscarCliente($id);

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
		<script src="../assets/scripts/jquery.mask.min.js" type="text/javascript"></script>
		<script src="../assets/scripts/jquery.mask.js" type="text/javascript"></script>
		
		<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
		<script src="//code.jquery.com/jquery-1.10.2.js"></script>
		<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
		<link rel="stylesheet" href="/resources/demos/style.css" />				
		
		<script type="text/javascript" src="../assets/scripts/myScript.js"></script>
		
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
		    			url : '../../controllers/cliente/clientes_controller.php?act=del',  //URL que será chamada  
		    	        type : 'POST',  //Tipo da requisição  
		    	        data:  $('#frmExcluirCliente').serialize(),  //dado que será enviado via POST
		    	        async: true,
		    	        //data: {id:+"id_cliente"},
		    	        dataType: 'json',  //Tipo de transmissão 	                
		    	        success: function(data){
			    	        if(data.status == "sucesso"){
			    	        	alert("Cliente excluido com sucesso!");
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
				<div class="col-md-6 form-inline">
					<div class="form-group">
						<img class="img-titulo" src="../assets/imagens/clientes.png">
					</div>
					<div class="form-group">
						<h4>Visualizar Cliente</h4>
					</div>
				</div>
				<?php @$id = $_GET['id']?>
				<div class="col-md-6" style="text-align: right;">
					
					<a href="edit.php?id=<?php echo $id?>" class="btn btn-default">
						<span class="glyphicon glyphicon-edit"></span>
						Editar
					</a>
					<button class="btn btn-default" id="btExcluirCliente" type="button">
						<span class="glyphicon glyphicon-erase"></span>
						Excluir
					</button>
											
					<a href="../clientes/" class="btn btn-default">
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

			foreach ($cli as $value){
				
			?>
			<div class="row">
				<div class="form-group col-md-4" >
					<label class="control-label" for="nome">Nome:</label>						
					<div><p><?php echo $value['nome_cliente']; ?></p></div>
				</div>
				
				<div class="form-group col-md-2" >
					<label class="control-label" for="fone">Fone:</label>
					<div><p><?php echo $value['fone_cliente']; ?></p></div>
				</div>
				
				<div class="form-group col-md-2" >
					<label class="control-label" for="whatsapp">Whatsapp:</label>
					<div><p><?php echo $value['whatsapp_cliente']; ?></p></div>
				</div>
				
				<div class="form-group col-md-4" >
					<label class="control-label" for="facebook">Facebook:</label>
					<div><p><a href="https://www.facebook.com/<?php echo $value['facebook_cliente']; ?>" target="blank"><?php echo $value['facebook_cliente']; ?></a></p></div>
				</div>
			</div>
			
			<div class="row">				
				<div class="form-group col-md-4" >
					<label class="control-label" for="email">E-mail:</label>
					<div><p><?php echo $value['email_cliente']; ?></p></div>
				</div>
				
				<div class="form-group col-md-2" >
					<label class="control-label" for="tipo">Tipo:</label>
					<div><p><?php echo $value['tipo_cliente']; ?></p></div>
				</div>
				
				<div class="form-group col-md-2" >
					<label class="control-label" for="indicacao">Indicação:</label>
					<div><p><?php echo $value['indicacao_cliente']; ?></p></div>
				</div>
				
				<div class="form-group col-md-2" >
					<label class="control-label" for="instagran">Instagran:</label>
					<div><p><a href="https://www.instagram.com/<?php echo $value['instagran_cliente']; ?>/" target="blank"><?php echo $value['instagran_cliente']; ?></a></p></div>
				</div>
				
				<div class="form-group col-md-2" >
					<label class="control-label" for="aniversario">Aniversário:</label>
					<div><p><?php echo $value['aniversario_cliente']; ?></p></div>
				</div>
			</div>
							
			<div class="row">				
				<div class="form-group col-md-2" >
					<label class="control-label" for="cep">Cep:</label>
					<div><p><?php echo $value['cep_endereco']; ?></p></div>
				</div>						
				
				<div class="form-group col-md-3" >
					<label class="control-label" for="logradouro">Logradouro:</label>
					<div><p><?php echo $value['logradouro_endereco']; ?></p></div>
				</div>
				
				<div class="form-group col-md-1" >
					<label class="control-label" for="numero">Número:</label>
					<div><p><?php echo $value['numero_endereco']; ?></p></div>
				</div>
				
				<div class="form-group col-md-2" >
					<label class="control-label" for="bairro">Bairro:</label>
					<div><p><?php echo $value['bairro_edereco']; ?></p></div>
				</div>
				
				<div class="form-group col-md-2" >
					<label class="control-label" for="cidade">Cidade:</label>
					<div><p><?php echo $value['cidade_endereco']; ?></p></div>
				</div>
				
				<div class="form-group col-md-2" >
					<label class="control-label" for="estado">Estado:</label>
					<div><p><?php echo $value['estado_endereco']; ?></p></div>
				</div>
			</div>
			<div class="row">				
				<div class="form-group col-md-12" >
					<label class="control-label" for="complemento">Complemento:</label>
					<div><p><?php echo $value['complemento_endereco']; ?></p></div>
				</div>
			</div>
			<form id="frmExcluirCliente">
				<input type="hidden" name="id" value="<?php echo $value['id_cliente']; ?>"/>
			</form>
			<div>				
			<?php 				
			}				
			?>		
				
			</div>
			
			<div id="dialog-confirm" title="Preciata"> 
				<p>Deseja excluir esse cliente?</p>
				<hr>
				<button id="btExcluirSim">Sim</button>
				<button id="btExcluirNao">Não</button>
			</div>

		
			
		</div>
	</body>
</html>	