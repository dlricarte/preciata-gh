/**
 * 
 */
//encoding=utf-8
jQuery(document).ready(function(){
	
	$(document).ajaxStart($.blockUI).ajaxStop($.unblockUI);
			
	/*
	 * buscar produtos
	 */
	//function buscar(){
		$("#fdBuscarProduto").empty();
		
		$.ajax({			
			url : '../../controllers/produto/produto_controller.php?act=find',  //URL que será chamada  
	        type : 'POST',  //Tipo da requisição  
	        data:  $('#frmBuscarProduto').serialize(),  //dado que será enviado via POST
	        async: true,
	        //data: {id:+"id_cliente"},
	        dataType: 'json',  //Tipo de transmissão 	                
	        success: function(data){
	        	$("#fdBuscarProduto").append("<option></option>");
	        	for(var i = 0; i < data.length; i++) {
	        		$("#fdBuscarProduto").append("<option>" + data[i].nome_produto + "</option>R$");
                }
	        }
		});// fim ajax
	//}//fim da função buscar	
		
	
	/*
	 * 
	 */
	var count = 0;
	var total = 0;
	var qtd_itens = 0;
		
	/*
	 * Adicionar itens ao lote e à lista de itens do lote
	 */
	function addToList(){
		
		/*
    	 * pega a quantidade de produtos
    	 */
    	qtd = $("#fdQuantidade").val();
		
		/*
		 * exibe menssagem se campo de produtos estiver vazio
		 */
		if($("#fdBuscarProduto").val() == ""){			
			
			alert("Preencha os campos 'Produto' e 'Quantidade'");
		
		/*
		 * exibe menssagem se campo quantidades estiver vazio ou negativo
		 */	
		}else if(qtd <= 0){
			
			alert("Quantidade deve ser maior que zero!");
			
		}else{	
		
			$("#btFinalizarItens").prop("disabled", false);
			vTotal = $("#vlTotal").val();
			
			/*
			 * verifica se a quantidade do produto está disponível no estoque
			 */
			$.ajax({
				url : '../../controllers/estoque/estoque_controller.php?act=ver_estoque',  //URL que será chamada  
				
		        type : 'POST',  //Tipo da requisição  
		        data:  $('#frmAddIten').serialize(),  //dado que será enviado via POST
		        async: true,
		        dataType: 'json',  //Tipo de transmissão 	                
		        success: function(data){	        	
		         
		        	qtd_lote = $("#fdQuantidade").val();
		        	
		        	qtd_l = parseInt(qtd_lote);
		        	qtd_e = parseInt(data.quantidade_estoque);
		        	//alert(data.quantidade_estoque);
		        	
		        	if(qtd_e < qtd_l ){
		        		alert("Essa quantidade não está disponível em estoque!\n"+"A quantidade disponível é: "+data.quantidade_estoque);
		        	}else{        			        		
		        		
		        		/*
			        	 * se tiver estoque disponível inseri iten na tabela de itens
			        	 */
						$.ajax({			
							url : '../../controllers/lote/lote_controller.php?act=new_iten',  //URL que será chamada    
					        type : 'POST',  //Tipo da requisição  
					        data:  $('#frmAddIten').serialize(),  //dado que será enviado via POST
					        async: true,
					        dataType: 'json',  //Tipo de transmissão 	                
					        success: function(data){
					        	
					        	/*
					        	 * exibe iten na lista de itens do lote
					        	 */
					        	$.ajax({				        		
					        		url : '../../controllers/produto/produto_controller.php?act=find',  //URL que será chamada  
							        type : 'POST',  //Tipo da requisição  
							        data:  $('#frmAddIten').serialize(),  //dado que será enviado via POST
							        async: true,
							        dataType: 'json',  //Tipo de transmissão 	                
							        success: function(data){
							        	for(var i = 0; i < data.length; i++) {	        		
						        		
							        		/*
							        		 * recebe valor do produto
							        		 */
							        		var vUnitario = data[i].preco_venda;		        		
							        		
							        		$("#lista_itens").append("<tr><td>" + data[i].codigo_produto + "</td><td>" + data[i].nome_produto + "</td><td>" + 
							        		$("#fdQuantidade").val() + "</td><td>R$" + data[i].preco_venda + "</td></tr>");
						                }//fim for
							        	
							        	var qtd = $("#fdQuantidade").val();
							        	qtd_itens = qtd_itens + parseInt(qtd); 
							        		
						        		/*
						        		 * multiplica valor unitário pela quantidade
						        		 */
						        		result = qtd * parseFloat(vUnitario).toFixed(2);
						        		
						        		/*
						        		 * calcula valor total
						        		 */
						        		total = total + result;
						        		parseFloat(total).toFixed(2);
						        		 	        		
						        		/*
						        		 * exibe o resultado
						        		 */
						        		$("#vlTotal").val(total);
						        		$("#fdQuantidadeItens").val(String(qtd_itens));
						        		
			
						        		$("#fdBuscarProduto").val("");				        		
							        }			        		
					        	});//fim ajax			        	
				        		
					        },
					        error: function(erro){
					        	alert(erro.responseText);
					        }
						});// fim ajax
		        	}
		        },
		        error: function(erro){
		        	alert(erro.responseText);
		        }
			});// fim ajax
		}//fim if-else	
	}//fim da função buscar	
	
	
	/*
	 * adiciona itens à lista de lote
	 */
	$("#adicionar").click(function(){
		addToList();
		$("#fdBuscarProduto").focus();
	});
	
	
	/*
	 * Listar lotes
	 */
	function listarLote(){
		$("#lista_lotes").empty();
		
		$.ajax({			
			url : '../../controllers/lote/lote_controller.php?act=list',  //URL que será chamada  
	        type : 'POST',  //Tipo da requisição  
	        data:  $('#frmBuscarLote').serialize(),  //dado que será enviado via POST
	        async: true,
	        dataType: 'json',  //Tipo de transmissão 	                
	        success: function(data){	        	
	        	for(var i = 0; i < data.length; i++) {
	        		$("#lista_lotes").append("<tr><td>" + data[i].id_lote + "</td><td>" + data[i].nome_cliente 
	        			+"</td><td>" + data[i].tipo_cliente + "</td><td>" + data[i].data_registro + "</td><td>" 
	        			+ data[i].status_lote + "</td><td>" + data[i].quantidade_itens + "</td><td>R$" 
	        			+ data[i].valor_lote + "</td>" + 
	        			"<td class='right'><a href='../../views/produtos/edit.php?id="+data[i].id_produtos+"' class='btn btn-default' title='Editar'><span class='glyphicon glyphicon-money' /></a>&nbsp;"+
	        			"<a href='../../views/lotes/view.php?id="+data[i].id_lote+"' class='btn btn-default' title='Visualizar'><span class='glyphicon glyphicon-share' /></td></tr>");
                }
	        	
	        }
		});// fim ajax
	}//fim da função listarLotes
	


	/*
	 * adicionar valor e quantidade ao lote
	 */
	$("#btFinalizarItens").click(function(){		
		//alert("ok");
				
    	$.ajax({        	 	        	   
    		url : '../../controllers/lote/lote_controller.php?act=edit', /* URL que será chamada */ 
            type : 'POST', /* Tipo da requisição */ 
            data:  $('#frmAddIten').serialize(), /* dado que será enviado via POST */
            dataType: 'json', /* Tipo de transmissão */	                
            success: function(data){
                if(data.status == "sucesso"){
                    alert("Pedido cadastrado com sucesso!");
                    window.location = "../../views/lotes/";
                    /*$('#frmCadastrarLote').each(function(){
                    	this.reset();
                	});*/
                }else{
                    alert("Houve um erro! Não foi possível cadastrar");
                    $("#nome").focus();
                }
            },
            error: function(erro){
            	alert("Erro!" + erro.responseText);
            }
        }); // fim ajax
    });
	
	
	
	$('#fdBuscarProduto').keypress(function (e) {
        var code = null;
        code = (e.keyCode ? e.keyCode : e.which);
        	        
        //return (code == 13) ? false : true;
        
        if(code == 13){
        	$("#fdQuantidade").focus();
        }        	        
	});
		
			
	$("#fdQuantidade").keypress(function (e) {
        var code = null;
        code = (e.keyCode ? e.keyCode : e.which);                
    //    return (code == 13) ? false : true;
        
        if(code == 13){
        	$("#adicionar").focus();
        }
	});
	
	
	/*
	 * lista lotes ao abrir a página de lotes
	 */
	$(function(){
		listarLote();
	});
	
	/*
	 * 
	 */
	$("#btBuscarLote").click(function(){
		listarLote();
	});
	
	
});