<?php
	include('conexao.php');

	$id = $_POST['id'];
	$nome = $_POST['nome'];
	$email = $_POST['email'];

	$sql = "UPDATE clientes SET nome='".$nome."',email='".$email."' WHERE id=".$id;
	echo ($sql);
	if ($conexao->query($sql) === TRUE) {
	    echo "<br>";
		echo "<font style='color: rgb(2, 172, 51);'>Usuário cadastrado com sucesso!</font>";
		echo "<br>";
	} else {
	    echo "Erro: " . $sql . "<br>" . $conexao->error;
	}
?>