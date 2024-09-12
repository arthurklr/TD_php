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

function getArticlesCommande($idComm)
{
    $bdd = connexionBDD();
    $reponse = $bdd->query("SELECT quantite AS 'Quantité', article.designation AS 'Désignation', article.categorie AS 'Catégorie', article.prix AS 'Prix' FROM ligne INNER JOIN article ON article.id_article = ligne.id_article WHERE ligne.id_comm = $idComm;");
    $article = $reponse->fetchAll(PDO::FETCH_ASSOC);
    return $article;
}

function getTotalCommande($idComm)
{
    $bdd = connexionBDD();
    $reponse = $bdd->query("SELECT SUM(ligne.quantite * article.prix) AS Total FROM ligne INNER JOIN article ON ligne.id_article = article.id_article WHERE ligne.id_comm = $idComm;");
    $total = $reponse->fetchAll(PDO::FETCH_ASSOC);
    return $total[0]["Total"];
}

function getIdClientCommande($idComm)
{
    $bdd = connexionBDD();
    $reponse = $bdd->query("SELECT id_client FROM commande WHERE id_comm = $idComm");
    $idClient = $reponse->fetchAll(PDO::FETCH_ASSOC);
    return $idClient[0]['id_client'];
}

function getClient($idClient)
{
    $bdd = connexionBDD();
    $reponse = $bdd->query("SELECT nom, prenom, adresse, ville FROM client WHERE client.id_client = $idClient;");
    $client = $reponse->fetchAll(PDO::FETCH_ASSOC);
    return $client;
}



