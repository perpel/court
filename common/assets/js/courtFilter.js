$(function(){

	// filter select 
	$("select[data-filter='select']").change(function(){

		var txt = $(this).text();
		alert(txt);

	});

});