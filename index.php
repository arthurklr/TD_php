<?php
require "config/config.php";
require "controleur/controleur.php";


try {

    if (isset($_GET["action"])) {
        if ($_GET["action"] == "clients")
            clients(); // Affichage de la liste des clients
        else if ($_GET["action"] == "articles")
            articles();
        else if ($_GET["action"] == "commandes")
            commandes();
        else if ($_GET["action"] == "commande" && ($_GET['idComm']) >0 && $_GET['idComm'] <= 13 )
            commande();
        else
            throw new Exception("Action non valide");
    } else
        accueil();
} catch (Exception $e) {
    erreur($e->getMessage());
}
