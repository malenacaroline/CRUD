<?php
	include('conexao.php');

	$nome = $_POST['nome'];
	$email = $_POST['email'];

	$sql = "INSERT INTO clientes (nome,email) VALUES ('".$nome."','".$email."')";
	if ($conexao->query($sql) === TRUE) {
	    echo "<br>";
		echo "<font style='color: rgb(2, 172, 51);'>Usuário cadastrado com sucesso!</font>";
		echo "<br>";
	} else {
	    echo "Erro: " . $sql . "<br>" . $conexao->error;
	}
?>