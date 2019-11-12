$(document).ready(function() {
	$('#alertabuton').click(function(){
		$('#alerta').show('fade');
		setTimeout(function() {
			$('#alerta').hide('fade');
			
		}, 5000);
	
});