/**
 * @description Gestion du jeu
 * @param {external:Jquery} jqObj
 */
function MemoryGame(jqObj) {

    this.jqObject = jqObj;
    /**
     * Paramétrage du temps d'attente de retournement automatique des cartes
     */
    const tempsAttenteApresDeuxCarteDifferentes = 1800;

    /**
    * Difficulté du jeu
    */
    this.difficulty = new Difficulty(jqObj);

    /*
    * Gestion des cartes visibles (retournées)
    */
    this.flippedCards = new CardPair();

    /*
    * Nombre de paire trouvées
    */
    this.numberOfPairFound = 0;

    /**
     * Gestion du temps
     */
    this.countdown = new CountDown(this.difficulty.TimeToResolve, $("#countDown"), $(".progressBar--color"));

    /**
     * @description si on a trouvé autant de paire que possible, on a gagné
     * @return {boolean} 
     */
    this.isGameWin = function () {
        return this.difficulty.NumberOfMaxPair == this.numberOfPairFound;
    }

    /**
     * @description rajoute une paire de cartes trouvée
     */
    this.augmentPairFound = function () {
        this.numberOfPairFound++;
    }

    /**
     * @description Commence le jeu
     */
    this.startGame = function () {
        //console.log('Game Started !');
        this.countdown.startCountDown();
    }

    /**
     * @description Remet les cartes dans l'état d'origine : pas la bonne paire de cartes
     */
    this.resetNotMatchedFruit = function () {
        $.each(this.flippedCards.listOfCards, function (index, obj) {
            // on retourne la carte face non-visible
            obj.jqObject.flip(false);
        });
        // on remet à zéro la liste des cartes visibles
        this.flippedCards.resetlistOfCards();
    }

    /**
     * @description calcul du temps passé en fin de jeu
     * @return {int} 
     */
    this.getElapsedTime = function(){
        return this.countdown.secondsToResolve * 1000 - this.countdown.tempsRestant;
    }

    /**
     * @description Méthode pour décider de la fin du jeu
     */
    this.checkWinGame = function () {
        if (this.isGameWin()) {
            this.countdown.stopCountDown();
            
            //alert("Vous avez gagné en " + this.countdown.transformeTempsEnTexte(elapsedTime));
            $("#winner-popup--time").text(this.countdown.transformeTempsEnTexte(this.getElapsedTime()));

            $("#winner-popup--btnValider").click(this.winnerSaveHighScore.bind(this));
            
            $("#winner-popup").css("display","flex");
            
        }
    }
    
    /**
     * @description Méthode pour enregistrer le high score
     */
    this.winnerSaveHighScore = function(){
        var playerName = $("#winner-popup--playerName").val();
        if (playerName.length > 3) {playerName = playerName.substring(0, 3);}

        var highScore = new HighScore(playerName, (this.difficulty.NumberOfMaxPair * 2), this.getElapsedTime())

        $.ajax({
            url: "vendor/oclock/game/ajax/newHighScore.php",
            type: 'POST',
            data: { 'high_score': JSON.stringify(highScore)},
            dataType: 'json'
        }).done(function () {
            //alert("success");
            $("#winner-popup").css("display","none");
        })
        .fail(function (dataError) {
            console.log(dataError);
            //alert("error : " + dataError);
            alert("l'enregistrement de la partie n'a pas pu être effectué, désolé.");
            $("#winner-popup").css("display","none");
        });
    }

    /**
     * @description Gestion du click sur une carte
     * Principale méthode du jeu
     * @param {external:Jquery} jqObject
     */
    this.cardClick = function (jqObject) {

        // empèche de cliquer sur trop de carte en même temps
        if (this.flippedCards.isMaxCards()) { return; }

        // récupération des informations de la cartes 'en cours'
        var clickedCard = new FruitCard(jqObject);

        // si la carte est déjà marquée comme visible (retournée) on s'arrête
        if (clickedCard.isFlipped() || this.flippedCards.isCardAlreadyThere(clickedCard)) { return; }

        // Ajout à la liste des cartes visibles
        this.flippedCards.addCard(clickedCard);

        // on anime la carte
        clickedCard.jqObject.flip(true);

        // si on a assez de cartes visibles
        if (this.flippedCards.isMaxCards()) {

            // si les cartes visibles sont identique
            if (this.flippedCards.isCardsAreSameFruit()) {
                //console.log('match fruits : '+clickedCard.fruitName);
                $.each(this.flippedCards.listOfCards, function (index, fruitCard) {
                    // on marque les cartes comme étant validé et visible
                    fruitCard.markFlipped();
                });
                // on remet à zéro la liste des cartes visibles
                this.flippedCards.resetlistOfCards();
                this.augmentPairFound();
                this.checkWinGame();
            } else {
                //console.log('missmatch fruits');
                // les cartes sont différentes
                setTimeout(
                    // Utilisation de bind() pour pouvoir passer 'this' en arguments dans la function 'handler' invoqué par setTimeout()
                    this.resetNotMatchedFruit.bind(this),
                    // temps d'attente pour que l'on puisse voir les cartes que l'on a retournés
                    tempsAttenteApresDeuxCarteDifferentes);
            }
            //console.log(this.numberOfPairFound + '/' + this.difficulty.NumberOfMaxPair);
        }
    }
}