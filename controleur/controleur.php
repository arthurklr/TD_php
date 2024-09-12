<?php

require "modele/modele.php";

// Affichage de la page d'accueil
function accueil()
{
    require "vue/vueAccueil.php";
}
function clients()
{
    $clients = getClients();
    require "vue/vueClients.php";
}
function articles()
{
    $articles = getArticles();
    require "vue/vueArticles.php";
}
function commandes()
{
    $commandes = getCommandes();
    require "vue/vueCommandes.php";
}

function commande($idComm)
{
    $idComm = $_GET['idComm'];
    $idClient = getIdClientCommande($idComm);
    $article = getArticlesCommande($idComm);
    $client = getClient($idClient);
    $total = getTotalCommande($idComm);
    require "vue/vueCommande.php";
}

function erreur($message)
{
    require "vue/vueErreur.php";
}
