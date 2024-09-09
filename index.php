<?php
require "config/config.php";
require "controleur/controleur.php";


try {

    if (isset($_GET["action"])) {
        if ($_GET["action"] == "clients")
            clients(); // Affichage de la liste des clients
        else if ($_GET["action"] == "articles")
            articles();
        else if ($_GET["acion"] == "commandes")
            commandes();
        else
            throw new Exception("Action non valide");
    } else
        accueil();

} catch (Exception $e) {
    erreur($e->getMessage());
}