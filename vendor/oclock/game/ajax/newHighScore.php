<?php namespace oclock\game\ajax;

require "../../../autoload.php";
use \oclock\game\bdd\DAL;

if (array_key_exists("high_score",$_POST)) {
    
    // récupération des infos venant de la page
    $nouveauHighScore = json_decode($_POST['high_score']);
    
    try {
        DAL::AddHighScore($nouveauHighScore);
        // Si on ne renvoit rien, la requete ajax considera que c'est une erreur.
        echo json_encode('ok');
    } catch (Exception $th) {
        http_response_code(500);
        echo json_encode($th);
    }
}else {
    echo json_encode("il manque les informations de high_score");
    http_response_code(400);
}

