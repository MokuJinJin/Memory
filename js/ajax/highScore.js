/**
 * @description Manipulation et informations d'une carte
 * @param {string} playerName nom du joueur
 * @param {int} difficulty niveau de difficulté
 * @param {int} elapsedTime nombre de millisecondes
 */
function HighScore(playerName, difficulty, elapsedTime) {
    this.PlayerName = playerName;
    this.Difficulty = difficulty;
    this.ElapsedTime = elapsedTime;
}