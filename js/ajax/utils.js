function transformeTempsEnTexte(time){
    var minutes = Math.floor((time % (1000 * 60 * 60)) / (1000 * 60));
    var secondes = Math.floor((time % (1000 * 60)) / 1000);
    return minutes+"m "+secondes+"s ";
}