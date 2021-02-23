// Objet Carte Fruit
function FruitCard(jqObj) {

  // chaine de caractère importante (test de valeur dessus)
  const flippedValue = 'flipped';

  // Objet jQuery, utilisé pour faire les animations
  this.jqObject = jqObj;

  // ID du HTML contenant la carte
  this.id = this.jqObject.attr('id');

  // Nom de la carte/fruit
  this.fruitName = this.jqObject.data('fruit');

  // utilisation d'un marqueur pour savoir si la carte est visible (retournée)
  this.flipped = this.jqObject.data('flip');

  // Test sur l'état de la carte : visible (retournée)
  this.isFlipped = function () {
    return this.flipped == flippedValue;
  }

  // Marque la carte visible (retournée)
  this.markFlipped = function () {
    this.jqObject.addClass('card--active').data("flip", flippedValue);
    this.flipped = flippedValue;
  }
}
