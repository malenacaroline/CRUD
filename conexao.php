<?php
	
	$servername = "localhost";
	$db = "teste";
	$username = "root";
	$password = '';

		$conexao = new mysqli($servername, $username, $password, $db);
		if ($conexao->connect_error) {
			echo "Erro na conexão com o banco de dados.";
    		die("Erro: " . $conexao->connect_error);
		}
?>