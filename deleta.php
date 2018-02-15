<?php
	include('conexao.php');

	$id = $_POST['id'];

	$sql = "DELETE FROM clientes WHERE id=".$id;
	if ($conexao->query($sql) === TRUE) {
	    echo "<br>";
		echo "<font style='color: red;'>Usuário deleta com sucesso!</font>";
		echo "<br>";
	} else {
	    echo "Erro: " . $sql . "<br>" . $conexao->error;
	}
?>