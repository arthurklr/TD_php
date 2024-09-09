<?php
$title = TITREONGLET;
$header = NOMSITE;
$titre = "Liste des commandes";
$menu = MENU;
ob_start();
?>
<div class="resultat">
  <?php
  if (count($commandes)) {
    // Affichage des titres de colonnes du tableau
    echo '<table><tr>';
    foreach ($commandes[0] as $cle => $valeur) {
      echo '<th>' . $cle . '</th>';
    }
    echo '</tr>';

    // Affichage des lignes du tableau
    foreach ($commandes as $ligne) {
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
</div>
<?php
$contenu = ob_get_clean();
$footer = "&copy; MMI Mulhouse";
require "gabarit.php";