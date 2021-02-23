function MemoryGame(jqObj){

    this.jqObject = jqObj;

    this.difficulty = new Difficulty(jqObj);

    // Gestion des cartes visibles (retournées)
    this.flippedCards = new CardPair();

    // TODO : Gestion du temps 
    console.log('Time to resolve : ' + this.difficulty.TimeToResolve);

    // Nombre de paire trouvées
    this.numberOfPairFound = 0;

    // si on a trouvé autant de paire que possible, on a gagné
    this.isGameWin = function () {
        return this.difficulty.NumberOfMaxPair == this.numberOfPairFound;
    }

    // rajoute une paire de cartes trouvée
    this.augmentPairFound = function(){
        this.numberOfPairFound++;
    }

    this.startGame = function(){
        console.log('Game Started !');
        // TODO : commence à décrémenter le temps
    }

    this.resetNotMatchedFruit = function () {
        $.each(this.flippedCards.listOfCards, function (index, obj) {
            // on retourne la carte face non-visible
            obj.jqObject.flip(false);
        });
        // on remet à zéro la liste des cartes visibles
        this.flippedCards.resetlistOfCards();
    }

    this.checkWinGame = function () {
        if (this.isGameWin()) {
            alert("Vous avez gagné");
            // TODO : log time using ajax
        }
    }

    this.cardClick = function(jqObject){
        
        // empèche de cliquer sur trop de carte en même temps
        if (this.flippedCards.isMaxCards()) {return;}
        
        // récupération des informations de la cartes 'en cours'
        var clickedCard = new FruitCard(jqObject);

        // si la carte est déjà marquée comme visible (retournée) on s'arrête
        if (clickedCard.isFlipped()) {return;}

        // Ajout à la liste des cartes visibles
        this.flippedCards.addCard(clickedCard);
        
        // on anime la carte
        clickedCard.jqObject.flip(true);
        
        // si on a assez de cartes visibles
        if (this.flippedCards.isMaxCards()) {

            // si les cartes visibles sont identique
            if (this.flippedCards.isCardsAreSameFruit()) {
                console.log('match fruits : '+clickedCard.fruitName);
                $.each(this.flippedCards.listOfCards, function (index, fruitCard) {
                    // on marque les cartes comme étant validé et visible
                    fruitCard.markFlipped();
                });
                // on remet à zéro la liste des cartes visibles
                this.flippedCards.resetlistOfCards();
                this.augmentPairFound();
                this.checkWinGame();
            } else {
                console.log('missmatch fruits');
                // les cartes sont différentes
                setTimeout(
                    // Utilisation de bind() pour pouvoir passer 'this' en arguments dans la function 'handler' invoqué par setTimeout()
                    this.resetNotMatchedFruit.bind(this), 
                    // temps d'attente pour que l'on puisse voir les cartes que l'on a retournés
                    1800);
            }
            console.log(this.numberOfPairFound + '/' + this.difficulty.NumberOfMaxPair);
        }
    }
}