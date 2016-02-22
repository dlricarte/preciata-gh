/**
 * 
 */
//encoding=utf-8

jQuery(document).ready(function(){
	
	$(document).ajaxStart($.blockUI).ajaxStop($.unblockUI);
	
	
	
	/* *************************************************************
	 * CLIENTES	 * 
	 * *************************************************************/
	$("#nome").focus();
	
	$("#btSalvarRegistrar").click(function(){
		
		//alert("ok");
				
    	$.ajax({        	 	        	   
    		url : '../../controllers/lote/lote_controller.php?act=new', /* URL que será chamada */ 
            type : 'POST', /* Tipo da requisição */ 
            data:  $('#frmCadastrarLote').serialize(), /* dado que será enviado via POST */
            dataType: 'json', /* Tipo de transmissão */	                
            success: function(data){
                if(data.status == "sucesso"){
                    alert("Pedido cadastrado com sucesso!");
                    window.location = "../../views/lotes/itens.php?id="+$('#id').val();
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
	
	
	/*
	 * botão buscar clientes
	 */
	$("#btBuscarCliente").click(function(){
		buscar();		
	});
	
	$("#fdBuscarCliente").keypress(function(){
		
		$('input').keypress(function (e) {
	        var code = null;
	        code = (e.keyCode ? e.keyCode : e.which);                
	        return (code == 13) ? false : true;
	   });
	});
	
	
	
	
	/*
	 * buscar clientes
	 */
	function buscar(){
		$("#lista_clientes").empty();
		
		if($("#fdBuscarCliente").val() == ""){
			
		}else{
			$.ajax({			
				url : '../../controllers/lote/lote_controller.php?act=find_cli',  //URL que será chamada  
		        type : 'POST',  //Tipo da requisição  
		        data:  $('#frmBuscarCliente').serialize(),  //dado que será enviado via POST
		        async: true,
		        //data: {id:+"id_cliente"},
		        dataType: 'json',  //Tipo de transmissão 	                
		        success: function(data){        	
		        	
		        	$("#nome").val(data.nome_cliente);
		        	$("#fone").val(data.fone_cliente);
		        	$("#whatsapp").val(data.whatsapp_cliente);
		        	
		        	$("#facebook").val(data.facebook_cliente);
		        	$("#email").val(data.email_cliente);
		        	$("#tipo").val(data.tipo_cliente);
		        	
		        	$("#indicacao").val(data.indicacao_cliente);
		        	$("#instagran").val(data.instagran_cliente);
		        	$("#aniversario").val(data.aniversario_cliente);
		        	
		        	$("#id").val(data.id_cliente);
		        	
		        	/*for(var i = 0; i < data.length; i++) {
		        		$("#lista_clientes").append("<tr><td class='hidden-xs'>" + data[i].id_cliente + "</td><td>" + data[i].nome_cliente + "</td><td>" + 
		        			data[i].fone_cliente + "</td><td class='hidden-xs'>" + data[i].tipo_cliente + "</td><td class='hidden-xs'>" + data[i].whatsapp_cliente + "</td>" + 
		        			"<td class='right'>&nbsp;"+
		        			"<a href='../../controllers/lote/lote_controller.php?act=new&id="+ data[i].id_cliente + "' class='btn btn-default' title='Selecionar'><span class='glyphicon glyphicon-ok' /></button></td></tr>");	        		
		        		
	                }*/	        	
		        },
		        error: function(erro){
		        	alert(erro.responseText);
		        }
			});// fim ajax		
		}
	}//fim da função buscar		
	
						
	/*
	 * listagem de todos os clientes
	 */
	$(function(){		
		//buscar();	
	});
	
	/*
	 * validações form cliente
	 */	
	$("#aniversario").keypress(function(){
		$("#aniversario").mask("99/99");
	});
	
	$("#fone").keypress(function(){
		$("#fone").mask("(99)99999-9999");		
	});
	
	$("#whatsapp").keypress(function(){
		$("#whatsapp").mask("(99)99999-9999");		
	});
	
	$("#cep").keypress(function(){
		$("#cep").mask("99999-999");
	});
	
	
});
