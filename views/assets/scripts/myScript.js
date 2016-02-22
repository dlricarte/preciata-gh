/**
 * 
 */
//encoding=utf-8
jQuery(document).ready(function(){
	
	$(document).ajaxStart($.blockUI).ajaxStop($.unblockUI);
		
	/*
	 * LOGIN
	 * 
	 */
	$('#btEntrar').click(function(){ //botão entrar
		
		/*
		 * valores do form login
		 */
		var usuario = $('#usuario').val();
		var senha = $('#senha').val();		
		
		/*
		 * verifica se os campos estao vazios
		 */
		if(usuario == "" || senha == ""){
			//alert("Não deixe campos vazios");
			$('#frmLogin').submit();
		}else{
			$('#frmLogin').submit();
		}
		
		/*
		 * verifica sa há cmpos nulos
		 */
		$('#frmLogin input').each(function(){
			count++;
		});
	}); 
	
	
	/* *************************************************************
	 * CLIENTES	 * 
	 * *************************************************************/
	$("#nome").focus();
	
	$("#btSalvarCliente").click(function(){
		
		var nome = $("#nome").val();
		var fone = $("#fone").val();
		var tipo = $("#tipo").val();
		
		if(nome == ""){			
			alert('O campo "Nome" é obrigatório!');
		}else if (fone == "") {
			alert('O campo "Fone" é obrigatório!');
		}else if (tipo == "") {
			alert('O campo "tipo" é obrigatório!');
		}else{		
	    	$.ajax({
	    		
	    		url : '../../controllers/cliente/clientes_controller.php?act=new', /* URL que será chamada */ 
	            type : 'POST', /* Tipo da requisição */ 
	            data:  $('#frmCadastrarCliente').serialize(), /* dado que será enviado via POST */
	            dataType: 'json', /* Tipo de transmissão */	                
	            success: function(data){
	                if(data.status == "success"){
	                    alert("Cliente cadastrado com sucesso!");	                    
	                    $('#frmCadastrarCliente').each (function(){
	                    	this.reset();
                    	});
	                }else{
	                    alert("Houve um erro! Não foi possível cadastrar");
	                    $("#nome").focus();
	                }
	            },
	            error: function(erro){
	            	alert("Não foi possível salvar este cliente! Verifique se já está cadastrado no sistema!");
	            }
	        }); // fim ajax    	
		}
    });
	
	
	/*
	 * botão buscar clientes
	 */
	$("#btBuscarCliente").click(function(){
		buscar();		
	});
	
		
	$("#fdBuscarCliente").keypress(function (e) {
		var code = null;
	    code = (e.keyCode ? e.keyCode : e.which); 
	        
	    if(code == 13){
	    	buscar();
	    	//$("#fdBuscarCliente").focus();
	    }	        
	        //return (code == 13) ? false : true;
	});
	
	
	/*
	 * buscar clientes
	 */
	function buscar(){
		$("#lista_clientes").empty();
		
		$.ajax({			
			url : '../../controllers/cliente/clientes_controller.php?act=find',  //URL que será chamada  
	        type : 'POST',  //Tipo da requisição  
	        data:  $('#frmBuscarCliente').serialize(),  //dado que será enviado via POST
	        async: true,
	        //data: {id:+"id_cliente"},
	        dataType: 'json',  //Tipo de transmissão 	                
	        success: function(data){	        	
	        	for(var i = 0; i < data.length; i++) {
	        		$("#lista_clientes").append("<tr><td class='hidden-xs'>" + data[i].id_cliente + "</td><td>" + data[i].nome_cliente + "</td><td>" + 
	        			data[i].fone_cliente + "</td><td class='hidden-xs'>" + data[i].tipo_cliente + "</td><td class='hidden-xs'>" + data[i].whatsapp_cliente + "</td>" + 
	        			"<td class='right'><a href='../../views/clientes/edit.php?id="+data[i].id_cliente+"' class='btn btn-default' title='Editar'><span class='glyphicon glyphicon-pencil' /></a>&nbsp;"+
	        			"<a href='../../views/clientes/view.php?id="+data[i].id_cliente+"' class='btn btn-default' title='Visualizar'><span class='glyphicon glyphicon-share' /></td></tr>");
                }
	        }
		});// fim ajax
	}//fim da função buscar	
					
	/*
	 * listagem de todos os clientes
	 */
	$(function(){		
		buscar();
	});
	
	/*
	 * validações form cliente
	 */	
	$("#aniversario").keypress(function(){
		$("#aniversario").mask("99/99/9999");
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
	
	
	
	
	/*
	 * 
	 */
	/*$(function(){
		$.ajax({			
			url : '../../controllers/cliente/clientes_controller.php?act=edit&id=41',  //URL que será chamada  
	        type : 'POST',  //Tipo da requisição  
	        //data:  $('#frmBuscarCliente').serialize(),  //dado que será enviado via POST
	        async: true,
	        //data: {id:+"id_cliente"},
	        dataType: 'json',  //Tipo de transmissão 	                
	        success: function(data){
	        	console.log(data.nome_cliente);
	        	//$('#nome').append(data.nome_cliente);
	        }
		});// fim ajax
	});*/
});
