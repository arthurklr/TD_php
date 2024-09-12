<?php
$title = TITREONGLET;
$header = NOMSITE;
$titre = "Commande n°$idComm";
$menu = MENU;
ob_start();
?>
<div class="titreCommande">Client :</div>
<?=$client[0]['nom']?>
<div class="titreCommande">Articles :</div>
<?php
if (count($article)) {
    // Affichage des titres de colonnes du tableau
    echo '<table><tr>';
    foreach ($article[0] as $cle => $valeur) {
      echo '<th>' . $cle . '</th>';
    }
    echo '</tr>';

    // Affichage des lignes du tableau
    foreach ($article as $ligne) {
      echo '<tr>';
      // Affichage des valeurs d'une ligne
      foreach ($ligne as $valeur) {
        echo '<td>' . $valeur . '</td>';
      }
      echo '</tr>';
    }
    echo '</table>';
  } else
    echo "<div class='reponse'>Aucun client n'est enregistré dans la liste</div>";
  ?>
<div class="titreCommande">Total : <?=$total?> €</div>
<?php
$contenu = ob_get_clean();
$footer = "&copy; MMI Mulhouse";
require "gabarit.php";
