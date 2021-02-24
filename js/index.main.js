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
});