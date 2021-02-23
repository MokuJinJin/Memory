
/**
 * @description Gestion du temps
 * @param {int} seconds nombre de secondes pour résoudre le jeu
 * @param {external:Jquery} jqObj objet Jquery pour faire l'affichage du temps restant
 */
function CountDown(seconds, jqObj) {

    this.timeToResolve = seconds;

    this.startCountDown = function () {
        
        var countDownDate = new Date();
        // on ajoute le temps (en secondes) pour résoudre le jeu
        countDownDate.setSeconds(countDownDate.getSeconds() + this.timeToResolve);

        // mise à jour toutes les secondes
        var x = setInterval(function () {

            // heure du jour
            var now = new Date().getTime();

            // calcul de la différence de temps
            var distance = countDownDate - now;

            // calculs 
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);

            // on écrit le temps pour le joueur
            jqObj.text(minutes + "m " + seconds + "s ");

            // si le temps est écoulé, le jeu se termine
            if (distance < 0) {
                clearInterval(x);
                jqObj.text("temps écoulé");
                alert("temps écoulé, Perdu :'(");
            }
        }, 1000);
    }
}

