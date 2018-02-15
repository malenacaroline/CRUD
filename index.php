<?php 
	include('conexao.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>CRUD - PHP</title>
	<meta charset="utf-8">
	<link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script type="text/javascript" src="js/functions.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script type="text/javascript">
		
		$(document).ready(function(){
		    $("#submit").on('click', function(){
		        $.ajax({
		            url: 'cadastra.php', 
		            type : "POST", 
		            data : $("#form").serialize(), 
		            success : function() {
		            	var result = "<br><font style='color: rgb(2, 172, 51);'>Usuário cadastrado com sucesso!</font><br>";
		                $("#frase").html(result);
		            },
		            error: function() {
		                console.log("A requisição AJAX falhou!");
		            }
		        })
		    });
		});
	</script>
</head>
<body>
	<div class="container">
		<button class="btn btn-info btn-cadastro" id="btn-novo" onClick="exibir(1);">Cadastrar Cliente</button>
	</div>
	<br>
	<div class="container">
		<div id="frase"></div>
		<div class="novo-registro" id="form-novo">
			<i class="fas fa-times close" onClick="exibir(0);"></i>
			<h3>Cadastro de Cliente</h3><br>
			<form id="form" method="POST">
				<input type="text" name="nome"  placeholder="Nome">
				<input type="email" name="email" placeholder="Email"><br><br>
				<input type="hidden" name="opcao" value="cadastrar">
				<input class="btn btn-primary" id="submit" type="submit" name="enviar" value="Cadastrar" onClick="exibir(0);">
			</form>
		</div>

		<div class="table-responsive">
			<table class="table table-striped">
				<thead>
					<tr>
						<th>Id</th>
						<th>Nome</th>
						<th>Email</th>
						<th>Ações</th>
					</tr>			
				</thead>
				<tbody>
					<?php 
						$sql = "SELECT * FROM clientes";
						$query = $conexao->query($sql);

						while ($row = $query->fetch_array()) {
							echo "<tr>";
	        					echo "<td>".$row['id']."</td>";
	        					echo "<td>".$row['nome']."</td>";
	        					echo "<td>".$row['email']."</td>";
	        					echo "<td>";
	        					echo "<center>";
			        			echo "<button class='btn btn-primary' id='btn-editar' value=".$row['id']." data-toggle='modal' data-target='#editaCliente' onClick='buscaCliente(this);'><i class='far fa-edit'></i>&nbsp;Editar</button>&nbsp;&nbsp;&nbsp;&nbsp;";
			        			echo "<button class='btn btn-danger' data-toggle='modal' data-target='#deletaCliente' onClick='buscaCliente(this);' value=".$row['id']."><i class='fas fa-times'></i>&nbsp;Deletar</button>";
			        			echo "</center>";
		        			echo "</td>";
        					echo "</tr>";
						}
					?>
			    </tbody>
			</table>
			
		</div>
	</div>
	<!-- Modal Edita Cliente-->
	<div id="editaCliente" class="modal fade" role="dialog" static>
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	        <h4 class="modal-title">Editar Cliente</h4>
	      </div>
	      <div class="modal-body">
	      	<div id="consulta"></div>
	      </div>
	      <div class="modal-footer">
	      	<input class="btn btn-primary" type="submit" data-dismiss="modal" name="enviar" value="Salvar" onClick="editaCliente();">
	      </div>
	    </div>

	  </div>
	</div>

<!-- Modal Deleta Cliente-->
	<div id="deletaCliente" class="modal fade" role="dialog" static>
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	        <h3 class="modal-title"><center>Excluir Cliente</center></h3>
	      </div>
	      <div class="modal-body">
	      	<center>
	      		<h5>Você deseja realmente excluir este cliente?</h5><br>
	      	</center>
	      	<div id="consulta_deleta"></div>
	      </div>
	      <div class="modal-footer">
	      	<input class="btn btn-danger" type="submit" data-dismiss="modal" name="enviar" value="Confirmar" onClick="deletaCliente();">
	      </div>
	    </div>

	  </div>
	</div>

</body>
</html>