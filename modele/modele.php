<?php

// Connexion à la BDD
function connexionBDD()
{
    try { // Connexion à la base de données
        $options = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
        $base = new PDO('mysql:host=' . DBHOST . ';dbname=' . DBNAME, DBUSER, DBPWD, $options);
    } catch (Exception $err) { // Erreur lors de la connexion à la BDD
        throw new Exception("Connexion à la BDD"); //.$err->getMessage());
    }
    return $base;
}

// Retourne la liste des clients
function getClients()
{
    $bdd = connexionBDD();
    $reponse = $bdd->query("SELECT id_client as 'N°Client', nom as 'Nom', prenom as 'Prénom'  FROM client ORDER BY  nom ASC");
    $clients = $reponse->fetchAll(PDO::FETCH_ASSOC);
    return $clients;
}

// Retourne la liste des articles
function getArticles()
{
    $bdd = connexionBDD();
    $reponse = $bdd->query("SELECT id_article AS 'Référence', designation AS 'Désignation',  categorie AS 'Catégorie', prix AS 'Prix' FROM article ORDER BY categorie");
    $articles = $reponse->fetchAll(PDO::FETCH_ASSOC);
    return $articles;
}

// Retourne la liste des commandes
function getCommandes()
{
    $bdd = connexionBDD();
    $reponse = $bdd->query("SELECT c.id_comm AS 'N° commande', cl.nom AS 'Nom', cl.prenom AS 'Prénom', DATE_FORMAT(c.date, '%d/%m/%Y') AS 'Date' FROM commande c INNER JOIN client cl ON c.id_client = cl.id_client ORDER BY cl.nom, cl.prenom");
    $commandes = $reponse->fetchAll(PDO::FETCH_ASSOC);
    return $commandes;
}