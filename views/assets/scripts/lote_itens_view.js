/**
 * 
 */
//encoding=utf-8
jQuery(document).ready(function(){	

	/*
	 * Listar itens
	 */
	function listarItens(){
		$("#lista_lotes").empty();
		
		$.ajax({			
			url : '../../controllers/lote/lote_controller.php?act=list_itens',  //URL que será chamada  
	        type : 'POST',  //Tipo da requisição  
	        data:  $('#frmAddIten').serialize(),  //dado que será enviado via POST
	        async: true,
	        dataType: 'json',  //Tipo de transmissão 	                
	        success: function(data){	        	
	        	for(var i = 0; i < data.length; i++) {
	        		$("#lista_it").append("<tr><td>" + data[i].codigo_produto + "</td><td>" + data[i].nome_produto 
	        			+"</td><td>" + data[i].quantidade_itens + "</td><td>" + data[i].preco_venda + "</td>");
                }
	        },
	        error: function(erro){
	        	alert(erro.responseText);
	        }
		});// fim ajax
	}//fim da função listarLotes
	
	
	$(function(){		
		listarItens();
	});
});