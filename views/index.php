<?php
require_once ('../lib/JqsAutoImports.php');
$JqsAutoImports = new JqsAutoImports;


print "teste";

$conn = new JqsConnectionFactory();
$ok = $conn->conectar();

//$conn = mysqli_connect("localhost","root","","preciata");

mysqli_autocommit($ok, FALSE);

//mysqli_($conn, );

mysqli_query($ok, "INSERT INTO tb_clientes(nome_cliente) values('jaques cod')");

mysqli_query($ok, "INSERT INTO tb_enderecos(logradouro_endereco, id_cliente_endereco) values('rua brilhante', last_insert_id())");

mysqli_commit($ok);

mysqli_autocommit($ok, TRUE);

//mysqli_query($conn, "COMMIT");

//mysqli_query($conn, "SET AUTOCOMMIT=1");