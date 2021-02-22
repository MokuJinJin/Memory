$(document).ready(function(){

    $activeCards = new Array();

    $('.card').click(function(){
        // empèche de cliquer sur trop de carte en même temps
        if ($activeCards.length == 2) {return;}
        
        var actualCard = $(this);
        if (actualCard.data('active') == "activated") {return;}

        // Liste des cartes actives
        $activeCards.push(actualCard);
        
        actualCard.flip(true);
        
        if ($activeCards.length == 2) {

            var fruit1 = $($activeCards[0]).find(".visualCard").data("fruit");
            var fruit2 = $($activeCards[1]).find(".visualCard").data("fruit");

            if (fruit1 != fruit2) {
                setTimeout(
                    function() 
                    {
                        $.each($activeCards, function (index, obj) {
                            obj.flip(false);
                        });
                        $activeCards = new Array();
                    }, 1800);
            } else {
                $.each($activeCards, function (index, obj) {
                    obj.addClass('card--active').data("active", "activated");
                });
                $activeCards = new Array();
            }
        }
    });

});