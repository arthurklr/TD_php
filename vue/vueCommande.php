<?php
$title = TITREONGLET . " - Détail commande n°$idComm";
$header = NOMSITE;
$titre = "Commande n°$idComm";
$menu = MENU;
ob_start();
?>
<div class='resultat'>
  <div class="titreCommande">Client :</div>
  <?= $client[0]['nom'] . " " . $client[0]['prenom'] ?>
  <br>
  <?= $client[0]['adresse'] ?>
  <br>
  <?= $client[0]['ville'] ?>
  <div class="titreCommande">Articles :</div>
  <?php
  if (count($articles)) {
    // Affichage des titres de colonnes du tableau
    echo '<table><tr>';
    foreach ($articles[0] as $cle => $valeur) {
      echo '<th>' . $cle . '</th>';
    }
    echo '</tr>';

    // Affichage des lignes du tableau
    foreach ($articles as $ligne) {
      echo '<tr>';
      // Affichage des valeurs d'une ligne
      foreach ($ligne as $valeur) {
        echo '<td>' . $valeur . '</td>';
      }
      echo '</tr>';
    }
    echo '</table>';
  } else
    echo "<div class='reponse'>Aucun article n'est enregistré dans la liste</div>";
  ?>
  <div class="titreCommande">Total : <?= $total ?> €</div>
</div>
<?php
$contenu = ob_get_clean();
$footer = "&copy; MMI Mulhouse";
require "gabarit.php";
