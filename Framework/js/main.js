$(function(){
	$('#buscador').submit(function(e){
		e.preventDefault();
	});
	$('#buscar').keyup(function(){
		var envio=$("#buscar").val();
		$('#resultados').html('<li id="st"><img src="../Framework/act/2.gif" alt="" height="40px" /><h4 class="text-center">Cargando</h4></li>');
		$.ajax({
			type: "POST",
			url: "../Framework/act/buscador.php",
			data: ('buscar='+envio),
			success: function(resp){
				if(resp!=""){
					$("#resultados").html(resp);
				}
			}
		});
	});
});
$(function(){
	$('#buscado').submit(function(e){
		e.preventDefault();
	});
	$('#busca').keyup(function(){
		var envio=$("#busca").val();
		$('#resultado').html('<li id="st"><img src="../Framework/act/2.gif" alt="" height="40px" /><h4 class="text-center">Cargando</h4></li>');
		$.ajax({
			type: "POST",
			url: "buscador.php",
			data: ('buscar='+envio),
			success: function(resp){
				if(resp!=""){
					$("#resultado").html(resp);
				}
			}
		});
	});
});

