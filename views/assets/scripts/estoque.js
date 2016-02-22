/**
 * 
 */
//encoding=utf-8
jQuery(document).ready(function(){
	
	$(document).ajaxStart($.blockUI).ajaxStop($.unblockUI);
		
	/*
	 * 
	 */
	$("#fdBuscarProduto").focus();	
	
	/*
	 * inserir produto no estoque
	 */
	$("#btSalvarEstoque").click(function(){	
		
		var nome = $("#nome").val();
		var codigo = $("#codigo").val();				
		
		if(codigo == "" || nome == ""){			
			alert('É preciso carregar um produto!');
		}else{		
	    	$.ajax({        	 	        	   
	    		url : '../../controllers/estoque/estoque_controller.php?act=new',  //URL que será chamada  
	            type : 'post',  //Tipo da requisição  
	            data:  $('#frmCadastrarEstoque').serialize(),  //dado que será enviado via POST 
	            dataType: 'json',  //Tipo de transmissão 	                
	            success: function(data){
	            	
                    alert("Produto cadastrado no estoque com sucesso!");	                    
                    $('#frmCadastrarEstoque').each (function(){
                    	this.reset();
                    	$("#ver-imagem").attr("src", "");
                	});	                
	            },
	            error: function(data){
	            	alert("Houve um erro! Não foi possível cadastrar" + data.status);
	            }
	        }); // fim ajax    	
		}
    });	
	
	/*
	 * buscar produtos (na pagina de cadastro de produto em estoque)
	 */
	function buscarProduto(){		
		$.ajax({			
			url : '../../controllers/estoque/estoque_controller.php?act=find_prod',  //URL que será chamada  
	        type : 'post',  //Tipo da requisição  
	        data:  $('#frmBuscarProduto').serialize(),  //dado que será enviado via POST
	        async: true,
	        dataType: 'json',  //Tipo de transmissão 	                
	        success: function(data){	        	
	        	
        		$("#codigo").val(data.codigo_produto);
	        	$("#nome").val(data.nome_produto);
	        	$("#descricao").val(data.descricao_produto);
	        	$("#ver-imagem").attr("src", data.url_imagem);
	        	$("#id").val(data.id_produtos);	        	
	        	
	        },
	        error: function(){
	        	alert('Produto "' + $("#fdBuscarProduto").val() + '" não foi localizado!');
	        }
	        
		});// fim ajax		
		
	}//fim da função buscar
	
			
	$('#fdBuscarProduto').keypress(function (e) {		
        var code = null;
        code = (e.keyCode ? e.keyCode : e.which);                
        return (code == 13) ? false : true;        
    });
	
	
	/*
	 *  buscar produtos quando clica no botão buscar
	 */
	$("#btBuscarProduto").click(function(){
		buscarProduto();		
	});
		
	/*
	 * 
	 */
	$("#btAdicinarEstoque").click(function(){
		
		var qtd = $("#add-quantidade").val();
		
		if(qtd < 0){
			alert("O valor adicionado não pode ser negativo!");
		}else{
		
			$.ajax({			
				url : '../../controllers/estoque/estoque_controller.php?act=edit',  //URL que será chamada  
		        type : 'POST',  //Tipo da requisição  
		        data:  $('#frmAddEstoque').serialize(),  //dado que será enviado via POST
		        async: true,
		        //data: {id:+"id_cliente"},
		        dataType: 'json',  //Tipo de transmissão 	                
		        success: function(data){
	    	    	if(data.status == "sucesso"){
	    	        	alert("Estoque adicionado com sucesso!");
						//$("#dialog-confirm").dialog("close");
	    	        	window.location = "index.php";
		    	    }else{
						alert("Houve um erro. Impossível salvar!");
		    	    }		    	        
		        }		        	    	        
			});// fim ajax
		}	
	});
	
	/*
	 * Carregar/Visualizar imagem do produto
	 */
	/*$("#btCarregarImagem").click(function(){
		var foto = $("#imagem").val();
		$("#ver-imagem").attr("src", foto);
	});*/
	
});