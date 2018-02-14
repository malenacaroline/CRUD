function exibir(status){
	var btn = document.getElementById('btn-novo');
	var div = document.getElementById('form-novo');

	if(status == 1){
		// btn.style.display = 'none';
		div.style.display = 'block';
	}else{
		// btn.style.display = 'block';
		div.style.display = 'none';
	}
}
function buscaCliente(element){
	// $(document).ready(function(){
 //    $("#submit").on('click', function(){
        $.ajax({
            url: 'busca.php', 
            type : "POST", 
            data : {id: element.value}, 
            success : function(dados) {
            	var obj = JSON.parse(dados);
            	console.log(obj);
            	$("#consulta").html("<form>"+
            		"<label style='margin-left: 25px;color:steelblue;'>Id:&nbsp;&nbsp;</label><input style='width: 100px;' type=text name=id value="+obj['id']+" readonly><br><br>"+
            		"<label style='color:steelblue;'>Nome:&nbsp;&nbsp;</label><input type=text name=nome value="+obj['nome']+"><br><br>"+
            		"<label style='color:steelblue;'>Email:&nbsp;&nbsp;</label><input type=email name=email value="+obj['email']+">"+
            		"</form>");
                $("#consulta_deleta").html("<form>"+
            		"<label style='margin-left: 25px;color:steelblue;'>Id:&nbsp;&nbsp;</label><input style='width: 100px;' type=text name=id value="+obj['id']+" readonly><br><br>"+
            		"<label style='color:steelblue;'>Nome:&nbsp;&nbsp;</label><input type=text name=nome value="+obj['nome']+"><br><br>"+
            		"<label style='color:steelblue;'>Email:&nbsp;&nbsp;</label><input type=email name=email value="+obj['email']+">"+
            		"</form>");
            },
            error: function() {
                console.log("A requisição AJAX falhou!");
            }
        })
//     });
// });
}