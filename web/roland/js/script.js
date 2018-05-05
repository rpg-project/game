$(document).ready(function()
{
	$(".decoration").click(function(){
		var decor = $(this).attr('title');
		$('#form_decoration').val(decor);
	});
	$(".monster").click(function(){
		var monster = $(this).attr('title');
		$('#form_monster').val(monster);
	});
});