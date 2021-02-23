/**
 * @description utilisé pour faire le test de correspondance entre deux cartes visibles (retournées)
 */
function CardPair() {

    /* 
    * Liste des cartes visibles (retournées)
    */
    this.listOfCards = new Array();
    
    /**
     * @description Ajoute une carte à la liste des cartes visibles (retournées)
     * @param {FruitCard} fruitCard
     */
    this.addCard = function (fruitCard) {
        this.listOfCards.push(fruitCard);
    }
    
    /**
     * @description Maximum de cartes retournées simultanément : 2
     * Permet le test pour ne pas pouvoir cliquer comme un fou sur les cartes et en retourner plus de 2
     * @return {boolean} 
     */
    this.isMaxCards = function () {
        return this.listOfCards.length == 2;
    }

    /**
     * @description Permet de remettre la liste des cartes visibles (retournées) à zéro
     */
    this.resetlistOfCards = function () {
        this.listOfCards = new Array();
    }
    
    /**
     * @description Compare le nom des cartes visibles (retournées)
     * @return {boolean} 
     */
    this.isCardsAreSameFruit = function () {
        return this.listOfCards[0].fruitName == this.listOfCards[1].fruitName;
    }
}