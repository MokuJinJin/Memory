$(document).ready(function(){
	//alert('JQ');
	$(".card").flip({
		trigger: 'manual',
		front:'.backCard',
		back:'.visualCard'
	});
});