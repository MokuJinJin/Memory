# Memory
Test technique Recrutement 2021

Le but de cet exercice étant de préparer un cours, voici les notions abordées dans l'ordre de mon developpement :

### PHP :

- Création de classe simple, construteur et propriété : Card.php
- Création de classe avec une propriété tableau d'objet : Memory.php
- Création de classe statique  : utils/EnumCard.php
- Utilisation de classe statique : Memory.php
- Création de pseudo énumération : utils/EnumDifficulty.php
- Utilisation de pseudo énumération : Memory.php
- Création d'une classe d'écriture de HTML : Board.php
- Utilisation de composer et de son autoloading (PSR-4)
- Utilisation de toute l'architecture : index.php
- Connexion base de donnée, Héritage de classe : Base_Dal.php
- Utilisation base de donnée, lecture : DAL.php
- Réception d'un appel Ajax : ajax/newHighScore.php
- Utilisation base de donnée, écriture : ajax/newHighScore.php, DAL.php

### JS : 

- Utilisation de Jquery : index.main.js
- Utilisation d'un plugin jquery (http://nnattawat.github.io/flip/) : index.main.js
- Création de 'classe', méthode et propriété : fruitCard.js, cardPair.js
- Manipulation de data HTML5, classe-css : difficulty.js, fruitCard.js
- Utilisation de setInterval dans une classe, manipulation du DOM : countdown.js
- Utilisation de setTimeOut dans une classe : memoryGame.js
- Utilisation de Jquery, des autres classes : memoryGame.js
- Utilisation d'ajax avec jquery : memoryGame.js

### SCSS : 

- Utilisation de variable : $card-names
- Utilisation de placeholder (%basic_cards) et @extend
- Utilisation de @each  : générer le background-position de manière automatique
- Utilisation de BEM : .card &--active
