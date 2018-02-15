function exibir(status){
	var btn = document.getElementById('btn-novo');
	var div = document.getElementById('form-novo');

	if(status == 1){
		div.style.display = 'block';
	}else{
		div.style.display = 'none';
	}
}
function buscaCliente(element){
        $.ajax({
            url: 'busca.php', 
            type : "POST", 
            data : {id: element.value}, 
            success : function(dados) {
            	var obj = JSON.parse(dados);
            	console.log(obj);
            	$("#consulta").html("<form id='form_editar' method='POST'>"+
            		"<label style='margin-left: 25px;color:steelblue;'>Id:&nbsp;&nbsp;</label><input style='width: 100px;' type='text' name='id' value="+obj['id']+" readonly><br><br>"+
            		"<label style='color:steelblue;'>Nome:&nbsp;&nbsp;</label><input type='text' name='nome' value="+obj['nome']+"><br><br>"+
            		"<label style='color:steelblue;'>Email:&nbsp;&nbsp;</label><input type='email' name='email' value="+obj['email']+">"+
                    // "<input class='btn btn-primary' type='submit' data-dismiss='modal' name='enviar' value='Salvar' onClick='editaCliente();'>"+
            		"</form>");
                $("#consulta_deleta").html("<form id='form_deletar' method='POST'>"+
            		"<label style='margin-left: 25px;color:steelblue;'>Id:&nbsp;&nbsp;</label><input style='width: 100px;' type=text name='id' value="+obj['id']+" readonly><br><br>"+
            		"<label style='color:steelblue;'>Nome:&nbsp;&nbsp;</label><input type=text name='nome' value="+obj['nome']+"><br><br>"+
            		"<label style='color:steelblue;'>Email:&nbsp;&nbsp;</label><input type=email name='email' value="+obj['email']+">"+
            		"</form>");
            },
            error: function() {
                console.log("A requisição AJAX falhou!");
            }
        });
}
function editaCliente(){
    var dados = $("#form_editar").serialize();
    console.log(dados);
    $.ajax({
        url: "edita.php", 
        type : "POST", 
        data : dados, 
        success : function() {
            alert("Dados do cliente alterados com sucesso.");
            window.location.reload('index.php');
        },
        error: function() {
            console.log("A requisição AJAX falhou!");
        }
    });
}
function deletaCliente(){
    var dados = $("#form_deletar").serialize();
    console.log(dados);
    $.ajax({
        url: "deleta.php", 
        type : "POST", 
        data : dados, 
        success : function() {
            alert("Dados do cliente deletados com sucesso.");
            window.location.reload('index.php');
        },
        error: function() {
            console.log("A requisição AJAX falhou!");
        }
    });
}