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
function editaCliente(element){
	// $(document).ready(function(){
 //    $("#submit").on('click', function(){
        $.ajax({
            url: 'editar.php', 
            type : "POST", 
            data : {id: element.value}, 
            success : function(dados) {
            	$("#consulta").html(dados);
                
            },
            error: function() {
                console.log("A requisição AJAX falhou!");
            }
        })
//     });
// });
}