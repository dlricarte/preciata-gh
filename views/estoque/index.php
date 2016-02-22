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
		<script type="text/javascript" src="../assets/scripts/estoque.js"></script>
		<script type="text/javascript" src="../assets/scripts/jquery.blockUI.js"></script>
		
		<script type="text/javascript">

		/*
		 * Listar produtos em estoque
		 */
		function listar(){

			$("#lista_estoque").empty();
			
			$.ajax({
							
				url : '../../controllers/estoque/estoque_controller.php?act=list',  //URL que será chamada  
		        type : 'post',  //Tipo da requisição  
		        data:  $('#frmBuscarEstoque').serialize(),  //dado que será enviado via POST
		        async: true,
		        dataType: 'json',  //Tipo de transmissão
		        
		        success: function(data){        	
		        		        	
		        	for(var i = 0; i < data.length; i++) {
		        		$("#lista_estoque").append("<tr><td class='hidden-xs'>" + data[i].id_estoque + "</td><td>" + data[i].codigo_produto + "</td><td>" + 
		        			data[i].nome_produto + "</td><td class='hidden-xs'>" + data[i].quantidade_estoque + "</td>" +
		        			"<td class='right'><a href='../../views/estoque/edit.php?id="+data[i].id_estoque+"' class='btn btn-default' title='Adicionar quantidade'><span class='glyphicon glyphicon-plus' /></a>&nbsp;"+
		        			"<a href='../../views/estoque/view.php?id="+data[i].id_estoque+"' class='btn btn-default' title='Visualizar'><span class='glyphicon glyphicon-share' /></td></tr>");
	                }
		        		        	
		        },
		        error: function(erro){
		        	alert('Houve um erro!\n' + erro.responseText);
		        }
			});// fim ajax		
			
		}//fim da função buscar
		
		/*
		 * listagem de todos os clientes
		 */
		$(function(){		

			/*
			* lista produtos cadastrados no estoque
			*/			
			listar();

			/*
			* busca produtos de acordo com valor no campo de busca
 			*/		
			$("#btBuscarEstoque").click(function(){
				listar();			
			});

			/*
			* anula o uso da tecla enter
			*/
			$('#fdBuscarEstoque').keypress(function (e) {		
		        var code = null;
		        code = (e.keyCode ? e.keyCode : e.which);                
		        return (code == 13) ? false : true;        
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
						<img class="img-titulo" src="../assets/imagens/estoque.png">
					</div>
					<div class="form-group">
						<h4>Estoque</h4>
					</div>
				</div>
				<?php @$id = $_GET['id']?>
				<div class="col-md-2">
					
					<a href="new.php" class="btn btn-default">
						<span class="glyphicon glyphicon-plus"></span> 
						Cadastrar no estoque
					</a>
											
					<!-- <a href="../menu/" class="btn btn-default">
						<span class="glyphicon glyphicon-th"></span> Menu
					</a> -->									
				</div>				
				
				<form id="frmBuscarEstoque">
					<div class="col-md-4 form-inline" style="text-align: right;">					
						<div class="form-group">
							<input class="form-control" type="text" name="fdBuscarEstoque" id="fdBuscarEstoque"/>
						</div>
							
						<div class="form-group">
							<button class="btn btn-default form-control" id="btBuscarEstoque" type="button">
								<span class="glyphicon glyphicon-search"></span>
								Buscar
							</button>					
						</div>
					</div>	
				</form>						
			</div>			
			
			<div class="row">				
				<div class="col-md-12">
					<hr>		
				</div>				
			</div>
			
			<div class="row">				
				<div class="col-md-12 table-responsive lista" >
					<table class="table table-striped table-bordered table-condensed" >
						<thead>
							<tr>
								<th class='hidden-xs'>id</th>
								<th>Código</th>
								<th>Nome</th>
								<th class='hidden-xs'>Quantidade</th>
								<th colspan="1"></th>
							</tr>
						</thead>						
						<tbody id="lista_estoque">						
						</tbody>
					</table>		
				</div>				
			</div>
		</div>
	</body>
</html>	