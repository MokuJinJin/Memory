$(document).ready(function(){
	//alert('JQ');
	$(".card").flip({
		trigger: 'manual',
		front:'.card--front',
		back:'.card--back'
	});
	$('.card').click(function(){
		var actualCard = $(this);
		var flip = actualCard.data("flip-model");
		actualCard.flip('toggle');
		
		if (flip.isFlipped){
			//actualCard.last().removeClass("card--banana");
		}
		else {
			//actualCard.last().addClass("card--banana");
		}
	});
});