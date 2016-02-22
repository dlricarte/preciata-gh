/**
 * 
 */
//encoding=utf-8
jQuery(document).ready(function(){
	
	$(document).ajaxStart($.blockUI).ajaxStop($.unblockUI);
		
	/*
	 * 
	 */
	$("#codigo").focus();	
	
	$("#btSalvarProduto").click(function(){
		
		var nome = $("#nome").val();
		var codigo = $("#codigo").val();
		
		
		if(codigo == ""){			
			alert('O campo "Código" é obrigatório!');
		}else if (nome == "") {
			alert('O campo "Nome do produto" é obrigatório!');
		}else{		
	    	$.ajax({        	 	        	   
	    		url : '../../controllers/produto/produto_controller.php?act=new', /* URL que será chamada */ 
	            type : 'POST', /* Tipo da requisição */ 
	            data:  $('#frmCadastrarProduto').serialize(), /* dado que será enviado via POST */
	            dataType: 'json', /* Tipo de transmissão */	                
	            success: function(data){
	                if(data.status == "success"){
	                    alert("Produto cadastrado com sucesso!");	                    
	                    $('#frmCadastrarProduto').each (function(){
	                    	this.reset();
	                    	$("#ver-imagem").attr("src", "");
                    	});
	                }else{
	                    alert("Houve um erro! Não foi possível cadastrar");
	                    $("#codigo").focus();
	                }
	            },
	            error: function(erro){
	            	alert("Não foi possível salvar este produto!\n"+" Verifique se este código já está cadastrado!");
	            }
	        }); // fim ajax    	
		}
    });
	
	
	/*
	 *  buscar produtos quando clica no botão buscar
	 */
	$("#btBuscarProduto").click(function(){
		buscar();		
	});
	
	
	/*
	 * busca produtos quando digita no campo de busca
	 */
	$("#fdBuscarProduto").keypress(function(){
		buscar();
		$('input').keypress(function (e) {
	        var code = null;
	        code = (e.keyCode ? e.keyCode : e.which);                
	        return (code == 13) ? false : true;
	   });
	});
	
	/*
	 * buscar produtos
	 */
	function buscar(){
		$("#lista_produtos").empty();
		
		$.ajax({			
			url : '../../controllers/produto/produto_controller.php?act=find',  //URL que será chamada  
	        type : 'POST',  //Tipo da requisição  
	        data:  $('#frmBuscarProduto').serialize(),  //dado que será enviado via POST
	        async: true,
	        //data: {id:+"id_cliente"},
	        dataType: 'json',  //Tipo de transmissão 	                
	        success: function(data){	        	
	        	for(var i = 0; i < data.length; i++) {
	        		$("#lista_produtos").append("<tr><td>" + data[i].codigo_produto + "</td><td>" + data[i].nome_produto + "</td><td>R$" + 
	        			data[i].preco_compra + "</td><td>R$" + data[i].preco_venda + "</td><td>R$" + data[i].preco_revenda + "</td>" + 
	        			"<td class='right'><a href='../../views/produtos/edit.php?id="+data[i].id_produtos+"' class='btn btn-default' title='Editar'><span class='glyphicon glyphicon-pencil' /></a>&nbsp;"+
	        			"<a href='../../views/produtos/view.php?id="+data[i].id_produtos+"' class='btn btn-default' title='Visualizar'><span class='glyphicon glyphicon-share' /></td></tr>");
                }
	        }
		});// fim ajax
	}//fim da função buscar
	
	
	/*
	 * 
	 */
	$("#btSalvarProdutoEditado").click(function(){				
		$.ajax({			
			url : '../../controllers/produto/produto_controller.php?act=edit',  //URL que será chamada  
	        type : 'POST',  //Tipo da requisição  
	        data:  $('#frmProdutoEditado').serialize(),  //dado que será enviado via POST
	        async: true,
	        //data: {id:+"id_cliente"},
	        dataType: 'json',  //Tipo de transmissão 	                
	        success: function(data){
    	    	if(data.status == "sucesso"){
    	        	alert("Produto editado com sucesso!");
					//$("#dialog-confirm").dialog("close");
    	        	window.location = "index.php";
	    	    }else{
					alert("Houve um erro. Impossível salvar!");
	    	    }		    	        
	        },
	        error: function(erro){
            	alert("Não foi possível salvar este produto!\n"+" Verifique se este código já está cadastrado!");
            }
	        
		});// fim ajax
	});
	
	
	
	/*
	 * listagem de todos os clientes
	 */
	$(function(){		
		buscar();
	});
	
	
	/*
	 * Carregar/Visualizar imagem do produto
	 */
	$("#btCarregarImagem").click(function(){
		var foto = $("#imagem").val();
		$("#ver-imagem").attr("src", foto);
	});
	
});
