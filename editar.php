<?php
	include('conexao.php');

	$id = $_POST['id'];
	$sql = "SELECT * FROM clientes WHERE id=".$id;
	$query = $conexao->query($sql); 
	while ($row = $query->fetch_array()) {
		$dados = array(
			"id"=> $row['id'],
			"nome"=> $row['nome'],
			"email"=>$row['email']
		);
	}
	print json_encode($dados);
?>