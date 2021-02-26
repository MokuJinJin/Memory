/**
 * @description Gestion du temps
 * @param {int} timeToResolve nombre de secondes pour résoudre le jeu
 * @param {external:Jquery} jqObjTime objet Jquery pour faire l'affichage du temps restant
 * @param {external:Jquery} jqObjProgressBar objet Jquery pour faire l'affichage de la barre de progression inversée
 */
function CountDown(timeToResolve, jqObjTimeText, jqObjProgressBar){
    
    this.secondsToResolve = timeToResolve;
    this.jqTimeText = jqObjTimeText;
    this.jqProgressBar = jqObjProgressBar;
    
    this.active = false;

    /**
     * permet d'obtenir le temps restant en millisecondes
     */
    this.tempsRestant = 0;
    
    /**
     * @description indique si le compte à rebours est actif
     * @return {boolean} 
     */
    this.isActive = function(){
        return this.active;
    }

    /**
     * @description Transforme des secondes en affichage minutes/secondes
     * @param {int} diff temps exprimé en millisecondes
     * @returns {string} affichage minutes/secondes
     */
    this.transformeTempsEnTexte = function(diff){
        return this.calculDuResteEnMinute(diff) + "m " + this.calculDuResteEnSeconde(diff) + "s ";
    }

    /**
     * @description Calcul sur le temps restant pour obtenir uniquement les minutes
     * @param {int} diff temps exprimé en millisecondes
     * @return {int} temps restant exprimé en minutes
     */
    this.calculDuResteEnMinute = function (diff){
        return Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60));
    }

    /**
     * @description Calcul sur le temps restant pour obtenir uniquement les secondes
     * @param {int} diff temps exprimé en millisecondes
     * @return {int} temps restant exprimé en secondes
     */
    this.calculDuResteEnSeconde = function(diff){
        return Math.floor((diff % (1000 * 60)) / 1000);
    }

    /**
     * @description fonction exécuté à chaque secondes par le setInterval
     */
    this.handlerInterval = function () {
        // heure du jour
        var now = new Date().getTime();

        // calcul de la différence de temps
        this.tempsRestant = this.countDownDate - now;

        // on écrit le temps pour le joueur
        this.jqTimeText.text(this.transformeTempsEnTexte(this.tempsRestant));

        // calcul du pourcentage de temps restant pour la progressBar
        var percent = this.tempsRestant / (this.secondsToResolve * 10);
        this.jqProgressBar.height(percent + '%');
        
        // si le temps est écoulé, le jeu se termine
        if (this.tempsRestant < 1000) {
            this.jqProgressBar.height('0%');
            this.jqTimeText.text("temps écoulé");
            this.stopCountDown();
            
            alert("temps écoulé, Perdu :'(");
        }
    }

    /**
     * @description Commence le compte à rebours
     */
    this.startCountDown = function(){
        // on ajoute le temps (en secondes) pour résoudre le jeu
        this.countDownDate = new Date();
        this.countDownDate.setSeconds(this.countDownDate.getSeconds() + timeToResolve);

        this.active = true;
        this.IntervalId = setInterval(this.handlerInterval.bind(this), 1000);
    }

    /**
     * @description Arrête le compte à rebours
     */
    this.stopCountDown = function(){
        this.active = false;
        clearInterval(this.IntervalId);
    }
}
