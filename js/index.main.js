$(document).ready(function(){

	var memoryGame = new MemoryGame($('#Game'));
	memoryGame.startGame();

	$(".card").flip({
		trigger: 'manual',
		front:'.backCard',
		back:'.visualCard'
	});

	$('.card').click(function() {
		memoryGame.cardClick($(this));
	});

	$("#select_difficulty").on("change",function(){
		$('#form_difficulty').submit();
	});
	
});