/**
 * @description Informations sur la difficulté du jeu
 * @param {external:Jquery} jqObject $('#Game')
 */
function Difficulty(jqObject) {
    /**
     * Nombre de paires de cartes à trouver
     */
    this.NumberOfMaxPair = jqObject.data("pair");

    /**
     * Temps pour résoudre le jeu
     */    
    this.TimeToResolve = jqObject.data("seconds");
}
